<?php
/* 
 */

include 'src/Calculator.php';


$calc = new Calculator($argv[1]);
var_dump($calc->calc());
