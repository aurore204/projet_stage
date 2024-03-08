<?php
    require_once('connection.php');
    if(isset($_POST) &!empty($_POST)){
        $name=($_POST['name']);
        $vorname=($_POST['vorname']);
        $salle=($_POST['salle']);
        $mat=($_POST['mat']);
        $date=($_POST['date']);
        $number=($_POST['number']);
        $sexe=($_POST['sexe']);
        $ID=($_POST['ID']);
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style_enregistrement.css" type="text/css">
        <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <title> mon enregistrement</title>
    </head>
    <body>
        <?php
             include'header.php';
        ?>
        <main id="main">
            <div class="nav">
                <?php
                    include'navigation1.php';
                ?>
                <?php

                ?>
            </div>
            <div class="container py-3">
                <form action="enregistrement.php" method="POST" class="row col-8 m-5 g-3 form">
                        <legend >MODIFIFIER L'EQUIPEMENT </legend>
                        <div  class=" col-md-6 ">
                            <label class="form-label">nom:</label>
                            <input  class="form-control" type="text" name="name" placeholder="entrer le nom" id="name">
                        </div>
                        <div  class=" col-md-6">
                            <label class="form-label"> prenom:</label>
                            <input  class="form-control" type="text" name="vorname" placeholder="entrer le prenom" id="vorname">
                        </div>
                        <div  class="  col-md-6">
                            <label class="form-label">classe:</label>
                             <input  class="form-control"  type="text" placeholder="entrer la salle de classe" name="salle" id="salle" >
                        </div> 
                        <div  class="col-md-6">
                            <label class="form-label">Materiel emprunter:</label>
                            <select name="mate" class="form-select">
                                <option selected="selected">choisissez le materiel empruntes</option>
                                <option>videos-projecteurs</option>
                                <option>rallonges</option>
                            </select>
                        </div> 
                        <div  class="col-md-6">
                            <label class="form-label">Date d'emprunt:</label>
                            <input  class="form-control " type="date" name="date"></label>
                        </div> 
                        <div  class=" col-md-6">
                            <label class="form-label">Date de retour:</label>
                            <input class="form-control " type="date" name="date" class="form-control"></label>
                        </div> 
                        <div  class=" col-md-6" >
                            <label class="form-label">Entrer le numero de telephone:</label>
                            <input class="form-control " type="text" name="number" ></label>
                        </div>
                        <div  class=" col-md-6" >
                            <label class="form-label">Entrer ID du materiel:</label>
                            <input class="form-control " type="text" name="id" ></label>
                        </div>
                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexe" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">M </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexe" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">F</label>
                                </div>
                            </div> 
                            <div class="col-sm-10">
                        </div> 
                        <div  class="col-md-12" >
                            <label class="form-label" for="message">message</label >
                            <textarea class="form-control" name="message" cols="40" rows="5" placeholder="decrivez la le materiel"></textarea><br>
                        </div> 
                        <div class="row  ">
                            <div class="col">
                                <button  class="btn btn-dark" type="submit"name="modi" id=envoi>modifier</button>
                            </div>
                            <div class="col">
                                <a href=" lsts_materiels.php"class="btn btn-success my-3" type="submit"name="enre" id=lst custom-width>Voir la liste</a>
                            </div>
                        </div>    
                    </fieldset>
                </form> 
            </div>
        </main>  
        <div class="footer">
            <h1> voici mon application</h1>
        </div>
        </div>
 
    </body>
</html>