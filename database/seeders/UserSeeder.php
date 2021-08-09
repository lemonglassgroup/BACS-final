<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'guest',
            'email' => 'guest@guest.com',
            'password' => bcrypt('123456789'),
            'is_admin' => false,
        ]);
    }
}
