<?php
use App\Pc;

/**
 * @var array $replacement
 * @var \App\Pc $pc
 */

    // Dirty hack to escape exception lol
    if (!isset($pc[0])) {
        $pc[0] = [
            'computer_type'     => Pc::TYPE_VIDEO_EDITING,
            'price'             => 1250.43,
            'price_category'    => 4,
            'case'              => 'COOLER MASTER MASTERBOX MB520',
            'mobo'              => 'MSI B450-A Pro ATX',
            'cpu'               => 'AMD Ryzen 5 3600',
            'gpu'               => 'Asus GeForce GTX 1650',
            'psu'               => 'Corsair Vengeance 650M 650W',
            'ram'               => 'G.SKILL Ripjaws V 32GB DDR4-3200',
            'storage'           => 'Intel 660p M.2 512GB SSD; Seagate Barracuda 3TB',
            'description'       => 'te actual informācija ir',
        ];
    }

    $computer = $pc[0];

    $variablesPC = [
        'Mātesplate'        => 'mobo',
        'Procesors '        => 'cpu',
        'Videokarte '       => 'gpu',
        'RAM '              => 'ram',
        'Atmiņa '           => 'storage',
        'Barošanas bloks'   => 'psu',
        'Kaste'             => 'case'
    ];
    $variablesComponent = [
        'Nosaukums'     => 'name',
        'Cena'          => 'price_increase',
        'Apraksts'      => 'description'
    ];
    $i = 0;
?>

@extends('layouts.main_layout')

@section('title', 'Izvēlētais dators')

@section('navbar')

@endsection

@section('content')
    <a href="/" class="btn bg-secondary text-white">Uz sākumu</a>

    <div class="col-12 pb-5 text-center">
        <h2>Izvēlētais dators</h2>
    </div>

    <div class="row border mx-2 px-2 py-2">
        <div class="col-4">
            <img class="w-100" src="https://microless.com/cdn/products/7e098f62d7dc73666e1ac86ce62fa865-md.jpg" id="case-bilde" alt="Computer case">
        </div>

        <div class="col-8">
            <?php foreach($variablesPC as $k => $v): ?>
            <div>
                <div class="info px-2 bg-light border" onclick="openExtras(<?= $i ?>)" id="component<?= $i ?>">
                    <p><strong>{{ $k }}</strong> : {{ $computer[$v] }}</p>
                </div>
                <div>
                    <div class="extra-info d-none border-top">
                    <?php $first = true; ?>
                    <?php foreach($replacement[$v] as $k1 => $v1): ?>
                        <div class="col-3 border">
                            <?php foreach($variablesComponent as $key => $var): ?>
                                <p>{{ $key }} : {{ $v1[$var] }}</p>
                            <?php endforeach; ?>
                            <input type="radio" <?= ($first)?'checked':''; ?> />
                            <?php $first = false; ?>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            <div>
            <?php $i++; ?>
            <?php endforeach; ?>
            <div>
                <p class="text-right"><strong>Kopējā cena:</strong> {{ $computer['price'] }}</p>
            </div>
        </div>

    </div>

    <script>
        function openExtras(count){
            $container = $("#component" + count).parent().find(".extra-info");
            if($container.hasClass("d-none")){
                $(".extra-info").addClass('d-none');
                $container.removeClass("d-none");
            }else{
                $container.addClass("d-none");
            }
        }

        let caseImages = [
            'https://www.tet.lv/veikals/i/product_popup_image/products/deepcool-tesseract-5da61d511f95a.jpg',
            'https://microless.com/cdn/products/7e098f62d7dc73666e1ac86ce62fa865-md.jpg',
        ];

        if (!localStorage.getItem('datorbuve-case')) {
            localStorage.setItem('datorbuve-case', 0);
        }

        localStorage.setItem('datorbuve-case', parseInt(localStorage.getItem('datorbuve-case')) + 1);

        $('#case-bilde').attr('src', caseImages[localStorage.getItem('datorbuve-case') % 2]);
    </script>
    <style>
    .info{
        cursor: pointer;
    }
    .extra-info{
        cursor: default;
    }
    .image{
        min-height: 300px;
    }
    </style>
@endsection
