<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Component\Taxation\Calculator;

use Sylius\Component\Taxation\Model\TaxRateInterface;

final class DecimalCalculator implements CalculatorInterface
{
    public function calculate(float $base, TaxRateInterface $rate): float
    {
        if ($rate->isIncludedInPrice()) {
            return $base - ($base / (1 + $rate->getAmount()));
        }

        return $base * $rate->getAmount();
    }
}
