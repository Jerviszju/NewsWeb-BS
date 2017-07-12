<?php
include '_include.php';
global $conn;
connectDB();


$email = test_input(mysqli_escape_string($conn, $_GET ['email']));
$username = $_GET['username'];
$password = $_GET['password'];

$sql = "select * from user where user_id = '$username' ";
$query_result = mysqli_query($conn,$sql);
if($fetched = mysqli_fetch_array($query_result)){
    $result = array(
        "code" => 1,
        "msg" => "注册失败"
    );
    echo json_encode($result);

}
else{
    $sql2 = "insert into user values ('$username', '$password', '$email',1,1,1,1,1,1,1,1,1,1)";
    $query_result2 = mysqli_query($conn,$sql2);
    $sql3 = "insert into ai values ('$username',0,0,0,0,0,0,0,0,0,0)";
    $query_result3 = mysqli_query($conn,$sql3);
    if ($query_result2) {
        $result = array(
            "code" => 0,
            "msg" => "注册成功"
        );
        echo json_encode($result);
    }
}
mysqli_close($conn);
?>