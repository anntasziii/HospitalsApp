<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{Request::is('admin/dashboard' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi menu-icon"></i>
          <span class="menu-title">
            <svg fill="#000000" style="width: 25px; height: 25px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M256,0L0,256l42.7,42.7l64-64V512h298.7V234.7l64,64L512,256L256,0z M234.7,448h-64v-64h64V448z M234.7,341.3h-64v-64h64 V341.3z M341.3,448h-64v-64h64V448z M341.3,341.3h-64v-64h64V341.3z M426.7,0h-64v42.7l64,64V0z"></path> </g></svg>
            Main Page Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-1" aria-expanded="false">
          <i class="mdi menu-icon"></i>
          <span class="menu-title">
            <svg viewBox="0 0 24 24" style="width: 25px; height: 25px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                <path d="M14 8.5V6.2C14 5.0799 14 4.51984 13.782 4.09202C13.5903 3.71569 13.2843 3.40973 12.908 3.21799C12.4802 3 11.9201 3 10.8 3H7.2C6.0799 3 5.51984 3 5.09202 3.21799C4.71569 3.40973 4.40973 3.71569 4.21799 4.09202C4 4.51984 4 5.0799 4 6.2V17.8C4 18.9201 4 19.4802 4.21799 19.908C4.40973 20.2843 4.71569 20.5903 5.09202 20.782C5.51984 21 6.0799 21 7.2 21H9.5M4 13H9M4 17H9M11 8.00001L7 8M9 6V10M18.2 13.5C18.2 14.3284 17.5284 15 16.7 15C15.8716 15 15.2 14.3284 15.2 13.5C15.2 12.6716 15.8716 12 16.7 12C17.5284 12 18.2 12.6716 18.2 13.5ZM20 21V20.5C20 19.1193 18.8807 18 17.5 18H16C14.6193 18 13.5 19.1193 13.5 20.5V21H20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </g></svg>
            Hospitals
        </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/hospital/create') }}">Add Hospital</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/hospital/')}}">View Hospital</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-2" aria-expanded="false">
          <i class="mdi menu-icon"></i>
            <span class="menu-title">
                <svg fill="#000000" style="width: 25px; height: 25px" viewBox="0 0 32 32" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                    <path d="M9.733,14.107c-1.387,0.252 -2.676,0.921 -3.687,1.932c-1.309,1.309 -2.044,3.084 -2.044,4.935l0,4.039c0,1.657 1.343,3 3,3c4.184,-0 13.816,-0 18,-0c1.657,-0 3,-1.343 3,-3l0,-4.039c0,-1.851 -0.735,-3.626 -2.044,-4.935c-1.011,-1.011 -2.3,-1.68 -3.687,-1.932c0.468,-0.939 0.731,-1.997 0.731,-3.117c0,-3.863 -3.137,-7 -7,-7c-3.863,0 -7,3.137 -7,7c0,1.12 0.263,2.178 0.731,3.117Zm12.263,1.984l-0,2.079c1.164,0.412 2,1.524 2,2.83c0,1.101 0.004,1.995 0.004,1.995c0.003,0.552 -0.443,1.002 -0.995,1.005c-0.552,0.002 -1.002,-0.444 -1.005,-0.995c0,-0 -0.004,-0.899 -0.004,-2.005c0,-0.552 -0.446,-1 -0.997,-1c-0.551,-0 -0.997,0.448 -0.997,1l-0.002,2.001c-0.001,0.552 -0.449,1 -1.001,0.999c-0.552,-0.001 -1,-0.449 -0.999,-1.001c-0,-0 0.002,-2 0.002,-1.999c0,-1.304 0.833,-2.414 1.994,-2.828l-0,-1.433c-1.133,0.789 -2.51,1.251 -3.994,1.251c-1.489,0 -2.871,-0.466 -4.006,-1.26l-0,1.441c1.165,0.412 2,1.524 2,2.829c0,1.656 -1.344,3 -3,3c-1.656,-0 -3,-1.344 -3,-3c-0,-1.305 0.835,-2.417 2,-2.829l-0,-2.078c-0.954,0.193 -1.837,0.662 -2.535,1.36c-0.934,0.934 -1.459,2.201 -1.459,3.521c0,0 0,4.039 0,4.039c0,0.552 0.448,1 1,1l18,-0c0.552,-0 1,-0.448 1,-1c0,-0 0,-4.039 0,-4.039c0,-1.32 -0.525,-2.587 -1.458,-3.521c-0.701,-0.701 -1.59,-1.171 -2.548,-1.362Zm-11,3.909c0.552,-0 1,0.448 1,1c0,0.552 -0.448,1 -1,1c-0.552,-0 -1,-0.448 -1,-1c-0,-0.552 0.448,-1 1,-1Zm5.006,-14.01c2.76,0 5,2.241 5,5c0,2.76 -2.24,5 -5,5c-2.76,0 -5,-2.24 -5,-5c0,-2.759 2.24,-5 5,-5Z">
                    </path></g></svg>
                Doctors
            </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/doctors/create') }}">Add Doctors</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/doctors') }}">View Doctors</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-3" aria-expanded="false">
          <i class="mdi menu-icon"></i>
            <span class="menu-title">
                <svg viewBox="0 0 32 32" style="width: 25px; height: 25px" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:#ffffff;}</style> </defs> <title></title> <g id="Injection"> <polygon class="cls-1" points="4 22 16 22 9 29 3 23 4 22"></polygon> <path d="M28.79,12.21l1.42-1.42-9-9L19.79,3.21,23.59,7,21.71,8.88,19.62,6.79H18.21L2.79,22.2v1.42L4.88,25.7,3.29,27.29V28.7H4.71L6.3,27.12l2.08,2.09H9.79L25.21,13.8V12.38l-2.09-2.09L25,8.41Zm-7.5,2.67-1.58-1.59-1.42,1.42,1.59,1.58-2.59,2.59-1.58-1.59-1.42,1.42,1.59,1.58-2.59,2.59-1.58-1.59-1.42,1.42,1.59,1.58-2.79,2.8L4.91,22.91l14-14,4.18,4.18Z"></path> </g> </g></svg>
                Analysis</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/analyses/create') }}">Add Analyses</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/analyses') }}">View Analyses</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{Request::is('admin/types' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/types')}}">
          <i class="mdi menu-icon"></i>
          <span class="menu-title">
            <svg viewBox="0 0 24 24" style="width: 25px; height: 25px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V3M14.4286 10L12.8153 8.26266C12.408 7.82396 12.2043 7.6046 11.9659 7.52324C11.7565 7.45174 11.5292 7.45174 11.3198 7.52324C11.0814 7.6046 10.8778 7.82396 10.4704 8.26266L7.42753 11.5396C7.26951 11.7098 7.1905 11.7948 7.13411 11.8925C7.0841 11.979 7.04735 12.0726 7.0251 12.1701C7 12.28 7 12.3961 7 12.6283V15.4C7 15.9601 7 16.2401 7.10899 16.454C7.20487 16.6422 7.35785 16.7951 7.54601 16.891C7.75992 17 8.03995 17 8.6 17H18.4C18.9601 17 19.2401 17 19.454 16.891C19.6422 16.7951 19.7951 16.6422 19.891 16.454C20 16.2401 20 15.9601 20 15.4V12.6283C20 12.3961 20 12.28 19.9749 12.1701C19.9526 12.0726 19.9159 11.979 19.8659 11.8925C19.8095 11.7948 19.7305 11.7098 19.5725 11.5396L18.1429 10C17.9623 9.80555 17.872 9.70833 17.7812 9.6458C17.4397 9.41088 16.9888 9.41088 16.6474 9.6458C16.5566 9.70833 16.4663 9.80555 16.2857 10C16.1052 10.1944 16.0149 10.2917 15.924 10.3542C15.5826 10.5891 15.1317 10.5891 14.7903 10.3542C14.6994 10.2917 14.6091 10.1944 14.4286 10Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            Types
          </span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/times' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/times')}}">
          <i class="mdi menu-icon"></i>
          <span class="menu-title">
            <svg viewBox="0 0 24 24" style="width: 25px; height: 25px"  fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z" fill="#000000"></path> <path d="M12 5C11.4477 5 11 5.44771 11 6V12.4667C11 12.4667 11 12.7274 11.1267 12.9235C11.2115 13.0898 11.3437 13.2343 11.5174 13.3346L16.1372 16.0019C16.6155 16.278 17.2271 16.1141 17.5032 15.6358C17.7793 15.1575 17.6155 14.5459 17.1372 14.2698L13 11.8812V6C13 5.44772 12.5523 5 12 5Z" fill="#000000"></path> </g></svg>
            Times</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/sliders' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/sliders')}}">
          <i class="mdi menu-icon"></i>
          <span class="menu-title">
            <svg viewBox="0 0 24 24" style="width: 25px; height: 25px"  fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 8C18 5.17157 18 3.75736 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6 3.75736 6 5.17157 6 8V16C6 18.8284 6 20.2426 6.87868 21.1213C7.75736 22 9.17157 22 12 22C14.8284 22 16.2426 22 17.1213 21.1213C18 20.2426 18 18.8284 18 16V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18 19.5C19.4001 19.5 20.1002 19.5 20.635 19.2275C21.1054 18.9878 21.4878 18.6054 21.7275 18.135C22 17.6002 22 16.9001 22 15.5V8.5C22 7.09987 22 6.3998 21.7275 5.86502C21.4878 5.39462 21.1054 5.01217 20.635 4.77248C20.1002 4.5 19.4001 4.5 18 4.5" stroke="#000000" stroke-width="1.5"></path> <path d="M6 19.5C4.59987 19.5 3.8998 19.5 3.36502 19.2275C2.89462 18.9878 2.51217 18.6054 2.27248 18.135C2 17.6002 2 16.9001 2 15.5V8.5C2 7.09987 2 6.3998 2.27248 5.86502C2.51217 5.39462 2.89462 5.01217 3.36502 4.77248C3.8998 4.5 4.59987 4.5 6 4.5" stroke="#000000" stroke-width="1.5"></path> </g></svg>
            Sliders</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/orders' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/orders')}}">
          <i class="mdi menu-icon"></i>
          <span class="menu-title">
            <svg fill="#000000" style="width: 25px; height: 25px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M78.8,62.1l-3.6-1.7c-0.5-0.3-1.2-0.3-1.7,0L52,70.6c-1.2,0.6-2.7,0.6-3.9,0L26.5,60.4 c-0.5-0.3-1.2-0.3-1.7,0l-3.6,1.7c-1.6,0.8-1.6,2.9,0,3.7L48,78.5c1.2,0.6,2.7,0.6,3.9,0l26.8-12.7C80.4,65,80.4,62.8,78.8,62.1z"></path> </g> <g> <path d="M78.8,48.1l-3.7-1.7c-0.5-0.3-1.2-0.3-1.7,0L52,56.6c-1.2,0.6-2.7,0.6-3.9,0L26.6,46.4 c-0.5-0.3-1.2-0.3-1.7,0l-3.7,1.7c-1.6,0.8-1.6,2.9,0,3.7L48,64.6c1.2,0.6,2.7,0.6,3.9,0l26.8-12.7C80.4,51.1,80.4,48.9,78.8,48.1 z"></path> </g> <g> <path d="M21.2,37.8l26.8,12.7c1.2,0.6,2.7,0.6,3.9,0l26.8-12.7c1.6-0.8,1.6-2.9,0-3.7L51.9,21.4 c-1.2-0.6-2.7-0.6-3.9,0L21.2,34.2C19.6,34.9,19.6,37.1,21.2,37.8z"></path> </g> </g> </g></svg>
            Orders</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/settings' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/settings')}}">
          <i class="mdi menu-icon"></i>
          <span class="menu-title">
            <svg viewBox="0 0 24 24" style="width: 25px; height: 25px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="3" stroke="#000000" stroke-width="1.5"></circle> <path d="M3.66122 10.6392C4.13377 10.9361 4.43782 11.4419 4.43782 11.9999C4.43781 12.558 4.13376 13.0638 3.66122 13.3607C3.33966 13.5627 3.13248 13.7242 2.98508 13.9163C2.66217 14.3372 2.51966 14.869 2.5889 15.3949C2.64082 15.7893 2.87379 16.1928 3.33973 16.9999C3.80568 17.8069 4.03865 18.2104 4.35426 18.4526C4.77508 18.7755 5.30694 18.918 5.83284 18.8488C6.07287 18.8172 6.31628 18.7185 6.65196 18.5411C7.14544 18.2803 7.73558 18.2699 8.21895 18.549C8.70227 18.8281 8.98827 19.3443 9.00912 19.902C9.02332 20.2815 9.05958 20.5417 9.15224 20.7654C9.35523 21.2554 9.74458 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8478 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.9021C15.0117 19.3443 15.2977 18.8281 15.7811 18.549C16.2644 18.27 16.8545 18.2804 17.3479 18.5412C17.6837 18.7186 17.9271 18.8173 18.1671 18.8489C18.693 18.9182 19.2249 18.7756 19.6457 18.4527C19.9613 18.2106 20.1943 17.807 20.6603 17C20.8677 16.6407 21.029 16.3614 21.1486 16.1272M20.3387 13.3608C19.8662 13.0639 19.5622 12.5581 19.5621 12.0001C19.5621 11.442 19.8662 10.9361 20.3387 10.6392C20.6603 10.4372 20.8674 10.2757 21.0148 10.0836C21.3377 9.66278 21.4802 9.13092 21.411 8.60502C21.3591 8.2106 21.1261 7.80708 20.6601 7.00005C20.1942 6.19301 19.9612 5.7895 19.6456 5.54732C19.2248 5.22441 18.6929 5.0819 18.167 5.15113C17.927 5.18274 17.6836 5.2814 17.3479 5.45883C16.8544 5.71964 16.2643 5.73004 15.781 5.45096C15.2977 5.1719 15.0117 4.6557 14.9909 4.09803C14.9767 3.71852 14.9404 3.45835 14.8478 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74458 2.35523 9.35523 2.74458 9.15224 3.23463C9.05958 3.45833 9.02332 3.71848 9.00912 4.09794C8.98826 4.65566 8.70225 5.17191 8.21891 5.45096C7.73557 5.73002 7.14548 5.71959 6.65205 5.4588C6.31633 5.28136 6.0729 5.18269 5.83285 5.15108C5.30695 5.08185 4.77509 5.22436 4.35427 5.54727C4.03866 5.78945 3.80569 6.19297 3.33974 7C3.13231 7.35929 2.97105 7.63859 2.85138 7.87273" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
            Site Settings</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/users' ? 'active':'')}}">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-4" aria-expanded="false">
          <i class="mdi menu-icon"></i>
          <span class="menu-title">
            <svg viewBox="0 0 24 24" style="width: 25px; height: 25px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 20V18C13 15.2386 10.7614 13 8 13C5.23858 13 3 15.2386 3 18V20H13ZM13 20H21V19C21 16.0545 18.7614 14 16 14C14.5867 14 13.3103 14.6255 12.4009 15.6311M11 7C11 8.65685 9.65685 10 8 10C6.34315 10 5 8.65685 5 7C5 5.34315 6.34315 4 8 4C9.65685 4 11 5.34315 11 7ZM18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-4">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users/create') }}">Add User</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}">View Users</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
