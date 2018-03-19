window.addEventListener('DOMContentLoaded', init);

function init() {
    /** INPUTS CREATE NEW BOOK */
    let bookName = document.querySelector('input[name=title]');
    let bookDescr = document.querySelector('textarea[name=short_descr]');
    let authorName = document.querySelector('input[name=author]');
    let genreName = document.querySelector('input[name=genre]');
    let bookPrice = document.querySelector('input[name=price]');

    /** BUTTONS */
    let btnAddNewBook = document.querySelector('#btn-add');
    
    /** CREATE NEW BOOK AJAX */
    btnAddNewBook.addEventListener('click', () => {
        let params = 'title= ' +  bookName.value 
                    + '&' + 'short_descr= ' + bookDescr.value
                    + '&' + 'author= ' + authorName.value 
                    + '&' + 'genre= ' + genreName.value
                    + '&' + 'price= ' + bookPrice.value;
       
        ajaxPost(params);
        bookName.value = '';
        bookDescr.value = '';
        authorName.value = '';
        genreName.value = '';
        bookPrice.value = '';
    })
    function ajaxPost(params) {
        let request = new XMLHttpRequest();

        request.onreadystatechange = () => {
            if(request.readyState == 4 && request.status == 200) {
                let divResult = document.querySelector('#result');
                divResult.style.textAlign = 'center';
                divResult.style.fontSize = '20px';
                divResult.innerHTML = request.responseText;
                setTimeout(() => {
                    divResult.innerHTML = '';
                }, 2000)
                
            } 
        };
        request.open('POST', 'save2catalog.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(params);
    }

    
    
}