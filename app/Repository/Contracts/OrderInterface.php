<?php

namespace App\Repository\Contracts;

interface OrderInterface
{
    /**
     * @param int $limit
     * @return mixed
     */
    public function getOrders(int $limit);

}
