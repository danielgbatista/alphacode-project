<?php

namespace App\Utils;

class Validator
{
    public static function validate(array $data)
    {
        if (empty($data['fullName'])) {
            return ['error' => 'Full name field is required!'];
        }

        if (empty($data['birthDate'])) {
            return ['error' => 'Birth date field is required!'];
        }

        if (empty($data['email'])) {
            return ['error' => 'Email field is required!'];
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return ['error' => 'Invalid email format!'];
        }

        if (empty($data['job'])) {
            return ['error' => 'Job field is required!'];
        }

        if (empty($data['phone'])) {
            return ['error' => 'Phone field is required!'];
        }

        if (empty($data['hasWhatsapp'])){
            $data['hasWhatsapp'] = 0;
        }

        if (empty($data['sendEmailNotification'])){
            $data['sendEmailNotification'] = 0;
        }

        if (empty($data['sendSmsNotification'])){
            $data['sendSmsNotification'] = 0;
        }

        return $data;
    }
}
