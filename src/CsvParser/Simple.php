<?php
namespace CsvParser;

class Simple {

	/**
	 * Parse a CSV using Php's fgetcsv() and send each rows record to the $callback function
	 *
	 * @param string  $filename  File to parse
	 * @param string  $callback  Callback function to send data to
	 * @param int     $line      Length - Must be greater than the longest line (in characters) to be found in the CSV file (allowing for trailing line-end characters).
	 * @param str     $delimiter Set the field delimiter (one character only).
	 * @param str     $enclosure Set the field enclosure character (one character only)
	 * @param type    $escape    Set the escape character (one character only). Defaults as a backslash.
     * @param bool    $autoDetectHeader Try to auto detect header rows - if false, line 1 i always used
	 * @return bool
	 */
	public function parseRowByRow(
		$filename = '',
		$callback = '',
		$lineLength = 2000,
		$delimiter = ',',
		$enclosure = '"',
		$escape = '\\',
        $autoDetectHeader = 1)
      {

		$foundRows = 0;

		if ( empty( $filename ) || empty( $callback ) )
			throw new \Exception( 'Missing parameters' );

		// Examine the data read by to see if it is using Unix, MS-Dos or Macintosh line-ending conventions.
		ini_set( "auto_detect_line_endings", true );

		$fh = fopen( $filename, 'r' );


		if ($autoDetectHeader) {
            $tcount = 1;
            while ($tcount == 1) {
                if ($header = fgetcsv($fh, $lineLength, $delimiter, $enclosure, $escape)) {
                    $tcount = count($header);
                } else {
                    $tcount =0;
                    return;
                }
            }
        }

        if (!$autoDetectHeader) {
            $header = fgetcsv($fh, $lineLength, $delimiter, $enclosure, $escape);
        }

		$data = array();
		while ( $line = fgetcsv( $fh, $lineLength, $delimiter, $enclosure, $escape ) ) {
			$data = array_combine( $header, $line );
			call_user_func( $callback, $data );
			$foundRows++;
		}

		fclose( $fh );
		return $foundRows;
	}

}
