<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\ContactService;

class ContactController
{
    public function create(Request $request, Response $response)
    {
        $body = $request::body();

        $create = ContactService::create($body);

        if (isset($create['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'data' => $create['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $create
        ], 201);
    }

    public function list(Request $request, Response $response)
    {
        $list = ContactService::list();

        if (isset($list['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'data' => $list['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $list
        ], 200);
    }

    public function findById(Request $request, Response $response, array $params)
    {
        $find = ContactService::findById($params[0]);

        if (isset($find['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'data' => $find['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $find
        ], 200);
    }

    public function update(Request $request, Response $response, array $params)
    {
        $body = $request::body();

        $update = ContactService::update($params[0], $body);

        if (isset($update['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'data' => $update['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $update
        ], 202);
    }

    public function delete(Request $request, Response $response, array $params)
    {
        $delete = ContactService::delete($params[0]);

        if (isset($delete['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'data' => $delete['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $delete
        ], 202);
    }
}
