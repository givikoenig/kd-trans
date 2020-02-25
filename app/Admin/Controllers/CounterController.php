<?php

namespace App\Admin\Controllers;

use App\Counter;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CounterController extends Controller
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
            ->header('Блок счетчиков стр. "О компании"')
            ->description('СПИСОК [отображаться будут 4 верхних опубликованных счетчика.]
                Заголовок блока (напр. "Факты") можно заполнять только в одном счетчике')
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
            ->header('Блок счетчиков стр. "О компании"')
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
            ->header('Блок счетчиков стр. "О компании"')
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
            ->header('Блок счетчиков стр. "О компании"')
            ->description('НОВЫЙ счетчик')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Counter);

        $grid->id('Id');
        $states = [
            'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
        ];
        $grid->active('Опубликовано')->switch($states);
        $grid->ru_title('Ru title');
        $grid->de_title('De title');
        $grid->en_title('En title');
        $grid->ch_title('Ch title');
        $grid->num('Счетчик');
        $grid->ru_txt('Ru txt');
        $grid->de_txt('De txt');
        $grid->en_txt('En txt');
        $grid->ch_txt('Ch txt');
//        $grid->created_at('Created at');
//        $grid->updated_at('Updated at');


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
        $show = new Show(Counter::findOrFail($id));

        $show->id('Id');
        $show->active('Active');
        $show->ru_title('Ru title');
        $show->de_title('De title');
        $show->en_title('En title');
        $show->ch_title('Ch title');
        $show->num('Num');
        $show->ru_txt('Ru Txt');
        $show->de_txt('De Txt');
        $show->en_txt('En Txt');
        $show->ch_txt('Ch Txt');
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
        $form = new Form(new Counter);
        $form->switch('active', 'Отображение на странице')
            ->options([1 => 'Активен', 0 => 'Неактивен'])
            ->default(0);
        $form->text('ru_title', 'Ru title');
        $form->text('de_title', 'De title');
        $form->text('en_title', 'En title');
        $form->text('ch_title', 'Ch title');
        $form->number('num', 'Num');
        $form->text('ru_txt', 'Ru Txt');
        $form->text('de_txt', 'De Txt');
        $form->text('en_txt', 'En Txt');
        $form->text('ch_txt', 'Ch Txt');

        return $form;
    }
}
