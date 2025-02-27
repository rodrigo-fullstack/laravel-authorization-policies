<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'creator', 'visitor'];

        $users = [];
        foreach($roles as $role){
            $users[] = [
                'name' => "$role.123",
                'email' => "$role@email.com",
                'password' => Hash::make('abc123456'),
                'role' => $role,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('users')->insert($users);        
    }
}
