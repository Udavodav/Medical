

$("#commentSubmit").click(function (event) {

    event.preventDefault();
    var form = $('#commentForm')[0];
    var data = new FormData(form);

    $("#commentSubmit").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "/comment",
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#commentSubmit").prop("disabled", false);

            const card = document.getElementById('commentForm');
            const comment = `<div class="post">
                                        <div class="user-block">
                                        <span class="username">
                                          <a href="#">${response['name']}</a>
                                        </span>
                                            <span class="description">Дата публикации -  ${response['date']}</span>
                                        </div>
                                        <p>
                                            ${response['text']}
                                        </p>
                                    </div>`;
            card.insertAdjacentHTML("afterEnd", comment)
        },
        error: function (e) {
            $("#commentSubmit").prop("disabled", false);
            console.log(e);

        }
    });

});
