<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <link rel="ICON" href="/assets/images/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <title>In corpore sano</title>
    <link rel="stylesheet" href="/assets/css/nicepage.css" media="screen">
  <link rel="stylesheet" href="/assets/css/Daily-Log.css" media="screen">
  <link rel="stylesheet" href="/assets/css/styles-header-footer.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script class="u-script" type="text/javascript" src="/assets/js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="/assets/js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.6.5, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">


    <script type="application/ld+json">{
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "In corpore sano",
            "logo": "/assets/images/logo/logo.png"
        }</script>
        </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Template"> <!-- INSTEAD OF Template WRITE THE NAME OF YOUR HTML FILE-->
  <meta property="og:type" content="website">
  
   <script>
      function addFood(){
          //forma u koju se stavlja
          let forma = document.getElementById("form");
          let number = document.getElementsByClassName("counter");
          //dugme za dodavanje hrane
          let button = document.getElementById("addFoodButton");
          let buttonOK = document.getElementById("submitButton");
          forma.removeChild(button);
          forma.removeChild(buttonOK);
          ///pomoc pri proveri------------------------------------
          let nevidljiviSpan = document.getElementById("numberOfFields");
          nevidljiviSpan.setAttribute("value", number.length + 1);
          //------------------------------------------------------
          
          
          //brojac za polja
          let span = document.createElement("span");
          span.name = "counterr";
          span.className = "counter";
          //lista opcija
          let lista = document.createElement("input");
          
          //lista.style.background-color = "#000000"
          let brojTrenutnihPolja = number.length + 1;
          let tmp = "food"+brojTrenutnihPolja;
          lista.setAttribute("list",tmp);
          lista.name = tmp;
          
          
          //unutrasnja lista
          let dataList = document.createElement("datalist");
          dataList.id = tmp;
          lista.style.backgroundColor = "white !important";
          //opcije za unutrasnju listu
          let options = document.getElementsByClassName("foodOption");
          for(let i = 0; i < options.length;i++){
              let option = document.createElement("option");
              option.innerHTML = options.item(i).innerHTML;
              option.value = options.item(i).value;
              dataList.appendChild(option);
          }
          lista.className = "unos";
         
          // <input type="number" style="color:black; background-color: #ffffff !important;"> g <br><br>
         let numberInput = document.createElement("input");
         numberInput.type = "number";
         numberInput.name = "g"+brojTrenutnihPolja;
         numberInput.className = "unos1";
          let pomocniSpam = document.createElement("span");
          pomocniSpam.innerHTML = "     ";
          let enter = document.createElement("br");
          lista.appendChild(dataList);
          forma.appendChild(span);
          forma.appendChild(lista);
          forma.appendChild(pomocniSpam);
          forma.appendChild(numberInput);
          pomocniSpam.innerHTML = "g";
          forma.appendChild(pomocniSpam);
          forma.appendChild(enter);
         forma.appendChild(button);
         forma.appendChild(buttonOK);
      }
      </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Rank">
    <meta property="og:type" content="website">
</head>

<body class="u-body u-xl-mode">
<?php
$uri = service('uri');
?>
<header class="u-clearfix u-custom-color-5 u-header u-sticky u-sticky-2495 u-header" id="sec-348f">
    <div class="u-clearfix u-sheet u-sheet-1">
        <a href="#" data-page-id="5475856" class="u-image u-logo u-image-1" data-image-width="254"
           data-image-height="186"
           title="In corpore sano">
            <img src="/assets/images/logo/logo.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse"
                 style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-decoration u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                   href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                    </svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <rect y="1" width="16" height="2"></rect>
                            <rect y="7" width="16" height="2"></rect>
                            <rect y="13" width="16" height="2"></rect>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-custom-font u-nav u-spacing-30 u-text-font u-unstyled u-nav-1">
                    <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                href="/user/daily-log" style="padding: 10px 0px;">Daily Log</a>
                    </li>
                    <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                href="/user/current-challenges" style="padding: 10px 0px;">Challenges</a>
                        <div class="u-nav-popup">
                            <ul class="u-h-spacing-19 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                <li class="u-nav-item"><a
                                            class="u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                            href="/user/current-challenges">Current Challenges</a>
                                </li>
                                <li class="u-nav-item"><a
                                            class="u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                            href="/user/my-challenges">My Challenges</a>
                                </li>
                                <li class="u-nav-item"><a
                                            class="u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                            href="/user/done-challenges">Done Challenges</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                href="/user/charts/water" style="padding: 10px 0px;">Charts</a>
                    </li>
                    <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                href="/user/badges" style="padding: 10px 0px;">Badges</a>
                    </li>
                    <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                href="/user/rank" style="padding: 10px 0px;">Rank</a>
                    </li>
                    <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                href="/user/my-account" style="padding: 10px 0px;">My account</a>
                    </li>
                </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="/user/daily-log"
                                                      style="padding: 10px 0px;">Daily Log</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="/user/current-challenges"
                                                      style="padding: 10px 0px;">Challenges</a>
                                <div class="u-nav-popup">
                                    <ul class="u-h-spacing-19 u-nav u-unstyled u-v-spacing-10 u-nav-4">
                                        <li class="u-nav-item"><a
                                                    class="u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                                    href="/user/current-challenges">Current Challenges</a>
                                        </li>
                                        <li class="u-nav-item"><a
                                                    class="u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                                    href="/user/my-challenges">My Challenges</a></li>
                                        <li class="u-nav-item"><a
                                                    class="u-button-style u-nav-link u-text-active-custom-color-6 u-text-custom-color-7 u-text-hover-custom-color-6"
                                                    href="/user/done-challenges">Done Challenges</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="/user/charts/water"
                                                      style="padding: 10px 0px;">Charts</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="/user/badges"
                                                      style="padding: 10px 0px;">Badges</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="/user/rank"
                                                      style="padding: 10px 0px;">Rank</a>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="/user/my-account"
                                                      style="padding: 10px 0px;">My account</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-60"></div>
            </div>
        </nav>
    </div>
</header>