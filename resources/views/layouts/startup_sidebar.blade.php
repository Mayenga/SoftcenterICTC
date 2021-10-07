

  <li class="nav-item @if (Request::segment(1) == 'startup-information') custo @endif">
    <a href="startup-products" class="nav-link">
      <i class="la la-file-text nav-icon"></i>
      <p>My Products</p>
    </a>
  </li>

  <li class="nav-item @if (Request::segment(1) == 'available-accelerator') custo @endif">
    <a href="available-accelerator" class="nav-link">
      <i class="far fa-check-circle nav-icon"></i>
      <p>Available Accelerators</p>
    </a>
  </li>
  <li class="nav-item @if (Request::segment(1) == 'available-incubators') custo @endif">
    <a href="available-incubators" class="nav-link">
      <i class="far fa-check-circle nav-icon"></i>
      <p>Available Incubators</p>
    </a>
  </li>

  <div><hr></div>

