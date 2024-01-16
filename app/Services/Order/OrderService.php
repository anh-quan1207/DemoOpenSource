<?php

namespace App\Services\Order;

use App\Repositories\Order\OrderDetailRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Services\BaseService;

class OrderService extends BaseService implements OrderServiceInterface
{
    public $repository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->repository = $orderRepository;
    }
}
