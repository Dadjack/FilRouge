<h1>Page de gestion des droits des utilisateurs</h1>
<table class="table">
    <thead>
        <tr>
            <th>Login</th>
            <th>Validé</th>
            <th>Role</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['user_login'] ?></td>
                <td><?= (int)$user['is_valid'] === 0 ? "non validé" : "validé" ?></td>
                <td>
                    <?php if($user['role'] === "administrator") : ?>
                        <?= $user['role'] ?>
                    <?php else: ?>
                        <form method="POST" action="<?= URL ?>administration/validationChangeRole">
                            <input type="hidden" name="user_login" value="<?= $user['user_login'] ?>" />
                            <select class="form-select" name="role" onchange="confirm('Confirmez vous la modification ?') ? submit() : document.location.reload()">
                                <option value="user" <?= $user['role'] === "user" ? "selected" : ""?>>Utilisateur</option>
                                <option value="Suser" <?= $user['role'] === "Suser" ? "selected" : ""?>>Super Utilisateur</option>
                                <option value="administrator" <?= $user['role'] === "administrator" ? "selected" : ""?>>Administrateur</option>
                            </select>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </thead>

</table>