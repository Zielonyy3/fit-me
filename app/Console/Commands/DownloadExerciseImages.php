<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DownloadExerciseImages extends Command
{

    protected $signature = 'exercises-images:download';

    protected $description = 'Downloads and saves exercise images in storage/app/exercises-images.json';

    private string $fileName = 'exercises-images.json';

    /**
     * @throws \ErrorException
     */
    public function handle()
    {
        $key = env('PEXELS_API_KEY');

        if (!empty($key)) {
            $response = Http::withHeaders(['Authorization' => $key,])
                ->get('https://api.pexels.com/v1/search?query=gym&perPage=80', [
                    'query' => 'gym',
                    'per_page' => '80'
                ]);
            Storage::put($this->fileName, json_encode($response->json()['photos']));
        } else {
            throw new \ErrorException('No PEXELS_API_KEY provided in .env file');
        }
    }
}
