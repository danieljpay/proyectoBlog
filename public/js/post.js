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