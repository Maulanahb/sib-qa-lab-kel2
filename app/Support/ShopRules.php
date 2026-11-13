<?php

namespace App\Support;

final class ShopRules
{
    public static function products(): array
    {
        return [
            'kopi' => ['name' => 'Kopi Arabika', 'price' => 25000, 'stock' => 5],
            'teh' => ['name' => 'Teh Melati', 'price' => 15000, 'stock' => 10],
        ];
    }

    // White-box testing di Pertemuan 10: ubah nilai input, JANGAN ubah aturan ini.
    public static function discount(int $subtotal, bool $member): int
    {
        // D1: subtotal < 0 => throw InvalidArgumentException
        if ($subtotal < 0) {
            throw new \InvalidArgumentException('Subtotal negatif');
        }
        // D2: subtotal >= 100000 && member => return 10% (intdiv)
        if ($subtotal >= 100000 && $member) {
            return intdiv($subtotal * 10, 100);
        }
        // D3: subtotal >= 100000 => return 5% (intdiv)
        if ($subtotal >= 100000) {
            return intdiv($subtotal * 5, 100);
        }
        // Else: return 0 (tanpa diskon)
        return 0;
    }

    public static function subtotal(array $cart): int
    {
        $products = self::products();
        $sum = 0;
        foreach ($cart as $id => $quantity) {
            if (isset($products[$id]) && is_int($quantity) && $quantity > 0) {
                $sum += $products[$id]['price'] * $quantity;
            }
        }
        return $sum;
    }
}
