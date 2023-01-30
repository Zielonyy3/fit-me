<?php

namespace Database\Seeders\Traits;

use Faker\Factory;
use Illuminate\Support\Facades\Storage;

trait AttachRandomImage
{
    private array $exerciseImages = [];

    public function __construct()
    {
        $this->exerciseImages = json_decode(\File::get(resource_path('data/exercises-images.json')));
    }


    private function randomImageUrl()
    {
        $faker = Factory::create();
        $exerciseImage = $faker->randomElement($this->exerciseImages);
        return $exerciseImage->src?->medium ?? $exerciseImage->src?->original;
    }
}
