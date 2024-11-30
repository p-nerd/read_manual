<?php

require __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Caster\ScalarStub;

if (!function_exists('dump')) {
    function dump(mixed ...$vars): mixed
    {
        if (!$vars) {
            VarDumper::dump(new ScalarStub('🐛'));

            return null;
        }

        if (array_key_exists(0, $vars) && 1 === count($vars)) {
            VarDumper::dump($vars[0]);
            $k = 0;
        } else {
            foreach ($vars as $k => $v) {
                VarDumper::dump($v, is_int($k) ? 1 + $k : $k);
            }
        }

        if (1 < count($vars)) {
            return $vars;
        }

        return $vars[$k];
    }
}

