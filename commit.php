<?php	
    //Retrieve Data to Add

    $id = $_POST['id'];
    $action = $_POST['action'];
    $status = "not started";

	$title = $_POST['title'];
	$avail = $_POST['avail'];
	$l_name = $_POST['l_name'];
	$l_contact = $_POST['l_contact'];
	$addedby = $_POST['addedby'];
	$address = $_POST['address'];
	$price = $_POST['price'];
	$utilities = $_POST['utilities'];
	$gender = $_POST['gender'];
	$desc = $_POST['desc'];
	$shared = $_POST['shared'];
	$ammenities = $_POST['ammenities'];

    if ($_POST['avail'] ==1 || $_POST['avail'] == '1' )
      $avail=1; 
    else
      $avail=0;

	require 'dbconnect.php';
    
    //Removing Stuff from database
    if ($action == 'delete') {
        $action = "deleting";
        
        $result = mysqli_query($con, "DELETE FROM $propertytable WHERE id='$id'");
        //echo $id." ".$result;
        if ($result == 1 )
          $status = "complete";
        else
          $status = "failed";
          
        //set editting to ID#0 after deletion
        echo '<script> addnew(); </script>';

    //Adding/Updating Stuff 
    } else if ($action == 'save') {
        //Check if Record Already Exists with ID

        $sql = "SELECT COUNT(*) FROM $propertytable WHERE id='$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $count = $row["0"];

        if($count==0){
            //Add New Record ID is New

            $result = mysqli_query($con, "INSERT INTO $propertytable ( title, l_name, avail, l_contact, addedby, address, price, utilities, gender, shared, descrp, ammenities) VALUES ( '$title', '$l_name', '$avail', '$l_contact', '$addedby', '$address', '$price', '$utilities', '$gender', '$shared', '$desc', '$ammenities')");
            $action = "adding";
        }
        else
        {
            //Update old Record if ID is Old

            $sql = "UPDATE $propertytable SET title='$title', l_name='$l_name', avail='$avail', l_contact='$l_contact', addedby='$addedby', address='$address', price='$price', utilities='$utilities', gender='$gender', shared='$shared', descrp='$desc', ammenities='$ammenities' WHERE id='$id'";
            $result = mysqli_query($con, $sql);
            $action = "updating";
        }

        if ($result == 1 )
          $status = "successful";
        else
          $status = "failed";

    }
    mysqli_close($con);

    //Return info for toast
    echo sprintf('<span>%s</span> property #<span>%s - %s </span>', $action, $id, $status);

?>	
     

