Login = document.querySelector(".coin");
menuLog = document.querySelector('.loginmenu');

Register = document.querySelector(".reg");
RegisterLog = document.querySelector('.registerMenu');

Login.onclick = function () {

    menuLog.classList.toggle("loginmenunoff");
    RegisterLog.classList.toggle("registerMenu" , true );

}

Register.onclick = function () {
    RegisterLog.classList.toggle("registerMenuOff");
    menuLog.classList.toggle("loginmenu",true);
}
