
function validateForm() {
    <!--Validación-->
    var Fields = [document.getElementById('nombre').value, document.getElementById("apaterno").value,
        document.getElementById("amaterno").value, document.getElementById("combo_instituto").selectedIndex,
        document.getElementById("combo_carrera").selectedIndex, document.getElementById("combo_personaje").selectedIndex,
        document.getElementById("nickname").value, document.getElementById("password").value, document.getElementById("email").value];
    var Id = ["nombre", "apaterno", "amaterno", "combo_instituto", "combo_carrera", "combo_instituto", "nickname", "password", "email"];
    var FieldNames = ["nombre","apellido paterno", "apellido materno", "institucion", "carrera", "personaje", "nickname", "contraseña", "email"];
    for (var i = 0; i < Fields.length; i++) {
        if (!check(Fields[i], Id[i], FieldNames[i]))
            return false;
    }
}

function check(field, id, namefield) {
    if (field === "" || field.length === 0){
        return messageAlert("El campo "+namefield+" esta vacío!", id);
    }
    if (field === 0 || field === null){
        return messageAlert("El campo "+namefield+" no esta selecionado!", id);
    }

    return true;
}

function messageAlert(message, id) {
    alert(message);
    document.getElementById(id).focus();
    return false;
}

function validateFormEdit() {
    <!--Validación-->
    var Fields = [document.getElementById('nombre').value, document.getElementById("apaterno").value,
        document.getElementById("amaterno").value, document.getElementById("combo_instituto").selectedIndex,
        document.getElementById("combo_carrera").selectedIndex, document.getElementById("combo_personaje").selectedIndex,
        document.getElementById("nickname").value, document.getElementById("email").value];
    var Id = ["nombre", "apaterno", "amaterno", "combo_instituto", "combo_carrera", "combo_instituto", "nickname", "email"];
    var FieldNames = ["nombre","apellido paterno", "apellido materno", "institucion", "carrera", "personaje", "nickname", "email"];
    for (var i = 0; i < Fields.length; i++) {
        if (!check(Fields[i], Id[i], FieldNames[i]))
            return false;
    }
}