<!DOCTYPE html>
<html>
<head >
    <meta name="viewport"content="width-device-width,initial-acale+1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <link rel= "stylesheet" media="screen" href="css/style.css"type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Page d'accueil avec dashboard</title>
    <?php
    function compter_nbre_emprunts(){
include('connexion.php');

// Compter le nombre d'équipements
$sql = "SELECT COUNT(*) AS count FROM emprunt";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

    $nombre_emprunts = $result['count'];
    echo $nombre_emprunts;
}


function compter_nbre_user(){
include('connexion.php');

// Compter le nombre d'équipements
$sql = "SELECT COUNT(*) AS count FROM user";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

    $nombreuser = $result['count'];
    echo $nombreuser;}


    function compter_nbre_filieres(){
        include('connexion.php');
        
        // Compter le nombre d'équipements
        $sql = "SELECT COUNT(*) AS count FROM filiere";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        
            $nombre_filiere= $result['count'];
            echo $nombre_filiere;}
?>
</head>
<body>
    <?php
        include'header.php';
    ?>
    <main class="main">
    <?php
        include'navigation.php';
    ?>
    <?php $nombreEquipements=""; ?>
        <div class="main--content">
            <div class="card--container">
                <h1 class="main--tittle bg-gray">tableau de bord</h1>
                <div class="card--wrapper">
                    <div class="card--wrapper1">
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">Nombre d'emprunts</span>
                                    <span class="vp-values"><?php compter_nbre_emprunts(); ?></span> 
                                    <i class="fas fa-handshake icon"></i>
                                </div>
                            </div>
                        </div>   
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">Nombre utilisateurs</span>
                                    <span class="vp-values"> <?php compter_nbre_user(); ?></span> 
                                    <i class="fas fa-user icon"></i>
                                </div>
                                
                            </div>
                        </div>   
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">Nombre filieres</span>
                                    <span class="vp-values"> <?php compter_nbre_filieres(); ?></span> 
                                    <i class="fas fa-university icon"></i>
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