<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
class ChatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', 'admin@fitme.pl')->first();
        for ($i = 1; $i <= 2; $i++) {
            $randomUser = User::all()->random();
            $participants = [$admin, $randomUser];

            $conversation = \Chat::createConversation($participants)->makeDirect();

            for ($i = 1; $i <= 10; $i++) {
                \Chat::message('Hello ' . $i)
                    ->from($admin)
                    ->to($conversation)
                    ->send();
            }
        }
    }


}
