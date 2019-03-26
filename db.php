<?php
    $db = new mysqli("localhost","admin","admin");
    $db->query("CREATE DATABASE IF NOT EXISTS escapenarcos");
    $db = new mysqli("localhost","admin","admin","escapenarcos");
    $db->set_charset("utf8");
    $db->query("CREATE TABLE IF NOT EXISTS users (pseudo varchar(50) PRIMARY KEY,password varchar(50))");
    $db->query("CREATE TABLE IF NOT EXISTS teams (id INT PRIMARY KEY, player1 varchar(50), player2 varchar(50), player3 varchar(50), player4 varchar(50))");
    $db->query("CREATE TABLE IF NOT EXISTS games (id INT PRIMARY KEY, date DATE, team INT, times varchar(500))");
    $gmpassvalue = "pablo-escobar";
?>