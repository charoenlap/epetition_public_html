$('#geographies').on("change",function(){
    let value = $('option:selected', this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "http://43.229.77.178/~hostphp7/epetition/public_html/index.php?route=home/form",
        data: {idgeographies:value},
        success: function(data,response){
            console.log(response);
            $('#provinces').html(data);
        }
    });
});

$('#provinces').on("change",function(){
    let value = $('option:selected', this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "http://43.229.77.178/~hostphp7/epetition/public_html/index.php?route=home/form",
        data: {idprovinces:value},
        success: function(data,response){
            console.log(response);
            $('#amphures').html(data);
        }
    });
});

$('#amphures').on("change",function(){
    let value = $('option:selected', this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "http://43.229.77.178/~hostphp7/epetition/public_html/index.php?route=home/form",
        data: {idamphures:value},
        success: function(data,response){
            console.log(response);
            $('#districts').html(data);
        }
    });
});

$('#t_geographies').on("change",function(){
    let value = $('option:selected', this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "http://43.229.77.178/~hostphp7/epetition/public_html/index.php?route=home/form",
        data: {t_idgeographies:value},
        success: function(data,response){
            console.log(response);
            $('#t_provinces').html(data);
        }
    });
});

$('#t_provinces').on("change",function(){
    let value = $('option:selected', this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "http://43.229.77.178/~hostphp7/epetition/public_html/index.php?route=home/form",
        data: {t_idprovinces:value},
        success: function(data,response){
            console.log(response);
            $('#t_amphures').html(data);
        }
    });
});

$('#t_amphures').on("change",function(){
    let value = $('option:selected', this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "http://43.229.77.178/~hostphp7/epetition/public_html/index.php?route=home/form",
        data: {t_idamphures:value},
        success: function(data,response){
            console.log(response);
            $('#t_districts').html(data);
        }
    });
});

$('#districts').change(function(event){
    let zipCode = $('option:selected', this).attr('zipcode');
    $('#zipcode').val(zipCode);
});

$('input[name=name_topic]').change(function() {
    if (this.value == '1'){
        $('.note-1').removeAttr('disabled');
        $('.note-2').attr('disabled','disabled');
        $('.note-3').attr('disabled','disabled');
        $('.note-4').attr('disabled','disabled');
        $('.note-5').attr('disabled','disabled');
    }else if (this.value == '2'){
        $('.note-2').removeAttr('disabled');
        $('.note-1').attr('disabled','disabled');
        $('.note-3').attr('disabled','disabled');
        $('.note-4').attr('disabled','disabled');
        $('.note-5').attr('disabled','disabled');
    }else if(this.value == '3'){
        $('.note-3').removeAttr('disabled');
        $('.note-1').attr('disabled','disabled');
        $('.note-2').attr('disabled','disabled');
        $('.note-4').attr('disabled','disabled');
        $('.note-5').attr('disabled','disabled');
    }else if(this.value == '4'){
        $('.note-4').removeAttr('disabled');
        $('.note-1').attr('disabled','disabled');
        $('.note-2').attr('disabled','disabled');
        $('.note-3').attr('disabled','disabled');
        $('.note-5').attr('disabled','disabled');
    }else if(this.value == '5'){
        $('.note-5').removeAttr('disabled');
        $('.note-1').attr('disabled','disabled');
        $('.note-2').attr('disabled','disabled');
        $('.note-3').attr('disabled','disabled');
        $('.note-4').attr('disabled','disabled');
    }
});