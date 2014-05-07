<?php
/************************************************************************/
// Cron Mail Path
$path = "http://localhost/myserver/cronmail/";

// Login Password
$password = "campus@123";

/************************************************************************/
// Connecting to newsletter database //

$newsdb = "cronmail";					// Newsletter Database
$newshost = "localhost";				// Newsletter Host
$newsuser = "root";						// Newsletter User
$newspass = "";							// Newsletter Password


// Definition of mail limit //
$limit = "700";							// Define the mail limit of your server 
										// (Eg: 500 mails/hour or 1000 mails/hour)

/************************************************************************/

// Connecting to email id database (Elgg) //

$emaildb = "campus";					// Elgg Database
$emailhost = "localhost";				// Elgg Host
$emailuser = "root";					// Elgg User
$emailpass = "";						// Elgg Password


// Definition of email table database //

$emailtable = "elgg_users_entity";		// Elgg table that stored email ids
$emailatt = "email";					// Attribute name in the elgg table

/************************************************************************/
// Setup the name and email if to send the mail //
$from = "Campus Karma";					// Name of the Organization
$from_email = "no-reply@campuskarma.in";// Email from which the mail will be sent
$test_email = "rohit.1290@gmail.com"; // Email used for send testing mail

/************************************************************************/
?>