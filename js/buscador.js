$(document).ready(function () {

    $('#search').on('keyup',function () {
        var res = $('#search').val()
        $.ajax({
            type: 'POST',
            url: 'process/search_user.php',
            data: {'search': res},
        })
            .done(function (resultado) {
                $('#result').html(resultado)
            })
            .fail(function () {
                alert('Error')
            })
    })
})