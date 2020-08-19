<?php

//String Function in PHP

/**
 * chr() 
 * you can pass decimal, octal or hex value to convert it into ASCII value
 * 
 * ord() Return the ASCII value of "h"
 * echo ord("h")."<br>";
 * echo ord("hello")."<br>";
 * 
 * htmlspecialchars(string)
 * $str = "This is some <b>bold</b> text.";
 * echo htmlspecialchars($str);
 * 
 * implode(separator,array) or join(separator,array)
 * Join array elements with a string:
 * $arr = array('Hello','World!','Beautiful','Day!');
 * echo implode(" ",$arr);
 * 
 * parse_str(string,array)
 * Store the variables in an array:
 * parse_str("name=Peter&age=43",$myArray);
 * print_r($myArray);
 * 
 * ucfirst(string), lcfirst, ucwords
 * 
 * substr(string,start,length)
 * 
 * strpos(string,find,start) first occurance of string case sensitive
 * stripos  - case insensitive
 * strrpos  - last occurance of string case sensitive
 * strripos - last occurance of string case insensitive
 * 
 * strlen(string)
 * 
 * trim(string), ltrim, rtrim
 * 
 * str_replace(find,replace,string,count)
 * 
 */

?>