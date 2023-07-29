<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Super Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>
        .innerright,label {
    color: rgb(16, 170, 16);
    font-weight:bold;
}
.container,
.row,
.imglogo {
    margin:auto;
}

.innerdiv {
    text-align: center;
    /* width: 500px; */
    margin: 100px;
}
input{
    margin-left:20px;
}
.leftinnerdiv {
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
}

.innerright {
    background-color: #f3bd7e;
}

.greenbtn {
    background-color: #ffe3e3;
    color: black;
    width: 95%;
    height: 40px;
    margin-top: 8px;
}

.greenbtn,
a {
    text-decoration: none;
    color: black;
    font-size: large;
}

th{
    background-color: #16DE52;
    color: black;
}
td{
    background-color: #b1fec7;
    color: black;
}
td, a{
    color:black;
}


        /* * {
            box-sizing: border-box;
            font-family: 'Roboto';
        } */
        
        label {
            width: 150px;

            margin-left:50px;
            padding-Top:10px;
            /* display: block;
            text-align: left; */
            font-size: 18px;
            /* font-style:bold;
            padding-bottom: 0px; */
            color: rgb(51, 51, 51);
            /* font-weight: 300;
            margin-bottom: 0rem; */
        }
        
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type=text]:focus,
        input[type=email]:focus,
        input[type=number]:focus,
        input[type=pasword]:focus,

        select:focus,
        textarea:focus {
            outline: none;
        }
        
        input[type=text],
        input[type=email],
        input[type=number],
        input[type=pasword],
        select,
        textarea {
            
            width: 40%;
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            margin-top: 2px;
            margin-bottom: 2px;
            resize: vertical;
        }
        


        
        body {
            font-family: 'Roboto';
            /* background-image: url('images/library.jpg'); */
         
        }
        


        
         ::placeholder {
            color: rgb(189, 184, 184);
            font-style: italic;
            font-size: 14px;
        }



        

 
    </style>
    <body >

    <?php
   include("data_class.php");

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

    ?>



        <div class="container">
        <div class="innerdiv">
            <!--<div class="row"><img class="imglogo" src="images/logo.png"/></div>-->
            <div class="row"><h2  style="margin-left:35%">Electronic Lab Device Transaction Platform</h2></div>
             <br>
            <div class="leftinnerdiv">
               
                <!-- <Button class="greenbtn"> ADMIN</Button> -->
                
                <Button class="greenbtn" onclick="openpart('adddevice')" ><img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/>  ADD DEVICE</Button>
                <Button class="greenbtn" onclick="openpart('devicereport')" > <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> DEVICE REPORT</Button>
                <Button class="greenbtn" onclick="openpart('devicerequestapprove')"><img class="icons" src="images/icon/interview.png" width="30px" height="30px"/> DEVICE REQUESTS</Button>
                <Button class="greenbtn" onclick="openpart('addperson')"> <img class="icons" src="images/icon/add-user.png" width="30px" height="30px"/> ADD STUDENT</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"> <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> STUDENT REPORT</Button>
                <!--<Button class="greenbtn"  onclick="openpart('issuedevice')"> <img class="icons" src="images/icon/test.png" width="30px" height="30px"/> ISSUE DEVICE</Button>-->
                <Button class="greenbtn" onclick="openpart('issuedevicereport')"> <img class="icons" src="images/icon/checklist.png" width="30px" height="30px"/> ISSUE REPORT</Button>
                <Button class="greenbtn" onclick="openpart('addadmin')"> <img class="icons" src="images/icon/checklist.png" width="30px" height="30px"/> ADD ADMIN</Button>
                
                <a href="index.php"><Button class="greenbtn" ><img class="icons" src="images/icon/logout.png" width="30px" height="30px"/> LOGOUT</Button></a>
            </div>

            <div class="rightinnerdiv">   
            <div id="devicerequestapprove" class="innerright portion" style="display:none">
            <Button class="greenbtn" >DEVICE REQUEST APPROVE</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestdevicedata();
            $recordset=$u->requestdevicedata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>Person Name</th><th>Person Type</th><th>Device name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvedevicerequest.php?reqid=$row[0]&device=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved DEVICE</button></a></td>";
                 $table.="<td><a href='approvedevicerequest.php?reqid=$row[0]&device=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved</button></a></td>";
                // $table.="<td><a href='deletedevice_dashboard.php?deletedeviceid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="adddevice" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >ADD NEW DEVICE</Button>
            <br>
            <form action="adddeviceserver_page.php" method="post" enctype="multipart/form-data">
            <label>Device Name:</label><input type="text" name="devicename"/>
            </br>
            <label>Quantity:</label><input type="number" name="devicequantity"/></br>
             <label for="devicecategory">Choose Category:</label>
            <select name="devicecategory" >
                <option selected disabled>--select--</option>
                <option value="Register">Register</option>
                <option value="Display">Display</option>
                <option value="PSupplier">Power Supply</option>
                <option value="Measurer">Measurer</option>
                <option value="Arduino">Arduino</option>

            </select>
            </br>
            <label>Quantity:</label><input type="number" name="devicequantity"/></br>
            <label>Device Photo</label><input  type="file" name="devicephoto"/></br>
            </br>
   
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD STUDENT</Button>
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <label>Id:</label><input type="text" name="addsid"/>
            </br>
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Email:</label><input  type="email" name="addemail"/></br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>
            
            <label for="typw">Choose type:</label>
            <select name="type" >
                <option value="student">Student</option>
                <!--<option value="teacher">teacher</option>-->
            </select>
            </br>
            <label>User Photo</label><input  type="file" name="addphoto"/></br>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>
    <!--Superadmin-->
     <div class="rightinnerdiv">   
            <div id="addadmin" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD ADMIN</Button>
             <form action="addsuperadminserver_page.php" method="post" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Email:</label><input  type="email" name="addemail"/></br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>
            
            <label>Admin Photo</label><input  type="file" name="addphoto"/></br>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

     
                         <div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Student RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
