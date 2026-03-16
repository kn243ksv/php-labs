<?php
/**
 * Завдання 4: Тип символу (switch)
 *
 * Символ 'ь' → "спеціальний символ"
 */
require_once __DIR__ . '/layout.php';

function getCharacterType(string $char): string
{
    
    switch ($char) {
        case 'а': case 'А':
        case 'е': case 'Е':
        case 'є': case 'Є':
        case 'и': case 'И':
        case 'і': case 'І':
        case 'ї': case 'Ї':
        case 'о': case 'О':
        case 'у': case 'У':
        case 'ю': case 'Ю':
        case 'я': case 'Я':
            return "голосна";
            
        case 'ь': case 'Ь':
        case '\'': 
        case '’':
            return "спеціальний символ";
            
        default:
            return "приголосна";
    }
}

$symbol = 'ь';
$result = getCharacterType($symbol);

switch ($result) {
    case "голосна":
        $color = "#10b981";
        $emoji = "🔊";
        break;
    case "спеціальний символ":
        $color = "#3b82f6";
        $emoji = "🔣";
        break;
    case "приголосна":
    default:
        $color = "#8b5cf6";
        $emoji = "🔇";
        break;
}

$content = '<div class="card large">
    <div class="letter-display" style="color:' . $color . '">' . $symbol . '</div>
    <div class="letter-emoji" style="color:' . $color . '">' . $emoji . '</div>
    <div class="letter-result">
        Символ <strong>\'' . $symbol . '\'</strong> — <span style="color:' . $color . '">' . $result . '</span>
    </div>
    <p class="info">getCharacterType(\'' . $symbol . '\') = "' . $result . '"</p>
</div>';

renderVariantLayout($content, 'Завдання 4', 'task5-body');
