<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DownloadProfilePictures extends Command
{

    protected $signature = 'profile-pictures:download';

    protected $description = 'Downloads and saves profile pictures in storage/app/profile-pictures.json';

    private string $fileName = 'profile-pictures.json';

    /**
     * @throws \ErrorException
     */
    public function handle()
    {
        $key = env('PEXELS_API_KEY');

        if (!empty($key)) {
            $response = Http::withHeaders(['Authorization' => $key,])
                ->get('https://api.pexels.com/v1/search', [
                    'query' => 'profile picture',
                    'per_page' => '80'
                ]);
            Storage::put($this->fileName, json_encode($response->json()['photos']));
        } else {
            throw new \ErrorException('No PEXELS_API_KEY provided in .env file');
        }
    }
}
