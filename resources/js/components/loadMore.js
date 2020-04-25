let grid = document.querySelector('.js-item-list');
let loadNextButton = document.querySelector('.js-xhr-load-more');
let pagination = document.querySelector('.js-product-pagination');

document.addEventListener('click', function (event) {
    if (!event.target.matches('.js-xhr-load-more')) return;
    event.preventDefault();

    if (!loadNextButton.classList.contains('loading')) {
        loadNextButton.classList.add('loading');
        let nextPageUrl = event.target.getAttribute('data-url');
        let xhr = new XMLHttpRequest();
        xhr.open('get', nextPageUrl);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send();

        xhr.onloadend = function (response) {
            if (response.target.status === 0) {
                console.log('undefined error');
                // Failed XmlHttpRequest should be considered an undefined error.
            } else if (response.target.status === 400) {
                console.log('Bad Request');
                // Bad Request
            } else if (response.target.status === 200) {
                const result = JSON.parse(response.target.response);
                grid.innerHTML += result.html;
                loadNextButton.setAttribute('data-url', result.nextUrl);
                pagination.innerHTML = result.pagination;
                if (result.last) {
                    loadNextButton.parentNode.removeChild(loadNextButton);
                }
            }
            loadNextButton.classList.remove('loading');
        };
    }
    return false;
}, false);

