<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockAbout extends Model
{
    protected $fillable = [
        'ru_title1', 'de_title1', 'en_title1', 'ch_title1',
        'ru_title2', 'de_title2', 'en_title2', 'ch_title2',
        'ru_text1', 'de_text1', 'en_text1', 'ch_text1',
        'ru_text2', 'de_text2', 'en_text2', 'ch_text2',
        'img'
    ];

}
