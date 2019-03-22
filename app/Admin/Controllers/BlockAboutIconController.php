<?php

namespace App\Admin\Controllers;

use App\BlockAboutIcon;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BlockAboutIconController extends Controller
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
        $grid = new Grid(new BlockAboutIcon);

        $grid->id('Id');
        $grid->ru_title('Ru title');
        $grid->ru_text('Ru text');
        $grid->de_title('De title');
        $grid->de_text('De text');
        $grid->en_title('En title');
        $grid->en_text('En text');
        $grid->ch_title('Ch title');
        $grid->ch_text('Ch text');
        $grid->icon('Icon');
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
        $show = new Show(BlockAboutIcon::findOrFail($id));

        $show->id('Id');
        $show->ru_title('Ru title');
        $show->ru_text('Ru text');
        $show->de_title('De title');
        $show->de_text('De text');
        $show->en_title('En title');
        $show->en_text('En text');
        $show->ch_title('Ch title');
        $show->ch_text('Ch text');
        $show->icon('Icon');
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
        $form = new Form(new BlockAboutIcon);

        $form->text('ru_title', 'Ru title');
        $form->text('ru_text', 'Ru text');
        $form->text('de_title', 'De title');
        $form->text('de_text', 'De text');
        $form->text('en_title', 'En title');
        $form->text('en_text', 'En text');
        $form->text('ch_title', 'Ch title');
        $form->text('ch_text', 'Ch text');
        $form->text('icon', 'Icon');

        return $form;
    }
}
