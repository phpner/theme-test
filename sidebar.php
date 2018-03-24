<aside>

	<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
	<ul id="sidebar">
		<?php dynamic_sidebar('left-sidebar'); ?>
	</ul>
<?php endif; ?>

<?php dynamic_sidebar('right-sidebar'); ?>
</aside>

<aside>
	<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
	<ul id="sidebar">
		<?php dynamic_sidebar('right-sidebar'); ?>
	</ul>
<?php endif; ?>
</aside>