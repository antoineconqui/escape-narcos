<?php
    $conn = new mysqli("localhost","admin","admin");
    $conn->query("CREATE DATABASE IF NOT EXISTS escapenarcos");
    $conn = new mysqli("localhost","admin","admin","escapenarcos");    
    $conn->query("CREATE TABLE IF NOT EXISTS users (pseudo varchar(50) PRIMARY KEY,password varchar(50))");
    $conn->query("CREATE TABLE IF NOT EXISTS teams (id INT PRIMARY KEY, player1 varchar(50), player2 varchar(50), player3 varchar(50), player4 varchar(50))");
    $conn->query("CREATE TABLE IF NOT EXISTS games (id INT PRIMARY KEY, date DATE, team INT, times varchar(500))");
?>