<?php 


 #echo "this is functions page and function is case sensitive "; 
 function  debugger($data, $is_die = false){
 	echo "<pre style= 'color:#ff0000;'>";
 	print_r($data);
 	echo"</pre>";
 	//echo $data;
 	//exit;
 	if($is_die){
 		exit;
 	}
 }

 function sanitize($string){
 	global $conn;
 	return mysqli_real_escape_string($conn,$string);
 }



  

 function addUser($data){
 	global $conn;
 	$sql = "INSERT INTO tblusers SET
 	  full_name = '".$data['full_name']."',
 	  contact = '".$data['contact']."',
    category = '".$data['category']."',
    price = '".$data['price']."',
 	  city = '".$data['city']."',
    address = '".$data['address']."',
 	  user_image = '".$data['user_image']."'";
 	 //echo $sql;
 	 //debugger($sql,true);
 	 $query = mysqli_query($conn, $sql);
 	 if($query){
 	 	
 	 	return mysqli_insert_id($conn);
 	 } else{
 	 	
 	 	return false;
 	 }

 }




   
/*dont know?????????????????????????????????????????*/
 function  getAllRow($table){
  global $conn;
  $sql = "SELECT * FROM ".$table." ORDER BY id DESC";
  $query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query) <= 0){
    return false;
  }else{
    $data = array();
    while($row = mysqli_fetch_assoc($query)){
      $data[]= $row;
    }
    return $data;

  }
  
}

/*for home page RecentlyAdded Section*/
function getRecentlyAdded($table){
  global $conn;
  $sql = "SELECT id,category, user_image FROM ".$table." ORDER BY id DESC";
  $query = mysqli_query($conn, $sql);
  //debugger($sql,true);
  if(mysqli_num_rows($query) <= 0){
    return false;
  }else{
    $data = array();
    while($row = mysqli_fetch_assoc($query)){
      $data[]= $row;
    }
    return $data;

  }
}

/*for vehicle - list pages only*/
function getAllVehicles($table ,$type, $city){
  global $conn;
  $sql = "SELECT id,category,address, user_image FROM ".$table;
  //debugger($sql);
  if($type != ""){
    $sql = $sql." WHERE category = '".$type."'";
    if($city != ""){
      $sql = $sql." AND city = '".$city."'";

    }
    //add where type = ""
  }elseif($city != ""){
    $sql = $sql." WHERE city = '".$city."'";

  }
  //debugger($sql,true);
  $query = mysqli_query($conn, $sql);
  //debugger($sql,true);
  if(mysqli_num_rows($query) <= 0){
    return false;
  }else{
    $data = array();
    while($row = mysqli_fetch_assoc($query)){
      $data[]= $row;
    }
    return $data;

  }
}

/*for veiw details to vehicle*/
function getVechileById($table ,$id){
  global $conn;
  $sql = "SELECT category,city,address,contact,seat,price,user_image FROM ".$table." WHERE id=".$id;
  //$sql = "SELECT id,category,address,contact,seat,price,user_image FROM ".$table." ORDER BY id DESC";
  $query = mysqli_query($conn, $sql);
  //debugger($sql,true);
  if(mysqli_num_rows($query) <= 0){
    return false;
  }else{
    $data = array();
    while($row = mysqli_fetch_assoc($query)){
      $data[]= $row;
    }
    return $data;

  }
}








/*for admin page only*/
  function  getUserById($user_id){
    global $conn;
    $sql = "SELECT * FROM tblusers WHERE id = ".$user_id;
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) <= 0){
      return false;
    }else {
      $data = mysqli_fetch_assoc($query);
      return $data;
    }
  }





          
