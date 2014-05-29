<?php
/*
Template Name: Points
*/
get_header();
?>
<script>
var titles = [];
var lats = [];
var lons = [];
var ids = [];
</script>

<?php
$args = array( 
	'post_type'			=> 'point',
	'posts_per_page'	=> -1
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) : $query->the_post();
		$title = the_title('', '', false);
		$lat = get_post_meta($post->ID, "coordinates_lat", true );
		$lon = get_post_meta($post->ID, "coordinates_lon", true );
		?>
		<script>
			var title = <?php echo json_encode($title); ?>;
			var lat = <?php echo json_encode($lat); ?>;
			var lon = <?php echo json_encode($lon); ?>;
			var id = <?php json_encode(the_ID()) ?>;
			titles.push(title);
			lats.push(parseFloat(lat));
			lons.push(parseFloat(lon));
			ids.push(parseInt(id));
		</script>
	<?php endwhile;
	wp_reset_postdata(); ?>
<?php endif; ?>

<!-- this is the element where your map and points will show up -->
<div id="map"></div>

<!-- 
this is a wordpress loop that shows the most recent points
if you click on one of the points, the map will center to that point
-->
<div id="recent">
		<h4>Recent Points</h4>
		<ul id="points">
			<?php
		$args = array( 
			'post_type'			=> 'point',
			'order'			=> 'DESC',
			'posts_per_page'	=> 6
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$lat = get_post_meta($post->ID, "coordinates_lat", true );
				$lon = get_post_meta($post->ID, "coordinates_lon", true ); ?>
				<li class="point" id="<?php the_ID(); ?>">				
					<p><?php the_title(); ?></p>
					<p class="coordinates">Lat: <?php echo $lat; ?>, Lng: <?php echo $lon; ?></p>
				</li>
			<?php endwhile;
			wp_reset_postdata(); ?>
		<?php endif; ?>
	</ul>
</div>
		
<?php get_footer(); ?>