<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HowToBooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('how_to_books')->delete();
        
        \DB::table('how_to_books')->insert(array (
            0 => 
            array (
                'id' => 1,
            'description' => '<ul style="color: rgb(89, 98, 119); font-family: Ubuntu, sans-serif;"><li><p><span style="font-weight: bolder;">By Phone:&nbsp;</span>Call our friendly customer service team for instant booking.</p></li><p></p><li><p><span style="font-weight: bolder;">By Email:&nbsp;</span>Send your request with your preferred date and time.</p></li><p></p><li><p><span style="font-weight: bolder;">Via Website:&nbsp;</span>Fill out our simple contact form for a quick response.</p></li></ul>',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-04-17 11:57:38',
            ),
        ));
        
        
    }
}