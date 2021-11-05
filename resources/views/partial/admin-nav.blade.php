<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="/home" class="nav-link">
          <i class="nav-icon fas fa-th purple"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      @can('user-management')
      <li class="nav-item has-treeview {{ request()->is('user/users')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            User Management
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ url('user/users') }}" class="nav-link {{ request()->is('user/users')?'active':''}}">
              <i class="fas fa-arrow-circle-right nav-icon"></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item ">
        <a href="/hexagram" class="nav-link {{ request()->is('hexagram','hexagram/*')?'active':''}}">
          <i class="nav-icon fas fa-asterisk orange"></i>
          <p>
            Hexagram Management
          </p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="/trigram" class="nav-link {{ request()->is('trigram')?'active':''}}">
          <i class="nav-icon fas fa-arrows-alt cyan"></i>
          <p>
            Trigram Management
          </p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="/announcement" class="nav-link {{ request()->is('announcement')?'active':''}}">
          <i class="nav-icon fas fa-arrows-alt cyan"></i>
          <p>
            Announcement
          </p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="/dailyHex" class="nav-link {{ request()->is('dailyHex')?'active':''}}">
          <i class="nav-icon fas fa-arrows-alt cyan"></i>
          <p>
            Daily Hexagram
          </p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="/aboutUs" class="nav-link {{ request()->is('aboutUs')?'active':''}}">
          <i class="nav-icon fas fa-cog cyan"></i>
          <p>
            System Settings
          </p>
        </a>
      </li>
      @endcan
      <li class="nav-item ">
        <a href="/hex" class="nav-link {{ request()->is('hex')?'active':''}}">
          <i class="nav-icon fas fa-th purple"></i>
          <p>
            Hexagram
          </p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="/tri" class="nav-link {{ request()->is('tri')?'active':''}}">
          <i class="nav-icon fas fa-th purple"></i>
          <p>
            Trigram
          </p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="/scheduleConsultant" class="nav-link {{ request()->is('scheduleConsultant')?'active':''}}">
          <i class="nav-icon fas fa-th purple"></i>
          <p>
            Schedule
          </p>
        </a>
      </li>
    </ul>
  </nav>