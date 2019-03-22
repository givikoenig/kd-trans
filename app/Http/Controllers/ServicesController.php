<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PblRepository;
use App\Repositories\LangRepository;
use Route;
use App\Service;
use App\Article;
use App\Navigation;

class ServicesController extends Controller
{
    protected $p_rep;
    protected $l_rep;
    protected $keywords;
    protected $description;
    protected $title;

    public function __construct(LangRepository $l_rep, PblRepository $p_rep) {
        $lang = app()->getLocale();
        $this->p_rep = $p_rep;
        $this->l_rep = $l_rep;
        $segment = \request()->segment(2);
        $this->title = Navigation::select($lang . '_title as title')
            ->where('lnk', 'like', "%{$segment}%")
            ->first()->title;
        $this->description =  strip_tags( Service::select($lang . '_text as text')
            ->where('alias', $segment)
            ->first()->text);
        $this->keywords = Article::whereNotNull('keywords')
                ->first()->keywords ?? 'cargo,transportation,trucking';
    }

    public function index() {

        $random_service_alias = Service::first()->alias;
        sleep(5);
        return redirect('services/' . $random_service_alias);
    }

    public function show($id)
    {
        $data = $this->p_rep->getData($this->title,$this->description,$this->keywords);
        $contacts_labels_txt = $this->l_rep->getContacts();

        $db_menu_data = $this->l_rep->getDbMenuData();

        $buttons_labels_txt = __('buttons');
        $footer_labels_data = $this->l_rep->getFooterLabelsData($buttons_labels_txt);

        $service_data = $this->l_rep->getServiceData($id);

            return view('site.services', $data, [
                'db_menu_data' => $db_menu_data,
                'current_path' => Route::getCurrentRoute(), //$request->path(),
                'footer_labels_data' => $footer_labels_data,
                'contacts_txt' => $contacts_labels_txt,
                'service_data' => $service_data
            ]);

    }

}
