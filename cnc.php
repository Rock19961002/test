<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>品質異常卡</title>
<link rel="stylesheet" type="text/css" href=""/>
<script type="text/javascript" src=""></script>
</head>
<body>

<form action="cnc.php" method="post" >
 <div id="quality_frame">
        <fieldset>
        <legend>工單條碼</legend>
            <p>1.客戶：</p>
            <td><input type="checkbox" name="client" value="廣俐">廣俐</td>   
            <td><input type="checkbox" name="client" value="康佳">康佳</td>
            <td><input type="checkbox" name="client" value="久榮">久榮</td>
            <p>2.交期：</p>
            <p><input type="date" name="dt"></p> 
            <p>3.數量：</p>
            <p><input type="text" name="qua" value=""></p>
            <p>4.規格</p>
            <p><input type="text" name="fmt" value=""></p> 
            <p>5.工令單號：</p>
            <p><input type="text" name="num" value=""></p>
        
        </fieldset>

        <fieldset>
            <legend>發生狀況</legend>
           
                
                <p>日期</p>
                <p><input type="date" name="dtt"></p>
                <p>製造單位</p>
                <td><input type="checkbox" name="unit" value="雷射">雷射</td> 
                <td><input type="checkbox" name="unit" value="前加工">前加工</td>
                <td><input type="checkbox" name="unit" value="折床">折床</td> 
                <td><input type="checkbox" name="unit" value="設計">設計</td> 
                <td><input type="checkbox" name="unit" value="焊接">焊接</td> 
                <td><input type="checkbox" name="unit" value="品保">品保</td> 
                <td><input type="checkbox" name="unit" value="客退">客退</td> 
                <td><input type="checkbox" name="unit" value="供應商"> 供應商</td> 
                <p>不良數量：</p>
                <p><input type="text" name="badqua" value=""></p>
                <p>不良內容</p>
                <p><input type="text" name="content" value=""></p>
                <p>擔當者</p>
                <p><input type="text" name="name01" value=""></p>
                <p>單位幹部</p>
                <p><input type="text" name="name02" value=""></p>
                <p>值星主管</p>
                <p><input type="text" name="name03" value=""></p>
            
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
                        <td><input type="text" name="qua01" value=""></td>
                        <td><input type="text" name="na01" value=""></td>
                    </tr>
                    <tr>
                        <td>報廢： </td> 
                        <td><input type="text" name="qua02" value=""></td> 
                        <td><input type="text" name="na02" value=""></td>
                    </tr>
                    <tr>
                        <td>補料數： </td> 
                        <td><input type="text" name="qua03" value=""></td>
                        <td><input type="text" name="na03" value=""></td>
                    </tr> 
                     <tr> 
                        <td>退回供應商： </td> 
                        <td><input type="text" name="qua04" value=""></td> 
                        <td><input type="text" name="na04" value=""></td>
                    </tr> 
                        <!-- <p><input type="checkbox" name="interest" value=""> 報廢：</p>
                        <p><input type="text" name="" value=""></p>

                        <p><input type="checkbox" name="interest" value=""> 補料數：</p> 
                        <p><input type="text" name="" value=""></p>

                        <p><input type="checkbox" name="interest" value="設計"> 退回供應商：</p> 
                        <p><input type="text" name="" value=""></p> -->
                       
                 
                 </table>
                 </fieldset> 

                 <div>
                    <input type ="button" onclick="location.href='function.php'" value="返回"></input>
                   </div>

                <div>
                 <input type="submit" id="btn_" value="送出" onClick="window.open('ready.php')" />
                </div>
    </div>

</form>

</body>
</html>

<?php

// 取得欄位資料
if (isset($_POST["client"]) && isset($_POST["dt"]) 
    && isset($_POST["qua"]) && isset($_POST["fmt"]) && isset($_POST["num"])
    && isset($_POST["dtt"]) && isset($_POST["unit"]) && isset($_POST["badqua"])
    && isset($_POST["content"]) && isset($_POST["name01"]) && isset($_POST["name02"]) 
    && isset($_POST["name03"]) && isset($_POST["qua01"]) && isset($_POST["na01"]) 
    && isset($_POST["qua02"]) && isset($_POST["na02"]) && isset($_POST["qua03"]) 
    && isset($_POST["na03"]) && isset($_POST["qua04"]) && isset($_POST["na04"]) ) {


    $class = 'CNC';
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
    
    // 檢查是否有輸入欄位資料
    if($class !="" && $client !="" && $dt !="" && $qua !="" && $fmt !="" && 
    $num !="" && $dtt !="" && $unit !="" && $badqua !="" && $content !=""&&
    $name01 !=""){


   
       require_once("connect.php");
       // 建立SQL字串
       $sql = "INSERT INTO qc_mgmt(class,client,dt,qua,fmt,num,dtt,unit,badqua,content,name01,name02,name03,
                                   qua01,na01,qua02,na02,qua03,na03,qua04,na04) 
       values('".$class."', '".$client."', '".$dt."', '".$qua."'
       , '".$fmt."', '".$num."', '".$dtt."', '".$unit."'
       , '".$badqua."', '".$content."', '".$name01."', '".$name02."'
       , '".$name03."', '".$qua01."', '".$na01."', '".$qua02."'
       , '".$na02."', '".$qua03."', '".$na03."', '".$qua04."'
       , '".$na04."' )";
      

      
            
       if ( mysqli_query($link, $sql) ) { // 執行SQL指令
          echo "<font color=red>新增資料成功!";
          echo "</font><br/>";
          
       }
    
       mysqli_close($link);
    }

    }

    
?>