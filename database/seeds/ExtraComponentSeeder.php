<?php

use Illuminate\Database\Seeder;

class ExtraComponentSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('replacements')->insert([
            'computer_type'     => "Spēļu",
            'component'         => "mobo",
            'name'              => "cita mātesplate",
            'price'             => 4,
            'price_increase'    => 16.69,
            'description'       => 'Kas sitam labaks',
        ]);
        DB::table('replacements')->insert([
            'computer_type'     => "Spēļu",
            'component'         => "mobo",
            'name'              => "xd1213",
            'price'             => 3,
            'price_increase'    => 1.69,
            'description'       => 'Kas sitam labaks',
        ]);
    }
}
