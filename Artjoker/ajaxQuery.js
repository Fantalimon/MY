
$(function(){
    
    
    var form = $("#myForm");
    // $("#detale").append("<br><select id='selectRayons' disabled><option value=''>Выберете район</option></select><br>");
    // $("#detale").append("<br><select id='selectTowns' disabled><option value=''>Выберете город</option></select><br>");
    // $("#send").text("Введите все данные.......");
    //
    form.change(function (){
     var selectTerritory = $('#selectTerritory').val(),
          selectRayons = $('#selectRayons').val(),
           selectTowns = $('#selectTowns').val(),
            formdata=$("#myForm").serialize();
            $.ajax({
                type: "POST",
                url: "registration.php",
                dataType: "JSON",
                data: formdata,
                success: function (data) {
                    // $("#detale").html(data);
                    
                    $('#selectTerritory').val(selectTerritory);
                     
                   var option='';
                   option = '<br><select id="selectRayons" name="Rayons" title="Выберете район"> <option value="">Выберете район</option>';
                    for (var key in data){
                      option+= '<option value="'+data[key]+'">'+data[key]+'</option>';
                    }
                   option+='</select><br>';
                    $("#detale").html(option);
                    
                    
                    // $("#detale").append('<br><select id="selectTowns" name="Towns" title="Выберете город"> <option value="">Выберете район</option> <option value="'+data+'">'+data+'</option> </select> <br>');
                    
                    $('#selectRayons').val(selectRayons);
                    $('#selectTowns').val(selectTowns);
                }
            })
        
});
    
    
    var button=$("#send");
    button.click(function (){
       var mydata = $("#myForm").serializeArray();
        $.ajax({
            type: "POST",
            url: "registration.php",
            data: mydata,
            cache:false,
            success: function () {
                $("<h1>Данные успешно отправлены</h1>").replaceAll("#yes");
            }
        });
    });

    
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
    
