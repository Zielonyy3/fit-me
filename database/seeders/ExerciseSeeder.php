<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ExerciseSeeder extends Seeder
{
    /**
     * @throws FileCannotBeAdded
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function run()
    {
        $exerciseTypes = json_decode(\File::get(resource_path('data/exercises.json')));
        foreach ($exerciseTypes as $type => $exercises) {
            foreach ($exercises as $exercise) {
                $exercise = Exercise::factory()->create([
                    'name' => $exercise->name,
                    'description' => $exercise->instructions,
                    'owner_id' => null,
                ]);
                $exercise
                    ->addMediaFromUrl($this->randomImageUrl())
                    ->toMediaCollection();
            }
        }
    }

    private function randomImageUrl()
    {
        $exerciseImages = json_decode(\File::get(resource_path('data/exercises-images.json')));
        $faker = Factory::create();
        $exerciseImage = $faker->randomElement($exerciseImages);
        return $exerciseImage->src?->medium ?? $exerciseImage->src?->original;
    }
}
