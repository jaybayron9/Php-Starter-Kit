<?php

namespace ControlValidation; 
use Validation\Valid;

class ControlValidation {
    protected function error($msg = ''){ 
        return json_encode(['error' => $msg]);
    } 

    protected function defReturn($error) {
        if (!empty(array_filter($error))) {
            return $this->error($error[0]);
        } 
        return $this->error();
    }

    public function only_letter():string {  
        $error[] = Valid::is_all_letters($_POST['only_letters']) ? "Only letter allowed." : ''; 
        return $this->defReturn($error);
    }

    public function only_big_letters():string {
        $error[] = Valid::is_all_capitalized($_POST['only_big_letters']) ? "Only big letters allowed." : ''; 
        return $this->defReturn($error);
    }

    public function only_small_letters():string {
        $error[] = Valid::is_all_lowercase($_POST['only_small_letters']) ? "Only small letters allowed." : ''; 
        return $this->defReturn($error);
    }

    public function words_capitalize():string {
        $error[] = Valid::is_words_capitalize($_POST['words_capitalize']) ? "Words are capitalize only." : ''; 
        return $this->defReturn($error);
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
        return $this->defReturn($error);
    }

    public function only_number():string {
        $error[] = Valid::is_all_numbers($_POST['number']) ? 'Numbers only.' : ''; 
        return $this->defReturn($error);
    }

    public function whole_number():string {
        $error[] = Valid::is_whole_number($_POST['whole_number']) ? 'Only whole numbers.' : ''; 
        return $this->defReturn($error);
    }

    public function decimal_number():string {
        $error[] = Valid::is_decimal_number($_POST['decimal_number']) ? 'Only decimal numbers' : ''; 
        return $this->defReturn($error);
    }

    public function is_negative_number() {
        $error[] = Valid::is_negative_number($_POST['negative_number']) ? 'Only negative numbers' : ''; 
        return $this->defReturn($error);
    }

    public function future_data():string { 
        $error[] = Valid::is_future_date($_POST['future_date'], 0) ? "Select future date." : ''; 
        return $this->defReturn($error);
    }

    public function past_date():string {
        $error[] = Valid::is_past_date($_POST['past_date'], 0) ? "Select past date." : ''; 
        return $this->defReturn($error);
    } 

    public function mobile_number_format() {
        $error[] = Valid::is_contact_number($_POST['mobile_number_format'], '09') ? "Invalid contact number format." : '';
        return $this->defReturn($error);
    }

    public function upload_image() { 
        $error[] = Valid::is_image($_FILES['image']) ? "Not recognize as image." : '';
        return $this->defReturn($error);
    }

    public function upload_document() {
        $error[] = Valid::is_document($_FILES['document']) ? "Not recognize as document." : '';
        return $this->defReturn($error);
    }
}