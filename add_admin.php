<?php include("header.php");?>



<section class="panel important">
    <h2>Create New User</h2>
    <form action="add_admin.php" method="POST" >
        <div class="twothirds">

            <label for="name">UserName</label>

            <input type="text" name="name" id="name" placeholder=""  require/>

            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="" require/>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" placeholder="" require/>
            <label for="role">Select Role</label>
            <select name="role" id="role">
            <option value="Admin">Admin</option>
            <option value="User">user</option>
            </select>
        </div>
        <div class="onethird">
            <div>
            <input type="submit" value="Submit" />
            </div>
        </div>
    </form>

</section>

<?php include("footer.php");?>

<?php 

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["name"] ;
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $role = $_POST["role"];

    $sql = "INSERT INTO users (username,email, password, role) VALUES ( '$username', '$email', '$hashedPassword','$role' ) ;";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();


?>