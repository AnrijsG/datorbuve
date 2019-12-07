<?php 
    $info = ["123","234","345","456"];
?>

@extends('layouts.main_layout')

@section('title', 'Kontakti')

@section('navbar')

@endsection

@section('content')
        <div class="row">
            <div class="col-12 pb-5 text-center border-bottom">
                <h2>Kontaktinformācija</h2>
            </div>
            <div class="col-6 pl-5 pt-3 border-right">
            <?php foreach($info as $k => $v): ?>
                <p><?= $v ?></p>
            <?php endforeach; ?>
            </div>
            <div class="col-6 pt-3 text-center">
                GMAPS
            </div>
        </div>
@endsection
