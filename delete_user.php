<?php include('header.php') ?>

<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
?>
<section class="panel important">
 <h3> Are sure to dalete ? </h3> 
 <a href='confirm_delete.php?id=<?php echo $id ?>' class="redbtn"> Delete </a>
</section> 

<?php
} else {
    echo "No user ID specified";
}
$conn->close();
?>


<?php include("footer.php");?>