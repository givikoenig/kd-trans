<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PblRepository;
use App\Repositories\LangRepository;
use App\Article;

class ErrorsController extends Controller
{
    protected $p_rep;
    protected $l_rep;
    protected $keywords;
    protected $description;
    protected $title;

    public function __construct(LangRepository $l_rep, PblRepository $p_rep)
    {
        $this->p_rep = $p_rep;
        $this->l_rep = $l_rep;
        $this->title = 'Error 404';
        $this->description = Article::whereNotNull('meta_desc')
                ->first()->meta_desc ?? 'CargoTransportation&Logistics';
        $this->keywords = Article::whereNotNull('keywords')
                ->first()->keywords ?? 'cargo,transportation,trucking';

    }

    public function notfound(Request $request)
    {
        $data = $this->p_rep->getData($this->title,$this->description,$this->keywords);
        $contacts_labels_txt = $this->l_rep->getContacts();
        $page_title = $this->l_rep->getPageTitle($request);
        $db_menu_data = $this->l_rep->getDbMenuData();
        $buttons_labels_txt = __('buttons');
        $footer_labels_data = $this->l_rep->getFooterLabelsData($buttons_labels_txt);
        $buttons_labels_txt = __('buttons');
        $error_data = __('errors');

        return view('errors.404', $data, [
            'page_title' => $page_title,
            'db_menu_data' => $db_menu_data,
            'current_path' => $request->path(),
            'footer_labels_data' => $footer_labels_data,
            'labels_txt' => $buttons_labels_txt,
            'contacts_txt' => $contacts_labels_txt,
            'error_data' => $error_data
        ]);
    }
}
