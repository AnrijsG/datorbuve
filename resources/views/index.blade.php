<?php
    $sections = [
        'Personalizēti datori' => [
            'description' => 'Neziniet kāds dators nepieciešams Jūsu vajadzībām? Neuztraucieties, Mūsu serviss nodrošinās visus rīkus, lai Jūs tiktu pie datora, kādu kārojat tieši Jūs!',
            'buttonTitle' => 'Uzzināt vairāk',
            'imgUrl' => '',
            'infoPlacement' => 'left',
        ],
        'Kontakti' => [
            'description' => '',
            'buttonTitle' => 'Uzzināt vairāk par CCS',
            'imgUrl' => '',
            'infoPlacement' => 'right',
        ],
    ];
?>

@extends('layouts.main_layout')

@section('title', 'Home')

@section('navbar')

@endsection

@section('content')
    <?php foreach($sections as $k => $v): ?>
        <div class="row">
            <?php if($v['infoPlacement'] == 'left'): ?>
                <div class="col">
                    <h2 class="mb-3"><?= $k ?></h2>
                    <p><?= $v['description'] ?></p>
                    <button class="bg-info p-2 border-0 text-white w-100"><?= $v['buttonTitle'] ?></button>
                </div>
                <div class="col">
                    <img src="<?= $v['imgUrl'] ?>">
                </div>
            <?php else: ?>
                <div class="col">
                    <img src="<?= $v['imgUrl'] ?>">
                </div>
                <div class="col">
                    <h2 class="mb-3"><?= $k ?></h2>
                    <p><?= $v['description'] ?></p>
                    <button class="bg-info p-2 border-0 text-white w-100"><?= $v['buttonTitle'] ?></button>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
@endsection
