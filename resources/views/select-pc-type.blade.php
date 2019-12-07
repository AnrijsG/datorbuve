<?php 
    $types = [
        "Video montēšana",
        "Spēļu",
        "Staumēšanas",
        "Ofisa dators"
    ];
    $i = 0;
?>

@extends('layouts.main_layout')

@section('title', 'Izvēlēties datoru')

@section('navbar')

@endsection

@section('content')
    <div class="row">
        <?php foreach($types as $k => $v): ?>
            <a class="bg-info p-2 border-0 text-white w-100 btn" onclick='selected(<?= $i ?>)'><?= $v ?></a>
            <?php $i++; ?>
        <?php endforeach; ?>
        <div class="slidecontainer mt-3 d-none">
            <input type="text" class="d-none" id="pc-type" />
            <input type="range" min="0" max="4" value="0" class="slider" id="price" />
            <b><p class="value-text text-center">Lēts</p></b>
            <input type="submit" />
        </div>
    </div>
    <style>
        .slidecontainer {
            width: 100%; /* Width of the outside container */
        }
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;  
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }
    </style>
    <script>
        var values = ["Lēts", "Vidēji lēts", "Standarta", "Vidēji dārgs", "Ekskluzīvs"];
        function selected(count){
            $(".slidecontainer").removeClass("d-none");
        }
        
        $("#price").on("input", function(){
            $(".value-text").text(values[this.value]);
        });
    </script>
@endsection
