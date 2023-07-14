<?php

namespace ControlValidation; 
use Validation\Valid;

class ControlValidation {
    function error($msg = ''){ 
        return json_encode(['error' => $msg]);
    } 

    public function only_letter():string {  
        $error[] = Valid::is_all_letters($_POST['only_letters']) ? "Only letter allowed." : '';

        if (!empty(array_filter($error))) {
            return $this->error($error[0]);
        } 
        return $this->error();
    }

    public function only_big_letters():string {
        $error[] = Valid::is_all_capitalized($_POST['only_big_letters']) ? "Only big letters allowed." : '';

        if (!empty(array_filter($error))) {
            return $this->error($error[0]);
        } 
        return $this->error();
    }

    public function only_small_letters():string {
        $error[] = Valid::is_all_lowercase($_POST['only_small_letters']) ? "Only small letters allowed." : '';

        if (!empty(array_filter($error))) {
            return $this->error($error[0]);
        } 
        return $this->error();
    }

    public function password():string {
        $error[] = Valid::has_min_lenght($_POST['password']) ? '8 Characters' : '';
        $error[] = Valid::has_small_letters($_POST['password']) ? 'Small Letter' : '';
        $error[] = Valid::has_big_letters($_POST['password']) ? 'Big Letter' : '';
        $error[] = Valid::has_numbers($_POST['password']) ? 'Number' : '';
        $error[] = Valid::has_special_characters($_POST['password']) ? 'Special Character' : ''; 

        if (!empty(array_filter($error))) {
            return json_encode([
                'lenght' => $error[0],
                'small' => $error[1],
                'big' =>  $error[2],
                'number' => $error[3],
                'symbol' => $error[4]
            ]);
        }

        return json_encode([
            'lenght' => '',
            'small' => '',
            'big' => '',
            'number' => '',
            'symbol' => ''
        ]); 
    }

    public function email():string {
        $error[] = Valid::is_valid_email($_POST['email']) ? 'Invalid Email format.' : '';

        if (!empty(array_filter($error))) {
            return $this->error($error[0]);
        }
        return $this->error();
    }

    public function only_number():string {
        $error[] = Valid::is_all_numbers($_POST['number']) ? 'Only number' : '';

        if (!empty(array_filter($error))) {
            return $this->error($error[0]);
        }
        return $this->error();
    }

    public function whole_number():string {
        $error[] = Valid::is_whole_number($_POST['whole_number']) ? 'Only Whole numbers' : '';

        if (!empty(array_filter($error))) {
            return $this->error($error[0]);
        } 
        return $this->error();
    }

    public function decimal_number() {
        $error[] = Valid::is_decimal_number($_POST['decimal_number']) ? 'Only Decimal numbers' : '';

        if (!empty(array_filter($error))) {
            return $this->error($error[0]);
        } 
        return $this->error();
    }
}