<?php

class Mailer
{
    /**
     * @param $email
     * @param $message
     * @return bool
     * @throws Exception
     */
    public function sendMessage($email, $message): bool
    {
        if(empty(trim($email))) {
            throw new \Exception;
        }
        sleep(3);

        echo "Send `$message` to '$email'";
        return true;
    }
}