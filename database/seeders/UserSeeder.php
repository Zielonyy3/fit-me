<?php

namespace Database\Seeders;

use App\Models\Routine;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'Jan',
            'last_name' => 'Kowalski',
            'email' => 'admin@fitme.pl',
            'password' => Hash::make('admin.123'),
        ]);

    }
}
