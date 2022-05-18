<h1>Création de Compte</h1>
<form method="POST" action="validationCreateAccount">
    <div class="mb-3">
        <label for="user_login" class="form-label">Login</label>
        <input type="text" class="form-control" name="user_login" id="login" required>
    </div>
    <div class="mb-3">
        <label for="user_mail" class="mail">E-Mail</label>
        <input type="mail" class="form-control" name="user_mail" id="user_mail" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot De Passe</label>
        <input type="password" class="form-control" name="user_password" id="user_password" required>
    </div>
    <!-- <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirmer Votre Mot de Passe</label>
        <input type="password" class="form-control" name="mdp_membre" id="confirmPassword" required>
    </div> -->
        <button type="submit" class="btn btn-primary">Créer !</button>
</form>