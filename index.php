<?php
    $connection = pg_connect ("host=db dbname=gerador user=postgres password=example");
    if($connection) {
       echo 'connected';
    } else {
        echo 'there has been an error connecting';
    } 
?>