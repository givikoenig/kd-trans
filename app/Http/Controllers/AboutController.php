<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PblRepository;
use App\Repositories\LangRepository;

use App\About;
use App\Article;
use App\Navigation;

class AboutController extends Controller
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
        $this->title = Navigation::select($lang . '_title as title')
            ->where('lnk', '/about')
            ->first()->title;
        $this->description = strip_tags(About::select($lang . '_text as text')
            ->first()->text);
        $this->keywords = Article::whereNotNull('keywords')
                ->first()->keywords ?? 'cargo,transportation,trucking';
    }

    public function execute(Request $request) {
        $lang = app()->getLocale();
        $data = $this->p_rep->getData($this->title,$this->description,$this->keywords);
        $contacts_labels_txt = $this->l_rep->getContacts();
        $page_title = $this->l_rep->getPageTitle($request);
        $db_menu_data = $this->l_rep->getDbMenuData();
        $buttons_labels_txt = __('buttons');
        $footer_labels_data = $this->l_rep->getFooterLabelsData($buttons_labels_txt);
        $page_about_data = $this->l_rep->getAboutPageData();
        $counter_title = $this->l_rep->getCountersBlockData()['title'];
        $counter_data = $this->l_rep->getCountersBlockData()['data'];
        $values_title = $this->l_rep->getValuesBlockData()['maintitle'];
        $values_data = $this->l_rep->getValuesBlockData()['data'];
        $partners_data = $this->l_rep->getPartnersBlockData();

        return view('site.about', $data, [
            'db_menu_data' => $db_menu_data,
            'current_path' => $request->path(),
            'footer_labels_data' => $footer_labels_data,
            'page_title' => $page_title,
            'page_about_data' => $page_about_data,
            'counter_title' => $counter_title,
            'counter_data' => $counter_data,
            'values_title' => $values_title,
            'values_data' => $values_data,
            'partners_data' => $partners_data,
            'contacts_txt' => $contacts_labels_txt,
        ]);
    }
}
