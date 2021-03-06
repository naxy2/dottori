vuota = /^\s*$/;

function validaMedico(){
    codice = document.form.codice.value;
    cognome = document.form.cognome.value;
    nome = document.form.nome.value;
    data = document.form.data.value;
    luogo = document.form.luogo.value;

    valido = true;
    if (codice.match(vuota)){
        valido = false;
        document.getElementById("errCodice").innerText = "Inserisci un codice";
    }else{
        document.getElementById("errCodice").innerText = "";
    }

    if (cognome.match(vuota)){
        valido = false;
        document.getElementById("errCognome").innerText = "Inserisci un cognome";
    }else{
        document.getElementById("errCognome").innerText = "";
    }

    if (nome.match(vuota)){
        valido = false;
        document.getElementById("errNome").innerText = "Inserisci un nome";
    }else{
        document.getElementById("errNome").innerText = "";
    }

    if (data.match(vuota) || new Date(data)>new Date()){
        valido = false;
        document.getElementById("errData").innerText = "Inserisci una data valida";
    }else{
        document.getElementById("errData").innerText = "";
    }

    if (luogo.match(vuota)){
        valido = false;
        document.getElementById("errLuogo").innerText = "Inserisci un luogo";
    }else{
        document.getElementById("errLuogo").innerText = "";
    }

    return valido;
}

function validaPaziente(){
    codice = document.form.codice.value.toUpperCase();
    cognome = document.form.cognome.value;
    nome = document.form.nome.value;
    data = document.form.data.value;
    luogo = document.form.luogo.value;
    indirizzo = document.form.indirizzo.value;

    valido = true;
    if (!codice.match(/^[A-Z]{6}[A-Z0-9]{3}[0-9]{2}[A-Z0-9]{4}[A-Z]{1}$/)){
        valido = false;
        document.getElementById("errCodice").innerText = "Inserisci un codice fiscale";
    }else{
        document.getElementById("errCodice").innerText = "";
    }

    if (cognome.match(vuota)){
        valido = false;
        document.getElementById("errCognome").innerText = "Inserisci un cognome";
    }else{
        document.getElementById("errCognome").innerText = "";
    }

    if (nome.match(vuota)){
        valido = false;
        document.getElementById("errNome").innerText = "Inserisci un nome";
    }else{
        document.getElementById("errNome").innerText = "";
    }

    if (data.match(vuota) || new Date(data)>new Date()){
        valido = false;
        document.getElementById("errData").innerText = "Inserisci una data valida";
    }else{
        document.getElementById("errData").innerText = "";
    }

    if (luogo.match(vuota)){
        valido = false;
        document.getElementById("errLuogo").innerText = "Inserisci un luogo";
    }else{
        document.getElementById("errLuogo").innerText = "";
    }

    if (indirizzo.match(vuota)){
        valido = false;
        document.getElementById("errIndirizzo").innerText = "Inserisci un indirizzo";
    }else{
        document.getElementById("errIndirizzo").innerText = "";
    }

    return valido;
}

function validaAssociazione(){
    data = document.form.data.value;
    paziente = document.form.paziente.value;
    valido = true;
    if (!data.match(vuota) && new Date(data) > new Date()){
        valido = false;
        document.getElementById("errData").innerText = "La data non pu?? essere nel FuTuRoOoOo";
    }else{
        document.getElementById("errData").innerText = "";
    }
    
    if (paziente.match(vuota)){
        valido=false;
    }

    /*if (valido){
        valido = confirm(`Eliminare eventuali associazioni di ${paziente}?`);
    }*/

    return valido;
}

function validaLogin(){
    username = document.form.username.value;
    password = document.form.password.value;

    valido = true;
    if (!(password.match(/[A-Z]/) && password.match(/[0-9]/) && password.match(/^.{6,}$/))){
        valido = false;
        document.getElementById("errPassword").innerText = "La password deve avere almeno 6 caratteri, una maiuscola e una minuscola";
    }else{
        document.getElementById("errPassword").innerText = "";
    }

    if (username.match(/^\s*$/)){
        valido = false;
        document.getElementById("errUsername").innerText = "Il nome deve contenere lettere";
    }else{
        document.getElementById("errUsername").innerText = "";
    }

    return valido;
}