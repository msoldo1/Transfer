<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="/"><img src="images/logo1.png" height="50" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @guest
                    <li class="nav-item"><a href="/home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/about" class="nav-link">About us</a></li>
                    <li class="nav-item"><a href="{{   route('contact.create')   }}" class="nav-link">Contact us</a></li>
                @else
                    @if(Auth::user()->is_admin == true)
                        <li class="nav-item"><a href="{{   route('companies.index')   }}" class="nav-link">Companies</a></li>
                        <li class="nav-item"><a href="{{   route('customers.index')   }}" class="nav-link">Customers</a></li>
                    @else
                    <li class="nav-item"><a href="{{   route('offers.index')   }}" class="nav-link">Offers</a></li>
                    @if(Auth::user()->is_company == true)
                        <li class="nav-item"><a href="{{   route('drivers.index')   }}" class="nav-link">Drivers</a></li>
                        <li class="nav-item"><a href="{{   route('trucks.index')   }}" class="nav-link">Trucks</a></li>
                    @endif
                    <li class="nav-item"><a href="{{   route('orders.index')   }}" class="nav-link">Orders</a></li>
                    @endif
                @endguest
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                              @if(Auth::user()->is_admin != true)
                                <a class="dropdown-item" href="/inovices">
                                @if(Auth::user()->is_company == true)
                                Orders
                                @else
                                Offers
                                @endif
                                    <i class="far fa-bell"></i> {{ Auth::user()->unreadNotifications->count() }}
                                </a>
                              @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
