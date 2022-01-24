<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\OrderInterface;
use App\Repository\Contracts\StudentInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var OrderInterface
     */
    private $orderInterface;

    /**
     * @param OrderInterface $orderInterface
     */
    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $orders = $this->orderInterface->getOrders(20);

        return $this->apiResponse('successfully', $orders);
    }

}
