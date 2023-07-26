<?php

namespace Tests\Feature;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Report;
class ReportTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_report(): void
    {
      $user=User::factory()->create();
      $this->actingAs($user);
        $data=Report::factory()->definition();

//        $data['owner_id']=2;

        ray($data);
        $report = Report::create($data);

        $this->assertInstanceOf(Report::class, $report);

        $this->assertTrue(true);
    }
}
