<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Observation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Observation>
 */
class ObservationFactory extends Factory
{
    protected $model = Observation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = scandir('resources/img');

        $images = $this->removeValuesFromArray($images, ['.', '..', '...']);

        return [
            'title' => fake()->jobTitle(),
            'image_path' => 'img/' . $images[rand(0, count($images) - 1)],
            'content' => fake()->text()
        ];
    }

    public function removeValuesFromArray(array $array, array $valuesToRemove): array {
        return array_values(array_diff($array, $valuesToRemove));
    }
}
