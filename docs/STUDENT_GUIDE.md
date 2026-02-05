# Інструкція для студентів

## Крок 1: Форк репозиторію

1. Відкрийте репозиторій викладача на GitHub
2. Натисніть кнопку **Fork** (правий верхній кут)
3. Виберіть свій акаунт

Тепер у вас є копія репозиторію: `github.com/ВАШ_ЛОГІН/php-labs`

## Крок 2: Клонування

```bash
git clone https://github.com/ВАШ_ЛОГІН/php-labs.git
cd php-labs
```

## Крок 3: Додати upstream

```bash
git remote add upstream https://github.com/victorchei/php-labs.git
```

Перевірка:

```bash
git remote -v
# origin    https://github.com/ВАШ_ЛОГІН/php-labs.git
# upstream  https://github.com/victorchei/php-labs.git
```

## Крок 4: Запуск сервера

```bash
php -S localhost:8000
```

Відкрийте: <http://localhost:8000>

## Робота з лабораторною

### Ваш варіант

Викладач призначає вам варіант (v1-v15). Працюйте **тільки** у своїй папці:

```
lr1/variants/v5/tasks/   ← якщо ваш варіант v5
```

### Цикл роботи

```bash
# 1. Редагуйте файли в tasks/
code lr1/variants/v5/tasks/task3.php

# 2. Перевірте тести
cd lr1/variants/v5
php run_tests.php

# 3. Коміт і пуш
git add .
git commit -m "lr1: task3 completed"
git push
```

### Перевірка прогресу

Відкрийте у браузері:

```
http://localhost:8000/lr1/variants/v5/task3.php
```

- ❌ — не реалізовано
- ⚠️ — частково
- ✅ — виконано

## Синхронізація з викладачем

Коли викладач оновлює репозиторій (виправлення, нові лаби):

```bash
git fetch upstream
git merge upstream/main
git push
```

## Здача роботи

1. Переконайтесь, що всі тести проходять
2. Push всі зміни у свій форк
3. Повідомте викладача (посилання на ваш форк)

## Типові помилки

| Проблема | Рішення |
|----------|---------|
| `permission denied` | Перевірте SSH ключі або використовуйте HTTPS |
| Конфлікт при merge | Працюйте тільки у `variants/vN/tasks/` |
| Тести не проходять | Перевірте синтаксис: `php -l file.php` |
| Сервер не запускається | Перевірте чи встановлений PHP: `php -v` |

## Корисні посилання

- [Запуск проєкту](running-project.md)
- [Робота з Git](git-guide.md)
- [Критерії прийняття](acceptance-criteria.md)
