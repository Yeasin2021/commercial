<!DOCTYPE html>
<html lang="en">
  <head>
    <meta
      name="description"
      content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular."
    />
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="@pratikborsadiya" />
    <meta property="twitter:creator" content="@pratikborsadiya" />
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Vali Admin" />
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme" />
    <meta
      property="og:url"
      content="http://pratikborsadiya.in/blog/vali-admin"
    />
    <meta property="og:image" content="../blog/vali-admin/hero-social.png" />
    <meta
      property="og:description"
      content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular."
    />
    <title>Avi Project</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/main.css" />
    <!-- Font-icon css-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('admin') }}/css/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    @toastr_css
    @stack('style')
  </head>

  <body class="app sidebar-mini rtl">
   {{-- header part  --}}
   @include('admin.partial.header')
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    {{-- sidebar --}}
    @include('admin.partial.sidebar')
    <main class="app-content">
      {{-- breadcum --}}
      @include('admin.partial.breadcum')
      {{-- content --}}
      
      <div class="row">
        <div class="col-12">
        @yield('content')
        </div>
    </div>
     
     
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('admin') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('admin') }}/js/popper.min.js"></script>
    <script src="{{ asset('admin') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin') }}/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('admin') }}js/plugins/pace.min.js"></script>
  </body>
  @jquery
  @toastr_js
  @toastr_render

  @stack('js')
</html>
