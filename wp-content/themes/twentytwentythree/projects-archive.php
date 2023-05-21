<?php
/* Template Name: Projects Archive */
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                	<h1>Projects</h1>
                </div>

				<?php
				$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if($conn->connect_error)
				{
				  	die("Connection failed: " . $conn->connect_error);
				}
				else
				{
					$sql = "SELECT ID, post_title,guid FROM `wp_posts` WHERE post_type='projects' AND post_status='publish' ORDER BY ID ASC LIMIT 6";
					//echo $sql;
					$result = $conn -> query($sql);
				    if($result)
				    {
				        while($data=mysqli_fetch_assoc($result))
				        {
				        	?>
				        	<div class="col-12 bg-dark p-5">
				        		<a style="color:#fff;font-size: 20px;" href="<?= $data['guid'] ?>">
				        			<?= $data['post_title'] ?>
				        		</a>
				        	</div>
				        	<div class="col-12 bg-light">
				        		&nbsp;
				        	</div>
				        	<?php
						}
					}
				}
				?>
			</div>
			<div class="col-12 text-end p-5">
				<button class="btn btn-secondary">Previous</button>
				<button class="btn btn-primary">Next</button>
			</div>
		</div>
	</section>