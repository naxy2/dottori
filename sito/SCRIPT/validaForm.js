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