<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Проверяем, чтобы не добавлять дубликаты
        if (DB::table('players')->where('username', 'player1')->exists()) {
            return;
        }

        DB::table('players')->insert([
            [
                'username'   => 'HellLight',
                'name'       => 'Michael',
                'surname'    => 'Smith',
                'birthday'   => '1995-08-20',
               
                'avatar'     => 'avatars/michael_smith.png',
                'active'     => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'Weronest',
                'name'       => 'Anna',
                'surname'    => 'Ivanova',
                'birthday'   => '1992-03-14',
                
                'avatar'     => null,
                'active'     => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'Szopa666',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
              [
                'username'   => 'DarkPepega',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
  [
                'username'   => 'Bishop',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
              [
                'username'   => 'Pup_ok',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
              [
                'username'   => 'Amieloo',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
              [
                'username'   => 'Unutcon',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'username'   => 'FTS',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'username'   => 'Gomunguls',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'username'   => 'MeatWagon',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
              [
                'username'   => 'Redwhait',
                'name'       => 'John',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
              [
                'username'   => 'Stinger',
                'name'       => 'Артём',
                'surname'    => null,
                'birthday'   => null,
               
                'avatar'     => null,
                'active'     => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
