$(function Tawns() {
    
    // $("#inputName").val()!=='' && $("#inputMail").val()!=='' &&
    
    // function presend(){
    //     if ( $("#selectTerritory ").val()!=='' && $("#selectTowns").val()!=='')
    //     {
    //         return true;
    //     }
    //     else {
    //         return false;
    //     }
    // }
    
   /* function send(){
        $('#test').text("OK");
    };*/
    
    var selectTerritory= $(this).val();
    
    $.ajax({
        type : "POST",
        url: "registration.php",
        // beforesend:(presend()),
        data: {Territory:selectTerritory},
        success: function (data) {
            $('#detale').html(data);
        }
    });
    
    var selectRayons= $(this).val();
    $.ajax({
        type : "POST",
        url: "registration.php",
        // beforesend:(presend()),
        data: {Rayons:selectRayons},
        success: function (data) {
            $('#detale').html(data);
        }
    });
    
        $('#selectTerritory').change(function(){
            var selectTerritory= $(this).val();
            
            $.ajax({
               type : "POST",
                url: "registration.php",
                // beforesend:(presend()),
                data: {Territory:selectTerritory},
                success: function (data) {
                    $('#detale').html(data);
                }
            });
           
        });
        
        $().change(function(){
            var selectRayons= $(this).val();
            $.ajax({
               type : "POST",
                url: "registration.php",
                // beforesend:(presend()),
                data: {Rayons:selectRayons},
                success: function (data) {
                    $('#detale').html(data);
                }
            });
           
        });
        
    
});




   

