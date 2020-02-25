<?php

namespace App\Admin\Controllers;

use Config;
use App\Article;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ArticleController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Статьи инфоблока')
            ->description('СПИСОК [Отображаться будут только опубликованные]')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Статьи инфоблока')
            ->description('Просмотр значений')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Статьи инфоблока')
            ->description('РЕДАКТИРОВАНИЕ')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Статьи инфоблока')
            ->description('СОЗДАНИЕ НОВОЙ СТАТЬИ')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);

        $grid->id('Id');
        $states = [
            'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
        ];
        $grid->active('Опубликовано')->switch($states);
        $grid->ru_title('Title Ru');
        $grid->ru_text('Text Ru')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->de_title('Title De');
        $grid->de_text('Text De')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->en_title('Title En');
        $grid->en_text('Text En')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->ch_title('Title Ch');
        $grid->ch_text('Text Ch')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->img()->image( asset( 'assets') . '/images/', 100 );

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->id('Id');
        $show->active('Active');
        $show->ru_title('Title Ru');
        $show->ru_text('Text Ru');
        $show->de_title('Title De');
        $show->de_text('Text De');
        $show->en_title('Title En');
        $show->en_text('Text En');
        $show->ch_title('Title Ch');
        $show->ch_text('Text Ch');
        $show->alias('Alias');
        $show->img('Img');
        $show->keywords('Keywords');
        $show->meta_desc('Meta desc');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);
        $form->switch('active', 'Отображение на странице')
            ->options([1 => 'Активен', 0 => 'Неактивен'])
            ->default(0);
        $form->text('ru_title', 'Title Ru')->rules('required|max:100');
        $form->ckeditor('ru_text', 'Text Ru');
        $form->text('de_title', 'Title De')->rules('required|max:100');;
        $form->ckeditor('de_text', 'Text De');
        $form->text('en_title', 'Title En')->rules('required|max:100');;
        $form->ckeditor('en_text', 'Text En');
        $form->text('ch_title', 'Title Ch')->rules('required|max:100');;
        $form->ckeditor('ch_text', 'Text Ch');
        $form->image('img','Изображение')->fit(Config::get('settings.article_image')['width'],
            Config::get('settings.article_image')['height'])->move('articles')->name(function($file) {
            return now()->format('YmdHi'). '.' . $file->guessExtension();
        })->removable();
        $form->text('keywords', 'Keywords');
        $form->text('meta_desc', 'Meta desc');
        $form->text('alias','Slug')->rules('max:250');

        return $form;
    }
}
