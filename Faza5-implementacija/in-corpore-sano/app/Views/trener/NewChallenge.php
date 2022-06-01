
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="ICON" href="/assets/images/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/styles-header-footer.css">
    <link rel="stylesheet" href="/assets/css/styles-challenges.css">
    <link rel="stylesheet" href="/assets/css/styles-trainer-newchallenge.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>

    <title>In corpore sano</title>
    <script !src="">
        function slajder(){
            $('#numPoints').on("input", function() {
                $('.output').val(this.value +"xp" );
            }).trigger("change");

            addExTypes();
        }
    </script>
    <script !src="">
        typeofChallenge="";
        numofKcal=0;
        numofHours=0;
        nameofEx="";
        function addTypeW(info){
            typeofChallenge=info;
            document.getElementById("labelKCAL").hidden=true;
            document.getElementById("numberofKCAL").setAttribute("type", "hidden");

            document.getElementById("labelEX").hidden=true;
            document.getElementById("numberofEX").setAttribute("type", "hidden");
            document.getElementById("labelEXType").hidden=true;
            $('#nameofEXType').attr("hidden", 'hidden');

            document.getElementById("labelMl").hidden=false;
            document.getElementById("numberofMl").setAttribute("type", "text");

        }
        function addTypeF(info){
            typeofChallenge=info;
            document.getElementById("labelMl").hidden=true;
            document.getElementById("numberofMl").setAttribute("type", "hidden");

            document.getElementById("labelEX").hidden=true;
            document.getElementById("numberofEX").setAttribute("type", "hidden");
            document.getElementById("labelEXType").hidden=true;
            // document.getElementById("nameofEXType").setAttribute("type", "hidden");
            $('#nameofEXType').attr("hidden", 'hidden');

            document.getElementById("labelKCAL").hidden=false;
            document.getElementById("numberofKCAL").setAttribute("type", "text");
        }

        function addTypeE(info){
            typeofChallenge=info;
            document.getElementById("labelKCAL").hidden=true;
            document.getElementById("numberofKCAL").setAttribute("type", "hidden");

            document.getElementById("labelEX").hidden=false;
            document.getElementById("numberofEX").setAttribute("type", "text");
            document.getElementById("labelEXType").hidden=false;
             $('#nameofEXType').removeAttr('hidden');
            //document.getElementById("nameofEXType").hidden = true;


            document.getElementById("labelMl").hidden=true;
            document.getElementById("numberofMl").setAttribute("type", "hidden");
        }

        function kliknuto(){
            let numofMl = parseInt(document.getElementById("numberofMl").value);
            let numofKcal=parseInt(document.getElementById("numberofKCAL").value);
            let numofHours=parseInt(document.getElementById("numberofEX").value);
            let nameofEx=document.getElementById("nameofEXType").value;
            //alert(typeofChallenge);
            let tezina='';
            if($("#easy").is(':checked')){
                //alert("izi");
                tezina='e';
            }
            else if($("#medium").is(':checked')){
                tezina='m';
            }
            else if($("#hard").is(':checked')){
                tezina='h';
            }

            // let tezina = document.getElementsByName("tezina").values();
            let poeni = document.getElementById("numPoints").value;
            let ime = document.getElementById("nameofChallenge").value;
            let opis = document.getElementById("description").value;
            let trajanje = document.getElementById("duration").value;

            //alert(tezina+"\n"+poeni+"\n"+ime+"\n"+opis+"\n"+trajanje+"\n");


            $.post("<?php echo base_url('Trainer/Newchallengecontroller/createChallenge') ?>",
                {//['id_izazov', 'id_tren', 'naziv', 'opis',
                    // 'tip_izazova', 'br_poena', 'trajanje_u_danima', 'nivo', 'br_lajkova', 'izbrisan'];
                    'type' : typeofChallenge,
                    'name' : ime,
                    'description' : opis,
                    'points' : poeni,
                    'duration' : trajanje,
                    'level' : tezina,
                }
                ,
                function (vr) {
                    let izazov_id=0;
                    $.post("<?php echo base_url('Trainer/Newchallengecontroller/dohvati') ?>",
                        {
                        }
                        ,
                        function (vr) {
                            let izazov=JSON.parse(vr);
                            //alert("OKI DOKI");
                            //alert(izazov[0]['id_izazov']);
                            izazov_id = izazov[0]['id_izazov'];
                            alert(izazov_id);
                            alert(nameofEx);

                            $.post("<?php echo base_url('Trainer/Newchallengecontroller/addSpecifications') ?>",
                                {
                                    'izazov_id' : izazov_id,
                                    'type' : typeofChallenge,
                                    'amount_of_ml' : numofMl,
                                    'amount_of_kcal' : numofKcal,
                                    'amount_of_hours' : numofHours,
                                    'name_of_exercise' : nameofEx
                                }
                                ,
                                function (vr) {
                                    alert(vr);
                                }
                            );
                        }
                    );
                }
            );

        }

        function addExTypes(){


            const types=[];

            $.post("<?php echo base_url('Trainer/Newchallengecontroller/getExTypes') ?>",{

                }
                ,
                function (dataJSON){

                    let data=JSON.parse(dataJSON);

                    for(let i=0;i<data.length;i++){
                        let current_item=data[i].split(";");
                        let exIndex=current_item[0]; //ako ti treba njegov id u tabeli
                        let exType=current_item[1];
                        types.push(exType);
                    }


                    for(let i=0; i<types.length;i++){
                        let tip=types[i];
                        let row=$("<option></option>").append(tip);
                        $("#nameofEXType").append(row);


                    }
                }


            );





        }
    </script>

