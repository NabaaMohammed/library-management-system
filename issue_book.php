<!--issue  book-->
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
                                <h2>Issue Book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                                <select name="enr" class="form-control selectpicker">
                                                   <?php
                                                    $res= mysqli_query($link,"select Enrollement_No from registration");
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                        echo"<option>";
                                                        echo $row["Enrollement_No"];
                                                        echo"<option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" value="search" name="submit1" class="form-control btn btn-default" style="margin-top:5px;  background-color:blue; color:wite;"/>  
                                            </td>
                                        </tr>
                                    </table>
                                <?php
                                if(isset($_POST["submit1"]))
                                {
                                    $res5=mysqli_query($link,"select *from  registration where 
                                    Enrollement_No='$_POST[enr]'");
                                    while($row5=mysqli_fetch_array($res5))
                                    {
                                             $Firstname=$row5["Firstname"];
                                             $Lastname=$row5["Lastname"];    
                                             $Username=$row5["Username"];     
                                             $Email=$row5["Email"]; 
                                             $Contact=$row5["Contact"];  
                                             $SEM=$row5["SEM"]; 
                                             $enrollment=$row5["Enrollement_No"];

                                    }

                                    echo $_POST["enr"];
                                    ?>
                               <table class="table table-bordered">
                                   
                                    <tr>
                                        <td><input type="text"  name="enrollement" class="form-control" placeholder="Enrollement" disabled
                                                   value="<?php  echo $Firstname; ?>" /></td>
                                    </tr> 
                                   
                                   <tr>
                                        <td><input type="text"  name="student_name" class="form-control" placeholder="student_name" required=""
                                                   value="<?php  echo $Lastname; ?>" /></td>
                                    </tr> 
                                   
                                   
                                   <tr>
                                        <td><input type="text"  name="student_sem" class="form-control" placeholder="[student_sem]" required=""
                                                   value="<?php  echo $Username; ?>"/></td>
                                    </tr> 
                                   
                                   
                                   <tr>
                                        <td><input type="text"  name="student_contact" class="form-control" placeholder="student_contact" required=""
                                                   value="<?php  echo $Email; ?>"/></td>
                                    </tr> 
                                   
                                   
                                   <tr>
                                        <td><input type="text"  name="student_email" class="form-control" placeholder="student_email" required=""
                                                   value="<?php  echo $Contact; ?>"/></td>
                                    </tr> 
                                   
                                   
                                   <tr>
                                        <td>
                                          <select  name="book_name"  class="form-control selectpicker">
                                          <?php
                                                    $res= mysqli_query($link,"select books_name from add_book ");
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                        echo"<option>";
                                                        echo $row["books_name"];
                                                        echo"<option>";
                                                    }
                                                    ?>
                                       </td>
                                    </tr> 
                                   
                                   
                                   <tr>
                                        <td><input type="text"  name="book_issue_date" class="form-control" placeholder="book_issue_date" required="" value="<?php  echo $SEM; ?>" /></td>
                                    </tr> 
                                   
                                   
                                   <tr>
                                        <td><input type="text"  name="book_return_date" class="form-control" placeholder="book_return_date" required="" value="<?php  echo date("d/M/Y"); ?>" /></td>
                                    </tr> 
                                   
                                   
                                   <tr>
                                        <td><input type="text"  name="student_username" class="form-control" placeholder="student_username" disabled/></td>
                                    </tr> 
                                   
                                   <tr>
                                        <td><input type="submit" name="submit2"  class="form-control btn btn-default" style="background-color:blue; color:white;"  value="issue book"></td>
                                    </tr> 
                                   
                                    </table>
                                    <?php } ?>
                                   
                                   </form>
                                
                                   <?php 
                                if(isset($_POST["submit2"]))
                                {
                                    $qty=0;
                                  $res=mysqli_query($link,"select * from add_book  WHERE books_name ='$_POST[book_name]' ");
                                  while($row=mysqli_fetch_array($res))
                                  {
                                      //$row["Firstname"];
                                    $qty=$row["available_qty"]; 
                                  }
                                    if($qty!=0)
                                    {
                                         mysqli_query($link,"insert into issue_book values ('',
                                        '$enrollement',
                                        '$_POST[student_name]',
                                        '$_POST[student_sem]',
                                        '$_POST[student_contact]',
                                        '$_POST[student_email]',
                                        '$_POST[book_name]',
                                        '$_POST[book_issue_date]',
                                        '$_POST[book_return_date]',
                                        '$_POST[student_username]'
                                           )"); 

                                        mysqli_query($link,"UPDATE add_book SET available_qty = available_qty-1 WHERE books_name ='$_POST[book_name]'")or die("Query failed: " . mysqli_error());

                                        ?>
                                       <script type="text/javascript">
                                        alert("ok");
                                           window.location.href=window.location.href;
                                        </script>

                                        <?php
                                         
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                            <strong style="color:white">This book is not available </strong> Username Or Password.
                                        </div>
                                        <?php
                                    }
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
