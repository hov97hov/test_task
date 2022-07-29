<?php

namespace App\Admin\Controllers;

use App\Models\CarModel;
use App\Models\Mark;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CarModelController extends AdminController
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
        $grid = new Grid(new CarModel());

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
        $show = new Show(CarModel::findOrFail($id));

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
        $form = new Form(new CarModel());

        $form->display('id', __('ID'));
        $form->text('title', __('Title'))->required();
        $form->multipleFile('attachments','Image')->pathColumn('image')->removable();
        $form->select('mark_id','Marks')->options(Mark::all()->pluck('title','id'));

        return $form;
    }
}
