<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'type' => User::ADMIN,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::factory()->create([
            'name' => 'Brown',
            'email' => 'brown@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('brown'),
            'type' => User::DEFAULT,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->count(5)->create();
    }
}
