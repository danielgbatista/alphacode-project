<?php

namespace App\Models;

use App\Mappers\ContactMapper;
use App\Models\Database;
use PDO;
use PDOException;

class ContactModel extends Database
{
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO contacts (full_name,
                                birth_date,
                                email,
                                job,
                                phone,
                                cell_phone,
                                has_whatsapp,
                                send_email_notification,
                                send_sms_notification)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['fullName'],
            $data['birthDate'],
            $data['email'],
            $data['job'],
            $data['phone'],
            $data['cellPhone'],
            $data['hasWhatsapp'],
            $data['sendEmailNotification'],
            $data['sendSmsNotification']
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function list(){
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT id, full_name, birth_date, email, cell_phone FROM contacts
        ");
        $stmt->execute();

        $formattedContacts = [];

        while ($contact = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $formattedContact = ContactMapper::formatSimpleContact($contact);
            $formattedContacts[] = $formattedContact;
        }
    
        return $formattedContacts;
    }

    public static function findById(int $id){
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT * FROM contacts
            WHERE id =?
        ");
        $stmt->execute([$id]);

        $contact = $stmt->fetch(PDO::FETCH_ASSOC);

        return $contact ? ContactMapper::formatContact($contact) : [];
    }

    public static function update(int $id, array $data){
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE contacts
            SET full_name               = ?,
                birth_date              = ?,
                email                   = ?,
                job                     = ?,
                phone                   = ?,
                cell_phone              = ?,
                has_whatsapp            = ?,
                send_email_notification = ?,
                send_sms_notification   = ?
            WHERE id =?
        ");

        $stmt->execute([
            $data['fullName'],
            $data['birthDate'],
            $data['email'],
            $data['job'],
            $data['phone'],
            $data['cellPhone'],
            $data['hasWhatsapp'],
            $data['sendEmailNotification'],
            $data['sendSmsNotification'], 
            $id
        ]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    public static function delete(int $id){
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM contacts
            WHERE id =?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
