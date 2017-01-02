<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'src/Calculator.php';


$calc = new Calculator($argv[1]);
var_dump($calc->calc());
