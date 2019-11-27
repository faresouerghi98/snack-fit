<?php

require_once '../../core/EvenementCore.php';
require_once '../../entities/Evenement.php';
$evenementCore = new EvenementCore();

$event= $evenementCore->findById($_GET['id']);

if (isset($_POST['nom']) && isset($_POST['descp']) && isset($_POST['lieu']) && isset($_POST['dated']) && isset($_POST['datef']) && isset($_POST['image']) && isset($_POST['nb_place']) && isset($_POST['prix'])) {

    $event = new Evenement($_GET['id'], $_POST['nom'], $_POST['descp'], $_POST['lieu'], $_POST['dated'], $_POST['datef'], $_POST['image'], $_POST['nb_place'],$_POST['prix']);
    //var_dump($evenement);
    $evenementCore->modifier($event);
    //die();
}

require_once '../header.php';
?>


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
            <form action="" method="post">
                <div class="tile-body">Modifier un Evennement

                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nom Evennenment" name="nom" value="<?= $event->nom ?>">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Description" name="descp" ><?= $event->descp ?></textarea>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Lieu Evennenment" name="lieu" value="<?= $event->lieu ?>">
                        </div>




                        <div class="form-group">
                            <input class="form-control" id="demoDate" type="text" placeholder="Date Debut" name="dated" value="<?= $event->dated ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="demoDate2" type="text" placeholder="Date Fin" name="datef" value="<?= $event->dated ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" placeholder="NB de place disponible" name="nb_place" value="<?= $event->nb_place ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" placeholder="Prix pour une place" name="prix" value="<?= $event->prix ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">choisir une image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Modifier</button>
                    <a href="supprimer.php?id=<?= $_GET['id']?>" class="btn btn-danger">Supprimer</a>
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
</script>

<?php require_once '../footer.php'; ?>
