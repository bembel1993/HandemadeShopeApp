<?php
session_start();
   session_destroy();
   header("Location: indexMain.php");
        exit();
