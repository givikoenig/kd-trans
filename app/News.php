<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Events\PostPublishedEvent;

class News extends Model
{
    use Notifiable;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    protected $table = 'news';


    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => PostPublishedEvent::class
    ];


    public function setAliasAttribute()
    {
        $this->attributes['alias'] =  $this->transliterate($this->attributes['ru_title']);
    }

    public function transliterate($string) {
        $str = mb_strtolower($string, 'UTF-8');

        $leter_array = array(
            'a' => 'а',
            'b' => 'б',
            'v' => 'в',
            'g' => 'г,ґ',
            'd' => 'д',
            'e' => 'е,є,э',
            'jo' => 'ё',
            'zh' => 'ж',
            'z' => 'з',
            'i' => 'и,і',
            'ji' => 'ї',
            'j' => 'й',
            'k' => 'к',
            'l' => 'л',
            'm' => 'м',
            'n' => 'н',
            'o' => 'о',
            'p' => 'п',
            'r' => 'р',
            's' => 'с',
            't' => 'т',
            'u' => 'у',
            'f' => 'ф',
            'kh' => 'х',
            'ts' => 'ц',
            'ch' => 'ч',
            'sh' => 'ш',
            'shch' => 'щ',
            '' => 'ъ',
            'y' => 'ы',
            '' => 'ь',
            'yu' => 'ю',
            'ya' => 'я',
        );

        if(preg_match('/[^\\p{Common}\\p{Latin}]/u', $str)) {
            foreach($leter_array as $leter => $kyr) {
                $kyr = explode(',',$kyr);
                $str = str_replace($kyr,$leter, $str);
            }
        }

        $str = preg_replace('/(\s|[^A-Za-z0-9])+/','-',$str);

        $str = trim($str,'-');

        return $str;
    }

}
