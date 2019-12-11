<?php session_start();?>

<?php if (!isset($_SESSION['user'])) : ?>
  <script type="text/javascript">
  window.location.href = '<?= BASE_URL?>view/user/login.php ';
  </script>
<?php endif; ?>

<?php

require_once '../../core/ReclamationCore.php';
$reclamationCore= new ReclamationCore();
$reclamationCore->supprimer($_GET['id']);
header('location: reclamations.php');
?>
