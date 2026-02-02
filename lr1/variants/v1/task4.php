<?php
require_once __DIR__.'/tasks/task4.php';
$hour = 14;
$timeOfDay = determineTimeOfDay($hour);
$styles = [
    "Ранок" => ["color" => "#fbbf24", "emoji" => "🌅", "bg" => "#fef3c7"],
    "День" => ["color" => "#3b82f6", "emoji" => "☀️", "bg" => "#dbeafe"],
    "Вечір" => ["color" => "#f97316", "emoji" => "🌆", "bg" => "#ffedd5"],
    "Ніч" => ["color" => "#1e3a5f", "emoji" => "🌙", "bg" => "#1e293b"],
];
$style = $styles[$timeOfDay] ?? ["color"=>"#333","emoji"=>"❓","bg"=>"#fff"];
$content = '<div class="card" style="background: white; padding: 50px; border-radius: 20px; box-shadow: 0 8px 40px rgba(0,0,0,0.2); text-align: center;'.($timeOfDay=="Ніч"?'color:white;background:'.$style['bg'].';':'background:'.$style['bg'].';').'">
    <div class="emoji" style="font-size:80px;margin-bottom:20px;">'.$style['emoji'].'</div>
    <div class="time" style="font-size:72px;font-weight:bold;color:'.$style['color'].';">'.sprintf("%02d:00", $hour).'</div>
    <div class="result" style="font-size:36px;margin-top:20px;color:#333;">'.$timeOfDay.'</div>
    <p class="info" style="color:#666;margin-top:15px;">Функція: determineTimeOfDay('.$hour.') = "'.$timeOfDay.'"</p>
</div>';
require __DIR__.'/layout.php';
renderLayout($content);