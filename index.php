<?php

function output()
{
    $count = 0;
    $calculate = function ($numbers) use (&$count, &$calculate) {
        $counter = array_count_values($numbers);
        $getFrequency = function ($value) use (&$counter) {
            return $counter[$value];
        };
        $nextData = array_map($getFrequency, $numbers);
        if ($numbers == $nextData) {
            return array($count, $numbers);
        }
        $count++;
        return $calculate($nextData);
    };
    return $calculate;
}

while (true) {
    $num = trim(fgets(STDIN));
    if ($num == 0) {
        return;
    }
    $line = trim(fgets(STDIN));
    $data = explode(" ", $line);

    $outputFunc = output();
    $numAndResult = $outputFunc($data);
    $num = $numAndResult[0];
    $result = $numAndResult[1];
    echo $num . "\n";
    echo implode(" ", $result) . "\n";
}