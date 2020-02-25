<?php

namespace App\Admin\Controllers;

use App\Message;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MessagesController extends Controller
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
            ->header('Сообщения через сайт (на странице "Контакты")')
            ->description('СПИСОК [Нигде не публикуются]')
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
            ->header('Сообщения через сайт (на странице "Контакты")')
            ->description('ПРОСМОТР значений')
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
            ->header('Сообщения через сайт (на странице "Контакты")')
            ->description('РЕДАТИРОВАНИЕ (хотя нафиг оно нужно)')
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
            ->header('Сообщения через сайт (на странице "Контакты")')
            ->description('НОВОЕ сообщение (хотя нафиг оно нужно)')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Message);

        $grid->id('Id');
        $grid->text('Text');
        $grid->sig('Sig');
        $grid->email('Email');
        $grid->phone('Phone');
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
        $show = new Show(Message::findOrFail($id));

        $show->id('Id');
        $show->text('Text');
        $show->sig('Sig');
        $show->email('Email');
        $show->phone('Phone');
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
        $form = new Form(new Message);

        $form->textarea('text', 'Text');
        $form->text('sig', 'Sig');
        $form->email('email', 'Email');
        $form->mobile('phone', 'Phone');

        return $form;
    }
}
