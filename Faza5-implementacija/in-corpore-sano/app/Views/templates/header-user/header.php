<!-- Mia Vucinic 0224/2019 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="ICON" href="/assets/images/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/styles-header-footer.css">
    <link rel="stylesheet" href="/assets/css/styles-charts.css">
    <link rel="stylesheet" href="/assets/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="/assets/css/styles-nicepage-rank.css" media="screen">
    <link rel="stylesheet" href="/assets/css/styles-nicepage-challenges.css" media="screen">
    <link rel="stylesheet" href="/assets/css/styles-challenges.css" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>



    <title>In corpore sano</title>
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
            <div class="collapse navbar-collapse text-center justify-content-end" id="navbarNav" style="float:right;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/daily-log">DAILY LOG</a>
                    </li>
                    <li class="nav-item dropdown <?= ($uri->getSegment(2) == 'current-challenges' || $uri->getSegment(2) == 'my-challenges' || $uri->getSegment(2) == 'done-challenges' ? 'active' : null) ?>">
                        <a class="nav-link dropdown-toggle" href="/user/current-challenges" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">CHALLENGES</a>
    
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/user/current-challenges">CURRENT CHALLENGES</a>
                            <a class="dropdown-item" href="/user/my-challenges">MY CHALLENGES</a>
                            <a class="dropdown-item" href="/user/done-challenges">DONE CHALLENGES</a>
                        </div>
    
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(2) == 'charts' ? 'active' : null) ?>">
                        <a class="nav-link" href="/user/charts/water">CHARTS</a>
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(2) == 'badges' ? 'active' : null) ?>">
                        <a class="nav-link" href="/user/badges">BADGES</a>
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(2) == 'rank' ? 'active' : null) ?>">
                        <a class="nav-link" href="/user/rank">RANK</a>
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(2) == 'my-account' ? 'active' : null) ?>">
                        <a class="nav-link" href="/user/my-account">MY ACCOUNT</a>
                    </li>
                </ul>
            </div>
        </div>    
    </nav>
