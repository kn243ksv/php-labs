
<?php
function sumOfDigits(int $number): int { $sum=0; while($number>0){$sum+=$number%10;$number=(int)($number/10);} return $sum; }
function productOfDigits(int $number): int { $product=1; while($number>0){$product*=$number%10;$number=(int)($number/10);} return $product; }
function reverseNumber(int $number): int { $reversed=0; while($number>0){$reversed=$reversed*10+$number%10;$number=(int)($number/10);} return $reversed; }
function maxFromDigits(int $number): int { $digits=[]; while($number>0){$digits[]=$number%10;$number=(int)($number/10);} rsort($digits); $result=0; foreach($digits as $digit){$result=$result*10+$digit;} return $result; }
$number = mt_rand(1000, 9999);
$d1 = (int)($number / 1000);
$d2 = (int)(($number % 1000) / 100);
$d3 = (int)(($number % 100) / 10);
$d4 = $number % 10;
$sum = sumOfDigits($number);
$product = productOfDigits($number);
$reversed = reverseNumber($number);
$maxNum = maxFromDigits($number);
ob_start();
?>
<div class="container" style="max-width:500px;margin:0 auto;">
    <div class="card">
        <h3>🎲 Випадкове чотиризначне число</h3>
        <div class="number" style="font-size:64px;font-weight:bold;text-align:center;color:#4f46e5;letter-spacing:8px;">
            <?= $number ?>
        </div>
        <div class="digits" style="display:flex;justify-content:center;gap:10px;margin:20px 0;">
            <div class="digit" style="width:50px;height:50px;background:#e0e7ff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:24px;font-weight:bold;color:#4338ca;"> <?= $d1 ?> </div>
            <div class="digit" style="width:50px;height:50px;background:#e0e7ff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:24px;font-weight:bold;color:#4338ca;"> <?= $d2 ?> </div>
            <div class="digit" style="width:50px;height:50px;background:#e0e7ff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:24px;font-weight:bold;color:#4338ca;"> <?= $d3 ?> </div>
            <div class="digit" style="width:50px;height:50px;background:#e0e7ff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:24px;font-weight:bold;color:#4338ca;"> <?= $d4 ?> </div>
        </div>
    </div>
    <div class="card">
        <h3>📊 Результати</h3>
        <div class="result" style="padding:15px;background:#f8fafc;border-radius:8px;margin:10px 0;display:flex;justify-content:space-between;align-items:center;">
            <div>
                <span>1. Сума цифр</span>
                <div class="func" style="font-family:monospace;color:#666;font-size:12px;">sumOfDigits(<?= $number ?>)</div>
            </div>
            <span class="result-value" style="font-size:20px;font-weight:bold;color:#059669;"><?= $sum ?></span>
        </div>
        <div class="result" style="padding:15px;background:#f8fafc;border-radius:8px;margin:10px 0;display:flex;justify-content:space-between;align-items:center;">
            <div>
                <span>2. Добуток цифр</span>
                <div class="func" style="font-family:monospace;color:#666;font-size:12px;">productOfDigits(<?= $number ?>)</div>
            </div>
            <span class="result-value" style="font-size:20px;font-weight:bold;color:#059669;"><?= $product ?></span>
        </div>
        <div class="result" style="padding:15px;background:#f8fafc;border-radius:8px;margin:10px 0;display:flex;justify-content:space-between;align-items:center;">
            <div>
                <span>3. В зворотному порядку</span>
                <div class="func" style="font-family:monospace;color:#666;font-size:12px;">reverseNumber(<?= $number ?>)</div>
            </div>
            <span class="result-value" style="font-size:20px;font-weight:bold;color:#059669;"><?= $reversed ?></span>
        </div>
        <div class="result" style="padding:15px;background:#f8fafc;border-radius:8px;margin:10px 0;display:flex;justify-content:space-between;align-items:center;">
            <div>
                <span>4. Найбільше можливе</span>
                <div class="func" style="font-family:monospace;color:#666;font-size:12px;">maxFromDigits(<?= $number ?>)</div>
            </div>
            <span class="result-value" style="font-size:20px;font-weight:bold;color:#059669;"><?= $maxNum ?></span>
        </div>
    </div>
    <p style="text-align:center;color:#666;opacity:0.8;">Оновіть сторінку для нового числа 🔄</p>
</div>
<?php
$content = ob_get_clean();
require __DIR__.'/layout.php';
renderLayout($content);
