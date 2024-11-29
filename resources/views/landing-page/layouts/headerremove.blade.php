<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    @yield('before_head')
    @include('landing-page.partials._head') 
      @include('landing-page.partials._currencyscripts') 

    @yield('after_head')
</head>
<body class="body-bg">


    <span class="screen-darken"></span>

    <div id="loading">
        @include('landing-page.partials.loading')
    </div>


    <main class="main-content" id="landing-app">
       
        @yield('content')
    </main>

  

  @yield('before_script')
    @include('landing-page.partials._scripts')
    @yield('after_script')

   
</body>
</html>
