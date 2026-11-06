<?php
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function formatPrice(float $price): string
{
    return number_format($price, 0, ',', ' ') . ' ₽';
}
