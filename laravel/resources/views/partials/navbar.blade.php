
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="#"><img src="/img/logo.jpg" width="40" class="rounded"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home<span class="sr-only">(current)</span></a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/posts">Blog</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Kategori Iklan</a>
                </li>
             
              </ul>
                

        <ul class="navbar-nav ml-auto">
              @auth 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                  Welcome Back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li>
										<a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a>
									</li>
                  <li>
										<hr class="dropdown-divider">
									</li>
									<li>
										<form action="/logout" method="post">
											@csrf
											<button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</a></button>
											</form>
									</li>
                </ul>
              </li>
                  @else
              <li class="nav-item">
                <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
              </li>
              @endauth
            </ul>  

      </div>
    </div>
</nav>
