
$(function(){
    var form = $("#myForm");
    form.change(function (){
        var selectTerritory = $('#selectTerritory').val();
        var selectRayons = $('#selectRayons').val();
        var selectTowns = $('#selectTowns').val();
        var formdata=$("#myForm").serialize();
        $.ajax({
            type:"POST",
            url:"registration.php",
            data:formdata,
            success: function (data) {
                $("#detale").html(data);
                $('#selectTerritory').val(selectTerritory);
                $('#selectRayons').val(selectRayons);
                $('#selectTowns').val(selectTowns);
                $("#yes").html("<h1>Введите все данные.......</h1>");
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


  
    
    
   /*  var name = $('#inputName').val();
     var email = $('#inputMail').val();
     var selectTerritory= $('#selectTerritory').val();
     $.ajax({
         type : "POST",
         url: "registration.php",
         data: {Territory:selectTerritory,
             name:name,email:email
         },
         success: function (data) {
             $('#detale').html(data);
             $('#selectTerritory').val(selectTerritory);
             $('#inputName').val(name);
             $('#inputMail').val(email);
         }
     });


         $('#selectTerritory').change(function(){
              var selectTerritory= $(this).val();
             var name = $('#inputName').val();
             var email = $('#inputMail').val();
             $.ajax({
                type : "POST",
                 url: "registration.php",
                 data: {Territory:selectTerritory,
                     name:name,email:email
                },
                 success: function (data) {
                     $('#detale').html(data);
                     $('#selectTerritory').val(selectTerritory);
                     $('#inputName').val(name);
                     $('#inputMail').val(email);
                 }
             });
         });


     $(document).on('change', '#selectRayons',function () {
        var selectRayons = $('#selectRayons').val();
         var  selectTerritory = $('#selectTerritory').val();
          var name = $('#inputName').val();
          var email = $('#inputMail').val();
         $.ajax({
             type: "POST",
             url: "registration.php",
             data: {Rayons: selectRayons,Territory:selectTerritory,
                 name:name,email:email
             },
             success: function (data) {
                 $('#detale').html(data);
                 $('#selectRayons').val(selectRayons);
                 $('#inputName').val(name);
                 $('#inputMail').val(email);
             }
         });
     });

    
    
     $(document).on('change', '#selectTowns',function () {
         var selectTerritory = $('#selectTerritory').val();
         var selectRayons = $('#selectRayons').val();
          var selectTowns = $('#selectTowns').val();
          var name = $('#inputName').val();
          var email = $('#inputMail').val();
         $.ajax({
             type: "POST",
             url: "registration.php",
             data: {Rayons: selectRayons,Territory:selectTerritory,Towns:selectTowns,
                 name:name,email:email
             },
             success: function (data) {
                 $('#detale').html(data);
                 $('#selectTerritory').val(selectTerritory);
                 $('#selectRayons').val(selectRayons);
                 $('#selectTowns').val(selectTowns);
                 $('#inputName').val(name);
                 $('#inputMail').val(email);
             }
         });
     });
    
    
    
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
    
