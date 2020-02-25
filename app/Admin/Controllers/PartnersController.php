<?php

namespace App\Admin\Controllers;

use App\Partner;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Config;

class PartnersController extends Controller
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
            ->header('Блок рекламы партнеров')
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
            ->header('Блок рекламы партнеров')
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
            ->header('Блок рекламы партнеров')
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
            ->header('Блок рекламы партнеров')
            ->description('НОВЫЙ ПАРТНЕР')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Partner);

        $grid->id('Id');
        $states = [
            'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
        ];
        $grid->active('Опубликовано')->switch($states);
        $grid->name('Name');
        $grid->img()->image( asset( 'assets') . '/images/', 100 );
        $grid->url('Url');
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
        $show = new Show(Partner::findOrFail($id));

        $show->id('Id');
        $show->active('Active');
        $show->name('Name');
        $show->img('Img');
        $show->url('Url');
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
        $form = new Form(new Partner);
        $form->switch('active', 'Отображение на странице')
            ->options([1 => 'Активен', 0 => 'Неактивен'])
            ->default(0);
        $form->text('name', 'Name');
        $form->image('img','Изображение')->fit(Config::get('settings.client_image')['width'],
            Config::get('settings.client_image')['height'])->move('clients')->name(function($file) {
            return now()->format('YmdHi'). '.' . $file->guessExtension();
        })->removable();
        $form->url('url', 'Url');

        return $form;
    }
}
