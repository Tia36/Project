<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>

<!DOCTYPE html>
<html>

<body>

<?php
   include("data_class.php");
    ?>

  <div class="rightinnerdiv">   
            <div id="requestdevice" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Request Device</Button>
            <center>
            <h1>Search By Catagory</h1>
            <form method="POST">
                <select name="category">
                    <option selected disabled>--select--</option>
                    <option value="Register">Register</option>
                     <option value="Power_Supply">Power_Supply</option>
                      <option value="Display">Display</option>
                       <option value="Measurer">Measurer</option>
                       <option value="Arduino">Arduino</option>
                </select>
                <input type="submit" name="csubmit" value="Click"/>
            </form>
                </center>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getdeviceissue();
            $recordset=$u->getdeviceissue();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Image</th><th>Device Name</th><th>Device Category</th></th><th>Request Device</th></tr>";
            
                $getvalue=$_POST['category'];
                 foreach($recordset as $row){
                if($getvalue==$row[6]){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
               $table.="<td>$row[2]</td>";
               $table.="<td>$row[6]</td>";
               $table.="<td><a href='requestdevice.php?deviceid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary'>Request Device</button></a></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            
            }
            $table.="</table>";

            echo $table;

            }
           


                ?>

            </div>
            </div>
        </body>
        </html>