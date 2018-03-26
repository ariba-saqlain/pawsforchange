var users = ["Nick", "Koehler", "is", "awesome"];
var activities = ["Research", "Design", "Development", "Analysis"];
var colours = ["#3498DB", "#CB4335", "#8E44AD", "#1ABC9C"];
var efforts = [1, 2, 3, 4, 5];

// Returns index if 'own' is found in 'data' array
function getListId(own, data = []) {
    return data.indexOf(own);
}

function round(value, decimals) {
    return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
}

function dec2hex(dec) {
    return ('0' + dec.toString(16)).substr(-2)
}

// Generates unique id for cards
function generateId(len) {
    var arr = new Uint8Array((len || 40) / 2)
    window.crypto.getRandomValues(arr)
    return Array.from(arr, dec2hex).join('')
}

// Checks for empty string
function isEmpty(s) {
    return s.trim().length == 0;
}

// Sets HTML document title
function setBoardTitle(s) {
    window.document.title = s;
}

// Gets HTML document title
function getBoardTitle() {
    return window.document.title;
}

// Loads an array of data into a dropdown list
function loadSelectlist(list, data) {
    var sel = document.getElementById(list);
    var fragment = document.createDocumentFragment();

    data.forEach(function (item, index) {
        var opt = document.createElement('option');
        opt.innerHTML = item;
        opt.value = item;
        fragment.appendChild(opt);
    });

    sel.appendChild(fragment);
}

// Adds colour to a dropdown list using a colour array
function colourSelectlist(list, colourset) {
    var sel = document.getElementById(list);
    var options = sel.getElementsByTagName('option');

    for(i = 0; i < options.length; i++)
        options[i].style = "color: " + colourset[i] + ";";
}

// // prototype data
// setBoardTitle("Nick's Board");

// // load dropdown lists
// loadSelectlist('userList', users);
// loadSelectlist('edituserList', users);

// loadSelectlist('activityList', activities);
// loadSelectlist('editactivityList', activities);

// loadSelectlist('effortList', efforts);
// loadSelectlist('editeffortList', efforts);

// // colour activity list
// colourSelectlist('activityList', colours);
// colourSelectlist('editactivityList', colours);
