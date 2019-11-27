<?php
require_once '../header.php'?>

 <?php if (!isset($_SESSION['user'])) : ?>
   <script type="text/javascript">
   window.location.href = '<?= BASE_URL?>view/user/login.php ';
   </script>
 <?php endif; ?>

<?php
require_once '../../core/ReclamationCore.php';




$reclamationCore= new ReclamationCore();
$reclamations= $reclamationCore->findByUser($_SESSION['user']->id);


?>



<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Mes Reclamations</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>

                                        <th>Motif</th>
                                        <th>description</th>
                                        <th>date</th>
                                        <th>etat</th>
                                        <th>action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($reclamations as $rec): ?>
                                    <tr>
                                    <td class="cart_product">
                                            <h5><?= $rec->motif ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $rec->descp ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $rec->date_rec ?></h5>
                                        </td>
                                        <td class="cart_product_price">
                                            <h5><?= $rec->etat ?></h5>
                                        </td>
                                        <?php if ($rec->etat=="en attente"): ?>
                                          <td class="cart_product_desc">
                                              <a href="modifier.php?id=<?= $rec->id ?>"> <h5>Modifier</h5> </a>
                                              <a href="supprimer.php?id=<?= $rec->id ?>"> <h5>Supprimer</h5> </a>
                                          </td>

                                        <?php endif; ?>


                                    </tr>
                                    <?php endforeach?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <?php require_once '../header.php'?>
