<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Orders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('ID'));
        $grid->column('order_number', __('Order Number'));
        $grid->column('user.f_name', __('User Name')); // Assuming 'user' is the relationship with the User model.
        $grid->column('txnIid', __('Transaction ID'));
        $grid->column('txnAmount', __('Transaction Amount'));
        $grid->column('payment_status', __('Payment Status'));
        $grid->column('order_status', __('Order Status'));
        $grid->column('user.address', __('Delivery Address'));

        // Add more columns as needed.

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('1101', __('Order Number'));
        $show->field('user.f_name', __('User Name'));
        $show->field('transaction_id', __('Transaction ID'));
        $show->field('txnAmount', __('Transaction Amount'));
        $show->field('payment_status', __('Payment Status'));
        $show->field('order_status', __('Order Status'));
        $show->field('delivery_address', __('Delivery Address'));

        // Add more fields as needed.

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->text('order_number', __('Order Number'));
        $form->select('user_id', __('User Name'))->options(function ($user_id) {
            $user = User::find($user_id);
            if ($user) {
                return [$user_id => $user->f_name];
            }
            return [];
        });
        $form->text('txnId', __('Transaction ID'));
        $form->text('txnAmount', __('Transaction Amount'));
        $form->text('payment_status', __('Payment Status'));
        $form->text('order_status', __('Order Status'));
        $form->textarea('address', __('Delivery Address'));

        // Add more form fields as needed.

        return $form;
    }
}
