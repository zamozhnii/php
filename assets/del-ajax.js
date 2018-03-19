window.addEventListener('DOMContentLoaded', init);

function init() {

    let linksDel = document.querySelectorAll('.delete');

    let section = document.querySelector('.section-table');

    /** DELETE BOOK AJAX */

    linksDel.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();
            let rowDel = e.target.parentNode.parentNode;
            let rowParent = rowDel.parentNode;
            let href = e.currentTarget.href;
            let len = href.length;
            let posDel = href.indexOf('delete.php');
            let url = href.substring(posDel, len);
            let request = new XMLHttpRequest();
                request.onreadystatechange = () => {
                    if(request.readyState == 4 && request.status == 200) {
                        rowParent.removeChild(rowDel);
                    }
                 }
                request.open("GET", url, true);
                request.send();
        });
    })
    


}