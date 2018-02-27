<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

include_once ROOT . '/components/Db.php';

$db = Db::getConnection();

$k = 100;  // количесво фейковых строк

for ($i = 0; $i<$k; $i++) {

    $f = rand(0, 2);
    $str[] = "('varh{$i}', {$f} , 'vard{$i}')";
}

$str = implode(',', $str);

$mainResult = $db->query('INSERT INTO ordered_act_kpp  (varh, `int1`, vard) VALUES ' . $str .  ';');
