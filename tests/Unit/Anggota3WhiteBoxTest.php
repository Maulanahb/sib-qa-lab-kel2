<?php

namespace Tests\Unit;

use App\Support\ShopRules;
use PHPUnit\Framework\TestCase;

class Anggota3WhiteBoxTest extends TestCase
{
    public function test_anggota_3_white_box(): void
    {
        // TC10-03: subtotal di bawah Rp100.000 dan bukan member
        $actual = ShopRules::discount(50000, false);

        $this->assertSame(0, $actual);
    }

}
