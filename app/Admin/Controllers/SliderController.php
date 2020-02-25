<?php

namespace App\Admin\Controllers;

use App\Slider;
use Config;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SliderController extends Controller
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
            ->header('Слайдер на главной странице')
            ->description('(Отображаться будут только опубликованные слайды)')
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
            ->header('Просмотр значений')
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
            ->header('Редактирование слайда')
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
            ->header('Слайдер на главной странице')
            ->description('НОВЫЙ СЛАЙД')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Slider);

        $grid->id('Id');
        $states = [
            'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
        ];
        $grid->active('Опубликовано')->switch($states);
        $grid->ru('Ru')->editable();
        $grid->de('De')->editable();
        $grid->en('En')->editable();
        $grid->ch('Ch')->editable();
        $grid->images()->image( asset( 'assets') . '/images/', 100 );
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
        $show = new Show(Slider::findOrFail($id));

        $show->id('Id');
        $show->active('Active');
        $show->ru('Ru');
        $show->de('De');
        $show->en('En');
        $show->ch('Ch');
        $show->ch('Ch');
        $show->images('Images');
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
        $form = new Form(new Slider);
        $form->switch('active', 'Отображение на странице')
            ->options([1 => 'Активен', 0 => 'Неактивен'])
            ->default(0);
        $form->text('ru', 'Ru');
        $form->text('de', 'De');
        $form->text('en', 'En');
        $form->text('ch', 'Ch');
        $form->image('images','Изображение')->fit(Config::get('settings.slide_image')['width'],
            Config::get('settings.slide_image')['height'])->move('slider')->name(function($file) {
            return now()->format('YmdHi'). '.' . $file->guessExtension();
        })->removable();
        $form->date('created_at','Created At');
        $form->date('updated_at', 'Updated At');

        return $form;
    }
}
