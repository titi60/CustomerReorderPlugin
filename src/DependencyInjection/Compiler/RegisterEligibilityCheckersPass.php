<?php

declare(strict_types=1);

namespace Titi60\CustomerReorderPlugin\DependencyInjection\Compiler;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\PrioritizedCompositeServicePass;

final class RegisterEligibilityCheckersPass extends PrioritizedCompositeServicePass
{
    public function __construct()
    {
        parent::__construct(
            'Titi60\CustomerReorderPlugin\ReorderEligibility\CompositeReorderEligibilityChecker',
            'Titi60\CustomerReorderPlugin\ReorderEligibility\CompositeReorderEligibilityChecker',
            'sylius_customer_reorder_plugin.eligibility_checker',
            'addChecker'
        );
    }
}
