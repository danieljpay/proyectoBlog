window.onload = function () {
        
    var postTittle = document.getElementById("Tittle").innerHTML;
    postTittle =  sanitizeText(postTittle);
    if (localStorage.getItem("history")) {
        var historyString = leerCookie("history");
        historyString += postTittle+";";
        document.cookie = "history="+historyString;
        localStorage.setItem("history",localStorage.getItem("history")+postTittle+";")
    }else{
        console.log(postTittle);
        console.log("Hola");
        document.cookie = "history="+postTittle;
        localStorage.setItem("history",postTittle+";");
    }
};

function leerCookie(nombre) {
    var lista = document.cookie.split(";");
    for (i in lista) {
        var busca = lista[i].search(nombre);
        if (busca > -1) {
            micookie=lista[i]
        }else {
            return;
        }
    }
    var igual = micookie.indexOf("=");
    var valor = micookie.substring(igual+1);
    return valor;
}

const printPostButton = document.getElementById('printPostButton');

printPostButton.addEventListener('click', () => {
    const contentToPrint = document.getElementById('postContent').innerHTML;
    let w = window.open();
    w.document.write(contentToPrint);
    w.document.close();
    w.focus();
    w.print();
    w.close();
})

/*const btnEnviar = document.querySelector("#btnEnviar");
const inputFile = document.querySelector("#inputFile");
btnEnviar.addEventListener("click", () => {
    if (inputFile.files.length > 0) {
        let formData = new FormData();
        var file = inputFile.files[0]; // En la posición 0; es decir, el primer elemento
        //console.log(file.name.replace(/ /g,'_'));
        //debugger;
        //formData.append("nombre", file.name.replace(/ /g,'_'));
        formData.append("archivo", file); 
        fetch("<?php echo URL; ?>uploader", {
            method: 'POST',
            body: formData,
        })
            .then(respuesta => respuesta.text())
            .then(decodificado => {
                console.log(decodificado);
            });
            lastFileUploaded = file.name.replace(/ /g,'_');
    } else {
        // El usuario no ha seleccionado archivos
        alert("Selecciona un archivo");
    }
});*/

var date = new Date();
var day = date.getDate();
var month = date.getMonth()+1;
var year = date.getFullYear();
var lastFileUploaded = "";

function setLastFileLoaded(LFU){
    this.lastFileUploaded = LFU;
}

function addComment (){

    var commentContainer = document.getElementById("c_cont");
    var comment = document.getElementById("commentAreaInvisible");
    var fakeTextArea = document.getElementById("fakeTextArea");

    if (comment.textContent.length > 0) {
        commentContainer.innerHTML += '<div>' + 
        '<div class="perfil">' +
            '<img src="../../public/img/userAnonimus.jpg" alt="">' +
            '<label for="">Usuario anonimo</label>' +
        '</div>' +
        '<div class="comment_containt">' +
            '<p>' + sanitizeText(comment.textContent) + '</p>' +
            '<label for="">' + day + '/' + month + '/' + year + '</label>' +
            '<br>' +
            '<a href=../../public/uploaded/' +lastFileUploaded+ ' download='+lastFileUploaded+'>Descargar Archivo</a>' + 
        '</div>' +
        '</div>' 
        comment.textContent = "";
        fakeTextArea.textContent  = "";
    }
};

function sanitizeText (comment){
    let str = comment;
    let stripped = str.replace(/(<([^>]+)>)/ig, ''); // Texto de prueba
    return stripped;
}

