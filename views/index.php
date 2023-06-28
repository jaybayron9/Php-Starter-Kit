<?php include(view('partial', 'navbar')) ?>


<?php 

use DBConn\DBConn;
foreach (DBConn::DBQuery('select * from admins') as $row) {
    echo $row['name'];
};
?>