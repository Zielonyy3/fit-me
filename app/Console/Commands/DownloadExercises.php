<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DownloadExercises extends Command
{

    protected $signature = 'exercises:download';

    protected $description = 'Downloads and saves exercise names in storage/app/exercises';

    private array $types = [
        'cardio',
        'olympic_weightlifting',
        'plyometrics',
        'powerlifting',
        'strength',
        'stretching',
        'strongman',
    ];

    private string $fileName = 'exercises.json';

    /**
     * @throws \ErrorException
     */
    public function handle()
    {
        $key = env('API_NINJA_KEY');

        if (!empty($key)) {
            $exercises = [];
            foreach ($this->types as $type) {
                $this->info('Downloading: ' . $type);
                $response = Http::withHeaders(['X-Api-Key' => $key,])
                    ->get('https://api.api-ninjas.com/v1/exercises', [
                        'type' => $type
                    ]);
                $exercises[$type] = $response->json();
            }
            Storage::put($this->fileName, json_encode($exercises));
        } else {
            throw new \ErrorException('No API_NINJA_KEY provided in .env file');
        }
    }
}
