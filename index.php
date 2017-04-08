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


  </body>

  <script type="text/javascript">
    $('#folders').change( function (e) {
        e.preventDefault();
        var folder = $(this).val();
        window.location.href = "index.php?folder="+folder;
        
    });
  </script>
  	
  </body>
</html>