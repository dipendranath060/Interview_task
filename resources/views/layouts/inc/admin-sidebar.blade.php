    <!-- Sidebar -->
    <div class="sidebar px-2" id="sidebar" style="width: 140px">
        <div
          class="d-flex justify-content-center mb-3 py-2 align-items-center"
          id="menu-top"
        >
          <div class="logo d-none" id="logo">
            <a href="{{route('dashboard')}}">
            <img src="{{asset('assets/icons/logomain.png')}}" alt="logo" class="w-100" />
          </a>
          </div>
          <div id="menu" class="p-2">
            <i class="fa fa-bars fa-2x" style="color: #ffffff"></i>
          </div>
        </div>
  
        <!-- Menu -->
          <li class="menu-item mb-2 {{request()->is('admin/get-short-urls')|| request()->is('admin/add-shorter-url')|| request()->is('admin/edit-shorter-url*') ? 'active-page' : ''}}">
            <a href="{{route('get-short-urls')}}" class="text-decoration-none d-block">
              <img src="{{asset('assets/icons/team.svg')}}" alt="" class="mb-1" />
              <span class="menu-title d-block m-0">shorter-url</span>
            </a>
          </li>
          
        </ul>
      </div>