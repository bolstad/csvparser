
# CsvParser for PHP 

## Introduction

A simple system for parsing CSV-files row by row and sending the data to a callback function.


## Example

```php

  use CsvParser\Simple;

  function handler ( $data ) {
  	print_r( $data);
  }

  Simple::parseRowByRow('file.csv' ,'handler');

```


## History

2014-07-23 Ver 0.1 		- Quick hack, initial release
2015-08-27 Ver 0.1.1 	- Updated README with example code
