<?php

namespace Tests\Unit;

use App\Support\ShopRules;
use PHPUnit\Framework\TestCase;

final class ContohWhiteBoxTest extends TestCase
{
    public function test_diskon_di_bawah_ambang(): void
    {
        $this->assertSame(0, ShopRules::discount(50000, false));
    }
}
