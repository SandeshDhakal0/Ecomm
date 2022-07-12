
@include('admin.partials.top-links')
<!-- Site wrapper -->
<div class="wrapper">

    @include('admin.partials.top-menu')

    @include('admin.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @yield('content')

</div>

@include('admin.partials.footer')

</div>

    @include('admin.partials.scripts')
