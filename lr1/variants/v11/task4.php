<?php
/**
 * Завдання 3: Визначення сезону та позиції місяця (if-else)
 *
 * Місяць для перевірки: 7
 * Очікуваний результат: "літо, середній місяць сезону"
 */
require_once __DIR__ . '/layout.php';

// Функція для визначення сезону
function determineSeason(int $month): string
{
    if ($month >= 3 && $month <= 5) {
        return "весна";
    } elseif ($month >= 6 && $month <= 8) {
        return "літо";
    } elseif ($month >= 9 && $month <= 11) {
        return "осінь";
    } else {
        return "зима";
    }
}

// Функція для визначення позиції місяця в сезоні за допомогою if-else
function determinePosition(int $month): string
{
    // Групуємо місяці за їхньою позицією (12, 3, 6, 9 - перші; 1, 4, 7, 10 - середні; 2, 5, 8, 11 - останні)
    if ($month == 12 || $month == 3 || $month == 6 || $month == 9) {
        return "перший місяць сезону";
    } elseif ($month == 1 || $month == 4 || $month == 7 || $month == 10) {
        return "середній місяць сезону";
    } else {
        return "останній місяць сезону";
    }
}

// Вхідні дані
$month = 7;

// Отримуємо результати
$season = determineSeason($month);
$position = determinePosition($month);

// Формуємо фінальний рядок (наприклад: "літо, середній місяць сезону")
$finalResult = $season . ', ' . $position;

$monthNames = [
    1 => "Січень", 2 => "Лютий", 3 => "Березень",
    4 => "Квітень", 5 => "Травень", 6 => "Червень",
    7 => "Липень", 8 => "Серпень", 9 => "Вересень",
    10 => "Жовтень", 11 => "Листопад", 12 => "Грудень"
];

// Стилі (ключі тепер з маленької літери, оскільки determineSeason повертає слова з маленької)
$styles = [
    "весна" => ["class" => "spring", "color" => "#10b981", "emoji" => "🌸"],
    "літо" => ["class" => "summer", "color" => "#f59e0b", "emoji" => "☀️"],
    "осінь" => ["class" => "autumn", "color" => "#f97316", "emoji" => "🍂"],
    "зима" => ["class" => "winter", "color" => "#3b82f6", "emoji" => "❄️"],
];

$style = $styles[$season];

$content = '<div class="card large">
    <div class="season-emoji">' . $style['emoji'] . '</div>
    <div class="season-month" style="color:' . $style['color'] . '">Місяць ' . $month . '</div>
    <div class="season-month-name">' . $monthNames[$month] . '</div>
    <div class="result" style="margin-top:15px; font-size: 1.2em; text-transform: lowercase;"><strong>' . $finalResult . '</strong></div>
    <p class="info">determineSeason(' . $month . ') = "' . $season . '"</p>
    <p class="info">determinePosition(' . $month . ') = "' . $position . '"</p>
</div>';

// Передаємо згенерований HTML у ваш layout
renderVariantLayout($content, 'Завдання 3', 'task3-body ' . $style['class']);
