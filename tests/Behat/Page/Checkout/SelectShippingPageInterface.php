<?php

declare(strict_types=1);

namespace Tests\Titi60\CustomerReorderPlugin\Behat\Page\Checkout;

use \Sylius\Behat\Page\Shop\Checkout\SelectShippingPageInterface as BaseSelectShippingPageInterface;

interface SelectShippingPageInterface extends BaseSelectShippingPageInterface
{
    public function isShippingMethodSelected(string $shippingMethodName): bool;
}
