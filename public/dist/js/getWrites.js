
$('#dateInp').trigger('input');
const tbody = document.getElementById('tableBody');
let trow;

function changeRow(item){
    trow = item.closest('tr');
}

function inputDate(item, user_id){

    $.ajax({
        url: "/doctor-writes",
        type:"GET",
        data:{
            //"_token": "{{ csrf_token() }}",
            doctor_id:user_id,
            date:item.value,
        },
        success:function(response){
            console.log(response);

            tbody.innerHTML = '';
            let i = 1;

            response.forEach(item => {
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
                                <td class="product-subtotal" width="200">
                                    <a href="#addVisit" data-id="${item['id']}" onclick="changeRow(this)" class="btn btn-success open-addVisit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Прикрепить</a>
                                </td>

                            </tr>`;
                tbody.insertAdjacentHTML("beforeend", tr)
                i++;
            });
        },
    });
}

$(document).on("click", ".open-addVisit", function () {
    const writeId = $(this).data('id');
    document.getElementById('write_id').setAttribute('value', writeId);
    document.getElementById('inputFile').value = '';
    document.getElementById('inputComment').value = 'Прием специалиста';
    $('#addVisit').modal('show');
});



$("#submitForm").click(function (event) {

    event.preventDefault();
    var form = $('#addVisitForm')[0];
    var data = new FormData(form);

    // If you want to add an extra field for the FormData
    //data.append("CustomField", "This is some extra data, testing");

    $("#submitForm").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "/doctor/create-visit",
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#submitForm").prop("disabled", false);
            $('#addVisit').modal('hide');

            alert(response['message'])
            trow.remove();
        },
        error: function (e) {
            $("#submitForm").prop("disabled", false);
            alert(e['responseJSON']['message']);

        }
    });

});
