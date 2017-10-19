(function ($, undefined) {
    $(function () {
        
    var error = '';
    
    var myform=$('#formreg');
    
    
    function is_name(name) {
        let patern = (/^[\wа-яёії]{3,25}$/gi);
        if((patern.test(name))==false){
            $('#name').css('border', 'red 1px solid');
            error = 2;
            return;
        }else{
            $('#name').css('border', '');
            return patern.test(name);
        }
    }
    
    function is_seurname(seurname) {
        let patern = (/^[\wа-яёії]{3,25}$/gi);
        if((patern.test(seurname))==false){
            $('#seurname').css('border', 'red 1px solid');
            error = 2;
            return;
        }else{
            $('#seurname').css('border', '');
            return patern.test(seurname);
        }
        
    }
        
    function is_sex(sex) {
        let patern = (/^0|1$/g);
        if((patern.test(sex))==false){
            $('#sex').css('border', 'red 1px solid');
            error = 2;
            return;
        }else{
            $('#sex').css('border', '');
            return patern.test(sex);
        }
        
    }
    
    function is_group(mygroup) {
        let patern = (/^[\wа-яёії0-9]{2,5}$/gi);
        if((patern.test(mygroup))==false){
            $('#group').css('border', 'red 1px solid');
            error = 2;
            return;
        }else{
            $('#group').css('border', '');
            return patern.test(mygroup);
        }
        }
    
    function is_mail(email) {
            if(email.match(/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/gi)==null){
                $('#email').css('border', 'red 1px solid');
                error = 2;
                return;
            }
            else{
                $('#email').css('border', '');
                email=email.match(/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/gi).join('');
                return email;
            }
        }
    
    function is_balls(balls) {
            let patern = (/^[0-9]{1,3}$/g);
            if((patern.test(balls))==false){
                $('#balls').css('border', 'red 1px solid');
                error = 2;
                return;
            }else{
                $('#balls').css('border', '');
                return patern.test(balls);
            }
        }
        
    function is_berd_year(berd_year) {
            let patern = (/^[0-9]{4}$/g);
            if((patern.test(berd_year))==false){
                $('#berd_year').css('border', 'red 1px solid');
                error = 2;
                return;
            }else{
                $('#berd_year').css('border', '');
                return patern.test(berd_year);
            }
        
        }
    
    function is_place(place) {
        if(place.match(/\D/gi)==null){
            $('#place').css('border', 'red 1px solid');
            error = 2;
            return ;
        }
        else{
            $('#place').css('border', '');
            place=place.match(/\D/gi).join('');
            return place;
        }
    }
    
  
        
    
    function inputnull() {
        $('#formreg').find('input').each(function () {
            if (!$(this).val()) {
                $(this).css('border', 'red 1px solid');
                error = 1;
            }
            else {
                error = 0;
            }
        });
    }
    
    function clearInputform(myform) {
        myform.find('input').each(function () {
            $(this).css('border', '');
        });
        myform[0].reset();
    }
    
    function getErrorMessage(jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        $('#yes').html(msg);
    }
    
    
    
    
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
                
                
                
                is_name(name);
                is_seurname(seurname);
                is_sex(sex);
                is_group(mygroup);
                is_mail(email);
                is_balls(balls);
                is_berd_year(berd_year);
                is_place(place);
                
            
                
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
