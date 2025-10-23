<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TownsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('towns')->insert([
            [
                'title'   => 'castle',
            ],
        
            [
                'title'   => 'inferno',
            ],
            
            [
                'title'   => 'factory',
            ],
            
            [
                'title'   => 'rampart',
            ],
              [
                'title'   => 'tower',
            ],
             [
                'title'   => 'necropolis',
            ],
              [
                'title'   => 'dungeon',
            ],
              [
                'title'   => 'stronghold',
                
            ],
              [
                'title'   => 'fortress',
            ],
              [
                'title'   => 'conflux',
            ],
              [
                'title'   => 'cove',
            ]
        ]);

        //
    }
}
