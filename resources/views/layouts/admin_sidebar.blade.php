<li class="nav-item menu-open">
    <a href="#" class="nav-link active rounded" style="background: #106eea">
      <i class="nav-icon la la-plus"></i>
      <p>
        Add / Remove
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">

      <li class="nav-item @if (Request::segment(1) == 'registered_users') custo @endif ">
        <a href="registered_users" class="nav-link">
          <i class="la la-users nav-icon"></i>
          <p>Registered Users</p>
        </a>
      </li>

      <li class="nav-item @if (Request::segment(1) == 'startups') custo @endif ">
        <a href="startups" class="nav-link">
          <i class="la la-cogs nav-icon"></i>
          <p>Startups</p>
        </a>
      </li>

      <li class="nav-item @if (Request::segment(1) == 'developers') custo @endif ">
        <a href="developers" class="nav-link">
          <i class="la la-laptop-code nav-icon"></i>
          <p>Developers</p>
        </a>
      </li>

      <li class="nav-item @if (Request::segment(1) == 'incubators') custo @endif ">
        <a href="incubators" class="nav-link">
          <i class="la la-project-diagram nav-icon"></i>
          <p>Incubators</p>
        </a>
      </li>
      <li class="nav-item @if (Request::segment(1) == 'accelerators') custo @endif ">
        <a href="accelerators" class="nav-link">
          <i class="la la-chart-bar nav-icon"></i>
          <p>Accelerators</p>
        </a>
      </li>
    </ul>
  </li>

  <div><hr></div>

  <li class="nav-item @if (Request::segment(1) == 'announcements') custo @endif">
    <a href="announcements" class="nav-link">
      <i class="la la-volume-up nav-icon"></i>
      <p>Announcements</p>
    </a>
  </li>

  {{-- <li class="nav-item @if (Request::segment(1) == 'approvals') custo @endif">
    <a href="/approvals" class="nav-link">
      <i class="far fa-check-circle nav-icon"></i>
      <p>Registration Approvals</p>
    </a>
  </li> --}}

  <div><hr></div>


  <li class="nav-item menu-open">
    <a href="#" class="nav-link border border-dark rounded">
      <i class="nav-icon la la-adjust text-lg"></i>
      <p>
        System Management
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      {{-- <li class="nav-item @if (Request::segment(1) == 'roles') custo @endif">
        <a href="/roles" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>User roles</p>
        </a>
      </li> --}}
      <li class="nav-item @if (Request::segment(1) == 'users') custo @endif">
        <a href="users" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>System users</p>
        </a>
      </li>
    </ul>
  </li>
