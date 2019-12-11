<?php
    require_once '../../core/EvenementCore.php';
    $evenementCore= new EvenementCore();

    if(isset($_POST['idPar'])){
      $evenementCore->Payee($_POST['idPar']);
    }


    $event=$evenementCore->findById($_GET['id']);
    if($event==null)die;

    $reservationsNonPayee=$evenementCore->getReservationsNonPayee($_GET['id']);
    $reservationsPayee=$evenementCore->getReservationsPayee($_GET['id']);
  //  var_dump($reservations);die;
require_once '../header.php'; ?>

<style>
#notfoundNP{
  display: none;
}
#notfoundP{
  display: none;
}
</style>


<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Reservations</h1>
          <p></p>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="tile">
          <div class="tile-body">
            <div class="tile-body">Reservation Non Payee<div style="float:right;"> <input id="nameNP" type="text" name="" value="" placeholder="Rechercher"> </div></div>
            <br>
            <form class="" action="#" method="post" id="formu">


            <table class="table table-hover table-bordered" id="NonP">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>nb place</th>
                  <th>Prix total</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reservationsNonPayee as  $res): ?>
                  <tr>
                    <td><?=$res->username?></td>

                    <td><?=$res->nb_place?></td>
                    <td><?=$res->prix * $res->nb_place ?> DT</td>
                    <td><button class="btn btn-primary" type="button" name="reservation" onclick="payeeRes(<?=$res->id?>)">payee</button> </td>

                  </tr>
                <?php endforeach; ?>
                <tr id='notfoundNP'>
                 <td colspan='4'>Pas de resultat trouver  </td>
               </tr>
              </tbody>
            </table>
              </form>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="tile">
          <div class="tile-body">
            <div class="tile-body">Reservation Payee <div style="float:right;"> <input id="nameP" type="text" name="" value="" placeholder="Rechercher"> </div></div>
            <br>
            <table class="table table-hover table-bordered" id="P">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Nombre deb place</th>
                  <th>Prix total</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($reservationsPayee as  $res): ?>
                  <tr>
                    <td><?=$res->username?></td>

                    <td><?=$res->nb_place?></td>
                    <td><?=$res->prix * $res->nb_place ?> DT</td>


                  </tr>
                <?php endforeach; ?>
                <tr id='notfoundP'>
                 <td colspan='3'>Pas de resultat trouver</td>
               </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
</main>


<script type="text/javascript">
  function payeeRes(id) {
    //alert(id)
    var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "idPar").val(id);
               $('#formu').append(input);
         $('#formu').submit()
  }



  $('#nameNP').keyup(function(){
      // Search Text
      var search = $(this).val();

      // Hide all table tbody rows
      $('#NonP tbody tr').hide();

      // Count total search result
      var len = $('#NonP tbody tr:not(#notfoundNP) td:nth-child(1):contains("'+search+'")').length;

      if(len > 0){
        // Searching text in columns and show match row
        $('#NonP tbody tr:not(#notfoundNP) td:contains("'+search+'")').each(function(){
           $(this).closest('tr').show();
        });
      }else{
        $('#notfoundNP').show();
      }

    });

    $('#nameP').keyup(function(){
        // Search Text
        var search = $(this).val();

        // Hide all table tbody rows
        $('#P tbody tr').hide();

        // Count total search result
        var len = $('#P tbody tr:not(#notfoundP) td:nth-child(1):contains("'+search+'")').length;

        if(len > 0){
          // Searching text in columns and show match row
          $('#P tbody tr:not(#notfoundP) td:contains("'+search+'")').each(function(){
             $(this).closest('tr').show();
          });
        }else{
          $('#notfoundP').show();
        }

      });

</script>





<?php require_once '../footer.php'; ?>
