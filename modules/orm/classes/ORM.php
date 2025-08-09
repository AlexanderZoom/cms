<?php defined('SYSPATH') OR die('No direct script access.');

class ORM extends Kohana_ORM {
	// --- PHP 8.1+ compat: magic serialization ---
public function __serialize(): array
{
    // Если в классе есть старый serialize(), используем его
    if (method_exists($this, 'serialize')) {
        $legacy = $this->serialize();
        if (is_array($legacy)) {
            return $legacy;
        }
        if (is_string($legacy)) {
            // Попробуем распаковать строку в массив
            $arr = @unserialize($legacy);
            if (is_array($arr)) {
                return $arr;
            }
            // Фоллбек: складываем как есть
            return ['__legacy_serialized' => $legacy];
        }
    }

    // Универсальный фоллбек: сериализуем публичные/защищённые свойства
    // (можно сузить набор, если нужно)
    return get_object_vars($this);
}

public function __unserialize(array $data): void
{
    // Если есть старый unserialize(), попробуем делегировать
    if (method_exists($this, 'unserialize')) {
        // Старый метод, как правило, принимал строку
        // Передадим ему строковое представление массива
        $this->unserialize(serialize($data));
        return;
    }

    // Иначе просто восстановим свойства
    foreach ($data as $k => $v) {
        $this->$k = $v;
    }
}
}
