<?php

namespace App\Console\Commands;

use App\Models\Exercise;
use Database\Seeders\Traits\AttachRandomImage;
use Illuminate\Console\Command;

class TestMediaLibrary extends Command
{

    protected $signature = 'test:media-library';

    protected $description = 'Downloads and saves profile pictures in storage/app/profile-pictures.json';

    /**
     * @throws \ErrorException
     */
    public function handle()
    {
        $isCreated = false;
        $exerciseTypes = json_decode(\File::get(resource_path('data/exercises.json')));
        foreach ($exerciseTypes as $type => $exercises) {
            foreach ($exercises as $exercise) {
                if (!$isCreated) {
                    $this->info('Adding type: ' . $type);
                    $exercise = Exercise::factory()->create([
                        'name' => $exercise->name,
                        'description' => $exercise->instructions,
                        'owner_id' => null,
                    ]);
                    $exercise
                        ->addMediaFromUrl($this->randomImageUrl())
                        ->toMediaCollection();
                    $isCreated = true;
                }
            }
        }
    }
}
