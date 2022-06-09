<!DOCTYPE html>
<html lang="en">
<!-- Author: Elena Vidic 2019/0081-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="ICON" href="/assets/images/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/styles-header-footer.css">
    <link rel="stylesheet" href="/assets/css/styles-trainer-account.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
            integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
            crossorigin="anonymous"></script>
    <script src="<?php echo base_url("/assets/js/accounttrainer.js")?>"></script>


    <script !src="">function commitChangestoUsername() {
            resetUsernameErrors();

            let username = document.getElementById("newUsername").value;

            //alert(username);
            if(/^.{1,40}$/.test(username) === false){
                document.getElementById("usernameError").innerHTML = "Username isn't in a correct format. ";
            }
            else {
                document.getElementById("usernameError").innerHTML = "";
                $.post("<?php echo base_url('Trainer/Namechange/checkUserName') ?>",
                    {
                        'username': username
                    }
                    ,
                    function (vr) {
                        if (vr === "0") {
                            document.getElementById("usernameError").innerHTML = "The username you have chosen" +
                                " is allready taken. Please choose another one :D";
                        } else {
                            document.getElementById("usernameError").innerHTML = "";
                            $.post("<?php echo base_url('Trainer/Namechange/addUserName') ?>",
                                {
                                    'username': username
                                }
                                ,
                                function (vr) {
                                    //alert(vr);
                                    document.getElementById("newUsername").value = "";
                                    grabUsername();
                                }
                            );
                        }
                    }
                );
            }
        }</script>

    <script !src="">

        function commitChangestoPassword(){
            let password = document.getElementById("newPassword").value;
            let repeatPassword = document.getElementById("repeatPassword").value;

            if(/^.{5,40}$/.test(password) === false){
                document.getElementById("passwordError").innerHTML = "Password isn't in a correct format. ";
                //alert("LOSA SIFRA");
            }
            else{
                document.getElementById("passwordError").innerHTML = "";
                if(password !== repeatPassword){
                    document.getElementById("repeatpasswordError").innerHTML = "Repeated password isn't the same as the new password. ";
                    //alert("Nije Ista SIFRA");
                }
                else{
                    document.getElementById("repeatpasswordError").innerHTML ="";
                    $.post("<?php echo base_url('Trainer/Namechange/addPassword') ?>",
                        {
                            'password': password
                        }
                        ,
                        function (vr) {
                            //alert(vr);
                            document.getElementById("newPassword").value = "";
                            document.getElementById("repeatPassword").value ="";
                        }
                    );
                }
            }
        }
    </script>

    <script !src="">
        function grabUsername(){
            let username = document.getElementById("username").value;

            $.post("<?php echo base_url('Trainer/Namechange/UsernamefromDB') ?>",
                {
                    //'username':username
                }
                ,
                function (vr) {
                    document.getElementById("username").innerHTML = vr;
                }
            );
        }
    </script>


    <title>In corpore sano</title>
</head>

<body onload="grabUsername()">

<?php
$uri = service('uri');
?>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <img class="logo" src="/assets/images/logo/logo.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="float:right;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Currentchallengescontroller">MY CHALLENGES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Newchallengecontroller">MAKE A NEW CHALLENGE</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Namechange">MY ACCOUNT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">LOG OUT</a>
                </li>
            </ul>
        </div>
    </div>

</nav>

<div class="container">
    <div class = 'forma_B'>
        <br>
        <table>
            <tr>
                <td>
                    <img class="userPhoto" src="/assets/images/trainer/trener1.png">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Username">Username:  </label>
                    <label id="username" ></label>
                </td>
            </tr>
        </table>
    </div>


    <div class="forma_A">
        <div class=" col-lg-6 col-sm-12">
            <table id="tabela">
                <tr>
                    <td>
                        <label for="newUsername">New username:</label>
                        <br><span class="errorUsername" id="usernameError"></span><br>
                        <input type="text" id="newUsername" placeholder="username here...">
                        <button onclick="commitChangestoUsername()">Commit Changes</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <label for="newPassword">New password:</label>
                        <br><span class="errorPassword" id="passwordError"></span><br>
                        <input type="text" id="newPassword" placeholder="password here...">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <label for="repeatPassword">Repeat password:</label>
                        <br><span class="errorRepeatPassword" id="repeatpasswordError"></span><br>
                        <input type="text" id="repeatPassword" placeholder="repeat password here...">
                        <button onclick="commitChangestoPassword()">Commit Changes</button>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</div>


</body>

</html>