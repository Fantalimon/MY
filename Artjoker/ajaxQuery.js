
$(function(){
    
    var form = $("#myForm");
    $("#send").text("Введите все данные.......");
    form.change(function (){
     var selectTerritory = $('#selectTerritory').val(),
          selectRayons = $('#selectRayons').val(),
          selectRayonsTowns = $('#selectRayonsTowns').val(),
           selectTowns = $('#selectTowns').val(),
            selectSMT = $('#selectSMT').val(),
             inputName = $('#inputName').val(),
             inputMail = $('#inputMail').val(),
            formdata=$("#myForm").serialize();
     if (inputName && inputMail && selectTerritory && selectRayons && selectTowns && selectSMT !=''){
         $('#send').text('Зарегестрировать');
     }
            $.ajax({
                type: "POST",
                url: "registration.php",
                dataType: "JSON",
                data: formdata,
                success: function (data) {
                    
              $('#selectTerritory').val(selectTerritory);
    
                    if(data.towns) {
                        var optionTowns = '';
                        optionTowns = '<br><select id="selectTowns" class="chosen-rtl" name="Towns" title="Выберете город"> <option value="">Выберете город</option>';
                        for (var town in data.towns) {
                            optionTowns += '<option value="' + data.towns[town] + '">' + data.towns[town] + '</option>';
                        }
                        optionTowns += '</select><br>';
                        $("#detaleTowns").html(optionTowns);
                        $('#selectTowns').val(selectTowns);
                    }
    
    
                    if(data.rayons_towns) {
                var optionRayonsTowns = '';
                        optionRayonsTowns = '<br><select id="selectRayonsTowns" class="chosen-rtl" name="RayonsTowns" title="Выберете район Города"> <option value="">Выберете район Города</option>';
                for (var rayon in data.rayons_towns) {
                    optionRayonsTowns += '<option value="' + data.rayons_towns[rayon] + '">' + data.rayons_towns[rayon] + '</option>';
                }
                        optionRayonsTowns += '</select><br>';
                $("#detaleRayonsTowns").html(optionRayonsTowns);
                $('#selectRayonsTowns').val(selectRayonsTowns);
            }
            
            if(data.rayons) {
                var optionRayons = '';
                optionRayons = '<br><select id="selectRayons" class="chosen-rtl" name="Rayons" title="Выберете район Области"> <option value="">Выберете район Области</option>';
                for (var rayon in data.rayons) {
                    optionRayons += '<option value="' + data.rayons[rayon] + '">' + data.rayons[rayon] + '</option>';
                }
                optionRayons += '</select><br>';
                $("#detaleRayons").html(optionRayons);
                $('#selectRayons').val(selectRayons);
            }
                    
           if(data.smt) {
                var optionSMT = '';
                optionSMT = '<br><select id="selectSMT" class="chosen-rtl" name="SMT" title="Выберете ПГТ,Село,Деревню"> <option value="">Выберете ПГТ,Село,Деревню</option>';
                for (var smt in data.smt) {
                    optionSMT += '<option value="' + data.smt[smt] + '">' + data.smt[smt] + '</option>'
                }
               optionSMT += '</select><br>';
                $("#detaleSMT").html(optionSMT);
                  $('#selectSMT').val(selectSMT);
            }
            
                }
            })
});
    
    
    //
    // $("#send").click(function (){
    //     $('#myForm').find('input, select').each(function () {
    //         if ($(this).val()==''){
    //             $('#yes').text('заполните поля '+$(this).attr('title')+'!');
    //         }
    //     });
    //    var mydata = $("#myForm").serialize();
    //     $.ajax({
    //         type: "POST",
    //         url: "registration.php",
    //         data: mydata,
    //         cache:false,
    //         success: function () {
    //             $("<h1>Данные успешно отправлены</h1>").appendTo("#yes");
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status);
    //             alert(thrownError);
    //         }
    //     });
    // });

    
});


  

    
/*
    $("#myForm").submit(function() {
        var form = $(this);
        var error = false;
        form.find('input, select').each(function() {
            if ($(this).val() == '') {
                alert('Зaпoлнитe пoлe "' + $(this).attr('title') + '"!');
                error = true;
            }
        })
    });
    
    
    if (!error) {
        var data = $("#myForm").serialize();
        $.ajax({
            type: "POST",
            url: "registration.php",
            dataType: 'json',
            data: data,
            beforeSend: function(data) {
                form.find('button[type="submit"]').attr('disabled', 'disabled');
            },
            success: function(data)
                {
                    console.log(info);
                },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
            complete: function(data) {
                form.find('button[type="submit"]').prop('disabled', false);
            }
        });
        return false;
    }
*/
    
