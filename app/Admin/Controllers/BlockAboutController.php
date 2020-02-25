<?php

namespace App\Admin\Controllers;

use App\BlockAbout;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Config;

class BlockAboutController extends Controller
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
            ->header('Блок "Коротко о нас" на главной странице')
            ->description('СПИСОК [Будет отображаться только самый верхний в списке со статусом "Опубликовано"]')
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
            ->header('Блок "Коротко о нас" на главной странице')
            ->description('Просмотр значений полей формы')
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
            ->header('Блок "Коротко о нас" на главной странице')
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
        $grid = new Grid(new BlockAbout);

        $grid->id('Id');
        $states = [
            'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
        ];
        $grid->active('Опубликовано')->switch($states);
        $grid->ru_title1('Title1 Ru');
        $grid->ru_text1('Text1 Ru')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->de_title1('Title1 De');
        $grid->de_text1('Text1 De')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->en_title1('Title1 En');
        $grid->en_text1('Text1 En')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->ch_title1('Title1 Ch');
        $grid->ch_text1('Text1 Ch')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->img()->image( asset( 'assets') . '/images/', 100 );
        $grid->img2()->image( asset( 'assets') . '/images/', 100 );
        $grid->ru_title2('Title2 Ru');
        $grid->ru_text2('Text2 Ru')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->de_title2('Title2 De');
        $grid->de_text2('Text2 De')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->en_title2('Title2 En');
        $grid->en_text2('Text2 En')->display(function($text) {
            return str_limit($text, 150, '…');
        });
        $grid->ch_title2('Title2 Ch');
        $grid->ch_text2('Text2 Ch')->display(function($text) {
            return str_limit($text, 150, '…');
        });



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
        $show = new Show(BlockAbout::findOrFail($id));

        $show->id('Id');
        $show->active('Active');
        $show->ru_title1('Ru title1');
        $show->ru_text1('Ru text1');
        $show->de_title1('De title1');
        $show->de_text1('De text1');
        $show->en_title1('En title1');
        $show->en_text1('En text1');
        $show->ch_title1('Ch title1');
        $show->ch_text1('Ch text1');
        $show->img('Img');
        $show->img('Img2');
        $show->ru_title2('Ru title2');
        $show->ru_text2('Ru text2');
        $show->de_title2('De title2');
        $show->de_text2('De text2');
        $show->en_title2('En title2');
        $show->en_text2('En text2');
        $show->ch_title2('Ch title2');
        $show->ch_text2('Ch text2');
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
        $form = new Form(new BlockAbout);
        $form->switch('active', 'Отображение на странице')
            ->options([1 => 'Активен', 0 => 'Неактивен'])
            ->default(0);
        $form->text('ru_title1', 'Title1 Ru')->rules('required|max:100');
        $form->textarea('ru_text1', 'Text1 Ru');
        $form->text('de_title1', 'Title1 De')->rules('required|max:100');
        $form->textarea('de_text1', 'Text1 De');
        $form->text('en_title1', 'Title1 En')->rules('required|max:100');
        $form->textarea('en_text1', 'Text1 En');
        $form->text('ch_title1', 'Title1 Ch')->rules('required|max:100');
        $form->textarea('ch_text1', 'Text1 Ch');
        $form->image('img','Изображение')->fit(Config::get('settings.block_abt_image')['width'],
            Config::get('settings.block_abt_image')['height'])->move('about')->name(function($file) {
            return now()->format('YmdHi'). '.' . $file->guessExtension();
        })->removable();
        $form->image('img2','Изображение')->fit(Config::get('settings.block_abt_image')['width'],
            Config::get('settings.block_abt_image')['height'])->move('about')->name(function($file) {
            return now()->format('YmdHi'). '.' . $file->guessExtension();
        })->removable();
        $form->text('ru_title2', 'Title2 Ru')->rules('required|max:100');
        $form->textarea('ru_text2', 'Text2 Ru');
        $form->text('de_title2', 'Title2 De')->rules('required|max:100');
        $form->textarea('de_text2', 'Text2 De');
        $form->text('en_title2', 'Title2 En')->rules('required|max:100');
        $form->textarea('en_text2', 'Text2 En');
        $form->text('ch_title2', 'Title2 Ch')->rules('required|max:100');
        $form->textarea('ch_text2', 'Text2 Ch');


        return $form;
    }
}
