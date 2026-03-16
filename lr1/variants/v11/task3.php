<?php
/**
 * Завдання 2: Конвертер валют (USD → UAH)
 *
 * 150 доларів → грн, курс 39.20
 */
require_once __DIR__ . '/layout.php';

function convertUsdToUah(float $usd, float $rate): float
{
    // Оскільки ми переводимо долари в гривні, потрібно множити
    return round($usd * $rate, 2);
}

// Вхідні дані згідно з Варіантом 11
$usd = 150;
$rate = 39.20;

$uah = convertUsdToUah($usd, $rate);

// Форматуємо число, щоб завжди відображалися два знаки після коми (5880.00)
$formattedUah = number_format($uah, 2, '.', '');

$content = '<div class="card">
    <h2>💵 Конвертер USD → UAH</h2>
    <p><strong>Курс:</strong> 1 долар = ' . $rate . ' грн</p>
    <p><strong>Сума:</strong> ' . $usd . ' доларів</p>
    
    <div class="result" style="background:#d1fae5; padding: 15px; border-radius: 8px; margin-top: 15px; font-size: 16px;">
        Очікуваний результат: <strong>"' . $usd . ' доларів можна обміняти на ' . $formattedUah . ' грн"</strong>
    </div>
    
    <p class="info" style="margin-top: 15px; font-family: monospace; color: #666; font-size: 14px;">
        convertUsdToUah(' . $usd . ', ' . $rate . ') = ' . $uah . '
    </p>
</div>';

renderVariantLayout($content, 'Завдання 2', 'task2-body');

