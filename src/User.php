<?php

class User
{
    public string $firstName;
    public string $lastName;
    public string $email;
    protected Mailer $mailer;

    public function setMailer(Mailer $mailer): void
    {
        $this->mailer = $mailer;
    }

    public function getFullName(): string
    {
        return trim($this->firstName . " " . $this->lastName);
    }

    public function notify($message): bool
    {
        if(empty(trim($this->email))) {
            throw new Exception;
        }
        return $this->mailer->sendMessage($this->email, $message);
    }
}