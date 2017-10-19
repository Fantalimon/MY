(function ($, undefined) {
    $(function () {
    
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
            console.log(msg);
        }
    
    
    
        $.ajax({
            url: 'data.php',
            type: 'POST',
            dataType: 'json',
            success: (function (data) {
                if (data.ballsDESC) {
                    let user = '';
                    let ctn = data.ballsDESC.length;
                    for (let i = 0; i < ctn; i++) {
                        user += '<tr>';
                        user += '<td>' + data.ballsDESC[i]['name'] + '</td>';
                        user += '<td>' + data.ballsDESC[i]['seurname'] + '</td>';
                        user += '<td>' + data.ballsDESC[i]['mygroup'] + '</td>';
                        user += '<td>' + data.ballsDESC[i]['balls'] + '</td>';
                        user += '</tr>';
                    }
                    
                    $('tbody').html(user);
                }
            }),
            error: (function (jqXHR, exception) {
                getErrorMessage(jqXHR, exception)
            })
        });
        
        $('#nameUP,#nameDOUN,#ballsUP,#ballsDOUN,#mygroupUP,#mygroupDOUN,#seurnameUP,#seurnameDOUN').click(
            function (e) {
                e.preventDefault();
                if (this.id == 'nameUP') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        cache: false,
                        dataType: 'json',
                        success: (function (data) {
                            let user = '';
                            let ctn = data.nameASC.length;
                            for (let i = 0; i < ctn; i++) {
                                user += '<tr>';
                                user += '<td>' + data.nameASC[i]['name'] + '</td>';
                                user += '<td>' + data.nameASC[i]['seurname'] + '</td>';
                                user += '<td>' + data.nameASC[i]['mygroup'] + '</td>';
                                user += '<td>' + data.nameASC[i]['balls'] + '</td>';
                                user += '</tr>';
                                $('tbody').html(user);
                            }
                        }),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
                } else if (this.id == 'nameDOUN') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        cache: false,
                        dataType: 'json',
                        success: (function (data) {
                            let user = '';
                            let ctn = data.nameDESC.length;
                            for (let i = 0; i < ctn; i++) {
                                user += '<tr>';
                                user += '<td>' + data.nameDESC[i]['name'] + '</td>';
                                user += '<td>' + data.nameDESC[i]['seurname'] + '</td>';
                                user += '<td>' + data.nameDESC[i]['mygroup'] + '</td>';
                                user += '<td>' + data.nameDESC[i]['balls'] + '</td>';
                                user += '</tr>';
                                $('tbody').html(user);
                            }
                        }),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
                } else if (this.id == 'ballsUP') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        cache: false,
                        dataType: 'json',
                        success: (function (data) {
                            let user = '';
                            let ctn = data.ballsASC.length;
                            for (let i = 0; i < ctn; i++) {
                                user += '<tr>';
                                user += '<td>' + data.ballsASC[i]['name'] + '</td>';
                                user += '<td>' + data.ballsASC[i]['seurname'] + '</td>';
                                user += '<td>' + data.ballsASC[i]['mygroup'] + '</td>';
                                user += '<td>' + data.ballsASC[i]['balls'] + '</td>';
                                user += '</tr>';
                                $('tbody').html(user);
                            }
                        }),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
                } else if (this.id == 'ballsDOUN') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        dataType: 'json',
                        success: (function (data) {
                            if (data.ballsDESC) {
                                let user = '';
                                let ctn = data.ballsDESC.length;
                                for (let i = 0; i < ctn; i++) {
                                    user += '<tr>';
                                    user += '<td>' + data.ballsDESC[i]['name'] + '</td>';
                                    user += '<td>' + data.ballsDESC[i]['seurname'] + '</td>';
                                    user += '<td>' + data.ballsDESC[i]['mygroup'] + '</td>';
                                    user += '<td>' + data.ballsDESC[i]['balls'] + '</td>';
                                    user += '</tr>';
                                }
                                
                                $('tbody').html(user);
                            }
                        }),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
                } else if (this.id == 'mygroupUP') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        dataType: 'json',
                        success: (function (data) {
                            if (data.mygroupASC) {
                                let user = '';
                                let ctn = data.mygroupASC.length;
                                for (let i = 0; i < ctn; i++) {
                                    user += '<tr>';
                                    user += '<td>' + data.mygroupASC[i]['name'] + '</td>';
                                    user += '<td>' + data.mygroupASC[i]['seurname'] + '</td>';
                                    user += '<td>' + data.mygroupASC[i]['mygroup'] + '</td>';
                                    user += '<td>' + data.mygroupASC[i]['balls'] + '</td>';
                                    user += '</tr>';
                                }
                                
                                $('tbody').html(user);
                            }
                        }),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
                } else if (this.id == 'mygroupDOUN') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        dataType: 'json',
                        success: (function (data) {
                            if (data.mygroupDESC) {
                                let user = '';
                                let ctn = data.mygroupASC.length;
                                for (let i = 0; i < ctn; i++) {
                                    user += '<tr>';
                                    user += '<td>' + data.mygroupDESC[i]['name'] + '</td>';
                                    user += '<td>' + data.mygroupDESC[i]['seurname'] + '</td>';
                                    user += '<td>' + data.mygroupDESC[i]['mygroup'] + '</td>';
                                    user += '<td>' + data.mygroupDESC[i]['balls'] + '</td>';
                                    user += '</tr>';
                                }
                                
                                $('tbody').html(user);
                            }
                        }),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
                } else if (this.id == 'seurnameUP') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        dataType: 'json',
                        success: (function (data) {
                            if (data.seurnameASC) {
                                let user = '';
                                let ctn = data.seurnameASC.length;
                                for (let i = 0; i < ctn; i++) {
                                    user += '<tr>';
                                    user += '<td>' + data.seurnameASC[i]['name'] + '</td>';
                                    user += '<td>' + data.seurnameASC[i]['seurname'] + '</td>';
                                    user += '<td>' + data.seurnameASC[i]['mygroup'] + '</td>';
                                    user += '<td>' + data.seurnameASC[i]['balls'] + '</td>';
                                    user += '</tr>';
                                }
                                
                                $('tbody').html(user);
                            }
                        }),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
                } else if (this.id == 'seurnameDOUN') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        dataType: 'json',
                        success: (function (data) {
                            if (data.seurnameDESC) {
                                let user = '';
                                let ctn = data.seurnameDESC.length;
                                for (let i = 0; i < ctn; i++) {
                                    user += '<tr>';
                                    user += '<td>' + data.seurnameDESC[i]['name'] + '</td>';
                                    user += '<td>' + data.seurnameDESC[i]['seurname'] + '</td>';
                                    user += '<td>' + data.seurnameDESC[i]['mygroup'] + '</td>';
                                    user += '<td>' + data.seurnameDESC[i]['balls'] + '</td>';
                                    user += '</tr>';
                                }
                                
                                $('tbody').html(user);
                            }
                        }),
                        error: (function (jqXHR, exception) {
                            getErrorMessage(jqXHR, exception)
                        })
                    });
                }
            });
    });
})(jQuery);
