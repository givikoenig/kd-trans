<?php

namespace App\Admin\Controllers;

use App\About;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Config;

class AboutController extends Controller
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
            ->header('Статья на странице "О Компании"')
            ->description('СПИСОК [Отображаться будет только верхняя опубликованная]')
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
            ->header('Статья на странице "О Компании"')
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
            ->header('Статья на странице "О Компании"')
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
            ->header('Статья на странице "О Компании"')
            ->description('НОВАЯ СТАТЬЯ')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new About);

        $grid->id('Id');
        $states = [
            'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
        ];
        $grid->active('Опубликовано')->switch($states);
        $grid->ru_text('Text Ru')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->de_text('Text De')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->en_text('Text En')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->ch_text('Text Ch')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->img()->image( asset( 'assets') . '/images/', 100 );
        $grid->ru_subtext('SubText Ru')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->de_subtext('SubText De')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->en_subtext('SubText En')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->ch_subtext('SubText Ch')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(About::findOrFail($id));

        $show->id('Id');
        $show->active('Active');
        $show->ru_text('Text Ru')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $show->de_text('Text De')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $show->en_text('Text En')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $show->ch_text('Text Ch')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $show->img()->image( asset( 'assets') . '/images/', 100 );
        $show->ru_subtext('SubText Ru')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $show->de_subtext('SubText De')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $show->en_subtext('SubText En')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $show->ch_subtext('SubText Ch')->display(function($text) {
            return str_limit($text, 150, '…');
        });
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
        $form = new Form(new About);
        $form->switch('active', 'Отображение на странице')
            ->options([1 => 'Активен', 0 => 'Неактивен'])
            ->default(0);
        $form->ckeditor('ru_text', 'Ru text');
        $form->ckeditor('de_text', 'De text');
        $form->ckeditor('en_text', 'En text');
        $form->ckeditor('ch_text', 'Ch text');
        $form->image('img','Изображение')->fit(Config::get('settings.about_image')['width'],
            Config::get('settings.about_image')['height'])->move('pages/about')->name(function($file) {
            return now()->format('YmdHi'). '.' . $file->guessExtension();
        })->removable();
        $form->ckeditor('ru_subtext', 'Ru subtext');
        $form->ckeditor('de_subtext', 'De subtext');
        $form->ckeditor('en_subtext', 'En subtext');
        $form->ckeditor('ch_subtext', 'Ch subtext');

        return $form;
    }
}
