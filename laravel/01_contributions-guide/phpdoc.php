<?php

require __DIR__ . "/../lib/src/helpers.php";

class Calculator {
    /**
    * Sum two numbers
    *
    * @param int|float $a
    * @param int|float $b
    * @return int|float
    */
    public function sum($a, $b) {
        return $a + $b;
    }
    /**
    * Subtract two numbers
    */
    public function sub(int|float $a, int|float $b): int|float {
        return $a - $b;
    }

    /**
    * Divide tow numbers;
    *
    * @return array<int|float, int|float>
    *
    * @throws Exception
    */
    public function div(int|float $a, int|float $b): array {
        if ($b === 0) {
            throw new Exception("Can't divide by zero");
        }

        $result = $a / $b;
        $reminder = $a % $b;

        return [$result, $reminder];
    }
}

$calculator = new Calculator();

dump($calculator->sum(2, 5));
dump($calculator->sub(7, 5));
dump($calculator->div(7, 5));
