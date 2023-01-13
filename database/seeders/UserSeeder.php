<?php

namespace Database\Seeders;

use App\Models\Routine;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'Jan Kowalski',
            'email' => 'admin@fitme.pl',
        ]);

        Routine::factory(10)->create([
            'owner_id' => $admin->getKey(),
        ]);

    }
}
