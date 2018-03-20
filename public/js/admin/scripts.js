'use strict';

let baseURL = '';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function (){
    $('.ui-pnotify').remove();
});

$('.delete-link').click(function(){
    var delete_url = $(this).attr('data-url');
    var return_url = $(this).attr('data-return-url');
    
    if(confirm('Are you sure?')){
        $.ajax({
            url: delete_url,
            type: 'DELETE',
            success: function(result){
                window.location = return_url;
            }
        });
    }
});

//daterange
$('#newsCreateForm .single_cal2').daterangepicker({
    singleDatePicker: true,
    showDropdowns: false,
    startDate: new Date(),
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 1,
    singleClasses: "picker_2",
    autoUpdateInput: true,
    locale: {
        format: 'DD.MM.YYYY HH:mm'
    }
}, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
});
$('#newsEditForm .single_cal2').daterangepicker({
    singleDatePicker: true,
    showDropdowns: false,
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 1,
    singleClasses: "picker_2",
    autoUpdateInput: true,
    locale: {
        format: 'DD.MM.YYYY HH:mm'
    }
}, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
});

$('#PhotogalleryCreateForm .single_cal2').daterangepicker({
    singleDatePicker: true,
    showDropdowns: false,
    startDate: new Date(),
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 1,
    singleClasses: "picker_2",
    autoUpdateInput: true,
    locale: {
        format: 'DD.MM.YYYY HH:mm'
    }
}, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
});
$('#PhotogalleryEditForm .single_cal2').daterangepicker({
    singleDatePicker: true,
    showDropdowns: false,
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 1,
    singleClasses: "picker_2",
    autoUpdateInput: true,
    locale: {
        format: 'DD.MM.YYYY HH:mm'
    }
}, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
});

let add_files_button = document.getElementById('add_files_button');
let image_input_container = document.getElementById('image_input_container');
let i = 2;
if (add_files_button != null) {
    add_files_button.addEventListener('click', function (e) {
        let row = document.createElement('Div');
        row.setAttribute('class', 'row');

        let label = document.createElement('Label');
        label.setAttribute('class', 'control-label col-md-1 col-sm-1 col-xs-1');
        label.setAttribute('for', `image_${i}`);
        label.innerHTML = `Image ${i}`;

        row.appendChild(label);

        let input_container = document.createElement('Div');
        input_container.setAttribute('class', 'col-md-6 col-sm-6 col-xs-6 file_input_container');
        let input = document.createElement('Input');
        input.setAttribute('id', `image_${i}`);
        input.setAttribute('class', 'form-control col-md-6 col-xs-6');
        input.setAttribute('name', `image_${i}`);
        input.setAttribute('type', 'file');

        input_container.appendChild(input);
        row.appendChild(input_container);

        image_input_container.appendChild(row);
        e.preventDefault();
        if (i === 10) {
            add_files_button.style.display = 'none';
        }
        i++;

    });
}

let add_images_button = document.getElementById('add_images_button');
let image_input_container_second = document.getElementById('image_input_container_second');
let ii = 2;
if (add_images_button != null) {
    add_images_button.addEventListener('click', function (e) {
        let row = document.createElement('Div');
        row.setAttribute('class', 'row');

        let label = document.createElement('Label');
        label.setAttribute('class', 'control-label col-md-1 col-sm-1 col-xs-1');
        label.setAttribute('for', `image_${ii}`);
        label.innerHTML = `Image ${ii}`;

        row.appendChild(label);

        let input_container = document.createElement('Div');
        input_container.setAttribute('class', 'col-md-6 col-sm-6 col-xs-6 file_input_container');
        let input = document.createElement('Input');
        input.setAttribute('id', `image_${ii}`);
        input.setAttribute('class', 'form-control col-md-6 col-xs-6');
        input.setAttribute('name', `image_${ii}`);
        input.setAttribute('type', 'file');

        input_container.appendChild(input);
        row.appendChild(input_container);

        image_input_container_second.appendChild(row);
        e.preventDefault();
        ii++;

    });
}

