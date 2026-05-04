<!DOCTYPE html>
<html>
    <head>
        <title style="font-size:20px;"> Registry Management </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <style>
            .table{
                padding:10px;
                margin:110px;
            }

            table, th, td {
                border: 1px solid black;
                width:1000px;
                text-align:center;

            }
            p{
                font-family:helvatica;
                font-size:50px;
            }
        </style>

    </head>
    <body>
        <h1>Registry Management System(Student Information)</h1>
    <marquee>Registry Management System</marquee>
    <header><div class="nav">
     <ul>
        <li><a href="http://localhost/rg/main.php">Home</a></li>
        <li><a href="form2.php">Student</a></li>
        <li><a href="http://localhost/rg/view.php">Student View</a></li>
            <li><a href="http://localhost/rg/del.php">Student List</a></li>
            <li><a href="http://localhost/rg/form3.php">Search student</a></li>
            <li><a href="http://localhost/rg/report.php">Report</a></li>
      </ul>
    </header>
    <div class="table"><div id="printableArea">
            <h2 align="center"> Student Data Set </h2>
            <center>
                <table border="1" align="center">
                <!-- comment -->
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "db_stu";
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                echo "<table ><tr><th>ID</th><th>Name</th></tr>";
                
                $sql = "SELECT * FROM tb_stu ";
                $result = mysqli_query($conn,$sql);

                while ($test = mysqli_fetch_array($result)) {
                    $id = $test['ID'];
                    echo "<tr align='center'>";
                    echo"<td><font color='black'>" . $test['ID'] . "</font></td>";
                    echo"<td><font color='black'>" . $test['Name'] . "</font></td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </table></div>
        <input type="button" onclick="printDiv('printableArea')" value="print a div!" />
         <button type="button" onclick="location.href = 'http://localhost/rg/main.php'">Back</button>
            </center>
            
        
        

            <script>
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }</script><br>
           
            </body>
            </html>