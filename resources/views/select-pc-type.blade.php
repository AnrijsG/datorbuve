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
            <div class="col-12 text-center mb-2">
                <a class="bg-info p-2 border-0 text-white btn" style="width:30%" onclick='selected(<?= $i ?>)' id="button<?= $i ?>"><?= $v ?></a>
            </div>
            <?php $i++; ?>
        <?php endforeach; ?>
        <div class="slidecontainer mt-3 d-none">
            <form class="text-center" method="post" action="select-pc/submit">
                @csrf
                <input type="text" class="d-none" id="pc-type" name="pc-type" readonly />
                <input type="range" min="0" step="0.5" max="400" value="0" class="slider" id="price" name="price" />
                <b><p class="value-text text-center">Lēts</p></b>
                <input type="submit" class="bg-success text-white btn" value="Izvēlēties" />
            </form>
        </div>
    </div>
    <style>
        .slidecontainer {
            width: 100%;
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
        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%; 
            background: #4CAF50;
            cursor: pointer;
        }
        a.btn.selected {
            background-color: green !important;
        }
    </style>
    <script>
        var values = ["Lēts", "Vidēji lēts", "Standarta", "Vidēji dārgs", "Ekskluzīvs"];
        function selected(count){
            $(".slidecontainer").removeClass("d-none");
            $("a").removeClass("selected");
            $("#button" + count).addClass("selected");
            $("#pc-type").val($("#button" + count).text());
        }

        $("#price").on("mouseup", function(){
            var val = Math.round(this.value / 100);
            this.value = val * 100;
            $(".value-text").text(values[this.value / 100]);
        });

        $("#price").on("touchend", function(){
            var val = Math.round(this.value / 100);
            this.value = val * 100;
            $(".value-text").text(values[this.value / 100]);
        });

        $("#price").on("input", function(){
            $(".value-text").text(values[Math.round(this.value / 100)]);
        });
    </script>
@endsection
