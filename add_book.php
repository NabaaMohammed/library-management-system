<?php
//add book
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}

include('header.php'); 
include(dirname(__FILE__).'/../student/connection.php');

?>
                <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                   <table class="table table-bordered">
                                <tr><td><input type="text"  name="books_name" class="form-control" placeholder="book-Name" required=""/></td> </tr>
                   Books Image  <tr><td><input type="file"  name="fi" required=""/></td> </tr>
  <tr><td><input type="text"  name="aurther_name" class="form-control" placeholder="books Aurther Name" required=""/></td> </tr>
  <tr><td><input type="text"  name="publication_name" class="form-control" placeholder="books Publication Name" required=""/></td> </tr>      
  <tr><td><input type="text"  name="purchase_name" class="form-control" placeholder="books Purchase Name" required=""/></td> </tr>
  <tr><td><input type="text"  name="price" class="form-control" placeholder="books Price" required=""/></td> </tr>
  <tr><td><input type="text"  name="qty" class="form-control" placeholder="books QTY" required=""/></td> </tr>
  <tr><td><input type="text"  name="available_qty" class="form-control" placeholder="Available QTY" required=""/></td> </tr>
  <tr><td><input type="text"  name="librarian_username" class="form-control" placeholder="Librarian_Username" required=""/></td> </tr>
<td><input type="submit" name="submit1"class="btn btn-default submit" value="insert book details" style="background-color:blue; color:white;"/></td>
                                       
                                </table>
                                </form>
                             
                                Add content to the page ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
if(isset($_POST["submit1"])){
     $tm=md5(time());
    $fnm=$_FILES["fi"]["name"];
    $dst="./book_images/".$tm.$fnm;
    $dst1="book_images/".$tm.$fnm;
    move_uploaded_file($_FILES["fi"]["tmp_name"],$dst);
    
    
    mysqli_query($link,"insert into add_book value ('',
    '$_POST[books_name]',
    '$dst1 ',
    '$_POST[aurther_name]',
    '$_POST[purchase_name]',
    '$_POST[publication_name]',
    '$_POST[qty]',
    '$_POST[price]',
    '$_POST[available_qty]',
    '$_POST[librarian_username]'
       )");
    ?>
<script type="text/javascript">
alert("successful");
</script>
<?php
    
}
?>

/*

    */
    
 
<?php include('footer.php'); ?>
