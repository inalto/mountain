<?php

namespace Tests\Feature;

use App\Models\Report;
use App\Models\User;
use Tests\CreatesApplication;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use CreatesApplication;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_report_save()
    {
        $user = User::factory()->create();

        ray($user);
        /*
                $period = [
                    'm1'=>false,
                    'm2'=>false,
                    'm3'=>false,
                    'm4'=>false,
                    'm5'=>false,
                    'm6'=>false,
                    'm7'=>false,
                    'm8'=>false,
                    'm9'=>false,
                    'm10'=>false,
                    'm11'=>false,
                    'm12'=>false,
                ];


                $data = [
                    'title' => 'My report',
                    'owner_id' => $user->id,
                    'period' => $period,
                ];
        */
        /*
        $model = Report::create($data);

        $this->assertInstanceOf(MyModel::class, $model);
        $this->assertIsArray($model->hobbies);
        $this->assertCount(2, $model->hobbies);
        $this->assertContains('reading', $model->hobbies);
        $this->assertContains('swimming', $model->hobbies);
*/
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
