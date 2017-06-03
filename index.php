<?php
// Chargement du routeur
namespace P3_blog;
require_once 'Framework\Routeur.php';
use P3_blog\Framework\Routeur;

$routeur = new Routeur();
$routeur->examinerRequete();