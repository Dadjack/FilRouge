<h1>Page de connexion</h1>
<form method="POST" action="validationLogin">
    <div class="mb-3">
        <label for="user_login" class="form-label">Login</label>
        <input type="text" class="form-control" name="user_login" id="login" required>
    </div>
    <div class="mb-3">
        <label for="user_password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="user_password" id="user_password" required>
    </div>
        <button type="submit" name="idUser" class="btn btn-primary">Connexion</button>
</form>