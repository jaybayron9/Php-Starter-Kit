<?php 

namespace Data;
use DBConn\DBConn;


class Data extends DBConn {
    public function show_support() { 
        $data = parent::select('supports', '*', ['id' => $_POST['id']], null, 1);

        return json_encode([
            'status' => 200,
            'id' => $data[0]['id'],
            'name' => $data[0]['name'],
            'phone' => $data[0]['phone'],
            'email' => $data[0]['email'],
            'created' => $data[0]['created_at'],
        ]); 
    }

    public function update_support() {
        parent::update('supports', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
        ], "id = '{$_POST['id']}'");

        return self::show_support();
    }

    public function delete_support() {
        parent::delete('supports', ['id' => $_POST['id']]);
        return json_encode([
            'status' => 200,
            'id' => $_POST['id']
        ]);
    }

    public function add_support() { 
        parent::insert('supports', [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT), 
        ]);

        return parent::resp(200);
    }

    public function delete_supports() { 
        if (empty($_POST['data']) || empty($_POST['data'][0])) {
            return parent::resp(400);
        }

        foreach($_POST['data'] as $id) {
            parent::delete('supports', ['id' => $id]);
        }

        return parent::alert(200);
    }

    public function show_user() { 
        $data = parent::select('users', '*', ['id' => $_POST['id']], null, 1);

        return json_encode([
            'status' => 200,
            'id' => $data[0]['id'],
            'name' => $data[0]['name'],
            'phone' => $data[0]['phone'],
            'email' => $data[0]['email'],
            'created' => $data[0]['created_at'],
        ]); 
    }

    public function update_user() {
        parent::update('users', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
        ], "id = '{$_POST['id']}'");

        return self::show_user();
    }

    public function delete_user() {
        parent::delete('users', ['id' => $_POST['id']]);
        return json_encode([
            'status' => 200,
            'id' => $_POST['id']
        ]);
    }

    public function add_user() { 
        parent::insert('users', [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT), 
        ]);

        return parent::resp(200);
    }

    public function delete_users() { 
        if (empty($_POST['data']) || empty($_POST['data'][0])) {
            return parent::resp(400);
        }

        foreach($_POST['data'] as $id) {
            parent::delete('users', ['id' => $id]);
        }

        return parent::alert(200);
    }
}