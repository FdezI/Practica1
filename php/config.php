<?php

// --- Sections configurations --- //
// Category
$articles_per_category_left = 3;
$articles_per_category_center = 3;
$articles_per_category_top = 1;
$category_adds = 5;

// Home
$articles_in_home_left = 5;
$articles_in_home_center = 5;
$home_adds = 2;

// Modules
$articles_in_lastnews = 6;
$articles_in_relatednews = 7;

//Comments
$comments_per_page = 10;

// --- Database config ---
// Conection and tables
define("DB_DSN", "mysql:host=localhost;dbname=periodico" ); 
define("DB_USER", "adminsyRbICJ" ); 
define("DB_PASSWORD", "VCe1Jt4ne-da" );
define("DB_USERS_TB", "Users");
define("DB_NEWS_TB", "News");
define("DB_LASTNEWS_TB", "LastNews");
define("DB_COMMENTS_TB", "Comments");


// Table DB_USERS_TB
define("DB_USERS_TB_USERNAME", "UserName");
define("DB_USERS_TB_EMAIL", "Email");
?>
