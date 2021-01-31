window.onload = function () {
    getComments();
    setCookiesAndLocalStorage();
};

var date = new Date();
var day = date.getDate();
var month = date.getMonth()+1;
var year = date.getFullYear();
var lastFileUploaded = "";

const printPostButton = document.getElementById('printPostButton');
printPostButton.addEventListener('click', () => {
    const contentToPrint = document.getElementById('postContent').innerHTML;
    let w = window.open();
    w.document.write(contentToPrint);
    w.document.close();
    w.focus();
    w.print();
    w.close();
});

function getComments(){
    fetch(getUrl() + 'post/getComentarios', {
        method: "POST",
        body: JSON.stringify({
            id_post: getPostId()
        }),
        headers: {
            "Content-type": "application/json;"
        }
    })
    .then(response => response.json())
    .then(json => generarComentarios(json))
    .catch(err => console.log(err));
}

function setCookiesAndLocalStorage(){
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
}

function getPostId(){
    const items = location.href.split("/");
    return items[items.length - 1];
}

function getRoot(){
    const items = location.href.split("/");
    return items[3];
}

function getUrl(){
    return location.origin + "/" + getRoot() +"/";
}

function generarComentarios(data){
    let html = "";
    console.log(data);
    data.forEach((comentario)=>{
        html += '<div>' + 
        '<div class="perfil">' +
            '<img src="../../public/img/userAnonimus.jpg" alt="">' +
            '<label for="">'+ comentario.first_name + " "+ comentario.last_name+'</label>' +
        '</div>' +
        '<div class="comment_containt">' +
            '<p>' + comentario.comment + '</p>' +
            '<label for="">' + comentario.posted + '</label>' +
            generateDownloadLink(comentario.file_dir) +
        '</div>' +
        '</div>'; 
    });
    var commentContainer = document.getElementById("c_cont");
    commentContainer.innerHTML = html;
}   

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

function setLastFileLoaded(LFU){
    this.lastFileUploaded = LFU;
}

function addComment (){
    var comment = document.getElementById("commentAreaInvisible");
    var fakeTextArea = document.getElementById("fakeTextArea");
    var user = document.getElementById("user").innerText;

    if (comment.textContent.length > 0) {

        fetch(getUrl() + 'post/enviarComentario', {
            method: "POST",
            body: JSON.stringify({
                comment: sanitizeText(comment.textContent),
                file_dir: lastFileUploaded,
                idpost: getPostId(),
                user: user
            }),
            headers: {
                "Content-type": "application/json;"
            }
        })
        .then(response => response.json())
        .then(json => {
            if(json){
                getComments()
            }else{
                alert("Ocurrió un error al subir el comentario");
            }
            
        })
        .catch(err => console.log(err));

        lastFileUploaded = "";
        comment.textContent = "";
        fakeTextArea.textContent  = "";
    }
    inputFile.value = "";
};


function generateDownloadLink (file){
    if (file) {
        return '<br><a href=../../public/uploaded/' +file+ ' download='+file+'>'+file+'</a>';
    }else {
        return "";
    }
}

function sanitizeText (comment){
    let str = comment;
    let stripped = str.replace(/(<([^>]+)>)/ig, ''); // Texto de prueba
    return stripped;
}

