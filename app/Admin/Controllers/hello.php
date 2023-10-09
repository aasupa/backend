<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('f_name', __('Name'));
        $grid->column('txnId', __('Transaction Id'));
        //$grid->column('email_verified_at', __('Email verified at'));
       // $grid->email_verified_at("Verified")->display(function($verified){
           // return $verified?"Yes":"No";
        //});
        $grid->column('order_status', __('Order Status'));
        $grid->column('payment_status', __('Payment Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }
}
    /**
     * Make a show builder.
     *
    * @param mixed $id
    * @return Show
//      */
//     protected function detail($id)
//     {
//         $show = new Show(Order::findOrFail($id));

//         $show->field('id', __('Id'));
//         $show->field('name', __('Name'));
//         $show->field('txnId', __('Transaction Id'));
//         //$show->field('email_verified_at', __('Email verified at'));
//         $show->field('txnAmount', __('Transaction amount'));
//        // $show->field('remember_token', __('Remember token'));
//        $show->field('order_status', __('Order Status'));
//        $show->field('payment_status', __('Payment Status'));
//         $show->field('created_at', __('Created at'));
//         $show->field('updated_at', __('Updated at'));

//         return $show;
//     }

//     /**
//      * Make a form builder.
//      *
//      * @return Form
//      */
//     protected function form()
//     {
//         $form = new Form(new Order());

//         $form->text('name', __('Name'));
//         $form->number('id', __('Id'));
//         $form->string('txnId', __('Transaction Id'));
//         $form->number('txnAmount', __('Transaction amount'));
//         //$form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
//         //$form->string('password', __('Password'));
//         $form->select('order status', __('Order Status'));
//         $form->select('payment status', __('Payment Status'));
        
        
//         //$form->text('remember_token', __('Remember token'));

//         return $form;
//     }
// }
