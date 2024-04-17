<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <head> --}}
{{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
<!-- Fonts -->
{{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
{{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
<!-- Styles -->
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
{{-- </head> --}}
<x-head title="E-Library" />

<body>
  <div id="app">
			<x-nav />
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container border-red-500 border w-full h-[80px]">
                
            </div>
        </nav> --}}

    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>

</html>
