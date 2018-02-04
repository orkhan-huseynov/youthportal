'use strict';

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

$('.single_cal2').daterangepicker({
    singleDatePicker: true,
    singleClasses: "picker_2",
    locale: {
        format: 'DD.MM.YYYY hh:mm'
    }
}, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
});

let add_files_button = document.getElementById('add_files_button');
let image_input_container = document.getElementById('image_input_container');
let i = 2;
add_files_button.addEventListener('click', function(e){
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
    if(i === 10){
        add_files_button.style.display = 'none';
    }
    i++;

});

//Validators
let newsCreateForm = document.getElementById('newsCreateForm');
newsCreateForm.addEventListener('submit', function(e){
    e.preventDefault();

    let newsSectionSelect = document.getElementById('newsSectionSelect');
    if (newsSectionSelect.value == 0) {
        new PNotify({ title: 'Please choose a section!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    let newsCreateActivityStart = document.getElementById('newsCreateActivityStart');
    if (newsCreateActivityStart.value == '') {
        new PNotify({ title: 'Please select activity start date!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    let newsCreateTagline = document.getElementById('newsCreateTagline');
    if (newsCreateTagline.value == '') {
        new PNotify({ title: 'Please enter tagline!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    let newsCreateText = document.getElementById('newsCreateText');
    if (newsCreateText.value == '') {
        new PNotify({ title: 'Please enter text!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    let newsCreatePhoto = document.getElementById('newsCreatePhoto');
    if (newsCreatePhoto.files.length == 0) {
        new PNotify({ title: 'Please choose a photo!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    newsCreateForm.submit();
});

let newsEditForm = document.getElementById('newsEditForm');
newsCreateForm.addEventListener('submit', function(e){
    e.preventDefault();

    let newsSectionSelect = document.getElementById('newsSectionSelect');
    if (newsSectionSelect.value == 0) {
        new PNotify({ title: 'Please choose a section!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    let newsCreateActivityStart = document.getElementById('newsCreateActivityStart');
    if (newsCreateActivityStart.value == '') {
        new PNotify({ title: 'Please select activity start date!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    let newsCreateTagline = document.getElementById('newsCreateTagline');
    if (newsCreateTagline.value == '') {
        new PNotify({ title: 'Please enter tagline!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    let newsCreateText = document.getElementById('newsCreateText');
    if (newsCreateText.value == '') {
        new PNotify({ title: 'Please enter text!', text: '', type: 'notice', styling: 'bootstrap3' });
        return false;
    }

    newsCreateForm.submit();
});