<?php
include("inc/header.php");
?>  
  <body>
<<<<<<< HEAD
  	<table class="table table-striped table-hover">
  	<thead>
	  	<tr>
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


  		$q = $db -> prepare("SELECT r.* FROM refs r WHERE r.user_id = ?");
  		$q -> bindParam(1, $_SESSION['user_id']);
  		$q -> execute();
  		$results = $q -> fetchAll(PDO::FETCH_ASSOC);

  		foreach($results as $row) { ?>
  		<tr>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  </body>
  <script type="text/javascript">
  	$('#modal-button').click( function (e) {
  		e.preventDefault();
  		//console.info("test");
  		($'#myModal').modal('show');
  	});
  </script>
=======
  	
  </body>
>>>>>>> 08220a69efcac89aef31eacc9172407cabe29c1c
</html>