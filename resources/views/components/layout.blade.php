<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodHUB</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
  <header class="bg-white shadow p-4 flex justify-between items-center">
    <h2 class="font-bold text-xl mr-auto">FoodHUB</h2>
      <div class="flex items-center gap-2">
        @auth
        <div class="flex items-center gap-2">
        <p>Hi there, {{ auth()->user()->name }}</p>
        <i class="fa-solid fa-cart-shopping text-slate-500"></i>
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

  <main class="full p-5 rounded shadow-sm">
    
    {{ $slot }}
  </main>
  
  @stack('scripts')
</body>
</html>