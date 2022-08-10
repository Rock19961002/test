<!DOCTYPE html>
<html>     
<head>
<meta charset="utf-8" />
<title>page.php</title>
</head>
<body>

<?php
session_start();  // 啟動交談期
$records_per_page = 10;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["page"])) $page = $_GET["page"];
else                       $page = 1;
require_once("connect.php");
// 設定SQL查詢字串
if ( isset($_SESSION["SQL"]))
  $sql = $_SESSION["SQL"];
else
  $sql = "SELECT * FROM qc_mgmt ORDER BY id";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($page - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "記錄總數: $total_records 筆<br/>";
echo "<table border=1><tr><td>編號</td>";
echo "<td>供應商</td><td>客戶</td><td>交期</td><td>數量</td><td>規格</td>
      <td>工令單號</td><td>日期</td><td>製造單位</td><td>不良數量</td>
      <td>不良內容</td><td>擔當者</td><td>單位幹部</td><td>值星主管</td>
      <td>返修</td><td>處理人員</td><td>報廢</td><td>處理人員</td><td>補料數</td>
      <td>處理人員</td><td>退回供應商</td><td>處理人員</td></tr>";
$j = 1; 
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ )
      echo "<td>".$rows[$i]."</td>";
   echo "<td><a href='edit.php?action=edit&id=";
      echo $rows[0]."'><b>編輯</b> | ";
      echo "<td><a href='edit.php?action=del&id=";
      echo $rows[0]."'><b>刪除</b></td>";
      echo "</tr>";   
   echo "</tr>";
   $j++;
}
echo "</table><br>";
if ( $page > 1 )  // 顯示上一頁
   echo "<a href='page.php?page=".($page-1).
        "'>上一頁</a>| ";
for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $page)
     echo "<a href=\"page.php?page=".$i."\">".
          $i."</a> ";
   else
     echo $i." ";
if ( $page < $total_pages )  // 顯示下一頁
   echo "|<a href='page.php?page=".($page+1).
        "'>下一頁</a> ";
mysqli_free_result($result);  // 釋放佔用的記憶體
mysqli_close($link);

if (isset($_POST["Search"])) {
   // 建立SQL字串
   $sql = "SELECT * FROM qc_mgmt ";
   // 檢查是否輸入工令單號
   if (chop($_POST["num"]) != "" )
      $num = "num LIKE '%".$_POST["num"]."%' ";
   else
      $num = "";
   // 檢查是否輸入客戶
   if (chop($_POST["client"]) != "" )
      $client = "clinet LIKE '%".$_POST["client"]."%' ";
   else
      $client = "";
   // if條件組合SQL字串
   if ( chop($num) != "" && chop($client) != "" )
      $sql.= "WHERE ".$num." AND ".$client;
   elseif ( chop($num) != "" )  // 只有工令單號
          $sql .= "WHERE ".$num;
   elseif ( chop($client) != "" )  // 只有客戶
          $sql .= "WHERE ".$client;
   $sql.= " ORDER BY id";  // 最後加上排序
   $_SESSION["SQL"] = $sql;
   
   header("Location: page.php");
   mysqli_close($link);
}

?>

<form action="page.php" method="post">
<table border="1">
<tr><td>搜尋工令單號: </td>
  <td><input type="text" name="num" 
             size="10" maxlength="20"/></td></tr>
<tr><td>搜尋客戶: </td>
  <td><input type="text" name="client"
             size="20" maxlength="20"/></td></tr>
<tr><td colspan="2" align="center">
  <input type="submit" name="Search" value="搜尋"/></td>
</tr>
</table>
</form>


<hr/><a href="page.php">首頁</a>
| <a href="choice.php">新增資料</a>
</body>
</html>
