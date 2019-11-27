<?php
session_start();

require_once '../../core/EvenementCore.php';
$evenementCore = new EvenementCore();

$event= $evenementCore->supprimer($_GET['id']);
header('location: events.php');
?>
