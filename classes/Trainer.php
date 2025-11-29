<?php
require_once __DIR__ . '/Ivysaur.php';
require_once __DIR__ . '/HistoryManager.php';

class Trainer {
    private string $name;
    private Pokemon $pokemon;
    private HistoryManager $history;

    public function __construct(string $name, Pokemon $pokemon, HistoryManager $historyManager) {
        $this->name = $name;
        $this->pokemon = $pokemon;
        $this->history = $historyManager;
    }

    public function getPokemon(): Pokemon {
        return $this->pokemon;
    }

    public function doTraining(string $trainingType, int $intensity): array {
        $beforeLevel = $this->pokemon->getLevel();
        $beforeHp = $this->pokemon->getHp();
        $result = $this->pokemon->train($trainingType, $intensity);

        $session = [
            'pokemon' => $this->pokemon->getName(),
            'type' => $this->pokemon->getType(),
            'trainingType' => $trainingType,
            'intensity' => $intensity,
            'levelBefore' => $beforeLevel,
            'hpBefore' => $beforeHp,
            'levelAfter' => $result['after']['level'],
            'hpAfter' => $result['after']['hp'],
            'levelGain' => $result['levelGain'],
            'hpGain' => $result['hpGain'],
            'specialMove' => $result['usedMove'],
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $this->history->append($session);

        return $session;
    }
}
