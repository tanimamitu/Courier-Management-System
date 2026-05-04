<?php
 include("config.php");
 session_start();
 if (!isset($_SESSION['username'])) {
    header("location: login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Courier Service</title>
</head>
<body>
<header role="banner">
  <h1>RT Courier</h1>
  <ul class="utilities">
    <!--
    <li> 
      <form action="" method="post" > <input type="text" id="" name="query" placeholder="Enter your search query"> 

      </form>  
    </li>
    -->
    <li class="users"><a href="#">My Account</a></li>
    <li class="logout warn"><a href="logout.php">Log Out</a></li>
  </ul>
</header>

<nav role="navigation">
  <ul class="main">
    <li class="dashboard"><a href="dashboard.php">Dashboard</a></li>
    <li class="write"><a href="courier.php">Courier</a></li>
    <li class="user"><a href="order.php">Order</a></li>
    <li class="edit"><a href="tracking.php">Tracking </a></li>
    <li class="users"><a href="customers.php">Customer</a></li>
    <li class="users"><a href="users.php">Users</a></li>
  </ul>
</nav>

<main role="main">