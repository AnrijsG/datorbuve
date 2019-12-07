<?php

use Illuminate\Database\Seeder;

class PcSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('pc')->insert([
            'computer_type'     => "Spēļu",
            'price'             => 1250.43,
            'price_category'    => 4,
            'case'              => 'test',
            'mobo'              => 'motherboard',
            'cpu'               => 'labs sildītājs',
            'gpu'               => 'vēl labāks sildītājs',
            'psu'               => 'nodegs',
            'ram'               => 'bezjēdzīgs',
            'storage'           => 'nosaukums :)',
            'description'       => 'te actual informācija ir',
        ]);
    }
}
