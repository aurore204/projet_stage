<?php
include("connexion.php")?>
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
                    include'navigation_m.php';
                ?>
                _<?php

                ?>
            </div>
            <div class="container py-2">
                <form action="enregistrement.php" method="POST" class=" row col-10 m-5 g-3 form">
                <legend>REMPLISSEZ LE FORMULAIRE</legend>
                        <div  class=" col-md-5">
                            <label class="form-label">nom du climatiseur:</label>
                            <input  class="form-control" type="text" name="name" placeholder="entrer le nom du climatiseur" id="nameC">
                        </div>
                        <div  class=" col-md-5" >
                            <label class="form-label">Entrer ID climatiaseur:</label>
                            <input class="form-control " type="text" name="id" ></label>
                        </div>
                        <div  class="col-md-5">
                            <label class="form-label">statut du climatiseur:</label>
                            <select name="statut" class="form-select">
                                <option selected="selected">....</option>
                                <option>en cours de reparation...</option>
                                <option>En etat</option>
                                <option>Inreparable</option>
                            </select>
                        </div> 
                        <div  class=" col-md-5">
                            <label class="form-label"> nom du maintenancier:</label>
                            <input  class="form-control" type="text" name="nameM" placeholder="entrer le nom nom complet" id="vorname">
                        </div>
                        <div  class="  col-md-5">
                            <label class="form-label">classe ou se trouve le climatiseur:</label>
                             <input  class="form-control"  type="text" placeholder="entrer la salle de classe" name="salleC" id="salle" >
                        </div> 
                        <div  class=" col-md-5" >
                            <label class="form-label">Entrer le numero de telephone:</label>
                            <input class="form-control " type="text" name="numberM" ></label>
                        </div>
                        <div  class="col-md-5">
                            <label class="form-label">Date d'intervention:</label>
                            <input  class="form-control " type="date" name="date"></label>
                        </div> 
                        <div  class=" col-md-5">
                            <label class="form-label">Date de fin d'intervention:</label>
                            <input class="form-control " type="date" name="date" class="form-control"></label>
                        </div> 
                        <div class="row mb-2 ">
                            <legend class="col-form-label col-sm-2 pt-0">Origines de la defaillance</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="def" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">Manque d'entretien</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="def" id="gridRadio3" value="option3">
                                    <label class="form-check-label" for="gridRadios3">Defectuosite</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="def" id="gridRadios4" value="option4">
                                    <label class="form-check-label" for="gridRadios4">Manipulation</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="def" id="gridRadios5" value="option5">
                                    <label class="form-check-label" for="gridRadios5">Utilisation non conforme</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="def" id="gridRadios6" value="option6">
                                    <label class="form-check-label" for="gridRadios6">Autre</label>
                                </div>
                            </div> 
                        <div  class="col-md-12" >
                            <label class="form-label" for="message">Description de la panne</label >
                            <textarea class="form-control" name="message" cols="40" rows="7" placeholder="decrivez la panne"></textarea><br>
                        </div> 
                        <div class="row  ">
                            <div class="col">
                                <button  class="btn btn-primary btn-lg" type="submit"name="enre" id="envoi">enregistrer</button>
                            </div>
                            <div class="col">
                                <a href=" lsts_clim.php"class="btn btn-dark btn-lg  my-3" type="submit"name="enre" id="lst_C" custom-width>Voir la liste</a>
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