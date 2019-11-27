<?php
require_once '../../core/EvenementCore.php';
require_once '../../entities/Evenement.php';


if (isset($_POST['nom']) && isset($_POST['descp']) && isset($_POST['lieu']) && isset($_POST['dated']) && isset($_POST['datef']) && isset($_POST['image']) && isset($_POST['nb_place']) && isset($_POST['prix'])) {



    $evenement = new Evenement(-1, $_POST['nom'], $_POST['descp'], $_POST['lieu'], $_POST['dated'], $_POST['datef'], $_POST['image'], $_POST['nb_place'],$_POST['prix']);
    $evenementCore = new EvenementCore();
    //var_dump($evenement);
    $evenementCore->ajouter($evenement);
    header('location: events.php');
    //die();
}


require_once '../header.php'; ?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Evenements</h1>
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
            <form action="" method="post" id="formu">
                <div class="tile-body">Ajouter un Evenement

                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nom Evenenment" name="nom">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Description" name="descp" id="descp"></textarea>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Lieu Evennenment" name="lieu"id="lieu">
                        </div>




                        <div class="form-group">
                            <input class="form-control" id="demoDate" type="text" placeholder="Date Debut" name="dated">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="demoDate2" type="text" placeholder="Date Fin" name="datef">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" placeholder="NB de place disponible" name="nb_place"id="nb_place">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" placeholder="Prix pour une place" name="prix" id="prix">
                        </div>
                        <div class="form-group">
                            <label class="control-label">choisir une image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="button" onclick="verifForm()">Ajouter</button>
                </div>
                </form>
            </div>
        </div>
    </div>


</main>



<script type="text/javascript" src="<?= WR_URL ?>js/plugins/bootstrap-datepicker.min.js"></script>
<script>
    $('#demoDate2').hide()
    $('#demoDate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });
    $('#demoDate2').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });
    $('#demoDate').datepicker('setStartDate', new Date())
    $('#demoDate').on('changeDate', function() {
        $('#demoDate2').show()
        var a = $('#demoDate').datepicker('getDate');
        $('#demoDate2').datepicker('setStartDate', a)

    });

    function verifPrix() {
      console.log($('#prix').val())
      if($('#prix').val()<0) {alert('prix');return false}
      return true;
    }
    function verifNbPlace() {
      if($('#nb_place').val()<20) {alert('palce');return false}
      if($('#nb_place').val()>100000) {alert('place');return false}
      return true
    }
    function verifDescp() {
      if($('#descp').val().length<10) {alert('descp');return false}
      if($('#descp').val().length>250) {alert('descp');return false}
      return true
    }
    function verifLieu() {
      if($('#lieu').val().length<1) {alert('lieu');return false}
      if($('#lieu').val().length>50) {alert('lieu');return false}
      return true
    }
    function verifForm() {
      if(verifPrix()&&verifNbPlace()&&verifDescp()&&verifLieu()) $('#formu').submit()

    }
</script>

<script language="javascript">

	function tester(){
	var test=1;
	var num=document.f.idlivraison.value;
	if	(num==0){
		alert ("you must fill the number ");
		test=0;
	}

	else if (num.length!=8)
	{ test=0;
		alert("this must contain 8 numbers ") ;
	}

	 var adresse=document.f.adressel.value;
	 if (adresse=="")
	 {
	 alert("adress must be filled");
	 document.getElementById("element").style.backgroundColor="red";
	 }
	 var ref=document.f.numfacture.value;
	 if (ref=="")
	 {
	   alert("product reference must be filled");
	   document.getElementById("ref").style.backgroundColor="red";
	}
	 var qt=document.f.idlivreur.value;
	  if (qt=="")
	  {
		 alert("quantity must be filled ");
	 document.getElementById("qt").style.backgroundColor="red";
	}
		else if (qt>5){
			test=0;
			alert("quantity must be filled and not more than 5" );
		}
	 else if (test==1)
	 {
		 alert("we will send you an email to confirm your delivery in a maximum of 24 hours");
	 }

}
</script>

<?php require_once '../footer.php'; ?>
