<?php
/**
 * Завдання 9: Асоціативний масив
 *
 * Варіант 11: ім'я студента => оцінка (1-12)
 * Сортування: ksort (за іменем), asort (за оцінкою)
 */
require_once __DIR__ . '/layout.php';

/**
 * Сортує асоціативний масив за іменами (ключами)
 */
function sortByName(array $employees): array
{
    ksort($employees);
    return $employees;
}

/**
 * Сортує асоціативний масив за оцінкою (значеннями)
 */
function sortBySalary(array $employees): array
{
    asort($employees);
    return $employees;
}

// Дані (варіант 11)
$students = [
    'Бондаренко Олег' => 10,
    'Гнатюк Марія' => 7,
    'Дорошенко Артем' => 12,
    'Коваленко Софія' => 5,
    'Мельник Данило' => 9,
    'Петренко Анна' => 11,
    'Ткачук Ігор' => 3,
];

// Обробка
$sortBy = $_POST['sort'] ?? $_GET['sort'] ?? 'name';
$sorted = $sortBy === 'score' ? sortBySalary($students) : sortByName($students);

ob_start();
?>
<div class="demo-card">
    <h2>Асоціативний масив</h2>
    <p class="demo-subtitle">Сортування за іменем або за оцінкою</p>

    <div class="flex-buttons">
        <form method="post">
            <input type="hidden" name="sort" value="name">
            <button type="submit" class="<?= $sortBy === 'name' ? 'btn-submit' : 'btn-secondary' ?>">За іменем</button>
        </form>
        <form method="post">
            <input type="hidden" name="sort" value="score">
            <button type="submit" class="<?= $sortBy === 'score' ? 'btn-submit' : 'btn-secondary' ?>">За оцінкою</button>
        </form>
    </div>

    <div class="demo-section">
        <h3>Вхідні дані</h3>
        <div class="demo-code">$students = [
<?php foreach ($students as $name => $score): ?>
    "<?= $name ?>" => <?= $score ?>,
<?php endforeach; ?>
];</div>
    </div>

    <div class="demo-section">
        <h3>Відсортовано: <span class="demo-tag demo-tag-primary"><?= $sortBy === 'score' ? 'за оцінкою' : 'за іменем' ?></span></h3>
        <table class="demo-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ім'я <?= $sortBy === 'name' ? '&#8593;' : '' ?></th>
                    <th>Оцінка <?= $sortBy === 'score' ? '&#8593;' : '' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($sorted as $name => $score): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($name) ?></td>
                    <td><span class="demo-tag demo-tag-success"><?= $score ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="demo-code"><?= $sortBy === 'score' ? 'sortBySalary' : 'sortByName' ?>($students);
// <?= $sortBy === 'score' ? 'asort($students)' : 'ksort($students)' ?></div>
</div>
<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 9');
