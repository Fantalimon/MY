
$(function(){
    
  
    var form = $("#myForm");
    $("#send").text("Введите все данные.......");
    form.change(function (){
     var selectTerritory = $('#selectTerritory').val(),
          selectRayons = $('#selectRayons').val(),
           selectTowns = $('#selectTowns').val(),
            inputName = $('#inputName').val(),
         inputMail = $('#inputMail').val(),
            formdata=$("#myForm").serialize();
     if (inputName && inputMail && selectTerritory && selectRayons && selectTowns !=''){
         $('#send').text('Зарегестрировать');
     }
            $.ajax({
                type: "POST",
                url: "registration.php",
                dataType: "JSON",
                data: formdata,
                success: function (data) {
                    
              $('#selectTerritory').val(selectTerritory);
                    
            if(data.rayons) {
                var optionRayons = '';
                optionRayons = '<br><select id="selectRayons" name="Rayons" title="Выберете район"> <option value="">Выберете район</option>';
                for (var key in data.rayons) {
                    optionRayons += '<option value="' + data.rayons[key] + '">' + data.rayons[key] + '</option>';
                }
                optionRayons += '</select><br>';
                $("#detaleRayons").html(optionRayons);
                $('#selectRayons').val(selectRayons);
            }
            
           if(data.towns) {
                var optionTowns = '';
                optionTowns = '<br><select id="selectTowns" name="Towns" title="Выберете город"> <option value="">Выберете город</option>';
                
                for (var town in data.towns) {
                    optionTowns += '<option value="' + data.towns[town] + '">' + data.towns[town] + '</option>'
                }
                optionTowns += '</select><br>';
                $("#detaleTowns").html(optionTowns);
                  $('#selectTowns').val(selectTowns);
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
    
