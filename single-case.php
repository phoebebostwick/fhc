<?php 
/*
Template Name: Case
*/
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$case = get_fields();
$categories = get_the_terms(get_the_ID(), 'Case Categories');

get_header(); ?>

<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post();

		echo '<h1>'.the_title().'</h1>';
		echo '<h2>#'.$event['case_number'].'</h2>';

		if(!empty(get_field('case_number'))){?>
			<table class="table">
				<thead>
					<tr>
						<th>Court Level</th>
						<th>Location</th>
						<th>Settlement</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $event['court_level']; ?></td>
						<td><?php echo $event['location']; ?></td>
						<td>$<?php 
							echo $event['settlement_amount'];
							if(!empty(get_field('other_settlement'))){
								echo ' and '.$event['other_settlement'];
							} 
						?></td>
					</tr>
				</tbody>
			</table>
        <?php }

		if (function_exists('has_post_thumbnail') && has_post_thumbnail()) { 
			the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-fluid"));
		}

		echo $event['description'];

		

	
        
    endwhile; endif; ?>
</div>

<?php get_footer(); ?>