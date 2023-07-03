<?php

namespace Tests\Feature\Http\Livewire\Frontend\HaveBeenThere;

use App\Http\Livewire\Frontend\HaveBeenThere\Create;
use App\Models\HaveBeenThere;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_render_create_component()
    {
        $this->actingAs(User::factory()->create());
        
     $this->get('/cisonostato/1076/create')
     ->assertSuccessful()->assertSeeLivewire('frontend.have-been-there.create');
       
     /*Livewire::actingAs(User::factory()->create())
            ->test(Create::class)
            ->assertSuccessful();
            */
    }

}
?>