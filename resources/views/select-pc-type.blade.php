<?php
    $types = [
        'Video montēšana' => [
            'hasBorder' => true,
            'description' => 'Nepieciešams jaudīgs procesoru, daudz operatīvā atmiņa, pietiekami labu video karti, bet nav nepieciešamas visjaudīgākais, nepieciešamas vairāk atmiņas, jo video faili aizņem daudz vietas',
        ],
        'Spēļu' => [
            'hasBorder' => true,
            'description' => 'Lai gan visas komponentes ir svarīgas spēlēm, iesakam vērst padziļinātu interesi uz video karti un operatīvās atmiņas ātrumu, lai netiktu bremzēts procesors',
        ],
        'Staumēšanas' => [
            'hasBorder' => true,
            'description' => 'Nepieciešama pietiekami spēcīga video karte, lai spētu paveikt gan video straumēšanu, gan pārējas darbības',
        ],
        "Mājas/Ofisa dators" => [
            'description' => 'Neliela formāta dators, kas neaizņem pārāk daudz vietas, kā arī spēj paveikt jebkuru ikdienas darbu un pat nedaudz vairāk grafiski intensīvus uzdevumus',
        ],
    ];
    $i = 0;
    $j = 0; //negribējās pisties
?>

@extends('layouts.main_layout')

@section('title', 'Izvēlēties datoru')

@section('navbar')

@endsection

@section('content')
    <a href="/" class="btn bg-secondary text-white">Uz sākumu</a>

    <h2 class="text-center mt-2">Personalizēti datori Jūsu vajadzībām</h2>
    <p class="lead">Mūsu speciālisti parūpēsies, lai Jūs saņemtu datoru, kurš domāts tieši Jums.</p>

    <div class="bg-light px-4 py-4">
        <div class="row">
            <?php foreach($types as $k => $v): ?>
                <div class="col-3 mb-2 <?= !isset($v['hasBorder']) ?: 'border-right'?>">
                    <h5 class="pc-type-<?= $j ?>"><?= $k ?></h5>
                    <p class="text-muted"><?= $v['description'] ?? '' ?></p>

                    <?php $j++ ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <?php foreach($types as $k => $v): ?>
                <div class="col-3 text-center mb-2">
                    <a class="bg-danger w-100 p-2 border-0 text-white btn" onclick='selected(<?= $i ?>)' id="button<?= $i ?>">Izvēlēties</a>
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
                <input type="submit" class="bg-danger text-white btn" value="Rādīt piedāvājumu" />
            </form>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="subscribeNewsletter" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Piedāvājums</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Vēlaties uzzināt vairāk? Atstājiet savu e-pastu un saņemt jaunumus par mūsu piedāvājumiem!</p>

                    <div class="row pr-2 mr-3">
                        <label class="col-2" for="emailField">Epasts: </label>
                        <input class="col-10" id="emailField" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Citreiz</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Pieteikties</button>
                </div>
            </div>
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
            background: #a52a2a;
            cursor: pointer;
        }
        a.btn.selected {
            background-color: brown !important;
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
            $("#pc-type").val(document.querySelector(".pc-type-" + count).textContent);
        }

        function recalculateSliderValue() {
            var val = Math.round(this.value / 100);
            this.value = val * 100;
            $(".value-text").text(values[this.value / 100]);
        }

        $("#price").on("mouseup", recalculateSliderValue());

        $("#price").on("touchend", recalculateSliderValue());

        $("#price").on("input", function(){
            $(".value-text").text(values[Math.round(this.value / 100)]);
        });

        $('#subscribeNewsletter').on('shown.bs.modal', function () {
            $('#subscribeNewsletter').trigger('focus')
        })

        $(document).ready(function() {
           $('#subscribeNewsletter').modal('show');
        });
    </script>
@endsection
