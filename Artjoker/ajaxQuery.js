$(function Tawns() {
    
    function presend(){
        if ( ($("#selectTerritory ").val()!='') &&  ($("#inputName").val()!='') && ($("#inputMail").val()!='') && ($("#selectTowns").val()!=''))
        {
            return true;
        }
        else {
            return false;
        }
    }
    
    var selectTerritory= $(this).val();
    $.ajax({
        type : "POST",
        url: "registration.php",
        beforesend:(presend()),
        data: {Territory:selectTerritory},
        success: function (data) {
            $('#detale').html(data);
            $('#selectTerritory').val(selectTerritory);
        }
    });
    
  
        $('#selectTerritory').change(function(){
             var selectTerritory= $(this).val();
            $.ajax({
               type : "POST",
                url: "registration.php",
                beforesend:(presend()),
                data: {Territory:selectTerritory},
                success: function (data) {
                    $('#detale').html(data);
                    $('#selectTerritory').val(selectTerritory);
                }
            });
        });
    
        
    $(document).on('change', '#selectRayons',function () {
       var selectRayons = $('#selectRayons').val();
         var selectTerritory = $('#selectTerritory').val();
        $.ajax({
            type: "POST",
            url: "registration.php",
            beforesend:(presend()),
            data: {Rayons: selectRayons,Territory:selectTerritory},
            success: function (data) {
                $('#detale').html(data);
                $('#selectRayons').val(selectRayons);
            }
        });
    });
    
    $(document).on('change', '#selectTowns',function () {
        var selectTerritory = $('#selectTerritory').val();
        var selectRayons = $('#selectRayons').val();
        var selectTowns = $('#selectTowns').val();
        $.ajax({
            type: "POST",
            url: "registration.php",
            beforesend:(presend()),
            data: {Rayons: selectRayons,Territory:selectTerritory,Towns:selectTowns},
            success: function (data) {
                $('#detale').html(data);
                $('#selectTerritory').val(selectTerritory);
                $('#selectRayons').val(selectRayons);
                $('#selectTowns').val(selectTowns);
            }
        });
    });
 
    
});




   

