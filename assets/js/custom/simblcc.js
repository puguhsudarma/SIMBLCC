$(document).ready(function () {
    var seconds_left = $('#seconds_left').text();
    $("#countdown").countdown({
        until : '+'+seconds_left,
        expiryUrl: $('#link_submit').text()
    });

    $("#modalKonfirmasi").modal("hide");
    $('button[name="submit"]').click(function(){
        $("#modalKonfirmasi").modal("show");
    });
});

function changeJawaban(e){
    var action = $(e).parent().attr("action"),
        id = $(e).data("soal"),
        val = $(e).val();
        
    $.ajax({
        url : action,
        method : "POST",
        data : {
            valid : "kodevalid",
            id_soal_tmp : id,
            jawaban : val
        }
    })

    .done(function(){
        $('div#'+id).removeClass("alert-danger");
        $('div#'+id).removeClass("alert-success");
        if($(e).val() != 0){
            $('div#'+id).addClass("alert-success");
        } else {
            $('div#'+id).addClass("alert-danger");
        }    
    });
}