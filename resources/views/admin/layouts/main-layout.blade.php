<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        {{--  Tell the browser to be responsive to screen width --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- jQuery --}}
        <script src="{{ asset('js/app.js') }}"></script>
        {{--  CSS de Laravel --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        {{--  Font Awesome --}}
        <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
        {{-- Ionicons --}}
        <link rel="stylesheet" href="{{ asset('lte/dist/css/ionicons.min.css') }}">
        {{-- flag-icon-css --}}
        <link rel="stylesheet" href="{{ asset('lte/dist/css/flag-icon.min.css') }}">
        {{-- Tempusdominus Bbootstrap 4 --}}
        <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        {{-- iCheck --}}
        <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        {{-- JQVMap --}}
        <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
        {{-- Theme style --}}
        <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
        {{-- overlayScrollbars --}}
        <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        {{-- Daterange picker --}}
        <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
        {{-- summernote --}}
        <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.css') }}">
        {{-- Google Font: Source Sans Pro --}}
        <link rel="stylesheet" href="{{ asset('lte/dist/css/sanspro.css') }}">

        @yield('css')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        {{-- Content-wrapper --}}
        <div class="wrapper">
            {{-- Top Navbar --}}
            @include('admin.commons.top-navbar')
            @include('admin.commons.topnav-wide')
            {{-- Main Sidebar Container --}}
            @include('admin.commons.main-sidebar')
            {{-- Contains page content --}}
            <div class="content-wrapper">
                @yield('main-content')
            </div>
            {{-- Footer --}}
            @include('admin.commons.footer')
            {{-- Footer --}}
        </div>
        {{-- End of content-wrapper --}}

        {{-- jQuery UI 1.11.4 --}}
        <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        {{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        {{-- Bootstrap 4 --}}
        <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        {{-- ChartJS --}}
        <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
        {{-- Sparkline --}}
        <script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
        {{-- JQVMap --}}
        <script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        {{-- jQuery Knob Chart --}}
        <script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        {{-- daterangepicker --}}
        <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
        {{-- Tempusdominus Bootstrap 4 --}}
        <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        {{-- Summernote --}}
        <script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
        {{-- overlayScrollbars --}}
        <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        {{-- AdminLTE App --}}
        <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
        {{-- AdminLTE dashboard demo (This is only for demo purposes) --}}
        <script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>

        @yield('js')

        <form id="SelectionForm" method="post" action="">
            @csrf
            <input type="hidden" name="page" id="SelectionForm_page" value="">
            <input type="hidden" name="group" id="SelectionForm_Group" value="">
            <input type="hidden" name="subGroup" id="SelectionForm_SubGroup" value="">
        </form>

        <script language="javascript">
            var page, group, subgroup, destination;
            // Preparamos los envíos por ajax para que se mande el token CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready (function() {
                /* To determine the activated sidebar link, and the group it belongs, if any.
                That lets add the active class in the appropiated links. */
                group = "{{ $group }}";
                subgroup = "{{ $subgroup }}";
                $('#' + group).addClass('active');
                if ($('#' + group).parent().hasClass('has-treeview')) {
                    $('#' + group).parent().addClass('menu-open');
                    $('#' + group + ' > ul').css('display', 'block');
                }
                if (subgroup != "") {
                    $('#' + subgroup).addClass('active');
                }
                /* To set the active class for the default language. */
                $('.language-selection[data-language="{{ $language }}"]').addClass('active');
            });
            /* To send a form to the proper route, un a link is clicked. */
            $('.menu_link').on('click', function(e) {
                e.preventDefault();
                page = $(this).attr('data-page');
                if ($(this).attr('data-subgroup') == "") {
                    group = $(this).attr('data-group')
                } else {
                    group = $(this).attr('data-subgroup').substring(0, 5);
                }
                subgroup = $(this).attr('data-subgroup');
                if (page == "" && subgroup == "") {
                    return;
                }
                if (subgroup == "SB_01_01") {
                    destination = "{{ route('admin_home') }}";
                } else if (subgroup == "SB_01_02") {
                    destination = "{{ route('admin_index2') }}";
                } else if (subgroup == "SB_01_03") {
                    destination = "{{ route('admin_index3') }}";
                } else if (group == "SB_02") {
                    destination = "{{ route('pages_widgets') }}";
                } else if (group == "SB_03") {
                    destination = "{{ route('pages_layout_options') }}";
                } else if (group == "SB_04") {
                    destination = "{{ route('pages_charts') }}";
                } else if (group == "SB_05") {
                    destination = "{{ route('pages_ui') }}";
                } else if (group == "SB_06") {
                    destination = "{{ route('pages_forms') }}";
                } else if (group == "SB_07") {
                    destination = "{{ route('pages_tables') }}";
                } else if (group == "SB_08") {
                    destination = "{{ route('pages_calendar') }}";
                } else if (group == "SB_09") {
                    destination = "{{ route('pages_gallery') }}";
                } else if (group == "SB_10") {
                    destination = "{{ route('pages_mailbox') }}";
                } else if (group == "SB_11") {
                    destination = "{{ route('pages_examples') }}";
                } else if (group == "SB_12") {
                    destination = "{{ route('pages_extras') }}";
                }

                $('#SelectionForm').prop('action', destination);
                $('#SelectionForm_page').prop('value', page);
                $('#SelectionForm_Group').prop('value', group);
                $('#SelectionForm_SubGroup').prop('value', subgroup);
                $('#SelectionForm').submit();
            });

            /* To change the language when desired */
            $('.language-selection').on('click', function() {
                var language = $(this).attr('data-language');
                var ruta = "{{ route('language_change') }}";
                $.ajax({
                    url: ruta,
                    type: "post",
                    data: {language: language},
                }).done(function(lang) {
                    $('#selected-language').removeClass().addClass('flag-icon').addClass('flag-icon-' + lang);
                    $('.language-selection').removeClass('active');
                    $('.language-selection[data-language="' + lang + '"]').addClass('active');
                });
            });
        </script>
    </body>
</html>
