<?php

namespace CloudDark\OpenRouter;

class OpenRouter {
    private $api_url = "https://openrouter.ai/api/v1/chat/completions";
    private $token;
    private $model;

    // Konstruktor untuk menerima token dan model
    public function __construct($token, $model = "mistralai/mixtral-8x7b-instruct") {
        $this->token = $token;
        $this->model = $model;
    }

    // Fungsi untuk membuat request dengan mode stream atau non-stream
    public function chat($messages, $stream = false) {
        $headers = [
            "Authorization: Bearer " . $this->token,
            "Content-Type: application/json"
        ];

        $body = json_encode([
            "model" => $this->model,
            "messages" => $messages,
            "stream" => $stream
        ]);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    // Fungsi untuk memilih model
    public function setModel($model) {
        $this->model = $model;
    }

    // Fungsi untuk mengganti token
    public function setToken($token) {
        $this->token = $token;
    }
}