?>
            <table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Id</th><th> Name</th><th>Email</th><th>Type</th><th>Image</th></tr>
           
           
           
             <?php 
            foreach($recordset as $row){
                ?>
                <tr>
               <td><?php echo $row[6];?></td>
                <td><?php echo $row[1];?></td>
               <td><?php echo $row[2];?></td>
                <td><?php echo $row[4];?></td>
                 <td><img src="<?php echo "uploads/".$row[5];?>"width="100" height="100" alt="Image"></td>
                
                </tr>
            
                <?php
            }
           ?>
          
              </table>          

            </div>
            </div>
            <div class="rightinnerdiv">   
            <div id="issuedevicereport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Issue Device Record</Button>


            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Issue Name</th><th>Device Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            echo "<br>";
            ?>
            <form method="POST">
             <!--<button class="btn btn-default" style="float:left;" name="submit_m" type="submit">Send Mail</button>-->
             <input type="submit" name="btn-atc" value="Send Mail">
         </form>
          <?php 
            if(isset($_POST['btn-atc']))
            {
                //$date1= new DateTime('2022/05/14');
    
                
               // $date2 = new DateTime('2022/04/12');
               // $interval = $date1->diff($date2);
               // echo $interval->days;
                 //$getdate= date("d/m/Y");
                   //$day=$date1->format("%a");
                 // echo $getdate;
                  $getdate= date('d/m/Y'); // Input date string
$format = 'd/m/Y'; // Format of the input date string

$dateTime = DateTime::createFromFormat($format, $getdate); // Convert the string to a DateTime object

if ($dateTime !== false) {
    $newFormat = 'Y-m-d'; // Desired output format
    $convertedDateString1 = $dateTime->format($newFormat); // Convert the date to the desired format

   // Output the converted date string
} else {
    echo 'Invalid date format'; // Handle invalid date string
}
                    $u=new data;
            $u->setconnection();
            $u->issuereport();
           $recordset=$u->issuereport();
             foreach($recordset as $row){
               // echo $row[7];*/
                $pid=$row[1];
                $date2= $row[7]; // Input date string
$format = 'd/m/Y'; // Format of the input date string

$dateTime = DateTime::createFromFormat($format, $date2); // Convert the string to a DateTime object

if ($dateTime !== false) {
    $newFormat = 'Y-m-d'; // Desired output format
    $convertedDateString = $dateTime->format($newFormat); // Convert the date to the desired format

    // Output the converted date string
} else {
    echo 'Invalid date format'; // Handle invalid date string
}
$timestamp = strtotime($convertedDateString1); 
$timestamp1 = strtotime($convertedDateString);
$days = ($timestamp1 - $timestamp) / (60 * 60 * 24); 

  //echo floor($days)."";
  /////Sent email

        if($days==2)
               {
                 $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
             foreach($recordset as $row){
                
                $newid=$row[0];
               
                if($newid==$pid)
                {
                   $to=$row[2];
                    $subject="Remainder Notification";
                    $msg="Hello! Only two days left.";
                    $from="From: csemb36@gmail.com";

                    if(mail($to,$subject,$msg,$from)){
                         echo "email sent.";

                    }
                    else{
                      echo "not sent";
                    }
                }
             }
         }
     }
 }

         ?>
            </div>

