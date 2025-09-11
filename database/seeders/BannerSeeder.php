<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for($i = 0; $i < 1000; $i++){
           $banner =  DB::table('banners')->insert([
                'alt' => 'Banner' . $i,    
                'src' => 'img' . $i
            ]);

        }
      

        
    }
}
