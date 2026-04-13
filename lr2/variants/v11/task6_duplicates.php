<?php
/**
 * Завдання 6: Пошук унікальних елементів
 *
 * Варіант 11: повертає елементи, які зустрічаються лише один раз
 * Масив: [3, 7, 2, 7, 5, 3, 9, 1, 5, 8, 4, 9] → [2, 1, 8, 4]
 */
require_once __DIR__ . '/layout.php';

/**
 * Повертає унікальні елементи, які зустрічаються тільки один раз у масиві.
 */
function findUniqueElements(array $arr): array
{
    if (empty($arr)) {
        return [];
    }

    $counts = array_count_values($arr);
    return array_values(array_filter($arr, fn($value) => $counts[$value] === 1));
}

// Обробка форми (варіант 11)
$input = $_POST['array'] ?? '3, 7, 2, 7, 5, 3, 9, 1, 5, 8, 4, 9';
$submitted = isset($_POST['array']);

$arr = array_map('trim', explode(',', $input));
$arr = array_filter($arr, fn($v) => $v !== '');

$unique = findUniqueElements($arr);

ob_start();
?>
<div class="demo-card">
    <h2>Унікальні елементи</h2>
    <p class="demo-subtitle">Повертає елементи, що зустрічаються тільки один раз</p>

    <form method="post" class="demo-form">
        <div>
            <label for="array">Масив (через кому)</label>
            <input type="text" id="array" name="array" value="<?= htmlspecialchars($input) ?>" placeholder="3, 7, 2, 7, 5, 3, 9, 1, 5, 8, 4, 9">
        </div>
        <button type="submit" class="btn-submit">Знайти унікальні</button>
    </form>

    <?php if (!empty($arr)): ?>
    <div class="demo-section">
        <h3>Вхідний масив</h3>
        <div class="array-display">
            <?php foreach ($arr as $item): ?>
            <span class="array-item <?= in_array($item, $unique, true) ? 'array-item-unique' : '' ?>"><?= htmlspecialchars($item) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="demo-result">
        <h3>Унікальні елементи</h3>
        <div class="demo-result-value">[<?= htmlspecialchars(implode(', ', $unique)) ?>]</div>
    </div>

    <div class="demo-section">
        <h3>Частота елементів</h3>
        <table class="demo-table">
            <thead>
                <tr>
                    <th>Елемент</th>
                    <th>Кількість</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counts = array_count_values($arr);
                arsort($counts);
                foreach ($counts as $value => $count):
                ?>
                <tr>
                    <td><?= htmlspecialchars($value) ?></td>
                    <td><?= $count ?></td>
                    <td>
                        <?php if (in_array($value, $unique, true)): ?>
                        <span class="demo-tag demo-tag-success">Унікальний</span>
                        <?php else: ?>
                        <span class="demo-tag demo-tag-primary"><?= $count ?>×</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="demo-result demo-result-info">
        <h3>Результат</h3>
        <div class="demo-result-value">Масив порожній</div>
    </div>
    <?php endif; ?>

    <div class="demo-code">findUniqueElements([<?= htmlspecialchars(implode(', ', $arr)) ?>])
// Результат: [<?= htmlspecialchars(implode(', ', $unique)) ?>]</div>
</div>
<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 6');
