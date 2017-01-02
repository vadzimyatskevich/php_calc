<?php

/**
 * Description of Calculator
 * based on http://stackoverflow.com/questions/928563/evaluating-a-string-of-simple-mathematical-expressions
 * @author vadzim
 */
class Calculator {
    private $formula;
    
    /**
     * 
     * @param type $input
     */
    function __construct($input) {
        $this->formula = preg_replace('/\s+/', '', $input);
    }
    
    
    /**
     * Walk through nesting depth
     * @param type $m
     * @return type
     */
    private function callback1($m) {
        $ret = $m[1];
        return $this->calculator($ret);
    }
    
    /**
     * Calculate simple operations
     * @param type $n
     * @param array $m
     * @return type
     */
    private function callback2($n, $m) {
        $o=$m[0];
        $m[0]=' ';
        return $o =='*' ? ($n*$m) : ($o=='/' ? ($n/$m) : ($o=='+' ? ($n+$m) : ($n-$m)));
    }
    
    /**
     * 
     * @param type $input
     * @return type
     */
    private function callback3($input) {
        preg_match_all('![-+/*].*?[\d.]+!',"+$input[0]", $m);
        $result = array_reduce($m[0], Array($this, "callback2"));
        return $this->calculator($result);
    }
    
    /**
     * Recursively process input, find most neested block and calculate
     * @param type $input
     * @return type
     */
    private function calculator($input){ 
        // remove parentheses
        while ($input != ($tmp = preg_replace_callback('/\(([^()]*)\)/', Array($this, 'callback1'), $input))){
            $input=$tmp;
        }
        // compute high priority operations
        while ($input != ($tmp = preg_replace_callback('![\d.]+[/*].*?[\d.]+!', Array($this, 'callback3'), $input, 1))){
            $input=$tmp;
        }
        // compute others
        preg_match_all('![-+/*].*?[\d.]+!',"+$input", $m);
        $result = array_reduce($m[0], Array($this, "callback2"));
        return $result;
    }
    
    /**
     * 
     */
    public function calc(){
        $result = $this->calculator($this->formula);
        return $result;
    }
}
