<?php
    $info = [
        'Vīzīja' => 'Uzņēmums ir uzticams un atbildīgs sadarbības partneris saviem klientiem, kurš izprot to vajadzības un rūpējas par ērtu pakalpojumu sniegšanu.',
        'Uzņēmuma misija' => 'Piedāvāt datorbūves platformu, kura ikvienam dod iespēju iegādāties personalizētu datoru.',
    ];
?>

@extends('layouts.main_layout')

@section('title', 'Kontakti')

@section('navbar')

@endsection

@section('content')
    <a href="/" class="btn bg-secondary text-white">Uz sākumu</a>

    <div class="row">
        <div class="col-12 pb-5 text-center">
            <h2>Par CCS</h2>
        </div>

        <div class="col-6 pl-5 pt-3 border-right">
            <?php foreach($info as $k => $v): ?>
                <h3><?= $k ?></h3>

                <ul>
                    <li><?= $v ?></li>
                </ul>
            <?php endforeach; ?>
        </div>

        <div class="col-6 pt-3 text-center">
            <img src="/images/logo-small.png" alt="Custom Computer Solutions Compact Logo">
        </div>
    </div>
@endsection
