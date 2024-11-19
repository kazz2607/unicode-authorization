<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $groupId = DB::table('groups')->insertGetId([
            'name' => 'Administrator',
            'user_id' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        if ($groupId > 0){
            $userId = DB::table('users')->insertGetId([
                'name' => 'Nguyễn Tuấn',
                'email' => 'kairu2607@gmail.com',
                'password' => Hash::make('123456'),
                'group_id' => $groupId,
                'user_id' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($userId > 0){
                for ($i=1; $i <= 10; $i++) { 
                    DB::table('posts')->insert([
                        'title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                        'content' => 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
                        'user_id' => $userId,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }
    }
}
