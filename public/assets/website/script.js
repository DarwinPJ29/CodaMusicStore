function showPassword() {
    var x = document.getElementById("checkbox_show_password");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function showPasswordNew() {
    var x = document.getElementById("checkbox_show_password_new");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function showPasswordConfirm() {
    var x = document.getElementById("checkbox_show_password_confirm");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showThreePassword() {
    showPassword();
    showPasswordNew();
    showPasswordConfirm();
}
