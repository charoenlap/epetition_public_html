<div class="breadcrumb-theme">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
          <li><a href="<?php echo route('home'); ?>">หน้าหลัก</a></li>
          <li class="active" aria-current="page">ติดตามเรื่องร้องเรียน</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<section class="py-5 h-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">ติดตามเรื่องร้องเรียน</h3>
                <form action="<?php echo route('ticket/ticketStatus');?>" method="POST">
                  <div>ค้นหาด้วย</div>
                  <input type="radio" name="rdoType" value="ticket" id="ticket" checked>
                  <label for="ticket">รหัสเรื่องร้องเรียน (Ticket ID)</label>
                  <input type="radio" name="rdoType" value="idno" id="idno">
                  <label for="idno">เลขบัตรประจำตัวประชาชน</label>

                  <input type="text" class="form-control form-control-lg mt-2 mb-3" id="case_code" onkeyup="idcard(this);" placeholder="รหัสเรื่องร้องเรียน" name="case_code" id="case_code" required>
                  <input type="text" class="form-control form-control-lg mb-3" id="phone" onkeyup="phoneTab(this);" placeholder="กรอกข้อมูลเบอร์โทรศัพท์มือถือ" name="phone" required>
                  <?php if($production){ ?>
                      <div class="g-recaptcha mb-2" data-sitekey="6LeEVQIfAAAAAO7mj5F76RKroMqtd5k3PErjiexu" id="reCAPTCHA"></div>
                  <?php } ?>
                  <div>
                    <label for="">* กรุณากรอกข้อมูลทั้ง 2 ช่อง</label>
                  </div>
                  <button class="btn btn-theme btn-lg btn-block"  type="submit">ค้นหา</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php if($production){ ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
<script type="text/javascript">
  var onloadCallback = function() {
    grecaptcha.render('reCAPTCHA', {
      'sitekey' : '6LeEVQIfAAAAAO7mj5F76RKroMqtd5k3PErjiexu'
    });
  };
</script>
<?php } ?>
<script>
  $(function(e){
    $("#case_code,#tel,#phone,#age").keydown("keypress keydown blur", function (event) { 
        var key = event.charCode || event.keyCode || 0;
        if ((key == 110 || key == 190) && $(this).val().split(",").length == 1) { //checks whether input is a full stop and lets only 1 through
            return;
        }
        else
            return ( // check if it is a number, only allows numbers through
                key == 8 ||
                key == 9 ||
                key == 13 ||
                key == 46 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));                           
    });
});
  // var placeholder = $(obj).attr('placeholder');
  //   console.log(placeholder);
  //   if(placeholder=="กรอกข้อมูลเบอร์โทรศัพท์"){
  //     var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้  
  //     var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
  //     var returnText=new String("");  
  //     var obj_l=obj.value.length;  
  //     var obj_l2=obj_l-1;  
  //     for(i=0;i<pattern.length;i++){             
  //         if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
  //             returnText+=obj.value+pattern_ex;  
  //             obj.value=returnText;  
  //         }  
  //     }  
  //     if(obj_l>=pattern.length){  
  //         obj.value=obj.value.substr(0,pattern.length);             
  //     }  
  //   }
  function idcard(obj){  
    var placeholder = $(obj).attr('placeholder');
    if(placeholder=="เลขบัตรประจำตัวประชาชน"){
      var pattern=new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้  
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
      var returnText=new String("");  
      var obj_l=obj.value.length;  
      var obj_l2=obj_l-1;  
      for(i=0;i<pattern.length;i++){             
          if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
              returnText+= obj.value+pattern_ex;  
              obj.value=returnText;  
          }  
      }  
      if(obj_l>=pattern.length){  
          obj.value=obj.value.substr(0,pattern.length);             
      }
    }
      
  }  
  function phoneTab(obj){  
     var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้  
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
      var returnText=new String("");  
      var obj_l=obj.value.length;  
      var obj_l2=obj_l-1;  
      for(i=0;i<pattern.length;i++){             
          if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
              returnText+=obj.value+pattern_ex;  
              obj.value=returnText;  
          }  
      }  
      if(obj_l>=pattern.length){  
          obj.value=obj.value.substr(0,pattern.length);             
      }  
  }  
  $(document).on('click',"input[name^='rdoType']",function(e){
    $('#case_code').val('');
    var val = $(this).val();
    console.log(val);
    var text = $("label[for^='"+val+"']").text();
    console.log(text);
    $('#case_code').attr('placeholder',text);
  });
</script>