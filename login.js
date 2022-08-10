
//獲取頁面中的元素
function login() {
var username=document.getElementById("username");
var pass=document.getElementById("password");
var login=document.getElementById("login_control");


//給localStorage載入初始資料
localStorage.username+= "abc";
localStorage.password+="abc";
//設定個函式判斷localStorage中是否有對應的賬號密碼
function tuust(value) {
    var dta=localStorage.username.split(";");
    for (let i=0;i<dta.length;i++){
        var arrPust=dta[i].split(":");
        if (arrPust[0]==value){
            if (arrPust[1]==password.value){
                return true;
            }
        }
    }
    return false;
}

//給登入按鈕添加個判斷，先判斷使用者名稱和密碼框為不為空，並且資料庫中有沒有對應的數值。
login.addEventListener("click",function () {
    if (username.value==""||password.value==""){
        alert("使用者名稱和密碼不能為空");
    } else {
        if (tuust(username.value)){
            alert("登入成功");
            username.value="";
            password.value="";

        } else if(username.value == "abc" && pass.value == "abc"){
                 window.location.href="function.php";
        
         } else  {alert("請輸入正確的使用者名稱和密碼！");}
    }
});
}