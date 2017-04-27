<?php
include("inc/header.php");

$get_details_q = $db -> prepare("SELECT u.* FROM users u WHERE u.id = ? LIMIT 1");
$get_details_q -> bindParam(1, $_SESSION['user_id']);
$get_details_q -> execute();
$details = $get_details_q -> fetchAll(PDO::FETCH_ASSOC);

?>
<form id="change_details" class="form" method="post">
        <div class="form-group">
            <input name="uname" placeholder="Username" class="form-control" required value=<?=$details[0]['uname']?>>
        </div>
        <div class="form-group">
            <input type="password" id="old_password" value="" name="pass_old" placeholder="current" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" id="new_password" value="" name="pass_new" placeholder="new" data-rule-notEqualTo="#old_password" class="form-control">
        </div>
        <div style="display:none" id="wrong_password" class="alert-warning">
        	<h3>wrong password</h3>
        </div>
        <div class="form-group">
            <input type="password" id="password_confirm" value="" name="password_confirm" data-rule-equalTo="#new_password" placeholder="confirm" class="form-control">
        </div>
        <input type="hidden" name="id" value=<?=$_SESSION['user_id']?>>
        <button type="submit" class="btn btn-info">Change</button>
    </form>
</body>
    <script src="js/jquery.validation/jquery.validate.js"></script>
    <script src="js/jquery.validation/additional-methods.js"></script>

<script type="text/javascript">
	
$('#change_details').validate();

$('#change_details').submit( function (e) {
	e.preventDefault();  
    if($(this).valid() == true) {
        console.info('yes');
      	     
      	$info = $(this).serializeArray();

      	var request = $.ajax({
      	  url: "ajax/changeDetails.php",
      	  method: "POST",
      	  data: $info,
      	  dataType: "html"
      	});
       
      	request.done(function( msg ) {
      	  if(msg == 'true') {
      	    alert("success")
      	  } else if(msg == 'false') {
      	  	console.info('here');
      	    $('#wrong_password').show();
      	  }
      	});

      	request.fail(function( jqXHR, textStatus ) {
      	  alert( "Request failed: " + textStatus );
      	});

    } else {
        alert("fail");
    }
});

</script>
<?php
include("inc/footer.php");
?>