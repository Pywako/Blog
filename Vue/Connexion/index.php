<?php $this->titre = "Connexion" ?>

<form action="connexion/connecter" method="post" class="form-signin">
    <h3 class="form-signin-heading">Veuillez vous identifier :</h3>
    <label for="login" class="sr-only">Login</label>
    <input name="login" id="login" type="text" class="form-control" placeholder="Entrez votre login" required autofocus>
    <label for="mdp" class="sr-only">Mot de passe</label>
    <input name="mdp" id="mdp" type="password" class="form-control" placeholder="Entrez votre mot de passe" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit" >Connexion</button>
</form>

