<?php 

//Base urls
$config["google"]["baseUrl"] 	= "https://www.google.com.br/search?q=";
$config["bing"]["baseUrl"] 		= "http://www.bing.com/search?q=";
$config["yahoo"]["baseUrl"] 	= "https://search.yahoo.com/search?p=";

//Pagination property
$config["google"]["pageProperty"]	= "start";
$config["bing"]["pageProperty"]		= "count";
$config["yahoo"]["pageProperty"] 	= "n";

//Xpath to the url element inside HTML search page
$config["google"]["xpath"]	= "//div[@id='search']//div[@class='kv']//cite";
$config["bing"]["xpath"]	= "//li[@class='b_algo']//cite";
$config["yahoo"]["xpath"] 	= "//div[@id='web']//div[contains (@class, 'compTitle')]//div";

?>