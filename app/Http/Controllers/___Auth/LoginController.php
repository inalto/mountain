<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;

use App\Models\User;
use App\Models\Team;


class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Redirect to authentication page based on $provider.
     * 
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(string $provider)
    {
        try {
            $scopes = config("services.$provider.scopes") ?? [];
            if (count($scopes) === 0) {
                return Socialite::driver($provider)->redirect();
            } else {
                return Socialite::driver($provider)->scopes($scopes)->redirect();
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Obtain the user information from $provider
     * 
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(string $provider)
    {
        try {
            $data = Socialite::driver($provider)->user();
            
            return $this->handleSocialUser($provider, $data);
        } catch (\Exception $e) {
            return redirect('login')->withErrors(['authentication_deny' => 'Login with '.ucfirst($provider).' failed. Please try again.']);
        }
    }

    /**
     * Handles the user's information and creates/updates
     * the record accordingly.
     *
     * @param string $provider
     * @param object $data
     * @return \Illuminate\Http\Response
     */
    public function handleSocialUser(string $provider, object $data)
    {
        $user = User::where([
            "social->{$provider}->id" => $data->id,
        ])->first();

        if (!$user) {
            $user = User::where([
                'email' => $data->email,
            ])->first();
        }

        if (!$user) {
            return $this->createUserWithSocialData($provider, $data);
        }

        $social = $user->social;
        $social[$provider] = [
            'id' => $data->id,
            'token' => $data->token
        ];
        $user->social = $social;
        $user->save();

        return $this->socialLogin($user);
    }

    /**
     * Create user
     *
     * @param string $provider
     * @param object $data
     * @return \Illuminate\Http\Response
     */
    public function createUserWithSocialData(string $provider, object $data)
    {
        try {
            $user = new User;
            $user->email = $data->email;
            $user->name = $data->name;
            $user->social = [
                $provider => [
                    'id' => $data->id,
                    'token' => $data->token,
                ],
            ];
            // markEmailAsVerified() contains save() behavior
            $user->markEmailAsVerified();
            $team = Team::forceCreate([
                'user_id' => $user->id,
                'name' => $user->name."'s Team",
                'personal_team' => true,
            ]);
            $user->current_team_id = $team->id;
            $user->save();

            return $this->socialLogin($user);
        } catch (Exception $e) {
            return redirect('login')->withErrors(['authentication_deny' => 'Login with '.ucfirst($provider).' failed. Please try again.']);
        }
    }

    /**
     * Log the user in
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function socialLogin(User $user)
    {
        auth()->loginUsingId($user->id);

        return redirect($this->redirectTo);
    }
}