

  <li class="nav-item @if (Request::segment(1) == 'incubator-information') custo @endif">
    <a href="stakeholder-information" class="nav-link">
      <i class="la la-info nav-icon"></i>
      <p>My Information</p>
    </a>
  </li>

  <div><hr></div>

  <li class="nav-item @if (Request::segment(1) == 'request-startup' || Request::segment(1) == 'accepted-startup')  menu-open @endif">
    <a href="#" class="nav-link border border-dark rounded">
        <i class="nav-icon la la-users text-lg"></i>
        <p>
            Startup
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item @if (Request::segment(1) == 'request-startup') custo @endif">
          <a href="request-startup" class="nav-link">
            <i class="fas fa-receipt nav-icon"></i>
            <p>Startup Request</p>
          </a>
        </li>
        <li class="nav-item @if (Request::segment(1) == 'accepted-startup') custo @endif">
          <a href="accepted-startup" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Accepted Request</p>
          </a>
        </li>
    </ul>
</li>

<div><hr></div>
