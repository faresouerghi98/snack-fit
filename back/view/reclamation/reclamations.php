<?php
require_once '../../core/ReclamationCore.php';

$reclamationCore= new ReclamationCore();
$reclamations= $reclamationCore->findAllEnAttente();
//var_dump($reclamations);die;
require_once '../header.php'; ?>
<main class="app-content">
<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Reclamation</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Produit</th>
                    <th>Qty</th>
                    <th>Prix</th>
                    <th>User</th>
                    <th>motif</th>
                    <th>etat</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <<?php foreach ($reclamations as $rec): ?>
                    <tr>
                      <td><?= $rec->cmd_id?></td>
                      <td><?= $rec->Qty?></td>
                      <td><?= $rec->Prix?></td>
                      <td><?= $rec->username?></td>
                      <td><?= $rec->motif?></td>
                      <td><?= $rec->etat?></td>
                      <td><a href="details.php?id=<?= $rec->id ?>" >Detail</a> </td>
                    </tr>
                  <?php endforeach; ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php require_once '../footer.php'; ?>
