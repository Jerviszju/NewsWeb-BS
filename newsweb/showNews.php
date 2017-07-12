<?php
include '_include.php';
global $conn;
connectDB();

$type = $_GET ['type'];

mysqli_query($conn,"set names 'utf8'");
$sql = "select * from $type";
$query_message = mysqli_query($conn,$sql);

if($fetched = mysqli_fetch_array($query_message))
{

    //message(msg_id,content,author,time,msg_state,reply_content)
    $message = array();
    do{
        $message[] = array(
            "news_id" => $fetched['news_id'],
            "title" => $fetched['title'],
            "type" => $fetched['type'],
            "time" => $fetched['time']
        );
    }while($fetched = mysqli_fetch_array($query_message));
    $result = array(
        "code" => 0,
        "msg" => "读取成功",
        "res" => $message
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


