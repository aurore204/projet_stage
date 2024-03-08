<html>
<head >
    <meta name="viewport"content="width-device-width,initial-acale+1.0">
    <link rel= "stylesheet"href="css/navigation1.css"type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css.map">
    <title>Page d'accueil avec dashboard</title>
</head>
<body>
<div class="sidebar">
        <ul class="menu">
            <li>
                <a href="#" >
                <div class="align">
                    <i class="fa fa-tachometer-alt" style="font-size:20px"></i>
                    <span><a href="accueil.php" class="item">Dashboard</a></span>
                </a>
            </li> 
            <li >
                <a href="#">
                <div class="align">
                    <i class="fas fa-table" style="font-size:20px"></i>
                    <span><a href="lsts_materiels.php"class="item">Suivi des videos projecteurs</a></span>
            </li>
            <li>
                <a href="#">
                <div class="align">
                    <i class="fas fa-chart-bar" style="font-size:20px"></i>
                    <span><a href="rapport.php" class="item">Rapports</a></span>
            </li>
            <li>
            <a href="#">
            <div class="align">
                    <i class="fas fa-box" style="font-size:20px"></i>
                    <span><a href="inventaire.php" class="item">Inventaire</a></span>
            </li>
            <li class="active">
                <a href="#">
                <div class="align">
                    <i class="fas fa-wrench" style="font-size:20px"></i>
                    <span><a href="lsts_clim.php" class="item">Maintenance</a></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="align">
                        <i class="fa fa-print" style="font-size:20px"></i>
                        <span><a href="impressions.php" class="item">Impressions</a></span>
                    </div>
                </a>
            </li>
            <div class="align" >
                    <div id="utilisateur">
                        <i class="fa fa-users" class="icon" style="font-size:20px"></i>
                        <div id="dropdown">
                            <div class="chevron">
                                <span class=" item "> utilisateurs </span>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <ul class="sub-menu">
                                <li><a href="users.php" >directeur</a></li>
                                <li><a href="ana.php">responsable</a></li>
                                </ul>  
                    </div>
                    </div>  
                </div>
            <li>
                <a href="#">
                    <div class="align">
                        <i class="fas fa-cog" style="font-size:20px"></i>
                        <span><a href="users.php" class="item">parametres</a></span>
                    </div>
                </a>
            </li>
            <li class="logout">
                <a href="#">
                <div class="align">
                    <i class="fa fa-sign-out-alt" style="font-size:20px"></i>
                    <span><a href="logout.php" class="item">Logout</a></span>
                </div>
                </a>
            </li> 
        </ul>
    </div>
</body>
</html>
