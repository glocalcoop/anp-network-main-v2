<?php
/**
 * BuddyPress - Groups Cover Image Header.
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of a group's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_group_header' ); ?>

<header class="group-header">

	<div id="cover-image-container">

		<a id="header-cover-image" href="<?php bp_group_permalink(); ?>" role="banner">
		</a>

		<?php if ( ! bp_disable_group_avatar_uploads() ) : ?>

			<div id="item-header-avatar">
				<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">

					<?php bp_group_avatar(); ?>

				</a>
			</div><!-- #item-header-avatar -->

		<?php endif; ?>

	</div><!-- #cover-image-container -->

	<div id="item-buttons" role="navigation"><?php

		/**
		 * Fires in the group header actions section.
		 *
		 * @since 1.2.6
		 */
		do_action( 'bp_group_header_actions' ); ?>
	</div><!-- #item-buttons -->

	<h2 class="entry-title"><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a></h2>

	<div id="item-header-content">

		<?php

		/**
		 * Fires before the display of the group's header meta.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_before_group_header_meta' ); ?>

		<div id="item-meta">

			<?php

			/**
			 * Fires after the group header actions section.
			 *
			 * @since 1.2.0
			 */
			do_action( 'bp_group_header_meta' ); ?>

			<?php $group_class = str_replace( ' ', '-', strtolower( bp_get_group_type() ) ); ?>

			<span class="highlight <?php echo $group_class; ?>"><?php bp_group_type(); ?></span>
			<span class="activity"><?php printf( __( 'active %s', 'anp-network-main' ), bp_get_group_last_active() ); ?></span>

			<?php bp_group_description(); ?>

		</div><!-- #item-meta -->

	</div><!-- #item-header-content -->

	<div id="item-actions">

		<?php if ( bp_group_is_visible() ) : ?>

			<div class="group-members">

				<h3><?php _e( 'Administrators', 'anp-network-main' ); ?></h3>

				<?php bp_group_list_admins(); ?>

			</div>
			
			<?php
			/**
			 * Fires after the display of the group's administrators.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_after_group_menu_admins' );

			if ( bp_group_has_moderators() ) :

				/**
				 * Fires before the display of the group's moderators, if there are any.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_before_group_menu_mods' ); ?>

				<div class="group-members">

					<h3><?php _e( 'Moderators' , 'anp-network-main' ); ?></h3>

					<?php bp_group_list_mods(); ?>

				</div>

				<?php
				/**
				 * Fires after the display of the group's moderators, if there are any.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_after_group_menu_mods' );

			endif;

		endif; ?>

	</div><!-- #item-actions -->
	
</header><!-- .group-header -->

<?php

/**
 * Fires after the display of a group's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_group_header' );

/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
do_action( 'template_notices' ); ?>
