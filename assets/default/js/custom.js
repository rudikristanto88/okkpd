jQuery(document).ready(function() {

  // var jmlUser = 0;

  jQuery("#sign_up_password").keyup(function(){
  //  retypePassword(this.value, jQuery("#sign_up_password_retype").val());
  });
  jQuery("#sign_up_password_retype").keyup(function(){
    retypePassword(this.value, jQuery("#sign_up_password").val());
  });

  jQuery("#submit_registration").click(function(){
    if(retypePassword(jQuery("#sign_up_password_retype").val(), jQuery("#sign_up_password").val())){
      if(jmlUser < 1){
        jQuery("#email_alert").css("display","none");
        jQuery("#form_registration").submit();
      }else{
        jQuery("#email_alert").css("display","block");
      }
    }else{
      alert("Password belum cocok");
    }
  });

  jQuery("#username").change(function(){
    var email = this.value;
    console.log(email);
    jQuery.ajax({
      url: "dashboard/cek_username",
      data:{email: email},
      type: "POST",
      success: function(result){
        jmlUser = result;
        console.log(result);
        if(result > 0){
          jQuery("#email_alert").css("display","block");
        }else{
          jQuery("#email_alert").css("display","none");
        }
      }
    });
  })


  function retypePassword(val1,val2){
    if(val1 == val2){
      jQuery("#retype_password_status").html("<div style='color:green'>Password cocok</div>");
      return true;
    }else{
      jQuery("#retype_password_status").html("<div style='color:red'>Password tidak cocok</div>");
      return false;
    }
  }


});
