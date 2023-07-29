<?php include("db.php");

class data extends db {

    private $devicepic;
    private $devicename;
  
    private $devicequantity;
    private $type;

    private $device;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;





    function __construct() {
        // echo " constructor ";
        echo "</br></br>";
    }
    //Add amdin
    //admin
/*function addnewadmin($email,$pasword){
        $this->email=$email;
        $this->pasword=$pasword;
        
       


         $q="INSERT INTO admin(id,email,pass)VALUES('','$email','$pasword')";*/
    function addnewadmin($name,$email,$pasword,$addpic){
        $this->name=$name;
        $this->pasword=$pasword;
        $this->email=$email;
        $this->addpic=$addpic;


         $q="INSERT INTO admin(id, name, email, pass,addpic)VALUES('','$name','$email','$pasword','$addpic')";


        if($this->connection->exec($q)) {
            header("Location:super_admin_service_dashboard.php?msg=New Add done");
        }

        else {
            header("Location:super_admin_service_dashboard.php?msg=Register Fail");
        }



    }
   
        /*if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=New Add done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=Register Fail");
        }



    }*/

    function addnewuser($sid,$name,$email,$pasword,$type,$addpic){
        $this->sid=$sid;
        $this->name=$name;
        
        $this->email=$email;
        $this->pasword=$pasword;
        $this->type=$type;
        $this->addpic=$addpic;


         $q="INSERT INTO userdata(id,sid,name, email, pass,type,addpic)VALUES('','$sid','$name','$email','$pasword','$type','$addpic')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=New Add done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=Register Fail");
        }



    }
    function userLogin($t1, $t2) {
        $q="SELECT * FROM userdata where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: otheruser_dashboard.php?userlogid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    function adminLogin($t1, $t2) {

        $q="SELECT * FROM admin where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: admin_service_dashboard.php?logid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }
    ///Super Admin
    function superadminLogin($t1, $t2) {

       

        if ($t1=='superadmin@gmail.com' && $t2=='1234') {

           
                header("location: super_admin_service_dashboard.php");
            }
        

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }
   
//Superadmin


    function adddevice($devicepic, $devicename,  $devicequantity,$devicecategory) {
        $this->$devicepic=$devicepic;
        $this->devicename=$devicename;
        $this->devicequantity=$devicequantity;
        $this->$devicecategory=$devicecategory;

       $q="INSERT INTO device (id,devicepic,devicename, devicequantity,deviceava,devicerent,devicecategory)VALUES('','$devicepic', '$devicename','$devicequantity','$devicequantity',0,'$devicecategory')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }


    private $id;



    function getissuedevice($userloginid) {

        $newfine="";
        $issuereturn="";

        $q="SELECT * FROM issuedevice where userid='$userloginid'";
        $recordSetss=$this->connection->query($q);


        foreach($recordSetss->fetchAll() as $row) {
            $issuereturn=$row['issuereturn'];
            $fine=$row['fine'];
            $newfine= $fine;

            
                //  $newdevicerent=$row['devicerent']+1;
        }


        $getdate= date("d/m/Y");
        if($issuereturn<$getdate){
            $q="UPDATE issuedevice SET fine='$newfine' where userid='$userloginid'";

            if($this->connection->exec($q)) {
                $q="SELECT * FROM issuedevice where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;
            }
            else{
                $q="SELECT * FROM issuedevice where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;  
            }

        }
        else{
            $q="SELECT * FROM issuedevice where userid='$userloginid'";
            $data=$this->connection->query($q);
            return $data;

        }






    }

    function getdevice() {
        $q="SELECT * FROM device ";
        $data=$this->connection->query($q);
        return $data;
    }
    function getdeviceissue(){
        $q="SELECT * FROM device where deviceava !=0 ";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdata() {
        $q="SELECT * FROM userdata ";
        $data=$this->connection->query($q);
        return $data;
    }


    function getdevicedetail($id){
        $q="SELECT * FROM device where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdetail($id){
        $q="SELECT * FROM userdata where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }



    function requestdevice($userid,$deviceid){

        $q="SELECT * FROM device where id='$deviceid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where id='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $username=$row['name'];
            $usertype=$row['type'];
        }

        foreach($recordSetss->fetchAll() as $row) {
            $devicename=$row['devicename'];
            $devicecategory=$row['devicecategory'];
        }

        if($usertype=="student"){
            $days=7;
        }
        if($usertype=="teacher"){
            $days=21;
        }


        $q="INSERT INTO requestdevice (id,userid,deviceid,username,usertype,devicename,devicecategory,issuedays)VALUES('','$userid', '$deviceid', '$username', '$usertype', '$devicename','$devicecategory', '$days')";

        if($this->connection->exec($q)) {
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        }

        else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }

    }


    function returndevice($id){
        $fine="";
        $deviceava="";
        $issuedevice="";
        $devicerentel="";

        $q="SELECT * FROM issuedevice where id='$id'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $userid=$row['userid'];
            $issuedevice=$row['issuedevice'];
            $fine=$row['fine'];

        }
        if($fine==0){

        $q="SELECT * FROM device where devicename='$issuedevice'";
        $recordSet=$this->connection->query($q);   

        foreach($recordSet->fetchAll() as $row) {
            $deviceava=$row['deviceava']+1;
            $devicerentel=$row['devicerent']-1;
        }
        $q="UPDATE device SET deviceava='$deviceava', devicerent='$devicerentel' where devicename='$issuedevice'";
        $this->connection->exec($q);

        $q="DELETE from issuedevice where id=$id and issuedevice='$issuedevice' and fine='0' ";
        if($this->connection->exec($q)){
    
            header("Location:otheruser_dashboard.php?msg=done");
         }
         else{
             header("Location:otheruser_dashboard.php?msg=fail");
         }
        }
        // if($fine!=0){
        //     header("Location:otheruser_dashboard.php?userlogid=$userid&msg=fine");
        // }
       

    }

    function delteuserdata($id){
        $q="DELETE from userdata where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    function deletedevice($id){
        $q="DELETE from device where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

        function issuereport(){
            $q="SELECT * FROM issuedevice ";
            $data=$this->connection->query($q);
            return $data;
            
        }

        function requestdevicedata(){
            $q="SELECT * FROM requestdevice ";
            $data=$this->connection->query($q);
            return $data;
        }

      // issue issuedeviceapprove
      function issuedeviceapprove($device,$userselect,$days,$getdate,$returnDate,$redid){
        $this->$device= $device;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM device where devicename='$device'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $deviceid=$row['id'];
                $devicename=$row['devicename'];

                    $newdeviceava=$row['deviceava']-1;
                     $newdevicerent=$row['devicerent']+1;
            }

        
            $q="UPDATE device SET deviceava='$newdeviceava', devicerent='$newdevicerent' where id='$deviceid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuedevice (userid,issuename,issuedevice,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$device','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {

                $q="DELETE from requestdevice where id='$redid'";
                $this->connection->exec($q);
                header("Location:admin_service_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_service_dashboard.php?msg=fail");
            }




        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
   /* function sendmail()
    {
        
    $to="akramemran19036@gmail.com";
    $subject="I am emran";
    $msg="hello! 1st test.";
    $from="From: csemb36@gmail.com";

    if(mail($to,$subject,$msg,$from)){
        echo "email sent.";

    }
    else{
        echo "not sent";
    }

    }*/
    
    // issue device
    function issuedevice($device,$userselect,$days,$getdate,$returnDate){
        $this->$device= $device;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM device where devicename='$device'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $deviceid=$row['id'];
                $devicename=$row['devicename'];

                    $newdeviceava=$row['deviceava']-1;
                     $newdevicerent=$row['devicerent']+1;
            }

        
            $q="UPDATE device SET deviceava='$newdeviceava', devicerent='$newdevicerent' where id='$deviceid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuedevice (userid,issuename,issuedevice,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$device','$issuetype','$days','$getdate','$returnDate','0')";


            if($this->connection->exec($q)) {
                header("Location:admin_service_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_service_dashboard.php?msg=fail");
            }


        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    
}