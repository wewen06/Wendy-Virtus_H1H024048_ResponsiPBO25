<?php
require_once __DIR__ . '/Pokemon.php';

class Ivysaur extends Pokemon {
    public function __construct(int $level = 5, int $hp = 45) {
        parent::__construct('Ivysaur', 'Grass/Poison', $level, $hp, ['Vine Whip', 'Razor Leaf', 'Seed Bomb']);
    }

    public function specialMove(): string {
        if ($this->level < 10) return "Vine Whip (basic)";
        if ($this->level < 20) return "Razor Leaf (improved)";
        return "Seed Bomb (powerful)";
    }

    protected function typeEffectOnTraining(string $trainingType): array {
        switch (strtolower($trainingType)) {
            case 'attack':
            case 'kekuatan':
                return ['levelMultiplier' => 1.0, 'hpMultiplier' => 0.9];
            case 'defense':
            case 'ketahanan':
                return ['levelMultiplier' => 1.1, 'hpMultiplier' => 1.2];
            case 'speed':
            case 'kecepatan':
                return ['levelMultiplier' => 0.8, 'hpMultiplier' => 0.9];
            default:
                return ['levelMultiplier' => 1.0, 'hpMultiplier' => 1.0];
        }
    }
}
