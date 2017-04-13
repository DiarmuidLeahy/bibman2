<?php
include("inc/header.php");
?>  
    <body>
    <br><br><br><br>

    <select id="folders" class="form-control">
        <option value="" default>Select one</option>
        <option value="all" default>All</option>
        <option value="trash">trash</option>
        <option value="unfiled">unfiled</option>
    </select>

  	<table class="table table-striped table-hover">
  	<thead>
	  	<tr>
            <th>#</th>
		  	<th>title</th>
		  	<th>author</th>
		  	<th>date added</th>
		  	<th>date published</th>
		  	<th>volume</th>
		  	<th>abstact</th>
		  	<th>pages</th>
		</tr>
	</thead>
	<tbody>
  	<?php
    if(isset($_GET['folder']) && $_GET['folder'] != 'all') {
        $q = $db -> prepare("SELECT r.* FROM refs r INNER JOIN folders f ON r.user_id = f.user_id 
            WHERE r.user_id = ? AND f.name = ? AND r.user_id = f.user_id AND r.id = f.ref_id");

        $q -> bindParam(1, $_SESSION['user_id']);
        $q -> bindParam(2, $_GET['folder']);
        $q -> execute();
        $results = $q -> fetchAll(PDO::FETCH_ASSOC);
    } else {

  		$q = $db -> prepare("SELECT r.* FROM refs r WHERE r.user_id = ?");
  		$q -> bindParam(1, $_SESSION['user_id']);
  		$q -> execute();
  		$results = $q -> fetchAll(PDO::FETCH_ASSOC);
        }

  		foreach($results as $row) { ?>
  		<tr>
            <td>
                <input class="radion" type="radio" name="optradio">
            </td>
  			<td><?=$row['title']?></td>
		  	<td><?=$row['author']?></td>
		  	<td><?=$row['date_added']?></td>
		  	<td><?=$row['date_published']?></td>
		  	<td><?=$row['volume']?></td>
		  	<td><?=$row['abstract']?></td>
		  	<td><?=$row['pages']?></td>
		 </tr>
  		 <?php } ?>
  		 </tbody>
  	</table>

  	<button id="modal-button" type="button" class="btn btn-info btn-lg">Add new</button>
    <br><br><br>
    <form id="test" class="form">
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" id="old_password" value="" name="pass_old" placeholder="current" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" id="password" value="" name="pass_new" placeholder="new" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" id="password_confirm" value="" name="password_confirm" data-rule-equalTo="#password" placeholder="confirm" class="form-control">
        </div>
        <button type="submit" class="btn btn-info">Change</button>
    </form>


  </body>

    <script src="js/jquery.validation/jquery.validate.js"></script>

      <script type="text/javascript">
        $('#folders').change( function (e) {
            e.preventDefault();
            var folder = $(this).val();
            window.location.href = "index.php?folder="+folder;
            
        });


        
      </script>
  <script type="text/javascript">
      

      //$('#test').validate();
      $("#test").validate({
          rules: {
            pass_old: { notEqual: $('#old_password').val() }
          }
        });




      $('#test').submit( function (e) {
        if($(this).valid()) {
            alert("success!");
            console.log("test");
            //perform request
        } else {
            alert("fail");
        }
    });
  </script>
  	
  </body>
</html>