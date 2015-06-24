<?php

require_once 'vendor/autoload.php';

// Change this to the number of ids you want to generate
$count = 10000;

$bench = new Ubench;
$bench->start();

$hashids = new Hashids\Hashids('4w3s0m3');
for ($i=0; $i <= $count; $i++) {
    $encoded = $hashids->encode($i);
    // var_dump($encoded);
    $decoded = $hashids->decode($encoded);
}

$bench->end();

echo "\n# Hashids\n";
echo sprintf("Time: %s\n", $bench->getTime());
echo "\n============\n";

$bench->start();

$fakeId = new Guidsen\FakeIdentifier\Optimus(15468539, 1296427827, 340274557);
for ($i=0; $i <= $count; $i++) {
    $encoded = $fakeId->encode($i);
    // var_dump($encoded);
    $decoded = $fakeId->decode($encoded);
}

$bench->end();

echo "\n# FakeIdentifier\n";
echo sprintf("Time: %s\n", $bench->getTime());
echo "============\n\n";
