<?php

class Mailer
{
    /**
     * @param $email
     * @param $message
     * @return bool
     * @throws Exception
     */
    public function sendMessage(string $email, string $message): bool
    {
        if(empty(trim($email))) {
            throw new \InvalidArgumentException();
        }
        sleep(3);

        echo "Send `$message` to '$email'";
        return true;
    }

    /**
     * Static method
     * @param string $email
     * @param string $message
     * @return bool
     */
    public static function send(string $email, string $message): bool
    {
        if(empty(trim($email))) {
            throw new \InvalidArgumentException();
        }
        sleep(3);

        echo "Send `$message` to '$email'";
        return true;
    }
}