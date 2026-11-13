<?php

namespace Tests\Unit;

use App\Support\ShopRules;
use PHPUnit\Framework\TestCase;

class Anggota4WhiteBoxTest extends TestCase
{
    /**
     * Anggota 4: Maulana Ahmad Bukhori (NIM 224107060133)
     * Kasus TC10-04 (DOCX P10): subtotal negatif (-1, false) harus melempar InvalidArgumentException.
     * Jalur: START -> D1 (True) -> THROW InvalidArgumentException -> END
     */
    public function test_anggota_4_white_box(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Subtotal negatif');

        ShopRules::discount(-1, false);
    }
}
