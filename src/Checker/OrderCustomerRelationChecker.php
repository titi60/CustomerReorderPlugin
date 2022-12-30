<?php

declare(strict_types=1);

namespace Titi60\CustomerReorderPlugin\Checker;

use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class OrderCustomerRelationChecker implements OrderCustomerRelationCheckerInterface
{
    public function wasOrderPlacedByCustomer(OrderInterface $order, CustomerInterface $customer): bool
    {
        /** @var CustomerInterface|null $orderCustomer */
        $orderCustomer = $order->getCustomer();

        return
            null !== $orderCustomer &&
            $orderCustomer->getId() === $customer->getId()
        ;
    }
}