//Gender control
let genderButtonLabels = document.querySelectorAll('.genderButtonLabel');
for (let genderButtonLabel of genderButtonLabels) {
    genderButtonLabel.addEventListener('click', function () {
        let allGenderButtonLabels = genderButtonLabel.parentNode.querySelectorAll('.genderButtonLabel');
        for (let genderButtonLabelItem of allGenderButtonLabels) {
            genderButtonLabelItem.classList.remove('btn-primary');
            genderButtonLabelItem.classList.add('btn-default');
        }
        this.classList.remove('btn-default');
        this.classList.add('btn-primary');
    });
}

//Group checkbox control
/*
let checkBoxActual = document.querySelector('#checkBoxActual');
let checkBoxVeryActual = document.querySelector('#checkBoxVeryActual');
let checkBoxImportant = document.querySelector('#checkBoxImportant');
let checkBoxVeryImportant = document.querySelector('#checkBoxVeryImportant');

if (checkBoxActual != null) {
    let checkBoxActualEventListener =
    checkBoxActual.addEventListener('change', function () {
        if (checkBoxActual.checked) {
            $('#checkBoxVeryActual').trigger('click');
        }
    });
}
if (checkBoxVeryActual != null) {
    checkBoxVeryActual.addEventListener('change', function () {
        if (checkBoxVeryActual.checked) {
            $('#checkBoxActual').trigger('click');
        }
    });
}
if (checkBoxImportant != null) {
    checkBoxImportant.addEventListener('change', function () {
        if (checkBoxImportant.checked) {
            $('#checkBoxVeryImportant').trigger('click');
        }
    });
}
if (checkBoxVeryImportant != null) {
    checkBoxVeryImportant.addEventListener('change', function () {
        if (checkBoxVeryImportant.checked) {
            $('#checkBoxImportant').trigger('click');
        }
    });
}
*/

//Validators
let newsCreateForm = document.getElementById('newsCreateForm');
if (newsCreateForm != null) {
    newsCreateForm.addEventListener('submit', function (e) {
        e.preventDefault();

        let newsSectionSelect = document.getElementById('newsSectionSelect');
        if (newsSectionSelect.value == 0) {
            new PNotify({title: 'Please choose a section!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        let newsCreateActivityStart = document.getElementById('newsCreateActivityStart');
        if (newsCreateActivityStart.value == '') {
            new PNotify({title: 'Please select activity start date!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        let newsCreateTagline = document.getElementById('newsCreateTagline');
        if (newsCreateTagline.value == '') {
            new PNotify({title: 'Please enter tagline!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        let newsCreateText = document.getElementById('newsCreateText');
        if (newsCreateText.value == '') {
            new PNotify({title: 'Please enter text!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        let newsCreatePhoto = document.getElementById('newsCreatePhoto');
        if (newsCreatePhoto.files.length == 0) {
            new PNotify({title: 'Please choose a photo!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        newsCreateForm.submit();
    });
}

let newsEditForm = document.getElementById('newsEditForm');
if (newsEditForm != null) {
    newsEditForm.addEventListener('submit', function (e) {
        e.preventDefault();

        let newsSectionSelect = document.getElementById('newsSectionSelect');
        if (newsSectionSelect.value == 0) {
            new PNotify({title: 'Please choose a section!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        let newsCreateActivityStart = document.getElementById('newsCreateActivityStart');
        if (newsCreateActivityStart.value == '') {
            new PNotify({title: 'Please select activity start date!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        let newsCreateTagline = document.getElementById('newsCreateTagline');
        if (newsCreateTagline.value == '') {
            new PNotify({title: 'Please enter tagline!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        let newsCreateText = document.getElementById('newsCreateText');
        if (newsCreateText.value == '') {
            new PNotify({title: 'Please enter text!', text: '', type: 'notice', styling: 'bootstrap3'});
            return false;
        }

        newsEditForm.submit();
    });
}

let adminNewsSection = document.getElementById('adminNewsSection');
if (adminNewsSection != null) {
    adminNewsSection.addEventListener('change', function () {
       window.location.href = `${baseURL}/admin/content-news/ru/${this.value}`;
    });
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