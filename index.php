<?php
// Chargement du routeur
namespace P3_blog;
use P3_blog\Framework\Routeur;

require_once 'Autoloader.php';
Autoloader::register();

$routeur = new Routeur();
$routeur->examinerRequete();