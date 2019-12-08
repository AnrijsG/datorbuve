<?php
    $types = [
        'Video montēšana' => [
            'hasBorder' => true,
            'description' => 'Video montēšanā galvenā sastāvdaļa ir procesors',
        ],
        'Spēļu' => [
            'hasBorder' => true,
            'description' => 'Lai gan visas komponentes ir svarīgas spēlēm, iesakam vērst padziļinātu interesi uz video karti',
        ],
        'Staumēšanas' => [
            'hasBorder' => true,
            'description' => 'es hzin ko te rakstīt',
        ],
        "Mājas/Ofisa dators" => [
            'description' => 'čista hzin, vecais',
        ],
    ];
    $i = 0;
?>

@extends('layouts.main_layout')

@section('title', 'Izvēlēties datoru')

@section('navbar')

@endsection

@section('content')
    <a href="/" class="btn bg-secondary text-white">Uz sākumu</a>

    <h2 class="text-center mt-2">Personalizēti datori Jūsu vajadzībām</h2>
    <p>Mūsu speciālisti parūpēsies, lai Jūs saņemtu datoru, kurš domāts tieši Jums.</p>

    <div class="bg-light px-4 py-4">
        <div class="row">
            <?php foreach($types as $k => $v): ?>
                <div class="col mb-2 <?= !isset($v['hasBorder']) ?: 'border-right'?>">
                    <h3><?= $k ?></h3>
                    <p class="text-muted"><?= $v['description'] ?? '' ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <?php foreach($types as $k => $v): ?>
                <div class="col text-center mb-2">
                    <a class="bg-info w-100 p-2 border-0 text-white btn" onclick='selected(<?= $i ?>)' id="button<?= $i ?>">Izvēlēties</a>
                </div>

                <?php $i++ ?>
            <?php endforeach; ?>
        </div>

        <div class="slidecontainer mt-3">
            <form class="text-center" method="post" action="select-pc/submit">
                @csrf
                <input type="text" class="d-none" id="pc-type" name="pc-type" readonly />
                <input type="range" min="0" step="0.5" max="400" value="0" class="slider" id="price" name="price" />
                <b><p class="value-text text-center mt-2">Lēts</p></b>
                <input type="submit" class="bg-success text-white btn" value="Rādīt piedāvājumu" />
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
        $(document).ready(function() {
            $(".slidecontainer").hide();
        });

        var values = ["Lēts", "Vidēji lēts", "Standarta", "Vidēji dārgs", "Ekskluzīvs"];
        function selected(count){

            if ($(".slidecontainer").hide()) {
                $(".slidecontainer").slideToggle("fast");
            } else {
                $(".slidecontainer").hide();
            };

            //$(".slidecontainer").removeClass("d-none");
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
