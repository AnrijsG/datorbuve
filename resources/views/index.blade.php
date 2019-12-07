<?php
    $sections = [
        'Personalizēti datori' => [
            'description' => 'Neziniet kāds dators nepieciešams Jūsu vajadzībām? Neuztraucieties, Mūsu serviss nodrošinās visus rīkus, lai Jūs tiktu pie datora, kādu kārojat tieši Jūs!',
            'buttonTitle' => 'Uzzināt vairāk',
            'buttonUrl' => 'a',
            'imgUrl' => '',
            'infoPlacement' => 'left',
        ],
        'Kontakti' => [
            'description' => '',
            'buttonTitle' => 'Uzzināt vairāk par CCS',
            'buttonUrl' => 'contacts',
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
                    <a href="<?= $v['buttonUrl'] ?>" class="bg-info p-2 border-0 text-white w-100 btn"><?= $v['buttonTitle'] ?></a>
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
                    <a href="<?= $v['buttonUrl'] ?>" class="bg-info p-2 border-0 text-white w-100 btn"><?= $v['buttonTitle'] ?></a>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
@endsection
