<?php


namespace PurchaseControl\Support;


class Message
{
    private $text;
    private $type;

    public function getText()
    {
        return $this->text;
    }

    public function getType()
    {
        return $this->type;
    }

    public function sucsess(string $message): Message
    {
        $this->type = 'alert-sucsess';
        $this->text = $message;
        return $this;

    }

    public function error(string $message): Message
    {
        $this->type = 'alert-danger';
        $this->text = $message;
        return $this;

    }

    public function render()
    {
        return $this->getText();
    }
}