</head>

<body onload="slajder()">

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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MY CHALLENGES</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">FINISHED CHALLENGES</a>
                            <a class="dropdown-item" href="#">ONGOING CHALLENGES</a>
                        </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">MAKE A NEW CHALLENGE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">MY ACCOUNT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">LOG OUT</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <div id='forma'>
        <h2>Type of challenge:</h2>
        <div class = "typeofChallenge">
            <div class = "waterBased">
                <img onclick="addTypeW('water')" id="glass" src="/assets/images/challenge/glass.png" alt="">
                <button onclick="addTypeW('water')" id="water">WATER</button>
            </div>
            <div class = "foodBased">
                <img onclick="addTypeF('food')" id="apple" src="/assets/images/challenge/apple.png" alt="">
                <button onclick="addTypeF('food')" id="food">FOOD</button>
            </div>
            <div class = "exerciseBased">
                <img onclick="addTypeE('train')" id="runner" src="/assets/images/challenge/runner.png" alt="">
                <button onclick="addTypeE('train')" id="exercise">EXERCISE</button>
            </div>
        </div>
        <div class="challengeSpecifications">
            <div>
                <label id="labelMl" hidden>How many ml of water is required?</label>
                <input id="numberofMl" type="hidden" placeholder="ml" required>
            </div>
            <div>
                <label id="labelKCAL" hidden>How many kcal is required?</label>
                <input id="numberofKCAL" type="hidden" placeholder="kcal" required>
            </div>
            <div>
                <label id="labelEX" hidden>How many hours of exercise is required?</label>
                <input id="numberofEX" type="hidden" placeholder="hours" required>
                <br>
                <label id="labelEXType" hidden>What type of exercise?</label>
<!--                padajuca lista-->
                <select hidden="hidden" id="nameofEXType"></select>
            </div>
        </div>
        <h2>Challenge level:</h2>
        <div class = "Level">

            <div class="radioButtons">

                <label class="rad-label">
                    <input id="easy" type="radio" class="rad-input" name="rad">
                    <div class="rad-design"></div>
                    <div class="rad-text">Easy</div>
                </label>

                <label class="rad-label">
                    <input id="medium" type="radio" class="rad-input" name="rad">
                    <div class="rad-design"></div>
                    <div class="rad-text">Medium</div>
                </label>

                <label class="rad-label">
                    <input id="hard" type="radio" class="rad-input" name="rad">
                    <div class="rad-design"></div>
                    <div class="rad-text">Hard</div>
                </label>

            </div>

            <div class="sliderRange">
                <p>POINTS</p>
                <label for="range">
                    <input class="slider" type="range" name="range" id="numPoints" min="0" max="300" step="5" value="175"/>
                </label>
                <output for="range" class="output"></output>
            </div>

            <div class="name-description">
                <div class="nameC">
                    <label>Name of the challenge:</label>
                    <br>
                    <input  id="nameofChallenge" type="text" required>
                </div>
                <div class="descriptionC">
                    <label>Description of the challenge:</label>
                    <textarea name="" id="description" cols="40" rows="5"></textarea>
                </div>

                <div class="durationC">
                    <label>Duration in days:</label>
                    <input id="duration" type="number" required>
                </div>
            </div>
        </div>
        <button onclick="kliknuto()" class="commit" >Commit!</button>
<!--        onclick="kliknuto()-->
    </div>

</body>

</html>