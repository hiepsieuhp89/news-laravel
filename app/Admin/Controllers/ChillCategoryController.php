<?php

namespace App\Admin\Controllers;

use App\Models\Categorys;
use App\Models\ChillCategorys;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChillCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ChillCategorys';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ChillCategorys());

        $grid->disableBatchActions();

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('Id'));
        $grid->column('categoryId', __('Danh mục cha'))->display(function ($id, $column) {
            return Categorys::select('name')->where('id', $id)->first()->name;
        })->label();
        $grid->column('name', __('Tên'))->badge();
        $grid->column('slug', __('Slug'))->hide();
        $grid->column('dataid', __('Mã danh mục'))->hide();
        $grid->column('url', __('Url'))->link();
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
        $show = new Show(ChillCategorys::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('categoryId', __('CategoryId'));
        $show->field('name', __('Tên'));
        $show->field('slug', __('Slug'));
        $show->field('dataid', __('Mã danh mục'));
        $show->field('url', __('Url'));
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
        $form = new Form(new ChillCategorys());

        $form->select('categoryId', __('Danh mục cha'))->options(
            Categorys::pluck('name', 'id')->toArray()
        );

        $form->text('name', __('Tên'));
        $form->text('slug', __('Slug'));
        $form->text('dataid', __('Mã danh mục'));
        $form->url('url', __('Url'));

        return $form;
    }
    public function api(Request $request)
    {
        $provinceId = $request->get('q');

        return ChillCategorys::where('categoryId', $provinceId)->get(['id', DB::raw('name as text')]);
    }
}
