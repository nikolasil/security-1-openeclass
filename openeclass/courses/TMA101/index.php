<?php
include_once '../../kerberosclan/csrf_utils.php';
                session_start();
        $dbname="TMA101";
        session_register("dbname");
                        
        // //Generate CSRF Token
        // $token = obtain_csrf_token();
        // echo $token;
        // //Check CSRF Token
        // if(compare_csrf_tokens($_GET['csrf_token'])) {
        //         echo '\n equal tokens';
        // }
        // else {
        //         echo '\n not equal tokens';
        // }
        
        include("../../modules/course_home/course_home.php");
        ?>