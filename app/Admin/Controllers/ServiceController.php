<?php

namespace App\Admin\Controllers;

use App\Service;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Config;

class ServiceController extends Controller
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
        $grid = new Grid(new Service);

        $grid->id('Id');
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
        $grid->ru_title2('Title 2 Ru');
        $grid->de_title2('Title 2 De');
        $grid->en_title2('Title 2 En');
        $grid->ch_title2('Title 2 Ch');
        $grid->img2()->image( asset( 'assets') . '/images/', 100 );
        $grid->keywords('Keywords');
        $grid->meta_desc('Meta desc');
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
        $show = new Show(Service::findOrFail($id));

        $show->id('Id');
        $show->ru_title('Ru title');
        $show->de_title('De title');
        $show->en_title('En title');
        $show->ch_title('Ch title');
        $show->ru_text('Ru text');
        $show->de_text('De text');
        $show->en_text('En text');
        $show->ch_text('Ch text');
        $show->alias('Alias');
        $show->img('Img');
        $show->ru_title2('Ru title 2');
        $show->de_title2('De title 2');
        $show->en_title2('En title 2');
        $show->ch_title2('Ch title 2');
        $show->img2('Img2');
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
        $form = new Form(new Service);

        $form->text('ru_title', 'Title Ru')->rules('required|max:100');
        $form->ckeditor('ru_text', 'Text Ru');
        $form->text('de_title', 'Title De')->rules('required|max:100');;
        $form->ckeditor('de_text', 'Text De');
        $form->text('en_title', 'Title En')->rules('required|max:100');;
        $form->ckeditor('en_text', 'Text En');
        $form->text('ch_title', 'Title Ch')->rules('required|max:100');;
        $form->ckeditor('ch_text', 'Text Ch');
        $form->image('img','Изображение')->fit(Config::get('settings.service_image')['width'],
            Config::get('settings.service_image')['height'])->move('services')->name(function($file) {
            return now()->format('YmdHi'). '.' . $file->guessExtension();
        })->removable();
        $form->text('ru_title2', 'Title2 Ru')->rules('max:100');
        $form->text('de_title2', 'Title2 De')->rules('max:100');
        $form->text('en_title2', 'Title2 En')->rules('max:100');
        $form->text('ch_title2', 'Title2 Ch')->rules('max:100');
        $form->image('img2','Изображение 2')->fit(Config::get('settings.service_image2')['width'],
            Config::get('settings.service_image2')['height'])->move('services')->name(function($file) {
            return now()->format('YmdHi'). '.' . $file->guessExtension();
        })->removable();
//        $form->text('img2', 'Img2');
        $form->text('keywords', 'Keywords');
        $form->text('meta_desc', 'Meta desc');
        $form->text('alias','Slug')->rules('max:250');
        return $form;
    }
}
