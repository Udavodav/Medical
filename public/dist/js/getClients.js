const wrapperService = document.getElementById("wrapperService"),
    selService = wrapperService.querySelector(".select-btn"),
    searchService = wrapperService.querySelector(".sr-inp");

const tbody = document.getElementById('tableBody');

let clickElement,
    services = [];

document.addEventListener("DOMContentLoaded", function () {
    services = Array.from(wrapperService.querySelectorAll('.options li'), n => [n.value, n.innerText]);
});

function addOptions(selectedItem) {
    let options = selectedItem.parentNode;
    options.innerHTML = "";
    services.forEach(item => {
        let isSelected = item[0] == selectedItem.value ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}" value="${item[0]}">${item[1]}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}

function updateName(selectedLi) {
    selectedLi.closest('.wrapper').classList.remove("active");
    selectedLi.closest('.wrapper').querySelector('.select-btn').firstElementChild.innerText = selectedLi.innerText;
    const inp = selectedLi.closest('.wrapper').querySelector('.val-inp');
    inp.setAttribute('value', selectedLi.value);
    const search = selectedLi.closest('.wrapper').querySelector('.sr-inp');
    search.value = "";
    addOptions(selectedLi);
}

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

selService.addEventListener("click", () => wrapperService.classList.toggle("active"));


function inputData(){

    $.ajax({
        url: "/doctor/search-client",
        type:"GET",
        data:{
            name: $('#searchInput').val(),
            date: $('#dateInp').val(),
        },
        success:function(response){
            tbody.innerHTML = '';
            let i = 1;

            if(response.length != 0) {
                response.forEach(item => {
                    const tr = `<tr>
                                <td class="total-price" width="40">
                                    <span>${i}</span>
                                </td>
                                <td class="total-price" width="70">
                                    <span>${item['name']}</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="subtotal-amount">${item['birthday']}</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="subtotal-amount conclusion">${item['email']}</span>
                                </td>
                                <td class="product-subtotal" width="200">
                                    <a href="#createVisit" data-id="${item['id']}" class="btn btn-primary open-createVisit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Добавить</a>
                                </td>

                            </tr>`;
                    tbody.insertAdjacentHTML("beforeend", tr)
                    i++;
                });
            }
        },
        error: function (e){
            console.log(e);
        }
    });
}


$(document).on("click", ".open-createVisit", function () {
    clickElement = this;
    document.getElementById('client_id').setAttribute('value', clickElement.dataset.id);
    document.getElementById('inputFile').value = '';
    document.getElementById('inputComment').value = 'Результат исследования';
    $('#createVisit').modal('show');
});

$("#submitForm").click(function (event) {

    event.preventDefault();
    var form = $('#createVisitForm')[0];
    var data = new FormData(form);

    // If you want to add an extra field for the FormData
    //data.append("CustomField", "This is some extra data, testing");

    $("#submitForm").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "/medsister/create-visit",
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#submitForm").prop("disabled", false);
            $('#createVisit').modal('hide');

            alert(response['message']);
        },
        error: function (e) {
            $("#submitForm").prop("disabled", false);
            console.log(e);
        }
    });

});
