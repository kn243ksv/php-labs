<?php
/**
 * Завдання 1: Створення класів та об'єктів
 * Варіант 11: клас Book
 */
require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/Book.php';

// Створюємо 3 об'єкти згідно з вашим прикладом
$book1 = new Book('Тіні забутих предків', 'Михайло Коцюбинський', 1911);
$book2 = new Book("Кайдашева сім'я", 'Іван Нечуй-Левицький', 1879);
$book3 = new Book('Захар Беркут', 'Іван Франко', 1883);

// Масив для відображення в сітці карток
$books = [
    ['obj' => $book1, 'avatar' => 'avatar-indigo', 'initial' => 'Т'],
    ['obj' => $book2, 'avatar' => 'avatar-green', 'initial' => 'К'],
    ['obj' => $book3, 'avatar' => 'avatar-amber', 'initial' => 'З'],
];

ob_start();
?>

<div class="task-header">
    <h1>Створення об'єктів (Варіант 11)</h1>
    <p>Клас <code>Book</code> з властивостями: title, author, year</p>
</div>

<div class="code-block">
<span class="code-comment">// Приклад створення об'єкта класу Book</span>
<span class="code-variable">$book1</span> = <span class="code-keyword">new</span> <span class="code-class">Book</span>(<span class="code-string">'Тіні забутих предків'</span>, <span class="code-string">'Михайло Коцюбинський'</span>, <span class="code-string">1911</span>);
</div>

<div class="section-divider">
    <span class="section-divider-text">Перелік книг (об'єктів)</span>
</div>

<div class="users-grid">
    <?php foreach ($books as $i => $data): ?>
    <div class="user-card">
        <div class="user-card-header">
            <div class="user-card-avatar <?= $data['avatar'] ?>"><?= $data['initial'] ?></div>
            <div>
                <div class="user-card-name"><?= htmlspecialchars($data['obj']->title) ?></div>
                <div class="user-card-label">Об'єкт #<?= $data['obj']->id ?></div>
            </div>
        </div>
        <div class="user-card-body">
            <div class="user-card-field">
                <span class="user-card-field-label">title (Назва)</span>
                <span class="user-card-field-value"><?= htmlspecialchars($data['obj']->title) ?></span>
            </div>
            <div class="user-card-field">
                <span class="user-card-field-label">author (Автор)</span>
                <span class="user-card-field-value"><?= htmlspecialchars($data['obj']->author) ?></span>
            </div>
            <div class="user-card-field">
                <span class="user-card-field-label">year (Рік)</span>
                <span class="user-card-field-value"><?= $data['obj']->year ?></span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 1 - Варіант 11', 'task1-body');


