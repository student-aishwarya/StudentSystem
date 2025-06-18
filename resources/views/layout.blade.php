<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Keep Notes</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            keepYellow: '#fbbc04'
          }
        }
      }
    };
  </script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white font-sans">

  <!-- Navbar -->
  <nav class="flex items-center justify-between px-4 py-2 bg-white border-b shadow-sm">
    <div class="flex items-center space-x-3">
      <img src="https://www.gstatic.com/images/branding/product/1x/keep_2020q4_48dp.png" class="w-8 h-8" />
      <span class="text-xl font-semibold text-gray-800">Keep</span>
    </div>


    <form action="{{ url('/notes') }}" method="GET" class="flex items-center w-1/2 relative">
      <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
        <i class="fas fa-search"></i>
      </button>
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
        class="w-full pl-10 pr-4 py-2 bg-gray-100 rounded-full border border-gray-300 focus:outline-none" />
    </form>


    <div class="flex space-x-4 items-center">
      <div class="w-8 h-8 bg-teal-600 text-white font-bold flex items-center justify-center rounded-full">A</div>
    </div>
  </nav>

  <div class="flex">

    <!-- Sidebar -->
    <aside class="w-60 bg-white border-r min-h-screen pt-6 px-4">
      <nav class="space-y-1 text-sm">

        <!-- Notes -->
        <a href="/notes"
          class="flex items-center px-4 py-2 font-semibold text-base rounded-lg 
                {{ request()->is('notes') ? 'bg-yellow-100 text-yellow-700 font-medium' : 'text-gray-700 hover:bg-gray-200' }}">
          <i class="fa-solid fa-note-sticky mr-10"></i>
          Notes
        </a>

        <!-- Reminders -->
        <a href="/reminders"
          class="flex items-center px-4 py-2 rounded-lg font-semibold text-base 
                {{ request()->is('reminders') ? 'bg-yellow-100 text-yellow-700 font-medium' : 'text-gray-700 hover:bg-gray-200' }}">
          <i class="fa-regular fa-bell mr-10"></i>
          Reminders
        </a>

        <!-- Archives -->
        <a href="/archives"
          class="flex items-center px-4 py-2 rounded-lg font-semibold text-base 
                {{ request()->is('archives') ? 'bg-yellow-100 text-yellow-700 font-medium' : 'text-gray-700 hover:bg-gray-200' }}">
          <i class="fa-solid fa-file-arrow-down mr-10"></i>
          Archive
        </a>

        <!-- Bin -->
        <a href="/trashes"
          class="flex items-center px-4 py-2 rounded-lg font-semibold text-base 
                {{ request()->is('trashes') ? 'bg-yellow-100 text-yellow-700 font-medium' : 'text-gray-700 hover:bg-gray-200' }}">
          <i class="fa-regular fa-trash-can mr-10"></i>
          Bin
        </a>

      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white">
      @yield('content')
    </main>
  </div>

</body>

</html>