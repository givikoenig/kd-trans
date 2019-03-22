<?php

namespace App\Http\Controllers;
use App\Repositories\PblRepository;
use App\Repositories\LangRepository;
use Route;
use App\Article;

class ArticlesController extends Controller
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
        $this->title = Article::select($lang . '_title as title')->whereNotNull($lang . '_title')
            ->first()->title ?? config('app.name');
        $this->title = config('app.name');
        $this->description = Article::whereNotNull('meta_desc')
                ->first()->meta_desc ?? 'CargoTransportation&Logistics';
        $this->keywords = Article::whereNotNull('keywords')
                ->first()->keywords ?? 'cargo,transportation,trucking';
    }

    public function show($id)
    {

        $data = $this->p_rep->getData($this->title,$this->description,$this->keywords);
        $contacts_labels_txt = $this->l_rep->getContacts();

        $db_menu_data = $this->l_rep->getDbMenuData();

        $buttons_labels_txt = __('buttons');
        $footer_labels_data = $this->l_rep->getFooterLabelsData($buttons_labels_txt);

        $article_data = $this->l_rep->getArticleData($id);

        return view('site.article', $data, [
            'db_menu_data' => $db_menu_data,
            'current_path' => Route::getCurrentRoute(),
            'footer_labels_data' => $footer_labels_data,
            'article_data' => $article_data,
            'contacts_txt' => $contacts_labels_txt,
        ]);
    }

}
