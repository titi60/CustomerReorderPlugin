<?php

declare(strict_types=1);

namespace Titi60\CustomerReorderPlugin\DependencyInjection\Compiler;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\PrioritizedCompositeServicePass;

final class RegisterReorderProcessorsPass extends PrioritizedCompositeServicePass
{
    public function __construct()
    {
        parent::__construct(
            'Titi60\CustomerReorderPlugin\ReorderProcessing\CompositeReorderProcessor',
            'Titi60\CustomerReorderPlugin\ReorderProcessing\CompositeReorderProcessor',
            'sylius_customer_reorder_plugin.reorder_processor',
            'addProcessor'
        );
    }
}
