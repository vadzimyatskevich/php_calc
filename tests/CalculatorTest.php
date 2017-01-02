<?php
include ('../src/Calculator.php');

class CalculatorTest extends PHPUnit_Framework_TestCase
{

    public function test1()
    {
        // Arrange
        $a = new Calculator("3*(4-5)/5");
        // Assert
        $this->assertEquals(-0.6, $a->calc());
    }
    public function test2()
    {
        // Arrange
        $a = new Calculator("111.1 * 222.2 + 33 ");
        // Assert
        $this->assertEquals(24719.42, $a->calc());
    }
    
    public function test3()
    {
        // Arrange
        $a = new Calculator("45 + 6 * 7 ");
        // Assert
        $this->assertEquals(87, $a->calc());
    }
    
    public function test4()
    {
        // Arrange
        $a = new Calculator("0.2 + ((3*(4-2.5))/5)*2 -0.25*(25-30.47)");
        // Assert
        $this->assertEquals(3.3675, $a->calc());
    }

}