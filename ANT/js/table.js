(function ($, undefined) {
    $(function () {
        
        $('#Sing').click(function () {
            $('#Reg').modal('show');
        });
        
        
        
        $('#sendreg').click(
            function (e) {
                e.preventDefault();
                
                error = 0;
                var name = $('#name').val();
                
                var seurname = $('#seurname').val();
                
                var sex = $('#formreg input:checked').val();
                
                var mygroup = $('#group').val();
                
                var email = $('#email').val();
                
                var balls = $('#balls').val();
                
                var berd_year = $('#berd_year').val();
                
                var place = $('#place').val();
                
                
                //
                // is_name(name);
                // is_seurname(seurname);
                // is_sex(sex);
                // is_group(mygroup);
                // is_mail(email);
                // is_balls(balls);
                // is_berd_year(berd_year);
                // is_place(place);
                //
                
                
                if (error == 0) {
                    $.ajax({
                        url: 'registration.php',
                        data: {
                            name: name,
                            seurname: seurname,
                            sex: sex,
                            mygroup: mygroup,
                            email: email,
                            balls: balls,
                            berd_year: berd_year,
                            place: place,
                        },
                        type: 'POST',
                        cache: false,
                        dataType:'json',
                        beforesend: (inputnull()),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        }),
                        complete: (clearInputform(myform)),
                        
                    });
                    
                    $('#Reg').modal('hide');
                    $('#SenksReg').modal('show');
                    setTimeout(function () {
                        $('#SenksReg').modal('hide')
                    }, 3000);
                }
            });
        
        
        
    });
})(jQuery);
