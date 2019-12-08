<?php
    $sections = [
        'Personalizēti datori' => [
            'description' => 'Neziniet kāds dators nepieciešams Jūsu vajadzībām? Neuztraucieties, Mūsu serviss nodrošinās visus rīkus, lai Jūs tiktu pie datora, kādu kārojat tieši Jūs!',
            'buttonTitle' => 'Izvēlēties datoru',
            'buttonUrl' => 'select-pc',
            'shouldShowBorder' => true,
        ],
        'Par mums' => [
            'description' => 'Uzziniet vairāk par Custom Computer Solutions',
            'buttonTitle' => 'Uzzināt vairāk par CCS',
            'buttonUrl' => 'contacts',
        ],
    ];
?>

@extends('layouts.main_layout')

@section('title', 'Home')

@section('navbar')

@endsection

@section('content')
    <div class="row">
        <?php foreach($sections as $k => $v): ?>
            <div class="col <?= !isset($v['shouldShowBorder']) ?: 'border-right' ?>">
                <h2 class="mb-3"><?= $k ?></h2>
                <p><?= $v['description'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <?php foreach($sections as $k => $v): ?>
        <div class="col">
                <a href="<?= $v['buttonUrl'] ?>" class="bg-info p-2 border-0 text-white w-100 btn"><?= $v['buttonTitle'] ?></a>
        </div>
        <?php endforeach; ?>
    </div>
@endsection
