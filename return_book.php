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
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" method="post" name="form1">
                               <table class="table table-bordered">
                                     <tr>
                                   <td>
                                    <select name="abc"   class="form-control">
                                       <?php
                                             $res= mysqli_query($link,"select student_enrollement from issue_book where book_return_date=''");
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                        echo"<option>";
                                                        echo $row["student_enrollement"];
                                                        echo"<option>";
                                                    }
                                                    ?>
                                    </select>
                                    </td> 
                                    <td>
                                   <input type="submit" name="submit1" value="search" class="btn btn-default" placeholder="enter books name">

                                    </td>
                                    </tr>
                                    </table>
                              
                                </form>   
                                <?php
                                if(isset($_POST["submit1"]))

                               { 
                                    
                                $res= mysqli_query($link,"select * from issue_book where student_enrollement='$_POST[abc]'")or die("Query failed: " . mysqli_error());
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "Student enrollement";  echo "</th>"; 
                                    echo "<th>"; echo "student name";  echo "</th>"; 
                                    echo "<th>"; echo "student sem";  echo "</th>"; 
                                    echo "<th>"; echo "student contact";  echo "</th>"; 
                                    echo "<th>"; echo "student email";  echo "</th>"; 
                                    echo "<th>"; echo "book name ";  echo "</th>"; 
                                    echo "<th>"; echo "book issue date";  echo "</th>"; 
                                    echo "<th>"; echo "book return date";  echo "</th>"; 

                                    echo "<th>"; echo "return book";  echo "</th>"; 

                                    
                                    echo "</tr>";
                                    
                                   while($row=mysqli_fetch_array($res))
                                  {
                                          echo "<tr>";
                                          echo "<td>"; echo $row["student_enrollement"];           echo "</td>";
                                          echo "<td>"; echo $row["student_name"];            echo "</td>";                                         echo "<td>"; echo $row["student_sem"];           echo "</td>";
                                          echo "<td>"; echo $row["student_contact"];       echo "</td>";
                                          echo "<td>"; echo $row["student_email"];           echo "</td>";
                                          echo "<td>"; echo $row["book_name"]; echo "</td>";
                                          echo "<td>"; echo $row["book_issue_date"];           echo "</td>";
                                          echo "<td>"; echo $row["book_return_date"];           echo "</td>";
      echo "<td>"; ?> <a href="return.php?id=<?php echo $row["id"]; ?>" >Return </a> <?php       echo "</td>";
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
<?php include('footer.php'); ?>


        
