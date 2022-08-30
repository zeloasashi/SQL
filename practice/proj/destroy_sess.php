<?php
session_start(); //初始化，用這個才能使用$session
session_destroy();

echo 'OK';