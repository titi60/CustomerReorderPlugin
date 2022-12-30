<?php

declare(strict_types=1);

namespace Titi60\CustomerReorderPlugin\ReorderProcessing;

use Sylius\Component\Core\Model\OrderInterface;

interface ReorderProcessor
{
    public function process(OrderInterface $order, OrderInterface $reorder): void;
}
