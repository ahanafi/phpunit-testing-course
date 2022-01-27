<?php

class Mailer
{
    /**
     * @param $email
     * @param $message
     * @return bool
     */
    public function sendMessage($email, $message): bool
    {
        sleep(3);

        echo "Send `$message` to '$email'";
        return true;
    }
}