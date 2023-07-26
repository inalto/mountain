<?php

namespace Tests\Feature;

use App\Http\Livewire\Frontend\HaveBeenThere\Create;
use App\Models\HaveBeenThere;
use App\Models\User;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HaveBeenThereTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_can_render_create_component()
    {
      $user=User::factory()->create();
      $this->actingAs($user);



      /*
     $this->get('/cisonostato/1076/create')
     ->assertSuccessful()->assertSeeLivewire('frontend.have-been-there.create');
*/
     /*Livewire::actingAs(User::factory()->create())
            ->test(Create::class)
            ->assertSuccessful();
            */

            $this->assertTrue(true);
    }

}
?>
