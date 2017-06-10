<?php $this->titre = "Billet pour l'Alaska - Connexion" ?>

<p>Bonjour, veillez passer le contrôle de sécurité : </p>
<form action="connexion/connecter" method="post" >
    <input name="login" type="text" placeholder="Entrez votre login" required autofocus>
    <input name="mdp" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit" >Connexion</button>
</form>

