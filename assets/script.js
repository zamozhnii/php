window.addEventListener('DOMContentLoaded', init);

function init() {

    let section = document.querySelector('.section-table');

    /** AJAX filter by Genre */
    
    let btnFilterGenre = document.querySelector('input[name=submit_gen]');

    btnFilterGenre.addEventListener('click', (e) => {
        let valueGenre = e.target.previousElementSibling.value;
        if(valueGenre.length == 0) {
            section.innerHTML = '';
        } else {
            let request = new XMLHttpRequest();
            request.onreadystatechange = () => {
                if(request.readyState == 4 && request.status == 200) {
                    section.innerHTML = request.responseText;
                }
            }
            request.open("GET", "filtergenre.php?gen="+valueGenre, true);
            request.send();
        }
    });

    /** AJAX filter by Author */

    let btnFilterAuthor = document.querySelector('input[name=submit_auth]');

    btnFilterAuthor.addEventListener('click', (e) => {
        let valueAuthor = e.target.previousElementSibling.value;
        if(valueAuthor.length == 0) {
            section.innerHTML = '';
        } else {
            let request = new XMLHttpRequest();
            request.onreadystatechange = () => {
                if(request.readyState == 4 && request.status == 200) {
                    section.innerHTML = request.responseText;
                }
            }
            request.open("GET", "filterauthor.php?auth="+valueAuthor, true);
            request.send();
        }
    });

}