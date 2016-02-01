<header class="banner">
  <div class="container">
    
    <nav class="nav-primary">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-primary" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      </div>
      <div class="menu-main-menu-container" id="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => null]);
      endif;
      ?>
      </div>
    </nav>
  </div>
</header>
