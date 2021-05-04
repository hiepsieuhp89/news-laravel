<?php

namespace App\Admin\Controllers;

use App\Models\News;
use App\Models\Categorys;
use App\Models\ChillCategorys;
use App\Models\Authors;
use App\Models\sources;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'News';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('Id'))->sortable();
        $grid->column('category', __('Category'))->display(function ($id, $column) {
            return Categorys::select('name')->where('id', $id)->first()->name;
        })->label();

        $grid->column('chill_category', __('Chill category'))->display(function($id, $column){
            return ChillCategorys::select('name')->where('id',$id)->first()->name;
        })->badge();

        $grid->column('title', __('Title'))->style('font-size:16px;');
        $grid->column('first_look', __('First look'))->hide();
        $grid->column('image', __('Image'))->image();
        $grid->column('description', __('Description'))->hide();
        $grid->column('author', __('Author'))->display(function ($id, $column) {
            return Authors::select('name')->where('id', $id)->first()->name;
        });
        $grid->column('source', __('Source'))->display(function ($id, $column) {
            return sources::select('name')->where('id', $id)->first()->name;
        });
        $grid->column('url', __('Url'));
        $grid->column('slug', __('Slug'))->hide();



        $grid->column('hot', __('Hot'))->bool();

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(News::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('chill_category', __('Chill category'));
        $show->field('category', __('Category'));
        $show->field('author', __('Author'));
        $show->field('source', __('Source'));
        $show->field('title', __('Title'));
        $show->field('image', __('Image'));
        $show->field('images', __('Images'));
        $show->field('first_look', __('First look'));
        $show->field('description', __('Description'));
        $show->field('url', __('Url'));
        $show->field('slug', __('Slug'));
        $show->field('hot', __('Hot'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News());

        //$form->number('chill_category', __('Chill category'));
        $form->select('category', __('Category'))->options(
            Categorys::pluck('name', 'id')->toArray()
        )->load('chill_category', '/news/public/admin/api/chill-category');

        $form->select('chill_category', __('Chill category'));
        $form->select('author', __('Author'))->options(
            Authors::pluck('name', 'id')->toArray()
        );
        $form->select('source', __('Source'))->options(
            sources::pluck('name', 'id')->toArray()
        );
        $states = [
            'off' => ['value' => 0, 'text' => 'Tin thường', 'color' => 'success'],
            'on' => ['value' => 1, 'text' => 'Tin hot', 'color' => 'danger'],
        ];

        $form->switch('hot', __('Hot'))->states($states)->default(0);

        $form->text('title', __('Title'));
        $form->file('image', __('Image'));
        $form->textarea('first_look', __('First look'));
        $form->ckeditor('description', __('Description'));
        $form->url('url', __('Url'));
        $form->text('slug', __('Slug'));
        return $form;
    }
}
