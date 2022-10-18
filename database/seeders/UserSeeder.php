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
        $users  =  User::factory(3)->create();

        // Set Role to first users
        foreach ($users as  $user) {
            if ($user->id === 1) {
                $user->assignRole('Admin');
            } else {
                $user->assignRole('Editor');
            }
        }
    }
}