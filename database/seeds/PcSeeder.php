<?php

use Illuminate\Database\Seeder;
use App\Pc;

class PcSeeder extends Seeder{
    private $computers = [
        [
            'computer_type'     => Pc::TYPE_VIDEO_EDITING,
            'price'             => 1269.99,
            'price_category'    => 3,
            'case'              => 'COOLER MASTER MASTERBOX MB520',
            'mobo'              => 'MSI B450-A Pro ATX',
            'cpu'               => 'AMD Ryzen 5 3600',
            'gpu'               => 'Asus GeForce GTX 1650',
            'psu'               => 'Corsair Vengeance 650M 650W',
            'ram'               => 'G.SKILL Ripjaws V 32GB DDR4-3200',
            'storage'           => 'Intel 660p M.2 512GB SSD; Seagate Barracuda 3TB',
            'description'       => 'deprecated',
        ],
        [
            'computer_type'     => Pc::TYPE_GAMING,
            'price'             => 1359.99,
            'price_category'    => 3,
            'case'              => 'DEEPCOOL TESSERACT',
            'mobo'              => 'Gigabyte B450 Gaming X',
            'cpu'               => 'AMD Ryzen 5 3600',
            'gpu'               => 'Gigabyte GeForce RTX 2060',
            'psu'               => 'Corsair Vengeance 650M 650W',
            'ram'               => 'Kingston HyperX Fury Black 16GB DDR4-3200',
            'storage'           => 'Intel 660p M.2 512GB; Seagate Barracuda 1TB',
            'description'       => 'deprecated',
        ],
        [
            'computer_type'     => Pc::TYPE_STREAMING,
            'price'             => 1419.99,
            'price_category'    => 4,
            'case'              => 'BitFenix ATX NOVA',
            'mobo'              => 'ASRock B450 PRO4',
            'cpu'               => 'AMD Ryzen 5 3600',
            'gpu'               => 'Asus Radeon 5700 XT',
            'psu'               => 'BitFenix PSU Formula 80 Plus Gold 650W',
            'ram'               => 'Kingston HyperX Fury Black 16GB DDR4-3200',
            'storage'           => 'Gigabyte 1 TB SSD',
            'description'       => 'deprecated',
        ],
        [
            'computer_type'     => Pc::TYPE_HOME,
            'price'             => 799.99,
            'price_category'    => 1,
            'case'              => 'FRACTAL DESIGN CORE',
            'mobo'              => 'ASRock B450M-HDV R4.0',
            'cpu'               => 'AMD Ryzen 3 2200G',
            'gpu'               => 'Asus GeForce GTX 1650',
            'psu'               => 'Cooler Master MWE Bronze 450W',
            'ram'               => '4 Blackout 8GB 3000MHz0',
            'storage'           => 'Gigabyte 1 TB SSD',
            'description'       => 'deprecated',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        foreach ($this->computers as $computer) {
            DB::table('pc')->insert([
                'computer_type'     => $computer['computer_type'],
                'price'             => $computer['price'],
                'price_category'    => $computer['price_category'],
                'case'              => $computer['case'],
                'mobo'              => $computer['mobo'],
                'cpu'               => $computer['cpu'],
                'gpu'               => $computer['gpu'],
                'psu'               => $computer['psu'],
                'ram'               => $computer['ram'],
                'storage'           => $computer['storage'],
                'description'       => $computer['description'],
            ]);
        }
    }
}
