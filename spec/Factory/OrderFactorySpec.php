<?php

declare(strict_types=1);

namespace spec\Titi60\CustomerReorderPlugin\Factory;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Titi60\CustomerReorderPlugin\Factory\OrderFactory;
use Titi60\CustomerReorderPlugin\Factory\OrderFactoryInterface;
use Titi60\CustomerReorderPlugin\ReorderProcessing\ReorderProcessor;

final class OrderFactorySpec extends ObjectBehavior
{
    function let(FactoryInterface $baseOrderFactory, ReorderProcessor $reorderProcessor): void
    {
        $this->beConstructedWith($baseOrderFactory, $reorderProcessor);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderFactory::class);
    }

    function it_implements_order_factory_interface(): void
    {
        $this->shouldImplement(OrderFactoryInterface::class);
    }

    function it_creates_reorder_from_existing_order(
        FactoryInterface $baseOrderFactory,
        ReorderProcessor $reorderProcessor,
        OrderInterface $order,
        OrderInterface $reorder,
        ChannelInterface $channel
    ): void {
        $baseOrderFactory->createNew()->willReturn($reorder);
        $reorder->setChannel($channel)->shouldBeCalled();

        $reorderProcessor->process($order, $reorder)->shouldBeCalled();

        $this->createFromExistingOrder($order, $channel);
    }
}
