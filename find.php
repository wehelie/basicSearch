<?php 
require_once 'db/connect.php'; 

if(isset($_GET['query'])) {
	$query = $db->escape_string($_GET['query']);
	$find = $db->query("
		SELECT title, published
		FROM articles
		WHERE body LIKE '%{$query}%'
		OR title LIKE '%{$query}%'
	");

?>

 <div class="result">
 	Found <?php echo $find->num_rows; ?> results. 
 </div>
 <?php
 if ($find->num_rows) {
 	while( $r = $find -> fetch_object()){
 	?>
 		<div class="results">
			<a href="#"><?php echo $r->title; ?></a>
 		</div>
 		<?php
 	}
 }
}

