// Opens a modal dialog
function openModal(name) {
    document.getElementById(name).style.display='block';
}

// Closes a modal dialog
function closeModal(name) {
    document.getElementById(name).style.display='none';
}

// Gets value of an element
function getValue(id) {
    if(id == null) return;
    var v = document.getElementById(id).value;
    return v;
}

// Validator for create card dialog
function validateInput(input, button) {
    if(input == null || button == null) return;
    var v = getValue(input);
    var b = document.getElementById(button);

    if(v.length > 0)
        b.disabled = false;
    else
        b.disabled = true;
}