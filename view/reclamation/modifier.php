<?php
require_once '../header.php';
?>

<?php if (!isset($_SESSION['user'])) : ?>
  <script type="text/javascript">
  window.location.href = '<?= BASE_URL?>view/user/login.php ';
  </script>
<?php endif; ?>

<?php

require_once '../../core/ReclamationCore.php';
require_once '../../entities/Reclamation.php';
$reclamationCore= new ReclamationCore();

$rec=$reclamationCore->findById($_GET['id']);

if(isset($_POST['descp']) && isset($_POST['motif'])){





            $motif=$_POST['motif'];

            $rec = new Reclamation($_GET['id'],$_SESSION['user']->id,$_GET['id'],$motif,$_POST['descp']);
            $reclamationCore->modifier($rec);


}

?>


<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Reclamation</h2>
                            </div>

                            <form action="#" method="post">
                                <div class="row">

                                    <div class="col-12 mb-3">
                                        <select name="motif" id="motif" class="w-100" id="country">
                                            <option value="Produit non conforme" <?= ($rec->motif=="Produit non conforme")? "selected" : ""?> >Produit non conforme</option>
                                            <option value="Produit Perimee" <?= ($rec->motif=="Produit Perimee") ? "selected" : ""?> >Produit Perimee</option>
                                            <option value="Autre" <?= ($rec->motif!="Produit non conforme" && $rec->motif!="Produit Perimee")? "selected" : ""?>>Autre</option>
                                        </select>
                                    </div>
                                    <input type="text" id="autremotif" name="autremotif" hidden value="<?= $rec->motif ?>" >

                                    <div class="col-12 mb-3">
                                        <textarea name="descp" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="description"><?= $rec->descp ?></textarea>
                                    </div>

                                    <input class="btn" type="submit" value="Envoyer" id="">

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
