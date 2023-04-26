<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'id' => 1,
            'name' => 'Diyorjon',
            'surname' => 'Murodov',
            'username' => 'diyorjon710',
            'password' => '12345678',
            'phone_number' => '977100590',
            'role' => 'admin',
            'permissions' => "read,update,create,delete",
            'viloyat_id' => 1,
            'tuman_id' => 1,
            'maydon_id' => 1,
            ]);
    }
}
