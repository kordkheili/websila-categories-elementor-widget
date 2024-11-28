<?php
class Elementor_Websila_Categories extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'websila-categories';
	}

	public function get_title()
	{
		return esc_html__('websila-categories', 'elementor-addon');
	}

	public function get_icon()
	{
		return 'eicon-code';
	}

	public function get_categories()
	{
		return ['basic'];
	}

	public function get_keywords()
	{
		return ['websila', 'categories'];
	}

	protected function render()
	{
		$post_title = get_the_title();
		$term_ids = get_field("related_categories", get_queried_object());
		if (count($term_ids) === 0 || !$term_ids) return;
		$terms = get_terms(array(
			'taxonomy' => 'product_cat', // Change this to the taxonomy you want to retrieve terms from
			'include' => $term_ids,
			'hide_empty' => false
		));
?>
		<style>
			.ws-category {
				display: block;
				border-radius: 16px;
				background: #ffffff;
				box-shadow: 6px 6px 18px #d9d9d9,
					-6px -6px 18px #ffffff !important;
				padding: 1rem;
				color: #222 !important;
				margin-bottom: 1rem;
				transition: all 0.5s;
			}

			.ws-category:hover {
				background: #e0e0e0;
				box-shadow: 6px 6px 18px #bebebe,
					-6px -6px 18px #ffffff !important;
			}

			.ws-category h3 {
				margin-bottom: 0;
				font-size: 1.1rem !important;
			}

			@media all and (max-width: 767px) {
				.ws-category h3 {
					font-size: 0.9rem !important;
				}
			}
		</style>
		<?php
		if ($terms) {
		?>
			<div class="row">
				<?php
				foreach ($terms as $term) {
				?>
					<div class="col-6 col-sm-6 col-md-4 col-lg-3">
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
