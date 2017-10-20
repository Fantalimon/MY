(function ($, undefined) {
    $(function () {
        
        var error = '';
        
        var myform=$('#formchange');
        
        
        function is_name(name) {
            let patern = (/^[\wа-яёії]{3,25}$/gi);
            if((patern.test(name))==false){
                $('#chname').css('border', 'red 1px solid');
                error = 2;
                return;
            }else{
                $('#chname').css('border', '');
                return patern.test(name);
            }
        }
        
        function is_seurname(seurname) {
            let patern = (/^[\wа-яёії]{3,25}$/gi);
            if((patern.test(seurname))==false){
                $('#chseurname').css('border', 'red 1px solid');
                error = 2;
                return;
            }else{
                $('#chseurname').css('border', '');
                return patern.test(seurname);
            }
            
        }
        
        function is_sex(sex) {
            let patern = (/^0|1$/g);
            if((patern.test(sex))==false){
                $('#chsex').css('border', 'red 1px solid');
                error = 2;
                return;
            }else{
                $('#chsex').css('border', '');
                return patern.test(sex);
            }
            
        }
        
        function is_group(mygroup) {
            let patern = (/^[\wа-яёії0-9]{2,5}$/gi);
            if((patern.test(mygroup))==false){
                $('#chgroup').css('border', 'red 1px solid');
                error = 2;
                return;
            }else{
                $('#chgroup').css('border', '');
                return patern.test(mygroup);
            }
        }
        
        function is_mail(email) {
            if(email.match(/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/gi)==null){
                $('#chemail').css('border', 'red 1px solid');
                error = 2;
                return;
            }
            else{
                $('#chemail').css('border', '');
                email=email.match(/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/gi).join('');
                return email;
            }
        }
        
        function is_balls(balls) {
            let patern = (/^[0-9]{1,3}$/g);
            if((patern.test(balls))==false){
                $('#chballs').css('border', 'red 1px solid');
                error = 2;
                return;
            }else{
                $('#chballs').css('border', '');
                return patern.test(balls);
            }
        }
        
        function is_berd_year(berd_year) {
            let patern = (/^[0-9]{4}$/g);
            if((patern.test(berd_year))==false){
                $('#chberd_year').css('border', 'red 1px solid');
                error = 2;
                return;
            }else{
                $('#chberd_year').css('border', '');
                return patern.test(berd_year);
            }
            
        }
        
        function is_place(place) {
            if(place.match(/\D/gi)==null){
                $('#chplace').css('border', 'red 1px solid');
                error = 2;
                return ;
            }
            else{
                $('#chplace').css('border', '');
                place=place.match(/\D/gi).join('');
                return place;
            }
        }
        
        
        
        
        function inputnull() {
            $('#formchange').find('input').each(function () {
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
        
        
        
        
        $('#Rerayt').click(function () {
            $('#Change').modal('show');
        });
        
        
        
        $('#chsendreg').click(
            function (e) {
                e.preventDefault();
                
                error = 0;
           
                
                var name = $('#chname').val();
                
                var seurname = $('#chseurname').val();
                
                var sex = $('#formchange input:checked').val();
                
                var mygroup = $('#chgroup').val();
                
                var email = $('#chemail').val();
                
                var balls = $('#chballs').val();
                
                var berd_year = $('#chberd_year').val();
                
                var place = $('#chplace').val();
                
                
                
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
                        url: 'revrite.php',
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
                    
                    $('#Change').modal('hide');
                    $('#SenksChange').modal('show');
                    setTimeout(function () {
                        $('#SenksChange').modal('hide')
                    }, 3000);
                }
            });
        
        
        
    });
})(jQuery);
