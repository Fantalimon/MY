$(function () {
    
    
    var selectTerritory= $('#selectTerritory').val();
    $.ajax({
        type : "POST",
        url: "registration.php",
        data: {Territory:selectTerritory},
        success: function (data) {
            $('#detale').html(data);
            $('#selectTerritory').val(selectTerritory);
        }
    });
    
  
        $('#selectTerritory').change(function(){
             var selectTerritory= $(this).val(),
             name = $('#inputName').val(),
             email = $('#inputMail').val();
            $.ajax({
               type : "POST",
                url: "registration.php",
                // beforesend:(presend()),
                data: {Territory:selectTerritory,name:name,email:email},
                success: function (data) {
                    $('#detale').html(data);
                    $('#selectTerritory').val(selectTerritory);
                    $('#inputName').val(name);
                    $('#inputMail').val(email);
                }
            });
        });
    
        
    $(document).on('change', '#selectRayons',function () {
       var selectRayons = $('#selectRayons').val(),
          selectTerritory = $('#selectTerritory').val(),
         name = $('#inputName').val(),
         email = $('#inputMail').val();
        $.ajax({
            type: "POST",
            url: "registration.php",
            // beforesend:(presend()),
            data: {Rayons: selectRayons,Territory:selectTerritory,name:name,email:email},
            success: function (data) {
                $('#detale').html(data);
                $('#selectRayons').val(selectRayons);
                $('#inputName').val(name);
                $('#inputMail').val(email);
            }
        });
    });
    
    $(document).on('change', '#selectTowns',function () {
        var selectTerritory = $('#selectTerritory').val(),
         selectRayons = $('#selectRayons').val(),
         selectTowns = $('#selectTowns').val(),
         name = $('#inputName').val(),
         email = $('#inputMail').val();
        $.ajax({
            type: "POST",
            url: "registration.php",
            // beforesend:(presend()),
            data: {Rayons: selectRayons,Territory:selectTerritory,Towns:selectTowns,name:name,email:email},
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
    
    
    
    
 $("#myForm").submit(function(){
     var form =$($this);
     var error=false;
     form.find('input,select').each( function() {
         if ($(this).val() == '') {
             alert('Зaпoлнитe пoлe "' + $(this).attr('placeholder') + '"!');
             error = true;
         }
     });
        if (!error){
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: "registration.php",
                dataType : 'json',
                data: data,
                beforeSend: function(data) {
                    form.find('button[type="submit"]').attr('disabled', 'disabled');
                },
                success: function(data){
                    if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Форма отравлена!');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
                complete: function(data) {
                    form.find('button[type="submit"]').prop('disabled', false);
                }
            });
            return false;
        }
 });

});




   

