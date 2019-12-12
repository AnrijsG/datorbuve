<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pc extends Model{
    const TYPE_GAMING = 'Spēļu';
    const TYPE_VIDEO_EDITING = 'Video montēšana';
    const TYPE_STREAMING = 'Staumēšanas';
    const TYPE_HOME = 'Mājas/Ofisa dators';

    const AVAILABLE_TYPES = [
        self::TYPE_GAMING,
        self::TYPE_VIDEO_EDITING,
        self::TYPE_STREAMING,
        self::TYPE_HOME,
    ];

    protected $table = 'pc';
}