<!--             

issue device -->

            
            <div class="rightinnerdiv">   
            <div id="issuedevice" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ISSUE DEVICE</Button>
            <form action="issuedevice_server.php" method="post" enctype="multipart/form-data">
            <label for="device">Choose Device:</label>
           
            <select name="device" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getdeviceissue();
            $recordset=$u->getdeviceissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select>
<br>
            <label for="Select Student">Select Student:</label>
            <select name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
<br>
           <label>Days</label> <input type="number" name="days"/>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="devicedetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >DEVICE DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getdevicedetail($viewid);
            $recordset=$u->getdevicedetail($viewid);
            foreach($recordset as $row){

                $deviceid= $row[0];
               $deviceimg= $row[1];
               $devicename= $row[2];
               $devicequantity= $row[3];
               $deviceava= $row[4];
               $devicerent= $row[5];

            }            
?>

            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploads/<?php echo $deviceimg?> "/>
            </br>
            <p style="color:black"><u>Device Name:</u> &nbsp&nbsp<?php echo $devicename ?></p>
            <p style="color:black"><u>Device Available:</u> &nbsp&nbsp<?php echo $deviceava ?></p>
            <p style="color:black"><u>Device Rent:</u> &nbsp&nbsp<?php echo $devicerent ?></p>


            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="smail" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Send Mail</Button>

            </div>
            </div>
            <div class="rightinnerdiv">   
            <div id="devicereport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >DEVICE RECORD</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getdevice();
            $recordset=$u->getdevice();
?>
            <table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Device Name</th><th>Quantity</th><th>Available</th><th>Issued</th><th>Catergory</th><th>Image</th></tr>
           <!-- /*foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[1]</td>";
*/-->

             <?php 
            foreach($recordset as $row){
                ?>
                <tr>
               
                <td><?php echo $row[2];?></td>
               <td><?php echo $row[3];?></td>
                <td><?php echo $row[4];?></td>
                <td><?php echo $row[5];?></td>
                <td><?php echo $row[6];?></td>
              

                 <td><img src="<?php echo "uploads/".$row[1];?>"width="100" height="100" alt="Image"></td>
                
                </tr>
            
                <?php
            }
           ?>
          
              </table>  
               
               
            
           

        

            </div>
            </div>






        </div>
        </div>
        

     
        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }
        </script>
    </body>
</html>