<?php 
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
        <div class="row">
            <div class="col-12 pb-5 text-center border-bottom">
                <h2>Izvēlētais dators</h2>
            </div>
            <div class="row m-0 w-100 border-bottom image">
                <div class="col-5 pl-5 pt-3 border-right">
                    BILDE TE (Kastes??)
                </div>
                <div class="col-7 pt-3 text-center">
                    <p>Apraksts : {{ $computer['description'] }}</p>
                </div>
            </div>
            <div class="col-12 pt-3 text-center">

                <?php foreach($variablesPC as $k => $v): ?>
                <div class="info border" onclick="openExtras(<?= $i ?>)" id="component<?= $i ?>">
                    <p>{{ $k }} : {{ $computer[$v] }}</p>
                    <div class="extra-info d-none border-top">
                    <?php foreach($replacement[$v] as $k1 => $v1): ?>
                        <div class="col-3 border">
                            <?php foreach($variablesComponent as $key => $var): ?>
                                <p>{{ $key }} : {{ $v1[$var] }}</p>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <?php $i++; ?>
                <?php endforeach; ?>
                <div>
                    <p>Kopējā cena : <b>{{ $computer['price'] }}</b></p>
                </div>
            </div>
        </div>

        <script>
            function openExtras(count){
                $container = $("#component" + count).find(".extra-info");
                if($container.hasClass("d-none")){
                    $(".extra-info").addClass('d-none');
                    $container.removeClass("d-none");
                }else{
                    $container.addClass("d-none");
                }
            }
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
