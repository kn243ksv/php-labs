
<?php
function isEvenOrOdd(int $digit): string {
    switch ($digit) {
        case 0: case 2: case 4: case 6: case 8: return "парна";
        case 1: case 3: case 5: case 7: case 9: return "непарна";
        default: return "невідомо";
    }
}
$digit = 7;
$result = isEvenOrOdd($digit);
$isEven = $result === "парна";
$color = $isEven ? "#10b981" : "#ef4444";
$emoji = $isEven ? "✓" : "✗";
ob_start();
?>
<div class="card">
    <div class="digit" style="font-size:120px;font-weight:bold;color:<?= $color ?>;text-shadow:2px 2px 4px rgba(0,0,0,0.1);">
        <?= $digit ?>
    </div>
    <div class="emoji" style="font-size:48px;color:<?= $color ?>;"><?= $emoji ?></div>
    <div class="result" style="font-size:28px;margin-top:20px;color:#374151;">
        Цифра <strong><?= $digit ?></strong> — <span style="color: <?= $color ?>"><?= $result ?></span>
    </div>
    <p class="info" style="color:#666;margin-top:15px;font-size:14px;">Функція: isEvenOrOdd(<?= $digit ?>) = "<?= $result ?>"</p>
</div>
<?php
$content = ob_get_clean();
    require __DIR__.'/layout.php';
    renderLayout(
        '<div style="padding:40px;text-align:center;font-size:22px;max-width:600px;margin:0 auto;">
            <b>Завдання 5 не виконано</b>
        </div>'
    );
