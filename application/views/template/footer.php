		</div>
	</section>
	<footer>
		<small>Hak Cipta &copy; 2017 E-Journal System <a href="">IT Divisi STIE Pertiba</a> .</small>
	</footer>
    <script>
        CKEDITOR.replace( 'description');

		function delete_journal(param) 
		{
		    var txt;
		    var r = confirm("Press a button!");
		    if (r == true) {
		        window.location = '<?php echo site_url('journal/delete/') ?>/' + param;
		    } else {
		        txt = "Delete Cancel!";
		    }
		}
    </script>	
</body>
</html>