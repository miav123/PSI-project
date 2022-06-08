<!--Author Teodora Glišić 19-0572-->

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
  <title>Badges</title> <!-- CHANGE THE TITLE TO MATCH THE NAME OF THE CORRESPONDING HTML FILE -->
  <link rel="stylesheet" href="/assets/css/nicepage.css" media="screen">
  <link rel="stylesheet" href="/assets/css/Badges.css" media="screen">
  <link rel="stylesheet" href="/assets/css/styles-header-footer.css">
  <!-- CHANGE THE NAME OF .CSS DOCUMENT TO MATCH THE NAME OF THE CORRESPONDING HTML FILE -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
    crossorigin="anonymous"></script>
  <!-- IF YOU USE JS, IMPORT .JS DOCUMENTS HERE -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

  <meta name="generator" content="Nicepage 4.6.5, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

  <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "In corpore sano",
		"logo": "../images/logo.png"
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Template"> <!-- INSTEAD OF Template WRITE THE NAME OF YOUR HTML FILE-->
  <meta property="og:type" content="website">
</head>

<body>
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
                        <a class="nav-link" href="/user/daily-log">DAILY LOG</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">CHALLENGES</a>
    
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/user/current-challenges">CURRENT CHALLENGES</a>
                            <a class="dropdown-item" href="/user/my-challenges">MY CHALLENGES</a>
                            <a class="dropdown-item" href="/user/done-challenges">DONE CHALLENGES</a>
                        </div>
    
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(2) == 'charts' ? 'active' : null) ?>">
                        <a class="nav-link" href="/user/charts">CHARTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" <?= ($uri->getSegment(2) == 'badges' ? 'active' : null) ?> href="/user/badges">BADGES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/rank">RANK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/my-account">MY ACCOUNT</a>
                    </li>
<!--                    <li class="nav-item">
                        <a class="nav-link" href="/logout">LOG OUT</a>
                    </li>-->
                </ul>
            </div>
        </div>    
    </nav>
  <br>

