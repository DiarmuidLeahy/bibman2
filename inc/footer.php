



      <script type="text/javascript">
        $('#folders').change( function (e) {
            e.preventDefault();
            var folder = $(this).val();
            window.location.href = "index.php?folder="+folder;
            
        });


        
      </script>

  	
  </body>
</html>