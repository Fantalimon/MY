$(function Tauns () {
   /* function presend(){
        if ($("#inputName").val()!=='' && $("#inputMail").val()!=='' && $("#selectTerritory").val()!=='')
        {
            return true;
        }
        else {
            return false;
        }
    }
    
    function send(){
        $('#test').text("OK");
    };*/
        
        $('#selectTerritory').change(function(){
            var selectTerritory= $(this).val();
            $('#detale').load('registration.php',{Territory :selectTerritory});
        });
}).change();



$(function Rayons() {
$('#selectTown').change(function(){
            var selectTown= $(this).val();
            $('#detale').load('registration.php',{Towns :selectTown});
        });
}).change();



   

