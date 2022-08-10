<?php

//資料庫設定
//資料庫位置
$host = "localhost";
//資料庫名稱
$dbname = "innodb";
//資料庫管理者帳號
$dbuser = "taiwa" ;
//資料庫管理者密碼
$dbpw = "taiwa123";

//宣告一個link變數執行連結資料庫函式mysqli_connect()，連結結果會帶入link中
$link = mysqli_connect($host, $dbuser, $dbpw, $dbname);
if($link)
{
        //回傳正值就代表已經連線
        //編碼為utf-8
        mysqli_query($link, "SET NAMES utf8");
        echo "已正確連線";
}
else
{
        //否則就會跑出連線失敗
        echo "無法連線mysql資料庫 :<br/>" . mysqli_connect_error();
}

//$datas = array();
//$sql = "SELECT * FROM `qc_mgmt`;";
//$result = mysqli_query($link, $sql);
//if ($result)
//{
//        if(mysqli_num_rows($result) > 0)
//        {
//                while ($row = mysqli_fetch_assoc($result))
//                {
//                        $datas[] = $row;
//                }
//        }
//        mysqli_free_result($result);
//}
//else
//{
//        echo "{$sql} 語法執行失敗，錯誤訊息" . mysqli_error($link);
//}

//if (!empty($datas))
//{
//        print_r($datas);
//}
//else
//{
 //       echo "查無資料" ;
//}
?>


