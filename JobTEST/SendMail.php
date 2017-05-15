<?php
class SendMail
{
    public function Mail($to, $subject, $message)
    {
        mail($to, $subject, $message);
    }
}
