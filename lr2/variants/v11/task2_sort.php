<?php
/**
 * Завдання 2: Сортування міст за довжиною назви
 *
 * Варіант 11: за довжиною назви, при однаковій довжині — за алфавітом
 */
require_once __DIR__ . '/layout.php';

/**
 * Розбиває рядок вхідних даних на масив міст (через пробіли).
 */
function parseCities(string $input): array
{
    $cities = array_filter(array_map('trim', preg_split('/\s+/', $input)));
    return array_values($cities);
}

function utf8_strlen(string $value): int
{
    if (function_exists('mb_strlen')) {
        return mb_strlen($value, 'UTF-8');
    }

    $chars = preg_split('//u', $value, -1, PREG_SPLIT_NO_EMPTY);
    return $chars === false ? strlen($value) : count($chars);
}

/**
 * Сортує міста за довжиною назви (від короткого до довгого),
 * при рівній довжині — за алфавітом.
 */
function sortCitiesByLength(string $input): array
{
    $cities = parseCities($input);
    usort($cities, function (string $a, string $b): int {
        $la = utf8_strlen($a);
        $lb = utf8_strlen($b);
        if ($la === $lb) {
            return strcmp($a, $b);
        }
        return $la <=> $lb;
    });
    return $cities;
}

// Вхідні дані (варіант 11)
$input = $_POST['cities'] ?? '';
$submitted = isset($_POST['cities']);
$defaultCities = 'Суми Рівне Луцьк Ужгород Тернопіль Кропивницький Біла Церква Хмельницький';

if (!$submitted) {
    $input = $defaultCities;
}

$sorted = sortCitiesByLength($input);

ob_start();
?>
<div class="demo-card">
    <h2>Сортування міст</h2>
    <p class="demo-subtitle">Введіть назви міст через пробіли — сортування за довжиною назви</p>

    <form method="post" class="demo-form">
        <div>
            <label for="cities">Міста (через пробіл)</label>
            <input type="text" id="cities" name="cities" value="<?= htmlspecialchars($input) ?>" placeholder="Суми Рівне Луцьк Ужгород">
        </div>
        <button type="submit" class="btn-submit">Сортувати</button>
    </form>

    <?php if (!empty($sorted)): ?>
    <div class="demo-section">
        <h3>Вхідні дані</h3>
        <div class="array-display">
            <?php foreach (parseCities($input) as $city): ?>
            <span class="array-item"><?= htmlspecialchars($city) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="array-arrow">&#8595;</div>

    <div>
        <h3 class="demo-section-title-success">Відсортовані</h3>
        <div class="array-display">
            <?php foreach ($sorted as $city): ?>
            <span class="array-item array-item-unique"><?= htmlspecialchars($city) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="demo-code">sortCitiesByLength("<?= htmlspecialchars($input) ?>")
// Сортування за довжиною назви + алфавіт при рівній довжині
// Результат: [<?= htmlspecialchars(implode(', ', array_map(fn($c) => "\"$c\"", $sorted))) ?>]</div>
    <?php endif; ?>
</div>
<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 2');
