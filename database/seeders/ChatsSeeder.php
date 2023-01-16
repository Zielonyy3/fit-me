<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Musonza\Chat\Models\Conversation;

class ChatsSeeder extends Seeder
{
    private Generator $faker;

    public function run()
    {
        $this->faker = Factory::create();

        $admin = User::where('email', 'admin@fitme.pl')->first();
        $selectedUsersIds = [$admin->getKey()];
        for ($i = 1; $i <= 4; $i++) {
            $randomUser = User::whereNotIn('id', $selectedUsersIds)->get()->random();
            $selectedUsersIds[] = $randomUser->getKey();
            $participants = [$admin, $randomUser];
            $conversation = \Chat::createConversation($participants)->makeDirect();

            $this->sendMessages($participants, $conversation);
        }
    }

    private function sendMessages(array $participants, Conversation $conversation, int $quantity = 10)
    {
        for ($j = 1; $j <= $quantity; $j++) {
            $sender = $this->faker->randomElement($participants);

            \Chat::message($this->faker->text())
                ->from($sender)
                ->to($conversation)
                ->send();
        }
    }


}
