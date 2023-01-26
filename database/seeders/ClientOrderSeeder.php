<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Order;
use app\Models\Client;

class ClientOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()->count(22)->create();

        Client::factory()->count(43)->create()->each(function ($client) {
            $client->orders()->sync(
                Order::all()->random(4)
            );
        });
    }
}
