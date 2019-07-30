

<?php 

  if(empty(session_id())){
      session_start();
    }

$form_error = array();

    if (isset($_POST['regstudent'])) {
      if($_POST["code"] == captcha::get_code()) {
    $stu = new student();
      $abc= $stu->Validation($_POST);
  }
  else {
    echo "Invalid Captcha";
  }


      
     
    }
?>
<?php 
    if(isset($stu)){
      if($abc == 1){
        echo "Successfully Insert";
      }else{
        $form_error =$abc;
        print_r($form_error);
      }
    }



//------------end validtion------------
?>


	<script>
function ajaxnew(feild){
	
	var nvalue = $("#"+feild).val();
     

	 var postForm = { //Fetch form data
            [feild]    : nvalue //Store name fields value
        };
	//var ht = "";
	 $.ajax({
            type: "POST",
            url: "processajax.php",
            dataType: "json",
            data: postForm,
            success : function(data){
			 if(typeof data["error_"+feild] !== 'undefined') {
				     
                    $("."+feild+"-display-error").html("<span>"+data["error_"+feild]+"</span>");
                    $("."+feild+"-display-error").css("display","block");
					
					
			 }
			 else{
				 $("."+feild+"-display-error").css("display","none");
			 }

			}
        });


}
</script>
<br><br>
  <div class="container">
  
    <form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
<fieldset>

<!-- Form Name -->
<legend>Student Registration Form!</legend>

<!-- Text input-->

<div class="form-group">

  
  <label class="col-md-4 control-label">Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="sname" id="sname" onkeyup="ajaxnew('sname')" placeholder="Your Name" class="form-control"  type="text" value="<?php if(isset($_POST['sname'])){echo $_POST['sname'];} ?>">
    <div class="alert alert-danger sname-display-error" style="display: none"></div>
	<?php if(!empty($form_error['error_sname'])){ ?>
		<div class="alert alert-danger sname-display-error" style="display: block"><?php echo $form_error['error_sname']; ?></div><?php }?>



	</div>
  </div><!-- <span class="error"></span> -->
</div>

<!-- Text input-->
           <div class="form-group">
	  <label class="col-md-4 control-label">E-Mail</label>  
		<div class="col-md-4 inputGroupContainer">
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
		<input name="email" id="email" onkeyup="ajaxnew('email')" placeholder="E-Mail Address" class="form-control"  type="text">
		</div>
	<?php if(!empty($form_error['error_email'])){ ?>
		<div class="alert alert-danger email-display-error" style="display: block"><?php echo $form_error['error_email']; ?></div><?php }?>
	  <div class="alert alert-danger email-display-error" style="display: none"></div>
	  </div><!-- <span class="error"></span> -->
	</div>
<!-- Select Basic -->  
<div class="form-group"> 
  <label class="col-md-4 control-label">Last Education Level</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
		
    <select name="slastedu" class="form-control selectpicker" >
      <option value="" >Please select your Education Lavel</option>
      <option value="SSC">SSC</option>
      <option value="HSC">HSC Or Diploma Or Equivalent</option>
      <option value="B.Sc">B.Sc or Equivalent</option>
      <option value="M.Sc">M.Sc or Equivalent</option>
      
    </select>
	<div class="alert alert-danger slastedu-display-error" style="display: none"></div>
  </div>
</div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Last Education Result</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="slastresult" placeholder="Your Last Education Result!" class="form-control"  type="text">
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>



<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Phone #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="sphone" placeholder="01XXXXXXXXX" class="form-control" type="text">
   <div class="alert alert-danger sphone-display-error" style="display: none"></div>
    </div>
  </div><!-- <span class="error"></span> -->
</div>




<!-- Select Basic -->  
<div class="form-group"> 
  <label class="col-md-4 control-label">Gender</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="sgender" class="form-control selectpicker" >
      <option value="Male" select>Male</option>
      <option value="Female">Female</option>
      
      
    </select>
  </div>
</div>
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Password</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="spassword" placeholder="Password...!" class="form-control" type="password">
      <div class="alert alert-danger spassword-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"><?php echo $phoneErr; ?></span> -->
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Confirm Password</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="conpassword" placeholder="Confirm Password...!" class="form-control" type="password">
    </div>
  </div><!-- <span class="error"><?php echo $phoneErr; ?></span> -->
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Captcha</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
 <input type="text" name="code" placeholder="Captcha Code" /><br/>
    <img src="<?= captcha::image() ?>"  title="Captcha" />
    </div>
  </div><!-- <span class="error"><?php echo $phoneErr; ?></span> -->
</div>

<!-- Success message -->
	
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" name="regstudent" class="btn btn-primary" value="Send">
</div>

</fieldset>
</form>
</div><br><br>
