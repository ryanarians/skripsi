// route 
var rProsesLogin = server + "auth/login/proses";
var rDashboard = server + "";
// vue object 
var loginApp = new Vue({
    el : '#divLogin',
    data : {},
    methods : {
        loginAtc : function()
        {
            loginProses();
        }
    }
});

// inisialisasi 
document.querySelector("#txtUsername").focus();



// function preventBack() {
//     window.history.forward(); 
// }
  
// setTimeout("preventBack()", 0);
  
// window.onunload = function () { null };


// let data = sessionStorage.getItem("username");
// if (data != null) {
//     sessionStorage.clear();
// }




function loginProses()
{
    let username = document.querySelector("#txtUsername").value;
    let password = document.querySelector("#txtPassword").value;
    let ds = {'username':username, 'password':password}
    axios.post(rProsesLogin, ds).then(function(res){
        let obj = res.data;
        if(obj.status === "NO_USER"){
            pesanUmumApp('warning', 'No User .. !!', 'Tidak ada user terdaftar ..');
        }else if(obj.status === 'WRONG_PASSWORD'){
            pesanUmumApp('warning', 'Fail auth .. !!', 'Username / Password salah ..');
        }else{
            // localStorage.setItem('username', username);
            sessionStorage.setItem("username",username);
            window.location.assign(rDashboard);
        }
    }); 
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}