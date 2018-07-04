'use strict';

let baseURL = '';
let weatherAPIAppID = '6178c621688b97c94c84911609ebad47';


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

//weather loading
let weatherImageContainer = document.getElementById('weatherImageContainer');
let weatherTempContainer = document.getElementById('weatherTempContainer');
if (weatherImageContainer != null && weatherTempContainer != null) {
    let weatherAPIUrl = `https://api.openweathermap.org/data/2.5/weather?id=587081&units=metric&appid=${weatherAPIAppID}`;
    $.get(weatherAPIUrl, function(data) {
        let temp = Math.round(data.main.temp);
        let icon = data.weather[0].icon;
        let iconURL = `https://openweathermap.org/img/w/${icon}.png`;

        weatherImageContainer.innerHTML = `<img src="${iconURL}" alt="weather icon" width="32" />`;
        weatherTempContainer.innerHTML = `${temp} °C`;
    });
}

//currency rated loading
let currencyUSD = document.getElementById('currencyUSD');
let currencyEUR = document.getElementById('currencyEUR');
let currencyGBP = document.getElementById('currencyGBP');
let currencyRUB = document.getElementById('currencyRUB');
if (currencyUSD != null && currencyEUR != null && currencyGBP != null && currencyRUB != null) {
    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1;

    let yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }

    let proxyUrl = `https://youthportal.az/p.php`;
    let currencyAPIUrl = `https://www.cbar.az/currencies/${dd}.${mm}.${yyyy}.xml`;
    $.ajax({
        type: 'GET',
        url: proxyUrl,
        dataType: 'xml',
        cache: false,
        // headers: {
        //     'X-Proxy-URL': currencyAPIUrl,
        // },
        success: function(xml) {
            $(xml).find('[Code="USD"]').each(function(){
                currencyUSD.innerHTML = $(this).find('Value').text();
            });
            $(xml).find('[Code="EUR"]').each(function(){
                currencyEUR.innerHTML = $(this).find('Value').text();
            });
            $(xml).find('[Code="GBP"]').each(function(){
                currencyGBP.innerHTML = $(this).find('Value').text();
            });
            $(xml).find('[Code="RUB"]').each(function(){
                currencyRUB.innerHTML = $(this).find('Value').text();
            });
        }
    });
}

//news archive calendar
$('#newsArchiveCalendar').datepicker({
    format: "dd.mm.YYYY",
    weekStart: 1,
}).on('changeDate', function(e) {
    let selectedDate = e.date;
    let timestamp = selectedDate.getTime()/1000;

    let url = `${baseURL}/${lang}/newsArchive/${timestamp}`;
    window.location.href = url;
});

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