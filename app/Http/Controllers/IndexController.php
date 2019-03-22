<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PblRepository;
use App\Repositories\LangRepository;
use Mapper;
use Config;
use App\Article;

class IndexController extends Controller
{
    protected $p_rep;
    protected $l_rep;
    protected $keywords;
    protected $description;
    protected $title;

    public function __construct(LangRepository $l_rep, PblRepository $p_rep) {
        $this->p_rep = $p_rep;
        $this->l_rep = $l_rep;
        $this->title = config('app.name');
        $this->description = Article::whereNotNull('meta_desc')
                ->first()->meta_desc ?? 'CargoTransportation&Logistics';
        $this->keywords = Article::whereNotNull('keywords')
                ->first()->keywords ?? 'cargo,transportation,trucking';
    }

    public function execute(Request $request) {
        $data = $this->p_rep->getData($this->title,$this->description,$this->keywords);
        $contacts_labels_txt = $this->l_rep->getContacts();
        $slides_data = $this->l_rep->getSlidesData();
        $db_menu_data = $this->l_rep->getDbMenuData();
        $buttons_labels_txt = __('buttons');
        $buttons_labels_data = $this->l_rep->getArticlesButtonsLabelsData($buttons_labels_txt);
        $partners_data = $this->l_rep->getPartnersBlockData();
        $testimonials_data = $this->l_rep->getTestimonialsListData();
        $map_data = [
            'showform' => true,
            'center' => ['lat' => 54.726063 ,'lng' => 18.495],
            'zoom' => 7
        ];
        $block_about_main_data = $this->l_rep->getBlockAboutMainData();

        return view('site.index', $data,  [
            'slides_data' => $slides_data,
            'current_path' => $request->path(),
            'buttons_data' => $buttons_labels_data,
            'db_menu_data' => $db_menu_data,
            'partners_data' => $partners_data,
            'contacts_txt' => $contacts_labels_txt,
            'labels_txt' => $buttons_labels_txt,
            'testimonials_data' => $testimonials_data,
            'map_data' => $map_data,
            'block_about_main_data' => $block_about_main_data
        ]);
    }

}
