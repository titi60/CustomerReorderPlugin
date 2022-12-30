<?php

declare(strict_types=1);

namespace spec\Titi60\CustomerReorderPlugin\ReorderEligibility;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\MoneyBundle\Formatter\MoneyFormatterInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Titi60\CustomerReorderPlugin\ReorderEligibility\ReorderEligibilityChecker;
use Titi60\CustomerReorderPlugin\ReorderEligibility\ReorderEligibilityCheckerResponse;
use Titi60\CustomerReorderPlugin\ReorderEligibility\ResponseProcessing\EligibilityCheckerFailureResponses;
use Titi60\CustomerReorderPlugin\ReorderEligibility\TotalReorderAmountEligibilityChecker;

final class TotalReorderAmountEligibilityCheckerSpec extends ObjectBehavior
{
    function let(MoneyFormatterInterface $moneyFormatter): void
    {
        $this->beConstructedWith($moneyFormatter);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(TotalReorderAmountEligibilityChecker::class);
    }

    function it_implements_reorder_eligibility_checker_interface(): void
    {
        $this->shouldImplement(ReorderEligibilityChecker::class);
    }

    function it_returns_positive_result_when_total_amounts_are_the_same(
        OrderInterface $order,
        OrderInterface $reorder
    ): void {
        $order->getTotal()->willReturn(100);
        $reorder->getTotal()->willReturn(100);

        $response = $this->check($order, $reorder);
        $response->shouldBeEqualTo([]);
    }

    function it_returns_violation_message_when_total_amounts_differ(
        OrderInterface $order,
        OrderInterface $reorder,
        MoneyFormatterInterface $moneyFormatter
    ): void {
        $order->getTotal()->willReturn(100);
        $order->getCurrencyCode()->willReturn('USD');
        $reorder->getTotal()->willReturn(150);

        $moneyFormatter->format(100, 'USD')->willReturn('$100.00');

        $response = new ReorderEligibilityCheckerResponse();
        $response->setMessage(EligibilityCheckerFailureResponses::TOTAL_AMOUNT_CHANGED);
        $response->setParameters(['%order_total%' => '$100.00']);

        $this->check($order, $reorder)->shouldBeLike([$response]);
    }
}
