<?php

namespace App\Http\Responses;

class ResponseApi
{
    protected $success;
    protected $message;
    protected $content;
    protected $statusCode;

    public function __construct($success, $content = null, $message = '', $statusCode = 200)
    {
        $this->success = $success ? 'Sim' : 'Não';
        $this->message = $message;
        $this->content = $content;
        $this->statusCode = $statusCode;
    }

    public function send()
    {
        return response()->json([
            'sucesso' => $this->success,
            'mensagem' => $this->message,
            'content' => $this->content
        ], $this->statusCode);
    }
}
