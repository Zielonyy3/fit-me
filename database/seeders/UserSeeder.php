<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    private array $profilePictures = [];
    public function run()
    {
        $this->profilePictures = json_decode(Storage::get('profile-pictures.json'));

        $users = User::factory(10)->create();
        foreach ($users as $user) {
            $user->addMediaFromUrl($this->getRandomImageUrl())
                ->toMediaCollection();
        }

        $admin = User::factory()->create([
            'first_name' => 'Jan',
            'last_name' => 'Kowalski',
            'email' => 'admin@fitme.pl',
            'password' => Hash::make('admin.123'),
        ]);
        $admin->addMediaFromUrl($this->getRandomImageUrl())
            ->toMediaCollection();

    }

    private function getRandomImageUrl(): string
    {
        $faker = Factory::create();
        $profilePicture = $faker->randomElement($this->profilePictures);
        return $profilePicture->src->small;
    }
}
