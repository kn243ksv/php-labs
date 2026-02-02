<?php
function generateRandomCircles(int $n): string {
    $html = "<div class='container' style='position:relative; width:100vw; height:100vh; background:#0066cc;'>";
    for ($i = 0; $i < $n; $i++) {
        $size = mt_rand(20, 80);
        $top = mt_rand(5, 85);
        $left = mt_rand(5, 85);
        $opacity = mt_rand(70, 100) / 100;
        $html .= "<div class='circle' style='position:absolute;width:{$size}px;height:{$size}px;top:{$top}%;left:{$left}%;background:yellow;border-radius:50%;opacity:{$opacity};box-shadow:0 4px 20px rgba(255,255,0,0.4);transition:transform 0.3s,box-shadow 0.3s;'></div>";
    }
    $html .= "</div>";
    return $html;
}
$n = 12;
$circles = generateRandomCircles($n);
ob_start();
?>
<?= $circles ?>
<div class="func"
    style="position:fixed;top:20px;left:20px;color:white;font-family:monospace;font-size:14px;background:rgba(0,0,0,0.3);padding:10px 15px;border-radius:8px;">
    generateRandomCircles(<?= $n ?>)</div>
<div class="counter"
    style="position:fixed;top:20px;right:20px;color:white;font-family:Arial,sans-serif;font-size:18px;background:rgba(0,0,0,0.3);padding:10px 20px;border-radius:8px;">
    🟡 Кіл: <?= $n ?></div>
<p class="info"
    style="position:fixed;bottom:20px;left:50%;transform:translateX(-50%);color:rgba(255,255,255,0.7);font-family:Arial,sans-serif;font-size:14px;text-align:center;">
    Наведіть курсор на коло для анімації. Оновіть сторінку для нової композиції.</p>
<?php
$content = ob_get_clean();
require __DIR__.'/layout.php';
renderLayout(
     '<div style="padding:40px;text-align:center;font-size:22px;max-width:600px;margin:0 auto;">
          <b>Завдання 7.2 не виконано</b>
     </div>'
);