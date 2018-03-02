
# CsvParser for PHP 

## Introduction

A simple system for parsing CSV-files row by row and sending the data to a callback function.


## Example

```php

  use CsvParser\Simple;


  function handler ( $data ) {
  	print_r( $data );
  }

  /* 
  
  Parameters for parseRowByRow: 
  
   * @param string  $filename  File to parse
	 * @param string  $callback  Callback function to send data to
	 * @param int     $line      Length - Must be greater than the longest line (in characters) to be found in the CSV file (allowing for trailing line-end characters).
	 * @param str     $delimiter Set the field delimiter (one character only).
	 * @param str     $enclosure Set the field enclosure character (one character only)
	 * @param type    $escape    Set the escape character (one character only). Defaults as a backslash.
     * @param bool    $autoDetectHeader Try to auto detect header rows - if false, line 1 i always used
	 * @return bool
 */

  
  Simple::parseRowByRow('file.csv' ,'handler');

```


## History

2014-07-23 Ver 0.1.3	- Quick hack, initial release
2015-08-27 Ver 0.1.4 	- Updated README with example code
2018-03-02 Ver 0.2      - Attempt to auto detect if first row of file doesn't have the correct header info. 

