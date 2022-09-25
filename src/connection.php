<?php
$config = [
    'server'=>'localhost',
    'dbname'=>'bwt_task',
    'user'=>'root',
    'password'=>'root'
];
try {
    $connection = new PDO("mysql:host={$config['server']};dbname={$config['dbname']}",
        $config['user'],$config['password']);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

