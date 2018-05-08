<?php
include(dirname(__FILE__).'/../student/connection.php');
$id=$_GET["id"];

$a=date("d-M-y");
//     mysqli_query($link,"UPDATE add_book SET available_qty = available_qty-1 WHERE books_name ='$_POST[book_name]'")or die("Query failed: " . mysqli_error());

$res=mysqli_query($link,"UPDATE issue_book SET book_return_date = '$a' WHERE id =$id")or die("Query failed: " . mysqli_error());
$books_name="";
$res=mysqli_query($link,"select * from issue_book  WHERE id =$id")or die("Query failed: " . mysqli_error());
while($row=mysqli_fetch_array($res))
{
    $books_name=$row["book_name"];
}
 mysqli_query($link,"UPDATE add_book SET available_qty = available_qty+1 WHERE books_name ='$books_name'")or die("Query failed: " . mysqli_error());

?>
<script type="text/javascript">
window.location="return_book.php";
</script>