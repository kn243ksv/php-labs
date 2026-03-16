<?php
/**
 * Завдання 6.2: 9 синіх кіл на білому тлі
 */
require_once __DIR__ . '/layout.php';

function generateBlueCircles(int $n): string
{
    // Використовуємо контейнер з білим фоном (додав inline-стилі для впевненості)
    $html = "<div class='shapes-container' style='background-color: #ffffff; position: relative; width: 100%; height: 60vh; min-height: 400px; overflow: hidden; border-radius: 12px; border: 1px solid #e2e8f0;'>";

    for ($i = 0; $i < $n; $i++) {
        // Генеруємо випадковий розмір та позицію для кожного кола
        $size = mt_rand(40, 100); 
        $top = mt_rand(5, 85);
        $left = mt_rand(5, 85);
        $opacity = mt_rand(70, 100) / 100;

        $html .= "<div style='
            position: absolute;
            top: {$top}%;
            left: {$left}%;
            width: {$size}px;
            height: {$size}px;
            background-color: #3b82f6;
            border-radius: 50%;
            opacity: {$opacity};
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.4);
        '></div>";
    }

    $html .= "</div>";
    return $html;
}

$n = 9;
$circles = generateBlueCircles($n);

// Додав трохи стилів для тексту, щоб він добре читався на світлому фоні сайту
$content = $circles . '
    <div class="circles-func" style="color: #1e293b; background: #f8fafc; border: 1px solid #e2e8f0;">generateBlueCircles(' . $n . ')</div>
    <div class="circles-counter" style="color: #1e293b; background: #f8fafc; border: 1px solid #e2e8f0;">🔵 Кіл: ' . $n . '</div>
    <p class="circles-info" style="color: #64748b;">Оновіть сторінку для нової композиції 🔄</p>';

renderVariantLayout($content, 'Завдання 6.2', 'task7-circles-body');
