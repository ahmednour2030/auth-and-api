<?php

namespace App\Repository\Eloquent;

use App\Repository\Contracts\OrderInterface;
use App\Models\Order;

class OrderRepository implements OrderInterface
{
    /**
     * @var Order
     */
    protected $orderModel;

    /**
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->orderModel  = $order;
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getOrders(int $limit = 10)
    {
        return
            $this->orderModel
                ->orderBy('created_at','desc')
                ->with('school:id,name,address,phone')
                ->paginate($limit);
    }

}
