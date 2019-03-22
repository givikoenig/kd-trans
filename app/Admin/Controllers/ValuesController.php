<?php

namespace App\Admin\Controllers;

use App\Value;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ValuesController extends Controller
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
            ->header('Index')
            ->description('description')
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
            ->header('Detail')
            ->description('description')
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
            ->header('Edit')
            ->description('description')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Value);

        $grid->id('Id');
        $grid->ru_main_title('Ru title');
        $grid->de_main_title('De title');
        $grid->en_main_title('En title');
        $grid->ch_main_title('Ch title');
        $grid->ru_title('Ru title');
        $grid->de_title('De title');
        $grid->en_title('En title');
        $grid->ch_title('Ch title');
        $grid->ru_text('Ru text');
        $grid->de_text('De text');
        $grid->en_text('En text');
        $grid->ch_text('Ch text');
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
        $show = new Show(Value::findOrFail($id));

        $show->id('Id');
        $show->ru_main_title('Ru title');
        $show->de_main_title('De title');
        $show->en_main_title('En title');
        $show->ch_main_title('Ch title');
        $show->ru_title('Ru title');
        $show->de_title('De title');
        $show->en_title('En title');
        $show->ch_title('Ch title');
        $show->ru_text('Ru text');
        $show->de_text('De text');
        $show->en_text('En text');
        $show->ch_text('Ch text');
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
        $form = new Form(new Value);

        $form->text('ru_main_title', 'Ru title');
        $form->text('de_main_title', 'De title');
        $form->text('en_main_title', 'En title');
        $form->text('ch_main_title', 'Ch title');
        $form->text('ru_title', 'Ru title');
        $form->text('de_title', 'De title');
        $form->text('en_title', 'En title');
        $form->text('ch_title', 'Ch title');
        $form->textarea('ru_text', 'Ru text');
        $form->textarea('de_text', 'De text');
        $form->textarea('en_text', 'En text');
        $form->textarea('ch_text', 'Ch text');

        return $form;
    }
}
