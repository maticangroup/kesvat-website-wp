<?php

namespace Theme;

class Email
{

    public function getTemplate($name, $info)
    {
        $template = str_replace(array("\r", "\n"), "", theme_field($name, 'option'));
        foreach ($info as $key => $val) {
            $template = str_replace("{" . $key . "}", $val, $template);
        }

        return $template;
    }


    public function send($to, $subject, $body)
    {
        $from = theme_field('email_from_field', 'option');
        $fromName = theme_field('name_from_field', 'option');
        $reply = theme_field('reply_to_field', 'option');

        \wpMandrill::mail($to, $subject, $body, array(
            "From: $fromName <$from>",
            "Reply-To: $reply",
            "Content-Type: text/html; charset=ISO-8859-1"
        ));
    }

}
