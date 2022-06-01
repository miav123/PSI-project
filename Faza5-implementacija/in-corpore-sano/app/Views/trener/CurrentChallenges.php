<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="ICON" href="/assets/images/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/styles-header-footer.css">
    <link rel="stylesheet" href="/assets/css/styles-trainer-account.css">
    <link rel="stylesheet" href="/assets/css/styles-challenges.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
            integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
            crossorigin="anonymous"></script>
<!--    <script src="--><?php //echo base_url("/assets/js/accounttrainer.js")?><!--"></script>-->


    <script !src="">
        function deleteChallenge(idC) {
            //alert(idC);
            $("#proba").empty();
            $.post("<?php echo base_url('Trainer/Currentchallengescontroller/deleteChallenge') ?>",
                {
                    'challengeId': idC
                }
                ,
                function (vr) {
                    funkcija();
                }
            );
        }
        function funkcija() {
            //
            $.post("<?php echo base_url('Trainer/Currentchallengescontroller/addChallenge') ?>",
                {
                }
                ,
                function (vr) {
                    let data=JSON.parse(vr);
                    // let izazov = $("<div style='background-color: #07beb8'>HELLO</div>");
                    // $("#proba").append(izazov);

                    for(let i=0;i<data.length;i++){
                        let idC = data[i]['id'];
                        let type = data[i]['type'];
                        let title = data[i]['title'];
                        let description = data[i]['description'];
                        let points = data[i]['points'];
                        let level = data[i]['level'];
                        let likes = data[i]['likes'];

                        //div
                        let izazov = $("<div class='list-group-item "+type+"'"+"></div>");

                        let red = $("<div class='row align-items-center text-sm-center text-md-left'></div>");

                        //DODAVANJE SLIKE KOJA ODGOVARA TIPU IZAZOVA
                        let slika = $("<div class='col-sm-12 col-md-2 text-center'></div>");

                        let image;
                        if(type==='water'){
                            image =$("<img src='/assets/images/challenge/glass.png' class='challenge-image'>");
                        }
                        if(type==='food'){
                            image =$("<img src='/assets/images/challenge/apple.png' class='challenge-image'>");
                        }
                        if(type==='train'){
                            image =$("<img src='/assets/images/challenge/runner.png' class='challenge-image'>");
                        }
                        let divLikes = $("<div class='row text-sm-center text-md-left likes'></div>");
                        let heartimg = $("<img src='/assets/images/heart-red.png' class='heart'>")
                        let numLikes = $("<p class='mb-1 challenge-description nice-font'>"+likes+"</p>");

                        //DODAVANJE TEXTA NA ODGOVARAJUCA MESTA
                        let text = $("<div class='col-sm-12 col-md-7 col-lg-8'></div>");
                        let naslov = $("<h5 class='mb-1 align-self-center nice-font challenge-title'>"+title+"</h5>");
                        let opis = $("<p class='mb-1 challenge-description nice-font'>"+description+"</p>");

                        //DODAVANJE NIVOA IZAZOVA
                        //SLIKA
                        let levelDiv = $("<div class='col-sm-12 col-md-3 col-lg-2 text-center'></div>");
                        let nivo;
                        if(level==='e'){
                            nivo =$("<img src='/assets/images/challenge-level/easy.png' class='level-image'>");
                        }
                        if(level==='m'){
                            nivo =$("<img src='/assets/images/challenge-level/medium.png' class='level-image'>");
                        }
                        if(level==='h'){
                            nivo =$("<img src='/assets/images/challenge-level/hard.png' class='level-image'>");
                        }
                        //BR POENA
                        let numPoints = $("<h2 class='challenge-points'>"+points+"</h2>");

                        //KRAJ REDA
                        //DIV ZA DUGME ZA BRISANJE
                        let divDel = $("<div class='row text-sm-center text-md-right'></div>");
                        let divrow = $("<div class='col-sm-12 col-md-12'></div>");
                        let buttonDel = $("<button type='submit' class='btn btn-primary btn-floating btn-delete nice-font'" +
                            " name='deletebtn' onclick='deleteChallenge("+idC+")'><i class='fas fa-trash-alt'>" +
                            "</i>Delete</dutton>");

                        slika.append(image);
                        divLikes.append(heartimg);
                        divLikes.append(numLikes);
                        slika.append(divLikes);
                        text.append(naslov);
                        text.append(opis);
                        levelDiv.append(nivo);
                        levelDiv.append(numPoints);
                        divrow.append(buttonDel);
                        divDel.append(divrow);
                        red.append(slika);
                        red.append(text);
                        red.append(levelDiv);
                        izazov.append(red);
                        izazov.append(divDel);
                        $("#proba").append(izazov);

                    }
                }
            );
        }
    </script>


    <title>In corpore sano</title>
</head>

<body onload="funkcija()">
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
                        <a class="dropdown-item" href="/trener/FinnishedChallenges">FINISHED CHALLENGES</a>
                        <a class="dropdown-item" href="/trener/CurrentChallenges">ONGOING CHALLENGES</a>
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">MAKE A NEW CHALLENGE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/trener/manageaccount">MY ACCOUNT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">LOG OUT</a>
                </li>
            </ul>
        </div>
    </div>

</nav>


<div id="proba"></div>

</body>

</html>