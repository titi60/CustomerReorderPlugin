<?php

declare(strict_types=1);

namespace Titi60\CustomerReorderPlugin\ReorderEligibility;

interface ReorderEligibilityConstraintMessageFormatterInterface
{
    public function format(array $messageParameters): string;
}
