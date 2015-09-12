<?php 
$db = mysql_connect('localhost', 'nprecords', 'tXfTzWfLU6TPpWTb');
//select the DB
mysql_select_db('records', $db) OR die ('Could not connect to the database. Try again later please.');