<!--disapprove-->

<?php include(dirname(__FILE__).'/../student/connection.php');
$ida=$_GET["id"];
mysqli_query($link,"update registration set status='no' where id=$ida");
?>
<script type="text/javascript">
window.location="display_setudent_Information.php";
</script>