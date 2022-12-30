<?php

declare(strict_types=1);

namespace Titi60\CustomerReorderPlugin\ReorderEligibility;

use Sylius\Component\Core\Model\OrderInterface;

interface ReorderEligibilityChecker
{
    public function check(OrderInterface $order, OrderInterface $reorder): array;
}
