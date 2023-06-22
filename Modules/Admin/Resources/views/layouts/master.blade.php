@include('admin::layouts/header')
<body>
    <div id="app">
        @include('admin::layouts/sidebar')
        <div id="main">
            <div class="page-content">
                @yield('content')

            
            </div>
        @include('admin::layouts/footer')
