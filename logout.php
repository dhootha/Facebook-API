<?php
session_start();
require 'src/facebook.php';

$facebook = new Facebook(array(
    'appId' => '291284351041314',
    'secret' => '58c2698530ffd5714ebccd43d56105e6'
));

$facebook->destroySession();

session_destroy();

header('Location: index.php');
