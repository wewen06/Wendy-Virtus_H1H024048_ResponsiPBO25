<?php
abstract class Pokemon {
    protected string $name;
    protected string $type;
    protected int $level;
    protected int $hp;
    protected array $specialMoves; 

    public function __construct(string $name, string $type, int $level, int $hp, array $specialMoves = []) {
        $this->name = $name;
        $this->type = $type;
        $this->level = max(1, $level);
        $this->hp = max(1, $hp);
        $this->specialMoves = $specialMoves;
    }

    public function getName(): string { return $this->name; }
    public function getType(): string { return $this->type; }
    public function getLevel(): int { return $this->level; }
    public function getHp(): int { return $this->hp; }
    public function getSpecialMoves(): array { return $this->specialMoves; }

    abstract public function specialMove(): string;

    public function train(string $trainingType, int $intensity): array {
        $before = ['level' => $this->level, 'hp' => $this->hp];
        $levelGain = 0;
        $hpGain = 0;
        $intensity = max(1, min(100, $intensity));

        switch (strtolower($trainingType)) {
            case 'attack':
            case 'kekuatan':
                $levelGain = (int)floor($intensity / 25); 
                $hpGain = (int)floor($intensity / 10);
                break;
            case 'defense':
            case 'ketahanan':
                $levelGain = (int)floor($intensity / 30);
                $hpGain = (int)floor($intensity / 8);
                break;
            case 'speed':
            case 'kecepatan':
                $levelGain = (int)floor($intensity / 40);
                $hpGain = (int)floor($intensity / 12);
                break;
            default:
                $levelGain = (int)floor($intensity / 50);
                $hpGain = (int)floor($intensity / 15);
                break;
        }

        $typeEffect = $this->typeEffectOnTraining($trainingType);
        $levelGain = (int)round($levelGain * $typeEffect['levelMultiplier']);
        $hpGain = (int)round($hpGain * $typeEffect['hpMultiplier']);

        $this->level += $levelGain;
        $this->hp += $hpGain;

        $after = ['level' => $this->level, 'hp' => $this->hp];

        return [
            'before' => $before,
            'after' => $after,
            'levelGain' => $levelGain,
            'hpGain' => $hpGain,
            'usedMove' => $this->specialMove()
        ];
    }

    protected function typeEffectOnTraining(string $trainingType): array {
        return ['levelMultiplier' => 1.0, 'hpMultiplier' => 1.0];
    }
}
