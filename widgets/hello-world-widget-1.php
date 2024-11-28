<?php
class Elementor_Hello_World_Widget_1 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hello_world_widget_1';
	}

	public function get_title() {
		return esc_html__( 'Hello World 1', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	protected function render() {
        $post_title = get_the_title();
		$term_ids = get_field( "related_categories" ,get_queried_object() );
		$terms = get_terms(array(
		'taxonomy' => 'product_cat', // Change this to the taxonomy you want to retrieve terms from
		'include' => $term_ids,
		'hide_empty' => false
		));
			?>
		<style>
			.ws-category{
				display:block;
				border-radius: 16px;
				background: #ffffff;
				box-shadow:  20px 20px 60px #d9d9d9,
							-20px -20px 60px #ffffff !important;
				padding:1rem;
				color:#222 !important;
			}
		</style>	
		<?php
			if ( $terms ) {
				?>
				<div class="row">	
					<?php
					foreach ( $terms as $term ) {	
						?>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3">
								<a class="ws-category shadow p-4 text-center" href="<?php echo get_term_link($term); ?>">
									<h3>
										<?php echo $term->name; ?>	
									</h3>
								</a>
							</div>
						<?php
					}
					?>
				</div>
				<?php
			}
		?>
		<?php
	}
}