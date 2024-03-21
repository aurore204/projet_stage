<!DOCTYPE html>
<html>
<head >
    <meta name="viewport"content="width-device-width,initial-acale+1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <link rel= "stylesheet" media="screen" href="css/style.css"type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Page d'accueil avec dashboard</title>
</head>
<body>
    <?php
        include'header.php';
    ?>
    <main class="main">
    <?php
        include'navigation_user.php';
    ?>
        <div class="main--content">
            <div class="card--container">
                <h1 class="main--tittle bg-gray">tableau de bord</h1>
                <div class="card--wrapper">
                    <div class="card--wrapper1">
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">videos projecteurs presents</span>
                                    <span class="vp-values">10</span> 
                                    <i class="fas fa-tv icon"></i>
                                </div>
                            </div>
                        </div>   
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">videos projecteurs empruntes</span>
                                    <span class="vp-values">5</span> 
                                    <i class="fas fa-tv icon"></i>
                                </div>
                                
                            </div>
                        </div>   
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">climatiseurs repares</span>
                                    <span class="vp-values">10</span> 
                                    <i class="fas fa-cloud icon"></i>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="card--wrapper2">   
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">climatiseurs en cours de reparation</span>
                                    <span class="vp-values">10</span> 
                                    <i class="fas fa-cloud icon"></i>
                                </div>
                            </div>   
                        </div>
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">climatiseurs repares</span>
                                    <span class="vp-values">10</span> 
                                    <i class="fas fa-cloud icon"></i>
                                </div>
                            </div>    
                        </div>
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">impressions effectues</span>
                                    <span class="vp-values">19</span> 
                                    <i class="fas fa-print icon"></i>
                                </div>
                            </div>
                        </div>   
                    </div>       
                </div>
            </div>
        </div>
    </main>
    <div class="footer">
        <?php
            include'footer.php';
        ?>
    </div>
</body>
</html>