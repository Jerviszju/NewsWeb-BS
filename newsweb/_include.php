<?php

include 'loginCheck.php';
function test_input($data) {
    $data = inject_prevent($data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function inject_prevent($Sql_Str) {
    $check=preg_match('/select|insert|update|delete|\'|\\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i',$Sql_Str);
    if ($check) {
        $Sql_Str = strtr($Sql_Str,array("select"=>" ", 'insert'=>' ', 'update'=>' ', 'delete'=>' '));
    }
    return $Sql_Str;
}


?>
