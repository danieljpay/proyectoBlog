var date = new Date();
var day = date.getDate();
var month = date.getMonth()+1;
var year = date.getFullYear();

function addComment (){

    var commentContainer = document.getElementById("c_cont");
    var comment = document.getElementById("comment");
    var fakeTextArea = document.getElementById("fakeTextArea");
    
    if (comment.textContent.length > 0) {
        commentContainer.innerHTML += '<div>' + 
        '<div class="perfil">' +
            '<img src="./assets/userAnonimus.jpg" alt="">' +
            '<label for="">Usuario anonimo</label>' +
        '</div>' +
        '<div class="comment_containt">' +
            '<p>' + comment.textContent + '</p>' +
            '<label for="">' + day + '/' + month + '/' + year + '</label>' +
        '</div>' +
        '</div>'
        comment.textContent = "";
        fakeTextArea.textContent  = "";
    }
};