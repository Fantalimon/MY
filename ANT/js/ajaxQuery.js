// (function ($, undefined) {
//     $(function () {
//
//
//         var form = $("#myForm");
//         $("#send").text("Введите все данные.......");
//         form.change(function () {
//             var selectTerritory = $('#selectTerritory').val(),
//                 selectRayons = $('#selectRayons').val(),
//                 selectRayonsTowns = $('#selectRayonsTowns').val(),
//                 selectTowns = $('#selectTowns').val(),
//                 selectSMT = $('#selectSMT').val(),
//                 inputName = $('#inputName').val(),
//                 inputMail = $('#inputMail').val(),
//                 formdata = $("#myForm").serialize();
//             if (selectTerritory != '' && inputName != '' && inputMail != '') {
//                 $('#send').text('Зарегестрировать');
//             }
//
//             $.ajax({
//                 type: "POST",
//                 url: "registration.php",
//                 dataType: "JSON",
//                 data: formdata,
//                 success: function (data) {
//
//                     $('#selectTerritory').val(selectTerritory);
//
//                     if (data.towns) {
//                         var optionTowns = '';
//                         optionTowns = '<br><select id="selectTowns" class="chosen-select" name="Towns" title="Выберете город"> <option value="">Выберете город</option>';
//                         for (var town in data.towns) {
//                             optionTowns += '<option value="' + data.towns[town] + '">' + data.towns[town] + '</option>';
//                         }
//                         optionTowns += '</select><br>';
//                         $("#detaleTowns").html(optionTowns);
//                         $('#selectTowns').val(selectTowns);
//                     }
//
//                     if (data.rayons_towns) {
//                         var optionRayonsTowns = '';
//                         optionRayonsTowns = '<br><select id="selectRayonsTowns" class="chosen-select" name="RayonsTowns" title="Выберете район Города"> <option value="">Выберете район Города</option>';
//                         for (var rayon in data.rayons_towns) {
//                             optionRayonsTowns += '<option value="' + data.rayons_towns[rayon] + '">' + data.rayons_towns[rayon] + '</option>';
//                         }
//                         optionRayonsTowns += '</select><br>';
//                         $("#detaleRayonsTowns").html(optionRayonsTowns);
//                         $('#selectRayonsTowns').val(selectRayonsTowns);
//                     }
//
//                     if (data.rayons) {
//                         var optionRayons = '';
//                         optionRayons = '<br><select id="selectRayons" class="chosen-select" name="Rayons" title="Выберете район Области"> <option value="">Выберете район Области</option>';
//                         for (var rayon in data.rayons) {
//                             optionRayons += '<option value="' + data.rayons[rayon] + '">' + data.rayons[rayon] + '</option>';
//                         }
//                         optionRayons += '</select><br>';
//                         $("#detaleRayons").html(optionRayons);
//                         $('#selectRayons').val(selectRayons);
//                     }
//
//                     if (data.smt) {
//                         var optionSMT = '';
//                         optionSMT = '<br><select id="selectSMT" class="chosen-select" name="SMT" title="Выберете ПГТ,Село,Деревню"> <option value="">Выберете ПГТ,Село,Деревню</option>';
//                         for (var smt in data.smt) {
//                             optionSMT += '<option value="' + data.smt[smt] + '">' + data.smt[smt] + '</option>'
//                         }
//                         optionSMT += '</select><br>';
//                         $("#detaleSMT").html(optionSMT);
//                         $('#selectSMT').val(selectSMT);
//                     }
//
//                 }
//             })
//         });
//
//
//         $("#send").click(function (e) {
//             e.preventDefault();
//             var   err_text = '',
//                 error = 0,
//                 mydata = $("#myForm").serialize();
//
//             if (!isValidEmailAddress($('#inputMail').val())){
//                 error = 2;
//             }
//
//             var field = ['name', 'email', 'Territory'];
//             $('#myForm').find('input,select').each(function () {
//                 for (var find = 0; find < field.length; find++) {
//                     if ($(this).attr('name') == field[find]) {
//                         if (!$(this).val()) {
//                             $(this).css('border', 'red 1px solid');
//                             error = 1;
//                         } else {
//                             $(this).css('border', 'gray 1px solid');
//                         }
//                     }
//                 }
//             });
//
//             if (error == 1) {
//                 err_text = "Не все обязательные поля заполнены!";
//             }
//             if (error == 2) {
//                 err_text = "Введен некорректный e-mail!";
//             }
//
//             if (error == 0) {
//                 $.ajax({
//                     type: "POST",
//                     url: "add.php",
//                     dataType: "JSON",
//                     data: mydata,
//                     cache: false,
//                     success: function (data) {
//                         $("<h1>Данные успешно отправлены</h1>").appendTo("#yes");
//                         $('input, select').val('');
//
//                         if (data.newUser) {
//                             var newUser = '';
//                             newUser += '<h1>Ура новый пользователь</h1>'
//                             newUser += '<p>';
//                             for (var i = 0 in data.newUser) {
//                                 newUser += data.newUser[i] + '<br>';
//                             }
//                             ;
//                             newUser += '</p>';
//                             $('#yes').html(newUser).fadeIn(4000).fadeOut(5000).end().remove();
//                         }
//
//                         if (data.oldUser) {
//                             var oldUser = '';
//                             oldUser += '<h1>Уже есть такой пользователь</h1>'
//                             oldUser += '<p>';
//                             for (var y = 0 in data.oldUser) {
//                                 oldUser += data.oldUser[y] + '<br>';
//                             }
//                             ;
//                             oldUser += '</p>';
//                             $('#yes').html(oldUser).fadeIn(4000).fadeOut(5000).end().remove();
//                         }
//                         setTimeout(function() {window.location.reload();}, 6000);
//                     },
//                     error: function (jqXHR, exception) {
//                         getErrorMessage(jqXHR, exception)
//                     }
//                 });
//             } else {
//                 var MSG = $('<div id="MSG" style="color:red; background:darkviolet; width:30%;"></div>').html('<h4>' + err_text + '</h4>');
//                 $(MSG).insertAfter('legend');
//                 $('#MSG').fadeIn(3000).fadeOut(4000).end().remove();
//                 return false;
//             }
//         });
//
//         function getErrorMessage(jqXHR, exception) {
//             var msg = '';
//             if (jqXHR.status === 0) {
//                 msg = 'Not connect.\n Verify Network.';
//             } else if (jqXHR.status == 404) {
//                 msg = 'Requested page not found. [404]';
//             } else if (jqXHR.status == 500) {
//                 msg = 'Internal Server Error [500].';
//             } else if (exception === 'parsererror') {
//                 msg = 'Requested JSON parse failed.';
//             } else if (exception === 'timeout') {
//                 msg = 'Time out error.';
//             } else if (exception === 'abort') {
//                 msg = 'Ajax request aborted.';
//             } else {
//                 msg = 'Uncaught Error.\n' + jqXHR.responseText;
//             }
//             $('#yes').html(msg);
//         }
//
//         function isValidEmailAddress(emailAddress) {
//             var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
//             return pattern.test(emailAddress);
//         }
//     });
//
//
//
//
// })(jQuery);
//
//
//
//
//
//
//
//
//
