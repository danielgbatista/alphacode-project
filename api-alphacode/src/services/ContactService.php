<?php

namespace App\Services;

use App\Models\ContactModel;
use App\Utils\Validator;
use Exception;
use PDOException;

class ContactService
{
    public static function create(array $data)
    {
        try {
            $fields = Validator::validate($data);

            $client = ContactModel::save($fields);

            if (!$client) return ['error' => 'Sorry, we could not create client.'];

            return 'Client created successfully!';
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'Sorry, we could not connect to the database.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function list()
    {
        try {
            $list = ContactModel::list();

            return $list;

            return $list;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'Sorry, we could not connect to the database.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function findById(int $id)
    {
        try{
            $find = ContactModel::findById($id);

            if(empty($find)) return ['error' => "Client doesn't exist"];

            return $find;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'Sorry, we could not connect to the database.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function update(int $id, array $data)
    {
        try{
            $fields = Validator::validate($data);

            $find = ContactModel::findById($id);

            if(empty($find)) return ['error' => "Client doesn't exist"];

            $update = ContactModel::update($id, $fields);
            
            if(!$update) return ['error' => "Client could not be updated"];

            return ['Client updated successfully!'];
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'Sorry, we could not connect to the database.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function delete(int $id)
    {
        try{
            $delete = ContactModel::delete($id);

            if(!$delete) return ['error' => "The customer could not be excluded"];

            return ['Customer excluded successfully!'];
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'Sorry, we could not connect to the database.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
