

$('#districts').change(function(event){
    let zipCode = $('option:selected', this).attr('zipcode');
    $('#zipcode').val(zipCode);
});
$('#t_districts').change(function(event){
    let zipCode_ = $('option:selected', this).attr('zipcode');
    $('#t_zipcode').val(zipCode_);
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
