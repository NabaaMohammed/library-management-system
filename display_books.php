<!--display book-->
<?php 
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
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post">
                                <input type="text" name="t1" class="form-control">
                                <input type="submit" name="submit1" value="search" class="btn btn-default" placeholder="enter books name">
                                       </form>
                               Display books
                                <?php
                                if(isset($_POST["submit1"]))
                                {
                                    $res=mysqli_query($link,"select *from  add_book where books_name like('$_POST[t1]%')");
                                echo "<table class='table table-striped   table-bordered table-hover   table-responsive'>";

                                    echo "<tr>";
                                    echo "<th>"; echo "Books Name";echo "</th>";
                                    echo "<th>"; echo "Books Image";echo "</th>";

                                    echo "<th>"; echo "Books Aurhter Name";echo "</th>"; 
                                    echo "<th>"; echo "Books Publication Name";echo "</th>";
                                    echo "<th>"; echo "Books Purchase Name";echo "</th>";
                                    echo "<th>"; echo "Books Price";echo "</th>";
                                    echo "<th>"; echo "Books QTY";echo "</th>";
                                    echo "<th>"; echo "Available QTY";echo "</th>";
                                    echo "<th>"; echo "Delete Book";echo "</th>";
                                    echo "<th>"; echo "Librarian Username";echo "</th>";
                                    
                                    echo "</tr>";
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        
                                    echo "<tr>";
                                    echo "<td>"; echo $row["books_name"];    echo "</td>";
                                    echo "<td>"; ?> <img src="<?php echo $row["book_images"]; ?>" height="100px" wid="100px" >   <?php echo "</td>";
                                    echo "<td>"; echo $row["books_auther_name"];           echo "</td>";
                                    echo "<td>"; echo $row["books_publication_name"];            echo "</td>";
                                    echo "<td>"; echo $row["books_purchase_date"];           echo "</td>";
                                    echo "<td>"; echo $row["books_price"];       echo "</td>";
                                    echo "<td>"; echo $row["books_qty"];           echo "</td>";
                                    echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                 echo "<td>"; ?> <a href="delete_book.php?id=<?php echo $row["id"]; ?>">Delete Book</a><?php echo "</td>";
                                    echo "<td>"; echo $row["librarian_username"];           echo "</td>";

                                    
                                    echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                else{
                                    $res=mysqli_query($link,"select *from  add_book");
                                echo "<table class='table table-striped   table-bordered table-hover   table-responsive'>";

                                    echo "<tr>";
                                    echo "<th>"; echo "Books Name";echo "</th>";
                                    echo "<th>"; echo "Books Image";echo "</th>";

                                    echo "<th>"; echo "Books Aurhter Name";echo "</th>";
                                    echo "<th>"; echo "Books Publication Name";echo "</th>";
                                    echo "<th>"; echo "Books Purchase Name";echo "</th>";
                                    echo "<th>"; echo "Books Price";echo "</th>";
                                    echo "<th>"; echo "Books QTY";echo "</th>";
                                    echo "<th>"; echo "Available QTY";echo "</th>";
                                    echo "<th>"; echo "Delete Book";echo "</th>";
                                    echo "<th>"; echo "Librarian Username";echo "</th>";
                                    
                                    echo "</tr>";
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        
                                    echo "<tr>";
                                    echo "<td>"; echo $row["books_name"];    echo "</td>";
                                    echo "<td>"; ?> <img src="<?php echo $row["book_images"]; ?>" height="100px" wid="100px" >   <?php echo "</td>";
                                    echo "<td>"; echo $row["books_auther_name"];           echo "</td>";
                                    echo "<td>"; echo $row["books_publication_name"];            echo "</td>";
                                    echo "<td>"; echo $row["books_purchase_date"];           echo "</td>";
                                    echo "<td>"; echo $row["books_price"];       echo "</td>";
                                    echo "<td>"; echo $row["books_qty"];           echo "</td>";
                                    echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                    echo "<td>"; ?> <a href="delete_book.php?id=<?php echo $row["id"]; ?>">Delete Book</a><?php echo "</td>";
                                    echo "<td>"; echo $row["librarian_username"];           echo "</td>";

                                    
                                    echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php include('footer.php') ?>


        
