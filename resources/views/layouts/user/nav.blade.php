<!-- <div class="mx-auto py-5 px-8">
    <nav class="flex justify-between">
        <div class="flex">
           <a href="#">Logo</a>

        </div>
       <div>
           <p id="hamburgerbtn" class="md:hidden bg-purple-800">
             menu
           </p>
        <ul class="hidden md:flex md:flex-row" id="mobileMenu">
            <li class="pr-5"><a> Services </a></li>
            <li class="pr-5"><a>Porfolio</a></li>
            <li class="pr-5"><a>About</a></li>
            <li><a>Contact</a></li>
        </ul>
        </div>
    </nav>
</div> -->


<header class=" md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4">
  
  <!-- Logo text or image -->
  <div class="flex items-center flex-row mb-4 md:mb-0">
    <h1 class="leading-none text-2xl text-grey-darkest">
      <a class="no-underline text-grey-darkest hover:text-black" href="#">
        <!-- Site Title -->
      </a>
    </h1>

    @if (Route::has('login'))
      <div class="p-5">
          @auth
              <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
          @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
              @endif
          @endif
      </div>
  @endif

    <a class="text-black hover:text-orange md:hidden" href="#">
      <i class="fa fa-2x fa-bars"></i>
    </a>
  </div>
  <!-- END Logo text or image -->
  
  <!-- Search field -->
  <form class="mb-4 w-full md:mb-0 md:w-1/4">
    <label class="hidden s-f" for="search-form">Search</label>
    <input class="bg-grey-lightest border-2 focus:border-orange p-2 rounded-lg shadow-inner w-full" placeholder="Search" type="text">
    <button class="hidden">Submit</button>
  </form>
  <!-- END Search field -->
  
  <!-- Global navigation -->
  <nav>
    <ul class="list-reset md:flex md:items-center">
      <li class="md:ml-4">
        <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="#">
          Products
        </a>
      </li>
      <li class="md:ml-4">
        <a class="border-t block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="#">
          About
        </a>
      </li>
      <li class="md:ml-4">
        <a class="border-t block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="#">
          Contact
        </a>
      </li>
    </ul>
  </nav>
  <!-- END Global navigation -->

</header>