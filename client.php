<?php

require_once('model.php');

$pdo = getConnexion();

$clientMorals = $pdo->query('SELECT * FROM clientMoral')->fetchAll();
$typeClients= $pdo->query('SELECT * FROM typeClient')->fetchAll()

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="La gestion de  la Banque du peuple" />
    <meta name="author" content="moustaphadieye96@gmail.com" />
    <meta name="keywords" content="Banque, Client, Compte" />
    <title>Ajout d'un compte client</title>
    <link rel="stylesheet" href="file.css">
</head>

<body>
    <!--le header de la Page-->
    <div class="header">
        <a href="#">
            <span class="logo_1">BANQUE DU</span> <span class="logo_2">PEUPLE</span>
        </a>
    </div>

    <!--Le Contenu de la page-->
    <div class="container">
        <!--Le side Bare-->
        <div class="sideBare">
            <div class="sideBare_header">
                <img src="profil.png" alt="Profil" class="profil">
                <span class="email">moustaphadieye96@gmail.com</span>
            </div>
            <div class="sideBare_body">
                <div class="nav active"><a href="#">Dashboard</a></div>
                <div class="nav"><a href="compte.php">Compte</a></div>
                <div class="nav active"><a href="client.php">Client</a></div>
            </div>
        </div>
        <!--Le main de la page-->
        <div class="main">
            <div class="panel-primary">
                <div class="panel-heading">
                    Ajout d'un Client
                </div>
                <div class="panel-body">
                    <form action="clientController.php" method="post" id="myForm" novalidate>
                        <!--Les informations du client-->
                        <div class="infoClient">
                            <div class="title">Info Client</div>
                            <div class="form-group">
                                <label for="typeClient" class="control-label">Type Client</label>
                                <select name="typeClient" id="typeClient" class="form-control">
                                    <option value="0">--Type Client--</option>
                                    <option value="1">Client Physique</option>
                                    <option value="2">Client Moral</option>
                                </select>
                            </div>
                            <!--Informations du client Physique-->
                            <div class="infoClientPhysique" id="infoClientPhysique">
                                <!--ancien client physique-->
                                <div class="infoAncienClient" id="infoAncienClient">
                                    <div class="form-group">
                                        <select name="idClient" id="idClient" class="form-control">
                                            <option value="0">--Client--</option>
                                            <option value="1">Marie Perle</option>
                                            <option value="2">Ousmane Mballo</option>
                                            <option value="3">Mor Diop</option>
                                            <option value="4">Moustapha Dieye</option>
                                        </select>
                                    </div>
                                    <div class="btn btn-primary" id="nouveauClient" hidden>Nouveau Client</div>
                                </div>
                                <!--nouveau client physique-->
                                <div class="infoNouveauClientPhysique" id="infoNouveauClientPhysique">
                                    <div class="form-group">
                                        <label for="typeClientPhysique" class="control-label">Type Client
                                            Physique</label>
                                        <select name="typeClientPhysique" id="typeClientPhysique" class="form-control">
                                        <?php
                                            foreach ($typeClients as $typeClient) {
                                                ?>
                                                    <option value="<?php echo $typeClient['id'];?>"><?php echo $typeClient['libelle'];?></option>
                                                <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nom" class="control-label">Nom</label>
                                        <input type="text" class="form-control" name="nom" id="nom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom" class="control-label">Prenom</label>
                                        <input type="text" class="form-control" name="prenom" id="prenom" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="prenom" class="control-label">Numéro d'identification</label>
                                        <input type="number" class="form-control" name="cni" id="cni" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="control-label">Telephone</label>
                                        <input type="number" class="form-control" name="telephone" id="telephone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse" class="control-label">Adresse</label>
                                        <input type="text" class="form-control" name="adresse" id="adresse" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="prenom" class="control-label">Login</label>
                                        <input type="text" class="form-control" name="login" id="login" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="prenom" class="control-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>

                                    <div class="btn btn-primary" id="ancienClient" hidden>Ancien Client</div>
                                </div>
                                <!--information d'un salarié-->
                                <div class="infoClientPhysiqueSalarie" id="infoClientPhysiqueSalarie">
                                    <div class="title">Info Salarié</div>
                                    <div class="form-group">
                                        <label for="salaire" class="control-label">Salaire</label>
                                        <input type="number" class="form-control" name="salaire" id="salaire" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="profession" class="control-label">Profession</label>
                                        <input type="text" class="form-control" name="profession" id="profession" required>
                                    </div>

                                </div>
                            </div>
                            <!--Client Moral-->
                            <div class="clientMoral" id="clientMoral">
                                <div class='title'>Info Entreprise</div>
                                <!--Ancien Client Moral-->
                                <div class="infoAncienClientMoral" id="infoAncienClientMoral">
                                    <label for="idClient" class="control-label">Client</label>
                                    <select name="idEmployeur" id="idEmployeur" class="form-control">
                                        <option value="0">--Entreprise--</option>

                                        <?php
                                            foreach ($clientMorals as $clientMoral) {
                                                ?>
                                                    <option value="<?php echo $clientMoral['id'];?>"><?php echo $clientMoral['nom'];?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="btn btn-primary" id="nouveauClientMoral"> Nouvelle Entreprise</div>
                                </div>
                                <!--Information d'un Nouveau client moral-->
                                <div class="infoNouveauClientMoral" id="infoNouveauClientMoral">
                                    <div class="form-group">
                                        <label for="nomClientMoral" class="control-label">Nom</label>
                                        <input type="text" class="form-control" name="nomClientMoral" id="nomClientMoral" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="AdresseClientMoral" class="control-label">Numero</label>
                                        <input type="text" class="form-control" name="numeroClientMoral" id="numeroClientMoral" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="AdresseClientMoral" class="control-label">Adresse</label>
                                        <input type="text" class="form-control" name="AdresseClientMoral" id="AdresseClientMoral" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="raisonSocial" class="control-label">Raison Social</label>
                                        <input type="text" class="form-control" name="raisonSocial" id="raisonSocial" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="raisonSocial" class="control-label">Telephone</label>
                                        <input type="text" class="form-control" name="telephoneClientMoral" id="telephoneClientMoral" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="raisonSocial" class="control-label">Email</label>
                                        <input type="text" class="form-control" name="emailClientMoral" id="emailClientMoral" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="raisonSocial" class="control-label">Login</label>
                                        <input type="text" class="form-control" name="loginClientMoral" id="loginClientMoral" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="raisonSocial" class="control-label">Password</label>
                                        <input type="password" class="form-control" name="passwordClientMoral" id="passwordClientMoral" required>
                                    </div>
                                    <div class="btn btn-primary" id="AncienClientMoral"> Ancien Entreprise</div>

                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn-primary" name="ajouter" value="Ajouter">

                    </form>
                </div>
            </div>
        </div>



        <script src="client.js"></script>
    </div>

    <div class="footer">

    </div>

</body>

</html>