<?php
// Load vendors
include 'vendor/autoload.php';
include 'long.php';

Errors::capture();
Errors::mode(Errors::HTML);
Errors::onAny(function($exception){
  syslog(LOG_WARNING,$exception->getMessage());
  echo $exception->getMessage();  
});

Route::on('/',function(){
	echo doTheThing();
});

// Dispatch route
Route::dispatch();

// Send response to the browser
Response::send();

?>