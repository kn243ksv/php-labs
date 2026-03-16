<?php
/**
 * Завдання 6.1: Шахова таблиця 4x11
 */
require_once __DIR__ . '/layout.php';

function generateChessboard(int $rows, int $cols, string $color1, string $color2): string
{
    // Таблиця з легкою тінню та рамкою
    $html = "<table class='chessboard' style='border-collapse: collapse; margin: 0 auto; border: 2px solid #0f172a; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);'>";
    
    for ($i = 0; $i < $rows; $i++) {
        $html .= "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            // Чергування кольорів для шахової дошки
            $cellBg = (($i + $j) % 2 === 0) ? $color1 : $color2;
            
            $html .= "<td style='background-color:{$cellBg}; width: 45px; height: 45px; border: 1px solid rgba(0,0,0,0.1);'></td>";
        }
        $html .= "</tr>";
    }
    
    $html .= "</table>";
    return $html;
}

// 1. Параметри дошки
$rows = 4;
$cols = 11;
$boardColor1 = '#000000'; // Темні комірки (наприклад, синій)
$boardColor2 = '#ffffff'; // Світлі комірки (світло-синій)

$table = generateChessboard($rows, $cols, $boardColor1, $boardColor2);

$content = '
    <div style="background-color: ' . $backgroundColor . '; color: ' . $textColor . '; padding: 40px 20px; border-radius: 12px; text-align: center;">
        <h1 style="margin-top: 0; font-size: 26px;">🏁 Шахова таблиця ' . $rows . 'x' . $cols . '</h1>
        <div class="params" style="margin-bottom: 30px; color: ' . $paramsColor . '; font-family: monospace; font-size: 16px;">
            generateChessboard(' . $rows . ', ' . $cols . ')
        </div>
        ' . $table . '
    </div>';

renderVariantLayout($content, 'Завдання 6.1', 'task7-table-body');