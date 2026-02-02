<?php
require_once __DIR__.'/tasks/task3.php';
$eur = 250;
$rate = 45.20;
$uah = convertEurToUah($eur, $rate);
$result = formatConversionResult($eur, $uah);
$content = '<div class="card" style="max-width:400px;margin:0 auto;">
    <h2>💶 Конвертер EUR → UAH</h2>
    <p><strong>Курс:</strong> 1 EUR = ' . $rate . ' грн</p>
    <div class="result" style="font-size:24px;color:#2d3748;background:#e2e8f0;padding:15px;border-radius:8px;margin-top:20px;">' . $result . '</div>
    <p class="info" style="color:#718096;font-size:14px;margin-top:10px;">Функція: convertEurToUah(' . $eur . ', ' . $rate . ') = ' . $uah . '</p>
</div>';
require __DIR__.'/layout.php';
renderLayout($content);