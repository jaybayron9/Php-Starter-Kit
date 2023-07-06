<?php 

namespace Data;
use DBConn\DBConn;


class Data extends DBConn {
    public function show_support() { 
        $data = parent::select('supports', '*', ['id' => $_POST['id']], null, 1);

        return json_encode([
            'name' => $data[0]['name'],
            'phone' => $data[0]['phone'],
            'email' => $data[0]['email'],
            'created' => $data[0]['created_at'],
        ]); 
    }
}