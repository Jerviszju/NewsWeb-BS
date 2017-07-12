<?php
include '_include.php';
global $conn;
try {
    connectDB();
}catch (mysqli_sql_exception $e){
    echo $e;
}
mysqli_query($conn,"set names 'utf8'");
$id = $_GET ['id'];
$type = $_GET ['type'];


$sql = "select * from $type where news_id = '$id'";

$query_result = mysqli_query($conn,$sql);
if($query_result)
{
    $fetched = mysqli_fetch_array($query_result);
    $result = array(
        "code" => 0,
        "msg" => "读取成功",
        "res" => array(
            "title" => $fetched['title'],
            "time" => $fetched['time'],
            "contents" => $fetched['content'],
            "type" => $fetched['type']

        )
    );
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else{
    $result = array(
        "code" => 1,
        "msg" => "读取失败",
        "res" => null
    );
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);

?>