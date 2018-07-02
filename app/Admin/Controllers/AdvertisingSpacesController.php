<?php

namespace App\Admin\Controllers;

use App\Models\AdvertisingSpace;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AdvertisingSpacesController extends Controller
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

            $content->header('广告位');

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

            $content->header('广告位');

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

            $content->header('广告位');

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
        return Admin::grid(AdvertisingSpace::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('名称');

            $states = [
                'on'  => ['value' => 1,  'color' => 'primary'],
                'off' => ['value' => 0,  'color' => 'default'],
            ];
            $grid->is_able('启用')->switch($states);

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(AdvertisingSpace::class, function (Form $form) {

            $form->text('name', '名称');
            $form->switch('is_able','启用');

        });
    }
}
