<?php
require_once '../../core/ReclamationCore.php';





$reclamationCore= new ReclamationCore();
$rec= $reclamationCore->findById($_GET['id']);

if (isset($_POST['descp']) ){
    $reclamationCore->Traiter($_GET['id'],$rec->descp."---".$_POST['descp']);
    header('location: reclamations.php');
}






require_once '../header.php'; ?>



<main class="app-content">
      <div class="row user">

        <div class="col-md-2">

        </div>
        <div class="col-md-8">
          <div class="tab-content">
            <div class="tab-pane active show" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media"> <!--<a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>-->
                  <div class="content">
                    <h5><a href="#">Utilisateur: <?=$rec->username?></a></h5>
                    <p class="text-muted"><small>date reclamation<?=$rec->date_rec?></small></p>
                    <h6>Produit: <?=$rec->cmd_id?> </h6>
                    <h6>Quantite: <?=$rec->Qty?> </h6>
                    <h6>Prix: <?=$rec->Prix?> Dt</h6>

                  </div>
                </div>
                <div class="post-content">
                  <h6>Motif: <?=$rec->motif?></h6>
                  <p><?=$rec->descp?></p>
                  <div class="resp"  >
                    <form class="" action="#" method="post" id="formu">
                      <h6>Reponce</h6>
                      <div class="form-group">
                          <textarea class="form-control" rows="4" placeholder="Reponce" name="descp" id="descp"></textarea>
                      </div>
                      <button class="btn btn-primary" type="button" id="rep" >Repondre</button>
                      <button class="btn btn-danger" type="button" id="anu">Annuler</button>
                    </form>


                  </div>

                </div>
                <ul class="post-utility">

                  <li class="comments">
                    <button class="btn btn-primary" id="traiter">Traiter</button>
                    <button class="btn btn-danger" id="archi">Archiver</button>
                  </li>
                </ul>
              </div>

            </div>
              </div>
        </div>
      </div>
    </main>


    <script type="text/javascript">
        $(".resp").hide()
        $("#traiter").on("click",function () {
          //alert("as")
          $(".resp").show()
          $("#traiter").hide()
          $("#archi").hide()
        })

          $("#anu").on("click",function () {
            $(".resp").hide()
            $("#traiter").show()
            $("#archi").show()
          })
          $("#rep").on("click",function () {
            $("#formu").submit()
          })


    </script>
    <?php require_once '../footer.php'; ?>
