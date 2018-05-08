<!--approve-->
<?php include(dirname(__FILE__).'/../student/connection.php');
$id=$_GET["id"];
mysqli_query($link,"update registration set status='yes' where id=$id");
?>
<script>
window.location="display_setudent_Information.php";
</script>