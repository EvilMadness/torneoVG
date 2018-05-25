function validarcarrera() {
    var Fields = [document.getElementById('id_carrera').value, document.getElementById("nom_carrera").value];
    var Id = ["id_carrera", "nom_carrera"];
    var FieldNames = ["ID","nombre de la carrera"];
    for (var i = 0; i < Fields.length; i++) {
        if (!check(Fields[i], Id[i], FieldNames[i]))
            return false;
    }
}
function check(field, id, namefield) {
    if (field === "" || field.length === 0){
        return messageAlert("El campo "+namefield+" esta vacío!", id);
    }
    return true;
}
function messageAlert(message, id) {
    alert(message);
    document.getElementById(id).focus();
    return false;
}

//VALIDAR FORMULARIO AÑADIR INSTITUTO
function validarinstituto() {
    var Fields = [document.getElementById('id_instituto').value, document.getElementById("nom_instituto").value,document.getElementById('municipio').value];
    var Id = ["id_instituto", "nom_instituto","municipio"];
    var FieldNames = ["ID","nombre de la institucion","municipio"];
    for (var i = 0; i < Fields.length; i++) {
        if (!check(Fields[i], Id[i], FieldNames[i]))
            return false;
    }
}

//VALIDAR PERSONAJE
function validarpersonaje() {
    var Fields = [document.getElementById('id_personaje').value, document.getElementById("nom_personaje").value];
    var Id = ["id_personaje", "nom_personaje"];
    var FieldNames = ["ID","nombre del personaje"];
    for (var i = 0; i < Fields.length; i++) {
        if (!check(Fields[i], Id[i], FieldNames[i]))
            return false;
    }
}