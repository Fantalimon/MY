(function ($, undefined) {
    $(function () {
    
        $.ajax({
            url: 'data.php',
            type: 'POST',
            cache: false,
            dataType: 'json',
            success: (function (data) {
                if (data.ballsDESC) {
                    var user = '';
                    let ctn = data.ballsDESC.length;
                    for (let i = 0; i < ctn; i++) {
                        user += '<tr>';
                        user += '<td>' + data.ballsDESC[i]['name'] + '</td>';
                        user += '<td>' + data.ballsDESC[i]['seurname'] + '</td>';
                        user += '<td>' + data.ballsDESC[i]['mygroup'] + '</td>';
                        user += '<td>' + data.ballsDESC[i]['balls'] + '</td>';
                        user += '</tr>';
                    }
                
                    $('tbody').html(user);
                }
            }),
            error: (function (jqXHR, exception) {
                getErrorMessage(jqXHR, exception)
            })
        });
        
        $('#sendreg').click(
            function (e) {
                e.preventDefault();
                
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        cache: false,
                        dataType:'json',
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
            });
    });
})(jQuery);
