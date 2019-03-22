<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockAboutIcon extends Model
{
    protected $fillable = [
        'ru_title', 'de_title', 'en_title', 'ch_title',
        'ru_text', 'de_text', 'en_text', 'ch_text',
        'icon'
    ];
}
