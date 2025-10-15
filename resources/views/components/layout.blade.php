<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>FoodHUB</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @vite(['resources/css/app.css', 'resources/js/index.js'])
</head>
<body class="bg-gray-100">
  <header class="bg-white shadow p-4 flex justify-between items-center">
  <div class="bg-slate-200 p-2">
    <h2 class="font-bold text-xl mr-auto">Food<span class="text-amber-500">HUB</span></h2>
  </div>
    
      <div class="flex items-center gap-2">
        @auth
        <div class="flex items-center gap-2">
        <p>Hi there, {{ auth()->user()->name }}</p>
        <div class="cart relative cursor-pointer hover:scale-105">
        <i class="fa-solid fa-cart-shopping text-slate-500 text-2xl"></i>
        <div class="absolute -top-3 -right-2 bg-amber-500 rounded-full flex justify-center p-3 items-center h-5 w-5">
         <span class="item-count text-white font-bold">0</span>
        </div>
       
        </div>
        
        </div>
        <div class="divider w-[2px] h-6 bg-gray-300 mx-2">
        </div>
        <form action="{{ route('logout') }}" method="POST">
        @csrf
          <button class="bg-red-200 px-2 py-1 rounded font-semibold">Logout</button>
        </form>
        @endauth
          <div class="flex items-center gap-4">
        @guest
          <a href="{{ route('login') }}">Sign In</a>
        @endguest

        </div>
      </div>
     
  
    </nav>
  </header>

  <main class="h-full p-5 rounded shadow-sm">
    
    {{ $slot }}
    
  </main>
<div id="cart-popup" class="hidden fixed top-0 left-0 h-full w-full flex justify-center items-center z-50">
    <!-- Overlay -->
    <div class="overlay absolute top-0 left-0 h-full w-full bg-black/50 backdrop-blur-sm"></div>
    
    <!-- Cart Box -->
    <div class="pop-up-cart container relative bg-white p-5 rounded-lg shadow-lg min-w-sm  z-10 w-96">
        <h2 class="text-lg font-bold mb-4">Your Cart</h2>
        <div class="item-container mb-5"> 

        </div>
        <button id="checkout-btn" class="bg-amber-500 text-white px-4 py-2 rounded">Proceed to checkout</button>
        <button id="close-cart" class="absolute top-2 right-2 text-gray-600">✖</button>
    </div>
</div>

<footer class="bg-amber-400 py-10">
  <div class="max-w-6xl mx-auto grid md:grid-cols-3 mb-2 gap-6">

    <div>
      <h2 class="font-bold text-xl mr-auto">FoodHUB</h2>
      <p class="text-sm">Freshly cooked meals with love</p>
    </div>

    <div>
      <h3 class="font-semibold mb-2">Visit Us</h3>
      <p class="text-sm">123 Jan Xa Tabby, Taguig City</p>
      <p class="text-sm">Open Daily: 8 AM - 8 PM</p>
    </div>

    <div>
      <h3 class="font-semibold mb-2">Get in Touch</h3>
      <p class="text-sm"><i class="fa-solid fa-phone"></i> 09123 456 7890</p>
      <p class="text-sm"><i class="fa-solid fa-envelope"></i> hello@foodhub.com</p>
    </div>

  </div>
  <div class="text-center text-sm border-t border-[#3e2a1c] pt-4">
   © 2025 FoodHUB Made with ❤️ in the Philippines.
  </div>
</footer>
  @stack('scripts')
</body>
</html>