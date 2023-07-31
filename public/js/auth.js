// FUNCTION FOR PASSWORD ENABLE
    function signUpPassword() {
        var x = document.getElementById("password");
        var a = document.getElementById("password_confirmation");
        if (x.type === 'password' && a.type === 'password'){
            x.type ="text";
            a.type ="text";
        }else{
            x.type="password";
            a.type="password";
        }

    }
// FUNCTION FOR PASSWORD ENABLE

// FUNCTION FOR PASSWORD ENABLE
    function loginPassword() {
        var x = document.getElementById("password");
        if (x.type === 'password'){
            x.type ="text";
        }else{
            x.type="password";
        }

}
// FUNCTION FOR PASSWORD ENABLE
