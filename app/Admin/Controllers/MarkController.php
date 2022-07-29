<?php

namespace App\Admin\Controllers;

use App\Models\Mark;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MarkController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Example controller';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Mark());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('Title'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Mark::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('Title'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Mark());

        $form->display('id', __('ID'));
        $form->text('title', __('Title'));
        $form->image('image', __('Image'));

        return $form;
    }
}
