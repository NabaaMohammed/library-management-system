<?php
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
include('header.php');
include('connection.php');
// mysqli_query($link,"UPDATE add_book SET available_qty = available_qty-1 WHERE books_name ='$_POST[book_name]'")or die("Query failed: " . mysqli_error());

mysqli_query($link,"UPDATE massages SET reading='y'  WHERE dusername='$_SESSION[username]' ")or die("Query failed: " . mysqli_error());

?>

                <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        
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
                                <h2>Message From Librarian</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class='table table-striped   table-bordered table-hover   table-responsive'>
                                    
                                   <tr>
                                      <th>TITLE </th>
                                    <th>TITLE </th>
                                    <th>MESSAGE</th>
                                      
                                    
                                    </tr>
                                       <?php
                                    
                                       $res=mysqli_query($link,"select * from massages where dusername='$_SESSION[username]' order by id desc ")or die("Query failed: " . mysqli_error());
                                    //
                                        while($row=mysqli_fetch_array($res))
                                       {
                                           $res1=mysqli_query($link,"SELECT * FROM  `librarian registration` WHERE Username='$row[susername]'")or die("Query failed: " . mysqli_error());
                                           //
                                           while($row1=mysqli_fetch_array($res1))
                                           {
                                               $fullname=0;
                                               $fullname=$row1["First Name"]." ".$row1["Last Name"];
                                           }
                                           echo "<tr>";
                                        echo "<td>"; echo $fullname; echo "</td>";
                                          echo "<td>"; echo $row["title"]; echo "</td>";
                                           echo "<td>"; echo $row["msg"]; echo "</td>";
                                           echo "</tr>";
                                       }
                                       ?>
                                     
                                </table>
                                Add content to the page ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php include('footer.php') ?>


        
