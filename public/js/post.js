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

var date = new Date();
var day = date.getDate();
var month = date.getMonth()+1;
var year = date.getFullYear();

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

