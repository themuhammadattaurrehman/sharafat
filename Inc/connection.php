<?php

//  $GLOBALS['conn'] = $conn = mysqli_connect("localhost", "root", "", "notes_count");
 $GLOBALS['conn'] = $pdo = new PDO("mysql:host=localhost;dbname=notes_count", "root", "");
//  $GLOBALS['conn'] = $pdo = new PDO("mysql:host=localhost;dbname=id21594010_notescount", "id21594010_sharafat", "1@Atta5198");
// $GLOBALS['conn'] = mysqli_connect("premium34.web-hosting.com", "hzcotfyp_p1sla_admin_user", "c2t6tE3tK@zgaBk", "hzcotfyp_p1sla");

 $GLOBALS['root'] = "/sharafat/";
// $GLOBALS['root'] = "/";
?>