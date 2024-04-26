<?php

namespace App\Mappers;

class ContactMapper{
    public static function formatSimpleContact(array $contact){
        $formattedContact = [
            "id" => $contact['id'],
            "fullName" => $contact['full_name'],
            "birthDate" => $contact['birth_date'],
            "email" => $contact['email'],
            "cellPhone" => $contact['cell_phone']
        ];
    
        return $formattedContact;
    }

    public static function formatContact(array $contact){
        $formattedContact = [
            "id" => $contact['id'],
            "fullName" => $contact['full_name'],
            "birthDate" => $contact['birth_date'],
            "email" => $contact['email'],
            "job" => $contact['job'],
            "phone" => $contact['phone'],
            "cellPhone" => $contact['cell_phone'],
            "hasWhatsapp" => (bool) $contact['has_whatsapp'],
            "sendEmailNotification" => (bool) $contact['send_email_notification'],
            "sendSmsNotification" => (bool) $contact['send_sms_notification']
        ];
    
        return $formattedContact;
    }
}