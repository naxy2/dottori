function modifica(select){
    valore = select.value;
    if (valore != ""){
        window.location.href = `./modificaAssociazione.php?paziente=${valore}`;
    }else{
        window.location.href = `./modificaAssociazione.php`;
    }
}