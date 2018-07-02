<?php

namespace App\Admin\Controllers;

use App\Models\Advertising;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AdvertisingsController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {

        return Admin::content(function (Content $content) {

            $content->header('广告');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('广告');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('广告');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Advertising::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->image('图像');
            $grid->url('链接');
            $grid->advertising_space()->name('所属广告位');
            $grid->sort('排序')->editable();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Advertising::class, function (Form $form) {

            $form->select('advertising_space_id', '所属广告位')->rules('required|integer')->options();

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
