<?php
# error_reporting(0);
#============================== headers============================================
header("Access-Control-Allow-Origin: *"); # allow communication with other sites
header("Content-Type: application/json");  # formart data in json way
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");   # lifespan of commnunication
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type:application/json");
#============================== End headers ========================================
#================================== Response Function ==============================
function response($full_name,$telephone,$age,$sex,$county,$town,$religion,$education,$proffession,$description,$date){
    $response['full_name'] = $full_name;
    $response['telephone'] = $telephone;
    $response['age'] = $age;
    $response['sex'] = $sex;
    $response['county'] = $county;
    $response['town'] = $town;
    $response['religion'] = $religion;
    $response['education'] = $education;
    $response['proffession'] = $proffession;
    $response['description'] = $description;
    $response['date'] = $date;
    
    $json_response = json_encode($response);
    echo $json_response;
}

if (isset($_GET['id']) && $_GET['id']!="") {
    include_once('../conn.php');
    # telephone,age,sex,county,town,religion,maritalstatus,education,proffession,description,date
    $user_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE id = $user_id");
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $full_name = $row['full_name'];
            $telephone = $row['telephone'];
            $age = $row['age'];
            $sex = $row['sex'];
            $county = $row['county'];
            $town = $row['town'];
            $religion = $row['religion'];
            $education = $row['education'];
            $proffession = $row['proffession'];
            $description = $row['description'];
            $date = $row['date'];
            response($full_name,$telephone,$age,$sex,$county,$town,$religion,$education,$proffession,$description,$date);
            mysqli_close($conn);
            }else{
                response(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
                }
}else{
    response(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
  }

