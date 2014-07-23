<?php
namespace CsvParser;

class Simple {
	public function parseRowByRow( $filname = '', $callback = '' ) {
		if (empty($filname) || empty($callback)) 
	        throw new \Exception('Missing parameters');
		echo "hi\n";
	}

}
