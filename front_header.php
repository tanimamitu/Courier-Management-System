<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
      *{
    padding: 0px;
    margin:0px;
}
.main-container{
    margin:0px;
    padding: 0px;
    
    min-width: 100vw;
    min-height: 100vh;
    position: relative;
}
.blur-circle1{
    width: 200px;
    height: 200px;
    background: linear-gradient(to bottom,white,pink);
    border-radius: 50%;
    filter:blur(120px);
    position: absolute;
    left: 10%;
    top:20%;
    /* transform: translate(50%); */
}
.blur-circle2{
    width: 200px;
    height: 200px;
    background: linear-gradient(to bottom,white,pink);
    border-radius: 50%;
    filter:blur(100px);
    position: absolute;
    right: 10%;
    top:20%;
    /* transform: translate(50%); */
}
body {
    font-family: 'Open Sans', sans-serif;
  }
  a {
    text-decoration: none;
    color: black;
  }
  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .container {
    padding-left: 15px;
    padding-right: 15px;
    margin-left: auto;
    margin-right: auto;
  }
  /* Small */
  @media (min-width: 768px) {
    .container {
      width: 750px;
    }
  }
  /* Medium */
  @media (min-width: 992px) {
    .container {
      width: 970px;
    }
  }
  /* Large */
  @media (min-width: 1200px) {
    .container {
      width: 1170px;
    }
  }
  /* End Global Rules */
  
  /* Start Landing Page */
  .landing-page header {
    min-height: 80px;
    display: flex;
  }
  @media (max-width: 767px) {
    .landing-page header {
      min-height: auto;
      display: initial;
    }
  }
  .landing-page header .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  @media (max-width: 767px) {
    .landing-page header .container {
      flex-direction: column;
      justify-content: center;
    }
  }
  .landing-page header .logo {
    color: #5d5d5d;
    font-style: italic;
    text-transform: uppercase;
    font-size: 20px;
  }
  @media (max-width: 767px) {
    .landing-page header .logo {
      margin-top: 20px;
      margin-bottom: 20px;
    }
  }
  .landing-page header .links {
    display: flex;
    align-items: center;
  }
  @media (max-width: 767px) {
    .landing-page header .links {
      text-align: center;
      gap: 10px;
    }
  }
  .landing-page header .links li {
    margin-left: 30px;
    color: #5d5d5d;
    cursor: pointer;
    transition: .3s;
  }
  @media (max-width: 767px) {
    .landing-page header .links li {
      margin-left: auto;
    }
  }
  .landing-page header .links li:last-child {
    border-radius: 20px;
    padding: 10px 20px;
    color: #FFF;
    background-color: #f7b256e6;
  }
  .landing-page header .links li:not(:last-child):hover {
    color: #6c63ff;
  }
  .landing-page .content .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 140px;
    min-height: calc(100vh - 80px);
  }
  @media (max-width: 767px) {
    .landing-page .content .container {
      gap: 0;
      min-height: calc(100vh - 101px);
      justify-content: center;
      flex-direction: column-reverse;
    }
  }
  @media (max-width: 767px) {
    .landing-page .content .info {
      text-align: center;
      margin-bottom: 15px 
    }
  }
  .landing-page .content .info h1 {
    color: black ;
    font-size: 44px;
  }
  .landing-page .content .info p {
    margin: 0;
    line-height: 1.6;
    font-size: 15px;
    color: black;
  }
  .landing-page .content .info button {
    border: 0;
    border-radius: 20px;
    padding: 12px 30px;
    margin-top: 30px;
    cursor: pointer;
    color: #FFF;
    background-color: #f7b256e6;
  }
  .landing-page .content .image img {
    max-width: 100%;
  }
  /* End Landing Page */

  .main-image{
    /* mix-blend-mode:exclusion */
    width: 600px;
    height: 400px;
  }
   h1,p{
    color: black ;
  }  
        .customercontainer {
            width: 600px;
            margin: 2rem auto;
            text-align: center;
        }

        .customercontainer  input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        .customercontainer button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .customercontainer button:hover {
            background-color: #0056b3;
        }
        .bt{
            margin-top: 20px;;
        }
        table {
        border-collapse: collapse;
        }
        th {
        background: #ccc;
        text-align:left;
        }

        th, td {
        border: 1px solid #ccc;
        padding: 8px;
        }

        tr:nth-child(even) {
        background: #efefef;
        }

        tr:hover {
        background: #d1d1d1;
        }

    </style>

</head>
<body>
<div class="main-container">
        <div class="blur-circle1">

        </div>
        <div class="blur-circle2">

        </div>
          <!-- Start Landing Page -->
      <div class="landing-page">
        <header>
          <div class="container">
            <a href="index.php" class="logo">RT <b>Courier</b></a>
            <ul class="links">
              <li><a href="index.php">Home </a></li>
              <li><a href="customer_details.php"> Coustomer </a></li>
              <li><a href="tracking_order.php">Track order</a></li>
              <li><a href="about.php">About us</a></li>
              <li><a href="login.html">login</a> </li>
            </ul>
          </div>
        </header>

        <div class="content">