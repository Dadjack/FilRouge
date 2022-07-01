<div class="text-center">
    <h1>Welcome <?= $user['user_login'] ?></h1>
    

    <!--<> CHANGE IMAGE --<>-->
    <div>
        <div>
            <img src="<?= URL ?>public/images/<?= $user['image'] ?>" width="100px" alt="photo de profil"/>
        </div>
        <form method="POST" action="<?= URL ?>account/validationChangeImage" enctype="multipart/form-data">
            <label for="image">CHANGER L'IMAGE DU PROFIL :</label><br/> 
            <input type="file" class="form-control-file" id="image" name="image" onchange="submit();" />
        </form>
    </div>

    <!--<> CHANGE MAIL --<>-->
    <div id="mail" >
        E-MAIL : <?= $user['user_mail'] ?>
        <button class="btn btn-primary" id="btnChangeMail">
            <svg xmlns="http://www.w3.org/2000/svg" id="svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
        </button>
    </div>
    <div id="changeMail" class="d-none">
        <form method="POST" action="<?= URL; ?>account/validationChangeMail">
            <div class="row">
                <label for="mail" class="col-2 col-form-label">E-MAIL :</label>
                <div class="col-8">
                    <input type="mail" class="form-control" name="user_mail" value="<?= $user['user_mail'] ?>" />
                </div>
                <div class="col-2">
                    <button class="btn btn-success" id="btnValidChangeMail" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!--<> CHANGE NAME --<>-->
    <div id="name">
        NOM : <?= $user['user_name'] ?>
        <button class="btn btn-primary" id="btnChangeName">
            <svg xmlns="http://www.w3.org/2000/svg" id="svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
        </button>
    </div>
    <div id="changeName" class="d-none">
        <form method="POST" action="<?= URL; ?>account/validationChangeName">
            <div class="row">
                <label for="name" class="col-2 col-form-label">NOM :</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="user_name" value="<?= $user['user_name'] ?>" />
                </div>
                <div class="col-2">
                    <button class="btn btn-success" id="btnValidChangeName" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!--<> CHANGE FIRSTNAME --<>-->
    <div id="firstName">
    PRENOM : <?= $user['user_firstname'] ?>
        <button class="btn btn-primary" id="btnChangeFirstName">
            <svg xmlns="http://www.w3.org/2000/svg" id="svg" id="svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
        </button>
    </div>
    <div id="changeFirstName" class="d-none">
        <form method="POST" action="<?= URL; ?>account/validationChangeFirstName">
            <div class="row">
                <label for="firstName" class="col-2 col-form-label">PRENOM :</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="user_firstname" value="<?= $user['user_firstname'] ?>" />
                </div>
                <div class="col-2">
                    <button class="btn btn-success" id="btnValidChangeFirstName" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" id="svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!--<> CHANGE PHONE --<>-->
    <div id="phone">
        TELEPHONE : <?= $user['user_phone'] ?>
        <button class="btn btn-primary" id="btnChangePhone">
            <svg xmlns="http://www.w3.org/2000/svg" id="svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
        </button>
    </div>
    <div id="changePhone" class="d-none">
        <form method="POST" action="<?= URL; ?>account/validationChangePhone">
            <div class="row">
                    <label for="phone" class="col-2 col-form-label">TELEPHONE :</label>
                    <div class="col-8">
                        <input type="number" class="form-control" name="user_phone" value="<?= $user['user_phone'] ?>" />
                    </div>
                <div class="col-2">
                    <button class="btn btn-success" id="btnValidChangePhone" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg"  id="svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<table class="table border-dark d-flex justify-content-center">
    <!-- AJOUTER UN PRODUIT -->
    <td class="align-middle"><a href="<?= URL ?>userProducts/ap" class="btn btn-success border-dark">AJOUTER UN PRODUIT</a></td>
    <!-- VOIR MES PRODUITS -->
    <td class="align-middle"><a href="<?= URL ?>userProducts" class="btn btn-success border-dark">MES PRODUITS</a></td>
</table>
<table class="table border-dark  d-flex justify-content-center">    
    <!-- CHANGER L'ADRESSE -->
    <td class="align-middle"><a href="<?= URL ?>userAddress" class="btn btn-warning border-dark">CHANGER MON ADRESSE</a></td>
    </table>
    <table class="table border-dark d-flex justify-content-center">    
    <!-- CHANGER LA VILLE -->
    <td class="align-middle"><a href="<?= URL ?>userTown" class="btn btn-warning border-dark">CHANGER LA VILLE</a></td>
    </table>
<table class="table border-dark d-flex justify-content-center ">
    <!--<> CHANGER LE MOT DE PASSE --<>-->
    <td class="align-middle"><a href="<?= URL ?>account/changePassword" class="btn btn-warning border-dark">CHANGER LE MOT DE PASSE</a>
    <button id="btnDelAccount" class="btn btn-danger border-dark">SUPPRIMER SON COMPTE</button>

    <!-- SUPPRESSION DU COMPTE -->
    <div id="deleteAccount" class="d-none m-2">
        <div class="alert alert-danger">
            VEUILLEZ CONFIRMER LA SUPPRESSION DU COMPTE.
            <br />
            <a href="<?= URL ?>account/deleteAccount" class="btn btn-danger">Je souhaite supprimer mon compte définitivement !</a>
        </div>
    </div>
</table>