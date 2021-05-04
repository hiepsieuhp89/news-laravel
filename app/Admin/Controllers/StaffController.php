<?php

namespace App\Admin\Controllers;

use App\Models\staffs;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StaffController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'staffs';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new staffs());

        $grid->column('id', __('Id'));
        $grid->column('position', __('Position'));
        $grid->column('email', __('Email'));
        $grid->column('password', __('Password'));
        $grid->column('name', __('Name'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('address', __('Address'));
        $grid->column('remember_token', __('Remember token'));
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
        $show = new Show(staffs::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('position', __('Position'));
        $show->field('email', __('Email'));
        $show->field('password', __('Password'));
        $show->field('name', __('Name'));
        $show->field('phone_number', __('Phone number'));
        $show->field('address', __('Address'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new staffs());

        $form->number('position', __('Position'));
        $form->email('email', __('Email'));
        $form->password('password', __('Password'));
        $form->text('name', __('Name'));
        $form->text('phone_number', __('Phone number'));
        $form->text('address', __('Address'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
