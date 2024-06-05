
$('#dateInp').trigger('input');
const tbody = document.getElementById('tableBody');
let clickElement;


function inputDate(item, user_id){

    $.ajax({
        url: "/doctor-visits",
        type:"GET",
        data:{
            doctor_id:user_id,
            date:item.value,
        },
        success:function(response){
            console.log(response);

            tbody.innerHTML = '';
            let i = 1;

            response.forEach(item => {
                console.log(item);
                const tr = `<tr>
                                <td class="total-price" width="40">
                                    <span>${i}</span>
                                </td>
                                <td class="total-price" width="70">
                                    <span>${parseInt(item['time']/60) + ':' + (item['time']%60 < 10 ? '0' : '') + item['time']%60}</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="subtotal-amount">${item['client_name']}</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="subtotal-amount">${item['service']}</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="subtotal-amount conclusion">${item['conclusion']}</span>
                                </td>
                                <td class="product-subtotal file">
                                    ${ item['file'] == null ? '' : "<a href='" + location.protocol + '//' + location.host + '/storage/' + item['file'] + "' target='_blank'>Результат</a>" }
                                </td>
                                <td class="product-subtotal" width="200">
                                    <a href="#editVisit" data-id="${item['id']}" class="btn btn-primary open-editVisit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Изменить</a>
                                </td>

                            </tr>`;
                console.log(tr);
                tbody.insertAdjacentHTML("beforeend", tr)
                i++;
            });
        },
    });
}

function showHide ()
{
    let style = document.getElementById('inputFile').style
    if (style.visibility == "hidden")
        style.visibility = "visible";
    else
        style.visibility = "hidden";
}

$(document).on("click", ".open-editVisit", function () {
    clickElement = this;
    const value = (this).closest('tr').querySelector('.conclusion').innerHTML;
    document.getElementById('visit_id').setAttribute('value', clickElement.dataset.id);
    document.getElementById('inputFile').value = '';
    document.getElementById('inputComment').value = value;
    $('#editVisit').modal('show');
});

$("#submitForm").click(function (event) {

    event.preventDefault();
    var form = $('#editVisitForm')[0];
    var data = new FormData(form);

    // If you want to add an extra field for the FormData
    //data.append("CustomField", "This is some extra data, testing");

    $("#submitForm").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "/doctor/update-visit",
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#submitForm").prop("disabled", false);
            $('#editVisit').modal('hide');

            let tr = clickElement.closest('tr');
            tr.querySelector('.conclusion').innerHTML = response['comment'];
            tr.querySelector('.file').innerHTML = response['file'] == null ? '' : "<a href='" + location.protocol + '//' + location.host + '/storage/' + response['file'] + "' target='_blank'>Результат</a>" ;

            console.log(response);

        },
        error: function (e) {
            $("#submitForm").prop("disabled", false);
            alert(e['responseJSON']['message']);
        }
    });

});
