<?php
require_once __DIR__.'/tasks/task2.php';
$content = '<div class="poem" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 500px; font-family: Georgia, serif; font-size: 18px; line-height: 1.8; margin: 0 auto;">'.generatePoem().'</div>';
require __DIR__.'/layout.php';
renderLayout($content);