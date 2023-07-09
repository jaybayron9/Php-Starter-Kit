<?php 

namespace FHandler;

class FHandler {
    public static function upload_image($folder) {  
        $imageName = uniqid() .".png"; 
        $toSave = "$folder/$imageName";
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/storage/$toSave");
        return $toSave;
    }

    public static function delete_image($folder) { unlink("assets/storage/$folder"); }
}