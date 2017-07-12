<?php
include '_include.php';
global $conn;
connectDB();

//$username = $_GET ['username'];
$username = test_input(mysqli_escape_string($conn, $_GET ['username']));
$password = $_GET ['password'];

$sql = "select * from user where user_id = '$username' and user_password = '$password' ";
$query_result = mysqli_query($conn,$sql);
if($fetched = mysqli_fetch_array($query_result)){
    $result = array(
        "code" => 0,
        "msg" => "登陆成功",
        "res" => array(
            "username" => $username,
            "password" => $password
        )
    );
    echo json_encode($result);

} else {
    $result = array(
        "code" => 1,
        "msg" => "登录失败,用户名或密码错误",
        "res" => array(
            "username" => $username,
            "password" => $password
        )
    );
    echo json_encode($result);
}

mysqli_close($conn);
?>