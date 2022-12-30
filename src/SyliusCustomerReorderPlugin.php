<?php

declare(strict_types=1);

namespace Titi60\CustomerReorderPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Titi60\CustomerReorderPlugin\DependencyInjection\Compiler\RegisterEligibilityCheckersPass;
use Titi60\CustomerReorderPlugin\DependencyInjection\Compiler\RegisterReorderProcessorsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class SyliusCustomerReorderPlugin extends Bundle
{
    use SyliusPluginTrait;

    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new RegisterEligibilityCheckersPass());
        $container->addCompilerPass(new RegisterReorderProcessorsPass());
    }
}
