<?php
function generateChessboard(int $n): string {
    $html = "<table class='chessboard'>";
    for ($i = 0; $i < $n; $i++) {
        $html .= "<tr>";
        for ($j = 0; $j < $n; $j++) {
            $color = (($i + $j) % 2 === 0) ? '#fff' : '#000';
            $html .= "<td style='background-color: $color;'></td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}
$n = 8;
$chessboard = generateChessboard($n);
ob_start();
?>
<h1 style="color:#333;margin-bottom:30px;">♟️ Шахова дошка <?= $n ?>×<?= $n ?></h1>
<div class="params"
    style="color:#333;background:rgba(255,255,255,0.1);padding:10px 20px;border-radius:8px;margin-bottom:20px;font-family:monospace;">
    generateChessboard(<?= $n ?>)
</div>
<?= $chessboard ?>
<p class="info" style="color:#666;margin-top:20px;font-size:14px;">Біла клітинка (0,0) → чергування білих (#fff) та
    чорних (#000) клітинок</p>
<?php
$content = ob_get_clean();
require __DIR__.'/layout.php';
renderLayout('<div style="padding:40px;text-align:center;font-size:22px;max-width:600px;margin:0 auto;">
        <b>Завдання 7.1 не виконано</b>
    </div>');