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
            'computer-type' => "Spēļu",
            'price'         => 4,
            'case'          => 'test',
            'mobo'          => 'motherboard',
            'cpu'           => 'labs sildītājs',
            'gpu'           => 'vēl labāks sildītājs',
            'psu'           => 'nodegs',
            'ram'           => 'bezjēdzīgs',
            'storage'       => 'nosaukums :)',
            'description'   => 'te actual informācija ir',
        ]);
    }
}
