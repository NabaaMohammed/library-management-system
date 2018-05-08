<?php 
session_start();
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
                                <h2>My Issue Book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                
                                     <?php
                                     $res=mysqli_query($link,"select * from  issue_book  
                                     where student_username ='$_SESSION[username]'")or die("Query failed: " . mysqli_error());;
                                      echo "<table class='table table-striped   table-bordered table-hover   table-responsive'>";

                                    echo "<tr>";
                                    echo "<th>"; echo "student_enrollement";echo "</th>";
                                    echo "<th>"; echo "book_name";echo "</th>";

                                    echo "<th>"; echo "book_issue_date";echo "</th>";
                                    

                                    while($row=mysqli_fetch_array($res))
                                    {
                                        
                                    echo "<tr>";
                                        
                                    echo "<td>"; echo $row["student_enrollement"];    echo "</td>";
                                   
                                    echo "<td>"; echo $row["book_name"];       echo "</td>";
                                    echo "<td>"; echo $row["book_issue_date"];       echo "</td>";
                                    }
                                   echo"</table>"; 
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php include('footer.php') ?>


        
