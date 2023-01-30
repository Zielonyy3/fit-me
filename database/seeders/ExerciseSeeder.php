<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Database\Seeders\Traits\AttachRandomImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ExerciseSeeder extends Seeder
{
    use AttachRandomImage;

    /**
     * @throws FileCannotBeAdded
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function run()
    {
        $exerciseTypes = json_decode(Storage::get('exercises.json'));
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
}
