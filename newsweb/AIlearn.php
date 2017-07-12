<?php
include '_include.php';
global $conn;
connectDB();

$user_name = $_GET ['user_name'];
$type = $_GET ['type'];
switch($type){
    case 'sportnews':
        $query_result = mysqli_query($conn, " UPDATE ai SET sportsnews = sportsnews + 1 where user_name = '$user_name'  ");
        break;
    case 'economynews':
        $query_result = mysqli_query($conn, "UPDATE ai SET economynews =economynews + 1  where user_name = '$user_name' ");
        break;
    case 'gamesnews':
        $query_result = mysqli_query($conn, "UPDATE ai SET gamesnews = gamesnews  + 1 where user_name = '$user_name'  ");
        break;
    case 'militarynews':
        $query_result = mysqli_query($conn, "UPDATE ai SET militarynews =militarynews  + 1 where user_name = '$user_name' ");
        break;
    case 'technologynews':
        $query_result = mysqli_query($conn, "UPDATE ai SET technologynews = technologynews + 1  where user_name = '$user_name'  ");
        break;
    case 'educationnews':
        $query_result = mysqli_query($conn, "UPDATE ai SET educationnews = educationnews + 1  where user_name = '$user_name'  ");
        break;
    case 'carnews':
        $query_result = mysqli_query($conn, "UPDATE ai SET carnews = carnews + 1  where user_name = '$user_name' ");
        break;
    case 'phonenews':
        $query_result = mysqli_query($conn, "UPDATE ai SET phonenews = phonenews + 1 where user_name = '$user_name'  ");
        break;
    case 'entertainmentnews':
        $query_result = mysqli_query($conn, "UPDATE ai SET entertainmentnews = entertainmentnews + 1 where user_name = '$user_name'  ");
        break;
    case 'tournews':
        $query_result = mysqli_query($conn, "UPDATE ai SET tournews = tournews  + 1 where user_name = '$user_name' ");
        break;
    default:
        break;
}

$query_result1 = mysqli_query($conn, "select * from ai
                                        where user_name ='$user_name'");

if($fetched = mysqli_fetch_array($query_result1)){
    $result = array(
        "code" => 0,
        "msg" => "修改成功"
    );
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else{
    $result = array(
        "code" => 1,
        "msg" => "修改失败"
    );
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);

?>