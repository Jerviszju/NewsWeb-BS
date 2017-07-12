<?php
include '_include.php';
global $conn;
try {
    connectDB();
}catch (mysqli_sql_exception $e){
    echo $e;
}
mysqli_query($conn,"set names 'utf8'");
$query_result = mysqli_query($conn, "select * from Allnews where news_id='1'");
    $fetched = mysqli_fetch_array($query_result);
    $result = array(
        "title" => $fetched['title'],
        "type" => $fetched['type']
    );
    echo json_encode($result,JSON_UNESCAPED_UNICODE);


mysqli_close($conn);
?>