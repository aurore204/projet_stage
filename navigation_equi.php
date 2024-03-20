<html>
<head >
    <meta name="viewport"content="width-device-width,initial-acale+1.0">
    <link rel= "stylesheet"href="css/navigation.css"type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist\css\bootstrap.css">

    <title>Page d'accueil avec dashboard</title>
</head>
<body>
<div class="sidebar close">
        <ul class="menu">
            <li >
                <a href="#" >
                <div class="align">
                    <i class="fa fa-tachometer-alt" style="font-size:20px"></i>
                    <span><a href="accueil.php" class="item">Dashboard</a></span>
                </a>
            </li> 
            <li>
                <div class="align">
                    <i class="fas fa-table" class="icon" style="font-size:20px"></i> <!-- Icône Font Awesome pour la gestion des emprunts -->
                    <span><a href="liste_emprunts.php" class="item">Suivi des emprunts</a></span>
                    <div class="dropdown">
                        <div class="chevron">
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul class="sub-menu">
                            <li><a href="liste_Emprunteur"><i class="fas fa-users"></i> Gestion des emprunteurs</a></li>
                            <li><a href="liste_filiere"><i class="fas fa-school"></i> Gestion des filières</a></li>
                        </ul>  
                    </div>
                </div>
            </li>

            <li class="active">
                <div class="align">
                    <i class="fas fa-desktop"  class="icon"style="font-size:20px"></i>
                    <span><a href="liste_equipement.php" class="item">Gestion des equipements </a></span>
                    <div class="dropdown">
                        <div class="chevron">
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul class="sub-menu">
                            <li><a href="liste_type_equi.php"><i class="fas fa_tables"></i> Gestion des types equipements</a></li>
                            <li><a href="liste_equipement.php"><i class="fas fa_tables"></i> Gestion des equipements</a></li>

                        </ul>  
                    </div>
                </div>
            </li>
            <li>
                <div class="align">
                    <i class="fas fa-chart-bar"  class="icon"style="font-size:20px"></i>
                    <span><a href="rapport.php" class="item">Rapports</a></span>
                </div>
            </li>
            <li>
            <div class="align">
                    <i class="fas fa-box" class="icon" style="font-size:20px"></i>
                    <span><a href="inventaire.php" class="item">Inventaire</a></span>
                </div>
            </li>
            <li>
                <div class="align">
                    <i class="fas fa-wrench"  class="icon"style="font-size:20px"></i>
                    <span><a href="lsts_clim.php" class="item">Maintenance </a></span>
                    <div class="dropdown">
                        <div class="chevron">
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul class="sub-menu">
                            <li><a href="#"><i class="fas fa-exclamation-triangle"></i> Gestion des pannes</a></li>
                            <li><a href="lsts_materiels.php"><i class="fas fa-users"></i> Gestion des interventionnaires</a></li>
                            <li><a href="lsts_materiels.php"><i class="fas fa-wrench"></i> Gestion des interventions</a></li>
                            <li><a href="lsts_materiels.php"><i class="fas fa-snowflake"></i> Gestion des climatiseurs</a></li>


                        </ul>  
                    </div>
                </div>
            </li>
            <li>
                <a href="#">
                    <div class="align">
                        <i class="fas fa-cog" style="font-size:20px"></i>
                        <span><a href="users.php" class="item">parametres</a></span>
                    </div>
                </a>
            </li>
            <li>
                <div class="align">
                    <i class="fas fa-users" class="icon" style="font-size:20px"></i> <!-- Icône Font Awesome pour la gestion des emprunts -->
                    <span><a href="liste_user.php" class="item">Gestion des utilisateurs</a></span>
                    
                </div>
            </li>
            <li class="logout">
                <div class="align">
                    <i class="fa fa-sign-out-alt"  class="icon"style="font-size:20px"></i>
                    <span><a href="logout.php" class="item">Logout</a></span>
                    <script src="https:cdn.jsdelivr.net/npm/@popperjs/core@2..min.js/10.2/dist/umd/popper"></script>
                    <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
                </div>
            </li> 
        </ul>
    </div>
   

</body>
</html>
