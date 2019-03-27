<?php
    $db = new mysqli("localhost","admin","admin");
    $db->query("CREATE DATABASE IF NOT EXISTS escapenarcos");
    $db = new mysqli("localhost","admin","admin","escapenarcos");
    $db->set_charset("utf8");
    $db->query("CREATE TABLE IF NOT EXISTS users (pseudo varchar(50) UNIQUE PRIMARY KEY, password varchar(50), gmpass varchar(50))");
    $db->query("CREATE TABLE IF NOT EXISTS teams (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, player1 varchar(50), player2 varchar(50), player3 varchar(50), player4 varchar(50), playing INT)");
    $db->query("CREATE TABLE IF NOT EXISTS messages (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, date datetime, game INT, team INT, message varchar(1000), answer varchar(1000))"); 
    $gmpassvalue = "pablo-escobar";
?>