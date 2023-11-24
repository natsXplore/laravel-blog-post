<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPLE | BLOG POST</title>
  <link rel="shortcut icon" type="image/png" href="{{asset ('assets/images/logos/JA LOGO.png')}}" />
  <link rel="stylesheet" href="{{asset ('assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="{{ asset('assets/font/all.css') }}" />


  <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
</head>

       <body class="bg-light">
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <img src="{{asset('assets/images/logos/logo.png')}}" width="160" alt="logo" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar bg-light" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Main</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            @auth
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">EXTRA</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.blog') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">My Blog</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('profile.edit') }}" aria-expanded="false">
                <span>
                <i class="ti ti-user-circle"></i>
                </span>
                <span class="hide-menu">Profile</span>
              </a>
            </li>        
            @endauth 
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          @auth
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <div class="px-4">
                      @auth
                      <div class="d-flex align-items-center gap-2 dropdown-item font-medium text-sm text-gray-500"><i class="ti ti-user fs-6"></i>{{ Auth::user()->name}}</div>

                      <div class="d-flex align-items-center gap-2 dropdown-item font-medium text-sm text-gray-500"><i class="ti ti-mail fs-6"></i>{{ Auth::user()->email }}</div>

                      @endauth
                    </div>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-primary mx-3 mt-2 d-block">Profile</a>
                 <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a :href="route('logout')"
                       onclick="event.preventDefault();
                       this.closest('form').submit();" class="btn btn-sm btn-outline-primary mx-3 mt-2 d-block ">
                        {{ __('Log Out') }}</a>
                </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          @else
          <div class="ms-auto d-flex">
            <ul class="d-flex list-unstyled">
                <li class="nav-item">
                  <a href="{{ route('login') }}" class="btn btn-primary btn-sm mx-2 mt-2 d-block" style="width: 130px;background-color:rgb(59, 99, 209);font-weight:500;">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-2 d-block"style="width: 130px;background-color:rgb(90, 90, 90);font-weight:500;">Register</a>
                </li>
            </ul>
        </div>
        
          @endauth
        </nav>
      </header>
      <!--  Header End -->
