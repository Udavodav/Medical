const wrapperSpec = document.getElementById("wrapperSpec"),
    selSpec = wrapperSpec.querySelector(".select-btn"),
    searchSpec = wrapperSpec.querySelector(".sr-inp");

const wrapperService = document.getElementById("wrapperService"),
    selService = wrapperService.querySelector(".select-btn"),
    searchService = wrapperService.querySelector(".sr-inp");

const wrapperTime = document.getElementById("wrapperTime"),
    selTime = wrapperTime.querySelector(".select-btn"),
    optionTime = wrapperTime.querySelector(".options");

let specialists = [],
    services = [],
    times = [];
document.addEventListener("DOMContentLoaded", function () {
    specialists = Array.from(wrapperSpec.querySelectorAll('.options li'), n => [n.value, n.innerText]);
    $('#doctorInp').trigger('input');
});


function addOptions(selectedItem) {
    let options = selectedItem.parentNode;
    if (options.id == 'optionsSpec'){
        fillOptions(specialists, options, selectedItem.value);
    }else {
        fillOptions(services, options, selectedItem.value);
    }
}

function fillOptions(arr, option, selectedItem){
    option.innerHTML = "";
    arr.forEach(item => {
        let isSelected = item[0] == selectedItem ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}" value="${item[0]}">${item[1]}</li>`;
        option.insertAdjacentHTML("beforeend", li);
    });
}



function updateName(selectedLi) {
    selectedLi.closest('.wrapper').classList.remove("active");
    selectedLi.closest('.wrapper').querySelector('.select-btn').firstElementChild.innerText = selectedLi.innerText;
    const inp = selectedLi.closest('.wrapper').querySelector('.val-inp');
    inp.setAttribute('value', selectedLi.value);
    $('#'+inp.id).trigger('input');
    if(selectedLi.closest('.wrapper').id != 'wrapperTime'){
        const search = selectedLi.closest('.wrapper').querySelector('.sr-inp');
        search.value = "";
        addOptions(selectedLi);
    }else{
        fillTimes(selectedLi.value);
    }
}

searchSpec.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchSpec.value.toLowerCase();
    arr = specialists.filter(data => {
        return data[1].toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data[1] == selSpec.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName(this)" class="${isSelected}" value="${data[0]}">${data[1]}</li>`;
    }).join("");
    searchSpec.parentElement.nextElementSibling.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Упс, нет ничего похожего</p>`;
});
searchService.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchService.value.toLowerCase();
    arr = services.filter(data => {
        return data[1].toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data[1] == selService.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName(this)" class="${isSelected}" value="${data[0]}">${data[1]}</li>`;
    }).join("");
    searchService.parentElement.nextElementSibling.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Упс, нет ничего похожего</p>`;
});

selSpec.addEventListener("click", () => wrapperSpec.classList.toggle("active"));
selService.addEventListener("click", () => wrapperService.classList.toggle("active"));
selTime.addEventListener("click", () => wrapperTime.classList.toggle("active"));


function fillTimes(val){
    optionTime.innerHTML = "";
    times.forEach(i => {
        let isSelected = i == val ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}" value="${i}">${parseInt(i/60)}:${i%60 < 10 ? '0' : ''}${i%60}</li>`;
        optionTime.insertAdjacentHTML("beforeend", li);
    });
}



function inputSpecialist(data){

    $.ajax({
        url: "/services-of-doctor",
        type:"GET",
        data:{
            //"_token": "{{ csrf_token() }}",
            doctor_id:data.value,
        },
        success:function(response){
            services = [];
            for(const i in response) {
                services.push([response[i]['id'], response[i]['title']]);
            }
            fillOptions(services, document.getElementById('optionsService'), services[0][0]);
            document.getElementById('selectService').firstElementChild.innerText = services[0][1];
            const inp = document.getElementById('serviceInp');
            inp.setAttribute('value', services[0][0]);
            $('#'+inp.id).trigger('input');
        },
    });
}

function inputServiceOrDate(){

    let date = document.getElementById('dateInp').value;
    let doctor = document.getElementById('doctorInp').value;
    let service = document.getElementById('serviceInp').value;

    $.ajax({
        url: "/times",
        type:"GET",
        data:{
            //"_token": "{{ csrf_token() }}",
            date_write:date,
            doctor_id:doctor,
            service_id:service,
        },
        success:function(response){
            times = response;
            fillTimes(times[0]);
            document.getElementById('selectTime').firstElementChild.innerText = parseInt(times[0]/60) + ':' + (times[0]%60 < 10 ? '0' : '') + times[0]%60;
            const inp = document.getElementById('timeInp');
            inp.setAttribute('value', times[0]);
        },
    });
}
