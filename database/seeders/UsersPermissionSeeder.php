<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                'user_id'    => 1,
                'permission' => 'view_post',
            ],
            [
                'user_id'    => 1,
                'permission' => 'delete_post',
            ],
            [
                'user_id'    => 1,
                'permission' => 'create_post',
            ],
            [
                'user_id'    => 1,
                'permission' => 'update_post',
            ],
            
            [
                'user_id'    => 2,
                'permission' => 'view_post',
            ],

            [
                'user_id'    => 2,
                'permission' => 'create_post',
            ],
            
            [
                'user_id'    => 2,
                'permission' => 'update_post',
            ],

            [
                'user_id'    => 3,
                'permission' => 'view_post',
            ],

            
        ];


        foreach($permissions as $permission){
            $data[] = [
                'user_id' => $permission['user_id'],
                'permission' => $permission['permission'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users_permissions')->insert($data);
    }
}
