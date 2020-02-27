<?php

namespace App\Admin\Controllers;

use App\Model\Register;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\Register';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Register());

        $grid->column('id', __('Id'));
        $grid->column('corp', __('Corp'));
        $grid->column('person', __('Person'));
        $grid->column('scope', __('Scope'));
        $grid->column('tel', __('Tel'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        //$grid->column('pass', __('Pass'));
        //$grid->column('appid', __('Appid'));
        //$grid->column('secret', __('Secret'));

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
        $show = new Show(Register::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('corp', __('Corp'));
        $show->field('person', __('Person'));
        $show->field('scope', __('Scope'));
        $show->field('tel', __('Tel'));
        $show->field('email', __('Email'));
        $show->field('address', __('Address'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('pass', __('Pass'));
        $show->field('appid', __('Appid'));
        $show->field('secret', __('Secret'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Register());

        $form->text('corp', __('Corp'));
        $form->text('person', __('Person'));
        $form->text('scope', __('Scope'));
        $form->text('tel', __('Tel'));
        $form->email('email', __('Email'));
        $form->text('address', __('Address'));
        $form->text('pass', __('Pass'));
        $form->text('appid', __('Appid'));
        $form->text('secret', __('Secret'));

        return $form;
    }
}
