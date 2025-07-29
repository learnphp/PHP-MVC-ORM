<?php

namespace Core;

use Core\Database;
use PDO;

abstract class Model
{
    protected $table;
    protected $results = [];

    public static function all()
    {
        $instance = new static;
        $stmt = Database::connect()->query("SELECT * FROM {$instance->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data)
    {
        $fields = array_keys($data);
        $placeholders = implode(',', array_fill(0, count($fields), '?'));
        $columns = implode(',', $fields);

        $stmt = Database::connect()->prepare(
            "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)"
        );
        $stmt->execute(array_values($data));

        return $this->find(Database::connect()->lastInsertId());
    }

    public static function where($field, $value)
    {
        $instance = new static;
        $stmt = Database::connect()->prepare("SELECT * FROM {$instance->table} WHERE $field = ?");
        $stmt->execute([$value]);

        $instance->results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $instance;
    }

    public function first()
    {
        return $this->results[0] ?? null;
    }

    public function find($id)
    {
        $stmt = Database::connect()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
