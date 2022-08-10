<!DOCTYPE html>
<html>    
<head>
<meta charset="utf-8" />
<title>edit.php</title>
<link rel="stylesheet" type="text/css" href=""/>
<script type="text/javascript" src=""></script>
</head>
<body>
<?php
$id = $_GET["id"];  // 取得URL參數的編號
$action = $_GET["action"];  // 取得操作種類
require_once("connect.php");
// 執行操作
switch ($action) {
   case "update": // 更新操作    
      $class = "CNC"; // 取得欄位資料
      $client = $_POST["client"]; 
      $dt = $_POST["dt"];
      $qua = $_POST["qua"];
      $fmt = $_POST["fmt"];
      $num = $_POST["num"];
      $dtt = $_POST["dtt"];
      $unit = $_POST["unit"];
      $badqua = $_POST["badqua"];
      $content = $_POST["content"];
      $name01 = $_POST["name01"];
      $name02 = $_POST["name02"];
      $name03 = $_POST["name03"];
      $qua01 = $_POST["qua01"];
      $na01 = $_POST["na01"];
      $qua02 = $_POST["qua02"];
      $na02 = $_POST["na02"];
      $qua03 = $_POST["qua03"];
      $na03 = $_POST["na03"];
      $qua04 = $_POST["qua04"];
      $na04 = $_POST["na04"];
      
      $sql = "UPDATE qc_mgmt SET class='".$class."'
             , client='".$client."'
             , dt='".$dt."'
             , qua='".$qua."'
             , fmt='".$fmt."'
             , num='".$num."'
             , dtt='".$dtt."'
             , unit='".$unit."'
             , badqua='".$badqua."'
             , content='".$content."'
             , name01='".$name01."'
             , name02='".$name02."'
             , name03='".$name03."'
             , qua01='".$qua01."'
             , na01='".$na01."'
             , qua02='".$qua02."'
             , na02='".$na02."'
             , qua03='".$qua03."'
             , na03='".$na03."'
             , qua04='".$qua04."'
             , na04='".$na04."'
             WHERE id=".$id;
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location: page.php"); // 轉址
      break;
   case "del":    // 刪除操作
      $sql = "DELETE FROM qc_mgmt WHERE id=".$id;
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location: page.php"); // 轉址
      break;
   case "edit":   // 編輯操作
      $sql = "SELECT * FROM qc_mgmt WHERE id=".$id;
      $result = mysqli_query($link, $sql); // 執行SQL指令
      $row = mysqli_fetch_assoc($result); // 取回記錄
      $class = $row['class'];
      $client = $row['client']; 
      $dt = $row['dt'];   
      $qua = $row["qua"];
      $fmt = $row["fmt"];
      $num = $row["num"];
      $dtt = $row["dtt"];
      $unit = $row["unit"];
      $badqua = $row["badqua"];
      $content = $row["content"];
      $name01 = $row["name01"];
      $name02 = $row["name02"];
      $name03 = $row["name03"];
      $qua01 = $row["qua01"];
      $na01 = $row["na01"];
      $qua02 = $row["qua02"];
      $na02 = $row["na02"];
      $qua03 = $row["qua03"];
      $na03 = $row["na03"];
      $qua04 = $row["qua04"];
      $na04 = $row["na04"];
// 顯示編輯表單
?>
 <div id="quality_frame">
        <fieldset>

<form action="edit.php?action=update&id=<?php echo $id ?>"
      method="post">

<legend>工單條碼</legend>
            <p>1.客戶：</p>
            <td><input type="checkbox" name="client" value="<?php echo $client ?>">廣俐</td>   
            <td><input type="checkbox" name="client" value="<?php echo $client ?>">康佳</td>
            <td><input type="checkbox" name="client" value="<?php echo $client ?>">久榮</td>
            <p>2.交期：</p>
            <p><input type="date" name="dt" value="<?php echo $dt ?>"></p> 
            <p>3.數量：</p>
            <p><input type="text" name="qua" value="<?php echo $qua ?>"></p>
            <p>4.規格</p>
            <p><input type="text" name="fmt" value="<?php echo $fmt ?>"></p> 
            <p>5.工令單號：</p>
            <p><input type="text" name="num" value="<?php echo $num ?>"></p>
        
        </fieldset>

        <fieldset>
            <legend>發生狀況</legend>
           
                
                <p>日期</p>
                <p><input type="date" name="dtt" value="<?php echo $dtt ?>"></p>
                <p>製造單位</p>
                <td><input type="checkbox" name="unit" value="<?php echo $unit ?>">雷射</td> 
                <td><input type="checkbox" name="unit" value="<?php echo $unit ?>">前加工</td>
                <td><input type="checkbox" name="unit" value="<?php echo $unit ?>">折床</td> 
                <td><input type="checkbox" name="unit" value="<?php echo $unit ?>">設計</td> 
                <td><input type="checkbox" name="unit" value="<?php echo $unit ?>">焊接</td> 
                <td><input type="checkbox" name="unit" value="<?php echo $unit ?>">品保</td> 
                <td><input type="checkbox" name="unit" value="<?php echo $unit ?>">客退</td> 
                <td><input type="checkbox" name="unit" value="<?php echo $unit ?>">供應商</td> 
                <p>不良數量：</p>
                <p><input type="text" name="badqua" value="<?php echo $badqua ?>"></p>
                <p>不良內容</p>
                <p><input type="text" name="content" value="<?php echo $content ?>"></p>
                <p>擔當者</p>
                <p><input type="text" name="name01" value="<?php echo $name01 ?>"></p>
                <p>單位幹部</p>
                <p><input type="text" name="name02" value="<?php echo $name02 ?>"></p>
                <p>值星主管</p>
                <p><input type="text" name="name03" value="<?php echo $name03 ?>"></p>
            
            </fieldset>

                <fieldset>
                    <legend>品保判定</legend>
                <table>
                    <tr>
                        <td>處理方式</td>
                        <td></td>
                        
                        <td>處理人員</td>
                    </tr>
                    <tr>
                        <td>返修： </td> 
                        <td><input type="text" name="qua01" value="<?php echo $qua01 ?>"></td>
                        <td><input type="text" name="na01" value="<?php echo $na01 ?>"></td>
                    </tr>
                    <tr>
                        <td>報廢： </td> 
                        <td><input type="text" name="qua02" value="<?php echo $qua02 ?>"></td> 
                        <td><input type="text" name="na02" value="<?php echo $na02 ?>"></td>
                    </tr>
                    <tr>
                        <td>補料數： </td> 
                        <td><input type="text" name="qua03" value="<?php echo $qua03 ?>"></td>
                        <td><input type="text" name="na03" value="<?php echo $na03 ?>"></td>
                    </tr> 
                     <tr> 
                        <td>退回供應商： </td> 
                        <td><input type="text" name="qua04" value="<?php echo $qua04 ?>"></td> 
                        <td><input type="text" name="na04" value="<?php echo $na04 ?>"></td>
                    </tr>
                    </table>
                 </fieldset> 

                 <div>
                    <input type ="button" onclick="location.href='function.php'" value="返回"></input>
                   </div>

                <div>
                 <input type="submit" id="btn_" value="更新資料"  />
                </div> 
   </form>
   </body>
</html>

<?php   
       break;
} 
mysqli_close($link);
?>
