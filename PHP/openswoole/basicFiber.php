<?php

// Iterators and generators(iterators but this prevetns  using memory aheead of time, and uses yield)
// Fibers have there call backs, meaning that we can suspend a activity and resume it later

$fiber = new Fiber(function():void  { // array functions,
$value = Fiber::suspend("\n".'This is cool we can stop something lets a function or a class');
echo "Value used to resume fiber ". $value.PHP_EOL;
});
$res = $fiber->start();
echo "Value from fiber suspending".$value.PHP_EOL;


