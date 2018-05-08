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
include(dirname(__FILE__).'/../student/connection.php');
 include('header.php') 
?>
<!--display student indormation-->
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
                                <?php
                                    $res=mysqli_query($link,"select *from  registration");

                                    echo "<table class='table table-striped table-dark table-bordered table-hover table-dark table-responsive'>";

                                    echo "<tr>";
                                    echo "<th>"; echo "first name";echo "</th>";
                                    echo "<th>"; echo "last name";echo "</th>";
                                    echo "<th>"; echo "username";echo "</th>";
                                    echo "<th>"; echo "Email";echo "</th>";
                                    echo "<th>"; echo "contact";echo "</th>";
                                    echo "<th>"; echo "sem";echo "</th>";
                                    echo "<th>"; echo "Enrollement";echo "</th>";
                                    echo "<th>"; echo "status";echo "</th>";
                                    echo "<th>"; echo "Approve";echo "</th>";
                                    echo "<th>"; echo "Disapprove";echo "</th>";

                                    echo "</tr>";
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        
                                    echo "<tr>";
                                    echo "<td>"; echo $row["Firstname"];    echo "</td>";
                                    echo "<td>"; echo $row["Lastname"];          echo "</td>";
                                    echo "<td>"; echo $row["Username"];           echo "</td>";
                                    echo "<td>"; echo $row["Email"];            echo "</td>";
                                    echo "<td>"; echo $row["Contact"];           echo "</td>";
                                    echo "<td>"; echo $row["SEM"];;                echo "</td>";
                                    echo "<td>"; echo $row["Enrollement_No"];       echo "</td>";
                                    echo "<td>"; echo $row["status"];           echo "</td>";
                                    echo "<td>"; ?>    <a href="approve.php?id=<?php echo $row["id"];?>" > APPROVE    </a> <?php echo "</td>";
                                    echo "<td>"; ?> <a href="notapprove.php?id=<?php  echo $row["id"];?>" >NOT APPROVE </a> <?php echo "</td>";


                                    echo "</tr>";
                                    }
                                    echo "</table>";
                                ?>
                                
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php include('footer.php') ?>


        
