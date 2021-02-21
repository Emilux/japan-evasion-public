<?php
    session_destroy();
    setcookie('JUID', '', time() - 3600, null, null, false, true);
    header('Location: ./');
    exit();
