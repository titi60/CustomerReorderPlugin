<?php

declare(strict_types=1);

namespace Titi60\CustomerReorderPlugin\ReorderEligibility\ResponseProcessing;

interface ReorderEligibilityCheckerResponseProcessorInterface
{
    public function process(array $responses): void;
}
