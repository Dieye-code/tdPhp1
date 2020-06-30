typeCompte = document.getElementById('typeCompte');
solde = document.getElementById('solde');
frais = document.getElementById('frais');
agios = document.getElementById('agios');
idClientNormal = document.getElementById('idClientNormal');
idClientSalarie = document.getElementById('idClientSalarie');
idEmployeur = document.getElementById('idEmployeur');
typeClient = document.getElementById('typeClient');
typeClientSelect = document.getElementById('typeClientSelect');
fraisBancaire = document.getElementById('fraisBancaire');
agiosCompte = document.getElementById('agiosCompte');
infoClientPhysique = document.getElementById('infoClientPhysique');
infoClientPhysiqueSalarie = document.getElementById('infoClientPhysiqueSalarie');
infoClientEntreprise = document.getElementById('infoClientEntreprise');
typeClientPhysique = document.getElementById('typeClientPhysique')
typeClientPhysiqueSelect = document.getElementById('typeClientPhysiqueSelect')
salaireError = document.getElementById('solde-invalid');
soldeIvalid = document.getElementById('solde-invalid');
agiosIvalid = document.getElementById('agios-invalid');



soldeIvalid.style.display = 'none';
agiosIvalid.style.display = 'none';
agiosIvalid.style.color = 'red';






/**
 * cacher les champs
 */

fraisBancaire.style.display = 'none';
agiosCompte.style.display = 'none';
typeClientSelect.style.display = 'none'
typeClientPhysiqueSelect.style.display = 'none'

/**
 * control de saisie du solde
 */
solde.addEventListener('keypress', function(e) {
    if (isNaN(String.fromCharCode(e.keyCode))) {
        e.preventDefault();
    }
})

/**
 * Selection du type de compte
 */
typeCompte.addEventListener('change', function(e) {
    viderClientMoral();
    viderClientPhysique();
    if (typeCompte.value == '1') {
        fraisBancaire.style.display = 'block';
        typeClientSelect.style.display = 'block'
        infoClientPhysique.style.display = 'none'
        infoClientEntreprise.style.display = 'none'
        infoClientPhysiqueSalarie.style.display = 'none'
        typeClientPhysiqueSelect.style.display = 'none'
        agiosCompte.style.display = 'none'
    } else {
        if (typeCompte.value == '2') {

            fraisBancaire.style.display = 'none';
            typeClientSelect.style.display = 'none'
            infoClientPhysique.style.display = 'none'
            infoClientEntreprise.style.display = 'none'
            infoClientPhysiqueSalarie.style.display = 'block'
            typeClientPhysiqueSelect.style.display = 'none'
            agiosCompte.style.display = 'block'
        } else {

            fraisBancaire.style.display = 'none';
            typeClientSelect.style.display = 'none'
            infoClientPhysique.style.display = 'none'
            infoClientEntreprise.style.display = 'none'
            infoClientPhysiqueSalarie.style.display = 'none'
            typeClientPhysiqueSelect.style.display = 'none'
            agiosCompte.style.display = 'none'
        }
    }
})

/**
 * Selection du type de client
 */
typeClient.addEventListener('change', function(e) {
    if (typeClient.value == '1') {
        infoClientPhysique.style.display = 'block'
        infoClientEntreprise.style.display = 'none'
        infoClientPhysiqueSalarie.style.display = 'none'
        typeClientPhysiqueSelect.style.display = 'block'
        viderClientMoral();
    } else {
        if (typeClient.value == '2') {
            infoClientPhysique.style.display = 'none'
            infoClientEntreprise.style.display = 'block'
            infoClientPhysiqueSalarie.style.display = 'none'
            typeClientPhysiqueSelect.style.display = 'none'
            viderClientPhysique();
        } else {
            infoClientPhysique.style.display = 'none'
            infoClientEntreprise.style.display = 'none'
            infoClientPhysiqueSalarie.style.display = 'none'
            typeClientPhysiqueSelect.style.display = 'none'
            viderClientMoral();
            viderClientPhysique();
        }
    }
})

/**
 * Selection du type de client Physique
 */
typeClientPhysique.addEventListener('change', function(e) {
    if (typeClientPhysique.value == '1') {
        infoClientPhysique.style.display = 'block'
        infoClientEntreprise.style.display = 'none'
        infoClientPhysiqueSalarie.style.display = 'none'
        typeClientPhysiqueSelect.style.display = 'none'
    } else {
        infoClientPhysique.style.display = 'none'
        infoClientEntreprise.style.display = 'none'
        infoClientPhysiqueSalarie.style.display = 'block'
        typeClientPhysiqueSelect.style.display = 'block'
    }
});


/**
 * Validation du formulaire
 */

document.getElementById('myForm').addEventListener('submit', function(e) {
    let a = 0;
    isValidated(idClientSalarie, '0')

    if (!isValidated(solde, '')) {
        a = 1;
    }
    if (!isValidated(typeCompte, '0')) {
        a = 1
    } else {
        if (typeCompte.value == '1') {
            if (!isValidated(typeClient, '0')) {
                a = 1;
            } else {
                if (typeClient.value == '1') {
                    if (typeClientPhysique.value == '1') {
                        if (!isValidated(idClientNormal, '0')) {
                            a = 1;
                        } else {
                            if (parseInt(solde.value) <= frais.value) {
                                soldeIvalid.style.display = 'block';
                                a = 1;
                            } else {
                                soldeIvalid.style.display = 'none';
                            }
                        }
                    } else {
                        if (!isValidated(idClientSalarie, '0')) {
                            a = 1;
                        } else {
                            if (parseInt(solde.value) <= frais.value) {
                                soldeIvalid.style.display = 'block';
                                a = 1;
                            } else {
                                soldeIvalid.style.display = 'none';
                            }
                        }
                    }
                } else {
                    if (!isValidated(idEmployeur, '0')) {
                        a = 1;
                    } else {
                        if (parseInt(solde.value) <= frais.value) {
                            soldeIvalid.style.display = 'block';
                            a = 1;
                        } else {
                            soldeIvalid.style.display = 'none';
                        }
                    }
                }
            }
        } else {
            if (!isValidated(idClientSalarie, '0')) {
                a = 1;
            } else {
                if (parseInt(solde.value) <= agios.value) {
                    agiosIvalid.style.display = 'block';
                    a = 1;
                } else {
                    agiosIvalid.style.display = 'none';
                }
            }
        }
    }


    if (a != 0) {
        e.preventDefault();
    }
})









/**
 * tester si un champ est valid
 * @param {HTMLElement} element 
 * @param {string} v 
 */

function isValidated(element, v) {
    if (element.value.trim() == v) {
        element.classList.add('invalid');
        element.classList.remove('valid');
        return false;
        a = 1;
    } else {
        element.classList.add('valid');
        element.classList.remove('invalid');
        return true;
    }
}

function viderClientPhysique() {
    idClientSalarie.value = '0';
    idClientNormal.value = '0';
    typeClientPhysique.value = '1';
}

function viderClientMoral() {
    idEmployeur.value = '0'
}