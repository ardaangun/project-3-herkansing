<?php

session_start();
session_unset();
session_destroy();

header("location: ../user/inlog.php");
exit();