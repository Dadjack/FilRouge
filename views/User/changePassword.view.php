<h1>Modification du mot de passe - <?= $_SESSION['profile']['login'] ?></h1>

<form method="POST" action="<?= URL ?>account/validationChangePassword">
    <div class="mb-3">
        <label for="oldPass" class="form-label">Ancien mot de passe</label>
        <input type="password" class="form-control" id="oldPass" name="oldPass" required>
    </div>
    <div class="mb-3">
        <label for="newPass" class="form-label">Nouveau mot de passe</label>
        <input type="password" class="form-control" id="newPass" name="newPass" required>
    </div>
    <div class="mb-3">
        <label for="confirmNewPass" class="form-label">Confirmation nouveau mot de passe</label>
        <input type="password" class="form-control" id="confirmNewPass" name="confirmNewPass" required>
    </div>
    <div class="alert alert-danger d-none" id="erreur">
        Les mots de passe ne correspondent pas !!!
    </div>

    <button type="submit" class="btn btn-primary" id="btnValidation" disabled>Valider</button>
</form>