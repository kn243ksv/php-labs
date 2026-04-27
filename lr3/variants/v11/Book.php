<?php
/**
 * Клас Book — модель книги
 * Варіант 11
 */
class Book
{
    private static int $nextId = 1;

    public int $id;
    public ?int $parentId = null;
    public string $title;
    public string $author;
    public int $year;

    /**
     * Конструктор для створення об'єкта
     */
    public function __construct(string $title = '', string $author = '', int $year = 0)
    {
        $this->id = self::$nextId++;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    /**
     * Форматований вивід інформації
     */
    public function getInfo(): string
    {
        return "Книга: «{$this->title}», Автор: {$this->author}, Рік: {$this->year}";
    }

    /**
     * Логіка клонування
     */
    public function __clone(): void
    {
        $this->parentId = $this->id;
        $this->id = self::$nextId++;
        $this->year = 0; // Скидаємо рік для нової копії
    }
}




