<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use CsvParser\Simple;


function handler($data) {
	echo "yay, got this!\n";
	print_r($data);
}

Simple::parseRowByRow('data/Sacramentorealestatetransactions.csv','handler');
