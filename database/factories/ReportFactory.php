<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $locales = config('localized-routes.supported-locales');


      $localized_text = [];
      foreach ($locales as $locale) {
        $localized_text[$locale]['title'] = $this->faker->sentence(3);
        $localized_text[$locale]['excerpt'] = $this->faker->sentence(10);
        $localized_text[$locale]['content'] = $this->faker->paragraph(10);
        $localized_text[$locale]['access'] = $this->faker->paragraph(10);
        $localized_text[$locale]['info'] = $this->faker->paragraph(10);

      }

        $def = array_merge($localized_text,[
          'type' =>0,

          'difficulty' => $this->faker->numberBetween(1, 5),
          'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
          'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),

          'last_survey' => $this->faker->dateTimeBetween('-1 years', 'now'),


          'owner_id' => 2,
          'nid' => $this->faker->numberBetween(1, 5),


          'time_a'=>$this->faker->time($format = 'h:i', $min = 'now'),
          'time_r'=>$this->faker->time($format = 'h:i', $min = 'now'),
          'length'=>$this->faker->numberBetween(1, 5),
          'altitude_s'=>$this->faker->numberBetween(400, 1500),
          'altitude_e'=>$this->faker->numberBetween(400, 1500),
          'drop_p'=>$this->faker->numberBetween(0, 1500),
          'drop_n'=>$this->faker->numberBetween(0, 1500),
          'coords'=>$this->faker->latitude($min = -90, $max = 90).','.$this->faker->longitude($min = -180, $max = 180),
          'published'=>$this->faker->boolean($chanceOfGettingTrue = 50),
          'approved'=>$this->faker->boolean($chanceOfGettingTrue = 50),

          'exposure'=>$this->faker->numberBetween(1, 5),
          'period'=> null

        ]);


        return $def;
    }
}
