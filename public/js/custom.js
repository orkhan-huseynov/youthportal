'use strict';

let baseURL = '';


let searchFormButton = document.getElementById('searchFormButton');
let lang = searchFormButton.dataset.lang;
if (searchFormButton != null) {
    searchFormButton.addEventListener('click', function (e) {
       e.preventDefault();


        let searchInput = document.getElementById('searchInput');
        searchRedirect(lang, searchInput.value);
    });
}

let searchInput = document.getElementById('searchInput');
if (searchInput != null) {
    searchInput.addEventListener('keyup', function(e) {
       e.preventDefault();

       if (e.keyCode === 13) {
           searchRedirect(lang, this.value);
       }
    });
}

function searchRedirect(lang, value) {

    window.location.href = `${baseURL}/search/${lang}/${value}`;

}

//service functions
function getMetaContent(metaName) {
    let metas = document.getElementsByTagName('meta');
    let re = new RegExp('\\b' + metaName + '\\b', 'i');
    let i = 0;
    let mLength = metas.length;

    for (i; i < mLength; i++) {
        if (re.test(metas[i].getAttribute('name'))) {
            return metas[i].getAttribute('content');
        }
    }

    return '';
}

(function() {
    baseURL = getMetaContent('base-url');
})();