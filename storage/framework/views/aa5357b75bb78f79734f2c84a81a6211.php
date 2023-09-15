<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('/') ? 'active' : ''); ?>" aria-current="page" href="/">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('orders') ? 'active' : ''); ?>" href="/orders">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('products') ? 'active' : ''); ?>" href="/products">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
        </ul>
      </div>
    </nav><?php /**PATH /var/www/html/_online_test/mega-canal/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>