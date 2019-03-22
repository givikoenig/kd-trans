<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PblRepository;
use App\Repositories\LangRepository;
use Route;
use App\Navigation;
use App\Article;

class NewsController extends Controller
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
            ->where('lnk', '/news')
            ->first()->title;
        $this->description = Article::whereNotNull('meta_desc')
                ->first()->meta_desc ?? 'CargoTransportation&Logistics';
        $this->keywords = Article::whereNotNull('keywords')
                ->first()->keywords ?? 'cargo,transportation,trucking';
    }

    public function index(Request $request)
    {
        $data = $this->p_rep->getData($this->title,$this->description,$this->keywords);
        $contacts_labels_txt = $this->l_rep->getContacts();
        $page_title = $this->l_rep->getPageTitle($request);
        $db_menu_data = $this->l_rep->getDbMenuData();
        $buttons_labels_txt = __('buttons');
        $footer_labels_data = $this->l_rep->getFooterLabelsData($buttons_labels_txt);
        $buttons_labels_txt = __('buttons');
        $news_list_data = $this->l_rep->getNewsListData($buttons_labels_txt);

        return view('site.news', $data, [
            'page_title' => $page_title,
            'db_menu_data' => $db_menu_data,
            'current_path' => $request->path(),
            'footer_labels_data' => $footer_labels_data,
            'labels_txt' => $buttons_labels_txt,
            'contacts_txt' => $contacts_labels_txt,
            'news_list_data' => $news_list_data
        ]);

    }

    public function show($id)
    {
        $data = $this->p_rep->getData($this->title,$this->description,$this->keywords);
        $contacts_labels_txt = $this->l_rep->getContacts();
        $db_menu_data = $this->l_rep->getDbMenuData();
        $buttons_labels_txt = __('buttons');
        $footer_labels_data = $this->l_rep->getFooterLabelsData($buttons_labels_txt);
        $new_data = $this->l_rep->getNewData($id);

        return view('site.news.show', $data, [
            'db_menu_data' => $db_menu_data,
            'current_path' =>  Route::getCurrentRoute(),
            'footer_labels_data' => $footer_labels_data,
            'new_data' => $new_data,
            'contacts_txt' => $contacts_labels_txt,
        ]);
    }
}
