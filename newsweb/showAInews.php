<?php
include '_include.php';
global $conn;
connectDB();

$user_name = $_GET ['user_name'];

mysqli_query($conn,"set names 'utf8'");

$sql = "select * from ai where user_name = '$user_name'";
$query_message = mysqli_query($conn,$sql);

if($fetched = mysqli_fetch_array($query_message)) {
    $ailearn = array(
        "sportsnews" => $fetched['sportsnews'],
        "economynews" => $fetched['economynews'],
        "gamesnews" => $fetched['gamesnews'],
        "militarynews" => $fetched['militarynews'],
        "technologynews" => $fetched['technologynews'],
        "educationnews" => $fetched['educationnews'],
        "carnews" => $fetched['carnews'],
        "phonenews" => $fetched['phonenews'],
        "entertainmentnews" => $fetched['entertainmentnews'],
        "tournews" => $fetched['tournews']
    );
    asort($ailearn);
    $i=-4;
    $message = array();
    foreach ($ailearn as $x => $x_value) {
        if($i>0){
            $sql = "select * from $x where news_id <= $i";
            $query_message = mysqli_query($conn,$sql);
            if($fetched = mysqli_fetch_array($query_message)) {
                do{
                    $message[] = array(
                        "news_id" => $fetched['news_id'],
                        "title" => $fetched['title'],
                        "type" => $fetched['type'],
                        "time" => $fetched['time']
                    );
                }while($fetched = mysqli_fetch_array($query_message));
            }
        }
        $i++;
    }
    $result = array(
        "code" => 0,
        "msg" => "读取成功",
        "res" => $message
    );
    echo json_encode($result,JSON_UNESCAPED_UNICODE);

}




mysqli_close($conn);
?>


