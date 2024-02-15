<?php
if ( ! class_exists( 'Ascendoor_News_Categories_Widget' ) ) {
	/**
	 * Adds Ascendoor_News_Categories_Widget Widget.
	 */
	class Ascendoor_News_Categories_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$ascendoor_news_category_widget_ops = array(
				'classname'   => 'ascendoor-widget magazine-category-section',
				'description' => __( 'Retrive Categories Widgets', 'ascendoor-news' ),
			);
			parent::__construct(
				'ascendoor_news_magazine_category_widget',
				__( 'Ascendoor Categories Widget', 'ascendoor-news' ),
				$ascendoor_news_category_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$category_title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$category_title = apply_filters( 'widget_title', $category_title, $instance, $this->id_base );
			$category_count = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;

			echo $args['before_widget'];

			if ( ! empty( $category_title ) ) {
				?>
				<div class="section-header">
					<?php echo $args['before_title'] . esc_html( $category_title ) . $args['after_title']; ?>
				</div>
			<?php } ?>
			<div class="magazine-category-wrapper">
				<?php
				for ( $i = 1; $i <= $category_count; $i++ ) {
					$category_id    = isset( $instance[ 'category_' . $i ] ) ? absint( $instance[ 'category_' . $i ] ) : '';
					$categories     = get_category( $category_id );
					$category_image = ! empty( $instance[ 'category_image_' . $i ] ) ? $instance[ 'category_image_' . $i ] : '';
					if ( ! empty( $categories->name ) ) {
						?>
						<div class="category-single">
							<?php if ( ! empty( $category_image ) ) { ?>
								<img src="<?php echo esc_url( $category_image ); ?>">
							<?php } ?>
							<a href="<?php echo esc_url( get_term_link( $categories->term_id ) ); ?>">
								<?php echo esc_html( $categories->name ); ?>
								<span class="category-dots"></span>
								<span class="category-no">
									<?php echo esc_html( $categories->count ); ?>
									<span class="posts"><?php esc_html_e( 'Posts', 'ascendoor-news' ); ?></span>
								</span>
							</a>
						</div>
						<?php
					}
				}
				?>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$category_title = isset( $instance['title'] ) ? $instance['title'] : '';
			$category_count = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'ascendoor-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $category_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of category to show(Min:1 | Max:4):', 'ascendoor-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="4" value="<?php echo absint( $category_count ); ?>" size="3" />
			</p>
			<?php
			for ( $i = 1; $i <= $category_count; $i++ ) {
				$category_id    = isset( $instance[ 'category_' . $i ] ) ? absint( $instance[ 'category_' . $i ] ) : '';
				$category_image = isset( $instance[ 'category_image_' . $i ] ) ? $instance[ 'category_image_' . $i ] : '';
				?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'category_' . $i ) ); ?>"><?php echo sprintf( esc_html__( 'Select category %d:', 'ascendoor-news' ), $i ); ?></label>
					<select id="<?php echo esc_attr( $this->get_field_id( 'category_' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category_' . $i ) ); ?>" class="widefat" style="width:100%;">
						<?php
						$categories = ascendoor_news_get_post_cat_choices();
						foreach ( $categories as $category => $value ) {
							?>
							<option value="<?php echo absint( $category ); ?>" <?php selected( $category_id, $category ); ?>><?php echo esc_html( $value ); ?></option>
							<?php
						}
						?>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'category_image_' . $i ) ); ?>"><?php echo sprintf( esc_html__( 'Category Image %s :', 'ascendoor-news' ), $i ); ?></label><br/>
					<input type="url" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'category_image_' . $i ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'category_image_' . $i ) ); ?>" value="<?php echo esc_url( $category_image ); ?>" /><br/>
					<input type="button" class="select-img button" value="<?php esc_attr_e( 'Upload', 'ascendoor-news' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'ascendoor-news' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'ascendoor-news' ); ?>" style="margin-top:5px;" /><br/>
				</p>
				<hr style="border: 1px dotted; #757575;" />
				<?php
			}
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance           = $old_instance;
			$instance['title']  = sanitize_text_field( $new_instance['title'] );
			$instance['number'] = (int) $new_instance['number'];
			for ( $i = 1; $i <= $instance['number']; $i++ ) {
				$instance[ 'category_' . $i ]       = (int) $new_instance[ 'category_' . $i ];
				$instance[ 'category_image_' . $i ] = esc_url_raw( $new_instance[ 'category_image_' . $i ] );
			}
			return $instance;
		}

	}
}

/**
 * Enqueue admin scripts for Image Widget
 *
 * @since Ascendoor News 1.0
 **/
function ascendoor_news_author_info_widget_image_upload_enqueue( $hook ) {

	if ( 'widgets.php' !== $hook ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script( 'widget-image-upload-script', get_template_directory_uri() . '/assets/js/upload.js', array( 'jquery' ), ASCENDOOR_NEWS_VERSION, true );
}

add_action( 'admin_enqueue_scripts', 'ascendoor_news_author_info_widget_image_upload_enqueue' );
