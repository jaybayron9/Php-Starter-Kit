<?php 

use Auth\Auth;

Auth::check_user_auth($_SESSION['admin_id'], '?vs=$admin.lock')

?>