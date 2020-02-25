<?php

namespace App\Repositories;

use App\Value;
use Illuminate\Http\Request;
use App\Slider;
use App\Article;
use App\Navigation;
use App\About;
use App\Counter;
use App\Partner;
use App\Service;
use App\News;
use App\Testimonial;
use App\BlockAbout;

class LangRepository {
    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'email' => __('validation.email'),
            'min' => __('validation.min'),
            'max' => __('validation.max'),
            'string' => __('validation.string'),
            'unique' => __('validation.unique'),
        ];
    }

    public function getPageTitle($request) {
        $lang = app()->getLocale();

        $page_title = Navigation::select($lang . '_title as title')
            ->where('lnk', $request->getRequestUri())
            ->first()
            ->toArray();
        return $page_title;
    }


    public function getContacts() {

        $contacts_labels_txt = __('contact') ?? [];
        return $contacts_labels_txt;
    }

    public function getDbMenuData() {
        $lang = app()->getLocale();
        $db_menu_data = Navigation::select(['id', 'parent_id', $lang . '_title as title', 'lnk'])
                ->with(['children' => function ($query) {
                    $query->where('active', 1);
                }])
                ->where([
                    ['active', 1],
                    ['parent_id', 0]
                ])->get()->toArray() ?? [];

        foreach($db_menu_data as $key => $item) {
            foreach($item['children'] as $k => $child) {
                $db_menu_data[$key]['children'][$k]['title'] = ($db_menu_data[$key]['children'][$k][$lang . '_title']);
            }
        }

        return $db_menu_data;
    }

    public function getSlidesData() {
        $lang = app()->getLocale();

        $slides_data = Slider::select([$lang .' as txt', 'images as img'])
            ->where('active', 1)
            ->OrderBy('created_at', 'asc')
            ->get()
            ->toArray();
        foreach($slides_data as $key => $value)
        {
            $slides_data[$key]['img'] = 'assets/images/'.$value['img'];
        }

        return $slides_data;
    }

    public function getArticlesButtonsLabelsData($txt) {
        $lang = app()->getLocale();
        $buttons_labels_data = Article::select([$lang . '_title as title', $lang . '_text as text', 'alias'])
                ->where('active', 1)
                ->get()->toArray() ?? [];
        foreach($buttons_labels_data as $key => $value)
        {
            $buttons_labels_data[$key]['btn'] = $txt['read_more'];
            $buttons_labels_data[$key]['lnk'] = 'articles/' . $value['alias'];
            $buttons_labels_data[$key]['title'] = $value['title'];
            $buttons_labels_data[$key]['text'] = strip_tags($value['text']);
        }

        return $buttons_labels_data;
    }

    public function getBlockAboutMainData() {
        $lang = app()->getLocale();
        $block_about_main_data = BlockAbout::select(
            $lang . '_title1 as title1', $lang . '_text1 as text1',
            $lang . '_title2 as title2', $lang . '_text2 as text2',
            'img', 'img2', 'active'
        )->where('active', 1)->first() ?? [];
        if ($block_about_main_data) {
            $block_about_main_data = $block_about_main_data->toArray();
            $block_about_main_data['img'] = '/assets/images/' . $block_about_main_data['img'];
            $block_about_main_data['img2'] = '/assets/images/' . $block_about_main_data['img2'];
        }

        return $block_about_main_data;

    }

    public function getAboutPageData()
    {
        $lang = app()->getLocale();
        $page_about_data = About::select($lang . '_text as text', 'img', $lang . '_subtext as subtext')
            ->where('active', 1)
            ->first();
        if (is_object($page_about_data)) {
            $page_about_data = $page_about_data->toArray();
            $page_about_data['img'] = '/assets/images/' . $page_about_data['img'] ?? [];
        } else {
            $page_about_data['img'] = '/assets/images/dummy.png';
        }

        return $page_about_data;
    }

    public function getNewsListData($txt) {
        $lang = app()->getLocale();
        $news_list_data = News::select($lang . '_title as title', $lang . '_text as text', 'alias', 'created_at')
                ->where('active', 1)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get()->toArray() ?? [];
        foreach($news_list_data as $key => $value)
        {
            $news_list_data[$key]['btn'] = $txt['read_more'];
            $news_list_data[$key]['created_at'] =  date('d-m-Y', strtotime($value['created_at']));
            $news_list_data[$key]['alias'] = 'news/' . $value['alias'];
        }
        return $news_list_data;
    }
    
    public function getTestimonialsListData() {
        $testimonials_list_data = Testimonial::select('name', 'text', 'rank', 'email', 'created_at')
                ->where('active', 1)
                ->latest()
                ->limit(7)
                ->get()->toArray() ?? [];
        foreach($testimonials_list_data as $key => $value)
        {
            $testimonials_list_data[$key]['created_at'] =  date('d-m-Y', strtotime($value['created_at']));
        }
        return   $testimonials_list_data;
    }

    public function getCountersBlockData() {
        $lang = app()->getLocale();
        $counters_block_data = [];
        $counters_block_data['title'] = Counter::select($lang . '_title as title')
                ->whereNotNull('ru_title')->first()->toArray() ?? [];
        $counters_block_data['data'] = Counter::select($lang . '_txt as txt', 'num')
                ->where('active', 1)
                ->take(4)->get()->toArray() ?? [];

        return $counters_block_data;
    }

    public function getValuesBlockData() {
        $lang = app()->getLocale();
        $values_block_data = [];
        $values_block_data['maintitle'] = Value::select($lang . '_main_title as maintitle')
                ->whereNotNull('ru_main_title')
                ->first()->toArray() ?? [];
        $values_block_data['data'] = Value::select($lang . '_title as title', $lang . '_text as txt')
                ->where('active', 1)
                ->take(4)->get()->toArray() ?? [];

        return $values_block_data;
    }

    public function getPartnersBlockData() {
        $partners_data = Partner::where('active', 1)->get()->toArray() ?? [];
        foreach($partners_data as $key => $value)
        {
            $partners_data[$key]['img'] = 'assets/images/'.$value['img'];
        }
        return $partners_data;
    }

    public function getArticleData($alias = NULL) {
        if (!$alias) {
            abort(404);
        }
        $lang = app()->getLocale();
        $article_data = Article::select([
            $lang . '_title as title',
            $lang . '_text as text',
            'img'
            ])->where('alias', $alias)->first() ?? []; //->toArray() ?? [];
        if (is_object($article_data)) {
            $article_data = $article_data->toArray();
            $article_data['img'] = '/assets/images/' . $article_data['img'];
        } else {
            abort(404);
        }

        return $article_data;
    }

    public function getNewData($alias = NULL) {
        if (!$alias) {
            abort(404);
        }

        $lang = app()->getLocale();

        $new_data = News::select([
                $lang . '_title as title',
                $lang . '_text as text',
                'img'
            ])->where('alias', $alias)->first() ?? []; //->toArray() ?? [];
        if (is_object($new_data)) {
            $new_data = $new_data->toArray();
            $new_data['img'] = '/assets/images/' . $new_data['img'];
        } else {
            abort(404);
        }

        return $new_data;
    }

    public function getServiceData($alias = NULL) {
        if (!$alias) {
            return redirect()->back();
            abort(404);
        }
        $lang = app()->getLocale();

        $service_data = Service::select([
                    $lang . '_title as title',
                    $lang . '_text as text',
                    'img',
                    $lang . '_title2 as ttl',
                    'img2 as image'
                ])->where('alias', $alias)->first() ?? []; //->toArray() ?? [];
        if (is_object($service_data)) {
            $service_data = $service_data->toArray();
            $service_data['img'] = '/assets/images/' . $service_data['img'];
            if ($service_data['image']) {
                $service_data['image'] = '/assets/images/' . $service_data['image'];
            } else {
                $service_data['image'] = '/assets/images/dummy.png';
            }
        } else {
            abort(404);
        }
        return $service_data;
    }

    public function getFooterLabelsData($txt) {
        $footer_labels_data = [
            'additional_contact' => $txt['footer_additional_contact'],
            'telfax' => $txt['telfax'],
            'cell' => $txt['cell'],
            'email' => $txt['email']
        ];

        return $footer_labels_data;
    }

}

