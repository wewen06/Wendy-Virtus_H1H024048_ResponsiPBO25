<?php
class HistoryManager {
    private string $filePath;

    public function __construct(string $filePath = __DIR__ . '/../data/history.json') {
        $this->filePath = $filePath;
        if (!file_exists(dirname($this->filePath))) {
            mkdir(dirname($this->filePath), 0755, true);
        }
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([] , JSON_PRETTY_PRINT));
        }
    }

    public function append(array $session): bool {
        $data = $this->readAll();
        $data[] = $session;
        return file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT)) !== false;
    }

    public function readAll(): array {
        $raw = file_get_contents($this->filePath);
        $arr = json_decode($raw, true);
        return is_array($arr) ? $arr : [];
    }
}
