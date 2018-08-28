<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{Request::is('admin/dashboard*')? 'active' : ''}}">
            <a class="nav-link" href="{{Route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/slider*')? 'active' : ''}}">
            <a class="nav-link" href="{{route('slider.index')}}">
              <i class="material-icons">slideshow</i>
              <p>Sliders</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/category*')? 'active' : ''}}">
            <a class="nav-link" href="{{route('category.index')}}">
              <i class="material-icons">category</i>
              <p>Categorias</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/item*')? 'active' : ''}}">
            <a class="nav-link" href="{{route('item.index')}}">
              <i class="material-icons">restaurant_menu</i>
              <p>Itens</p>
            </a>
          </li>
            <li class="nav-item {{Request::is('admin/reservation*')? 'active' : ''}}">
                <a class="nav-link" href="{{route('reservation.index')}}">
                    <i class="material-icons">date_range</i>
                    <p>Reservas</p>
                </a>
            </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>
