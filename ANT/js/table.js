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
    
    
    
        var page,
            total,
            url = '';
    
        
    
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
    
                if (data.pages) {
                    data.pages['page'] = Number(data.pages['page']);
                    data.pages['total'] = Number(data.pages['total']);
        
                    page = data.pages['page'];
                    total = data.pages['total'];
        
                    if (page != 1) {
                        url += '<li id="page2left">';
                        url += '<a >';
                        url += '<<';
                        url += '</a>';
                        url += '</li>';
                    }
                    if(page > page+1)
                    {
                        url += '<li id="page1left">';
                        url += '<a >';
                        url += '<';
                        url += '</a>';
                        url += '</li>';
                    }
                    
                    for (var x = 1; x < 4; x++) {
                        if (x == page) {
                            url += '<li class="active">';
                            url += '<a>';
                            url += page;
                            url += '</a>';
                            url += '</li>';
                        } else {
                            url += '<li>';
                            url += '<a>';
                            url += x;
                            url += '</a>';
                            url += '</li>';
                        }
                    }
        
                    if (page != total-1) {
                        url += '<li id="page1reigth">';
                        url += '<a >';
                        url += '>';
                        url += '</a>';
                        url += '</li>';
                    }
                    
                    if(page!=total) {
                        url += '<li id="page2reigth">';
                        url += '<a >';
                        url += '>>';
                        url += '</a>';
                        url += '</li>';
                    }
                    
                    $('#page').html(url);
                }
                
            }),
            error: (function (jqXHR, exception) {
                getErrorMessage(jqXHR, exception)
            })
        });
    
        
    
        $('#page2reigth,#page1reigth,#page1left,#page2left').click(function (e) {
        
            e.preventDefault();
            
            if(this.id=='page2reigth'){
                page = page + 2;
            }
            if(this.id=='page1reigth'){
                page = page + 1;
            }
            if(this.id=='page2left'){
                page = page - 2;
            }
            if(this.id=='page1left'){
                page = page - 1;
            }
    
            console.log(page);
            
            $.ajax({
                url: 'data.php',
                type: 'POST',
                dataType: 'json',
                data:{page:page},
                error: (function (jqXHR, exception) {
                    getErrorMessage(jqXHR, exception)
                })
            });
            
        });
    
    
    
    
        $('#nameUP,#nameDOUN,#ballsUP,#ballsDOUN,#mygroupUP,#mygroupDOUN,#seurnameUP,#seurnameDOUN,#tofind').click(
            function (e) {
                e.preventDefault();
                
                    var find = $('#find').val();
                   
                if (this.id == 'nameUP' || this.id=='tofind') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        data:{status:'nameUP',find:find},
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
                } else if (this.id == 'nameDOUN' || this.id=='tofind') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        data:{status:'nameDOUN',find:find},
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
                } else if (this.id == 'ballsUP' || this.id=='tofind') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        data:{status:'ballsUP',find:find},
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
                } else if (this.id == 'ballsDOUN'|| this.id=='tofind') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        data:{status:'ballsDOUN',find:find},
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
                } else if (this.id == 'mygroupUP' || this.id=='tofind' ) {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        data:{status:'mygroupUP',find:find},
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
                } else if (this.id == 'mygroupDOUN'|| this.id=='tofind') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        data:{status:'mygroupDOUN',find:find},
                        dataType: 'json',
                        success: (function (data) {
                            if (data.mygroupDESC) {
                                let user = '';
                                let ctn = data.mygroupDESC.length;
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
                } else if (this.id == 'seurnameUP' || this.id=='tofind') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        data:{status:'seurnameUP',find:find},
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
                } else if (this.id == 'seurnameDOUN' || this.id=='tofind') {
                    $.ajax({
                        url: 'data.php',
                        type: 'POST',
                        data:{status:'seurnameDOUN',find:find},
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
