<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/fontawesome-free/css/all.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/dist/css/ionicons.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/dist/css/flag-icon.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/jqvmap/jqvmap.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/dist/css/adminlte.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/daterangepicker/daterangepicker.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/plugins/summernote/summernote-bs4.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('lte/dist/css/sanspro.css')); ?>">

        <?php echo $__env->yieldContent('css'); ?>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        
        <div class="wrapper">
            
            <?php echo $__env->make('admin.commons.top-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.commons.topnav-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <?php echo $__env->make('admin.commons.main-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('main-content'); ?>
            </div>
            
            <?php echo $__env->make('admin.commons.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
        </div>
        

        
        <script src="<?php echo e(asset('lte/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
        
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        
        <script src="<?php echo e(asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/plugins/chart.js/Chart.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/plugins/sparklines/sparkline.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/plugins/moment/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('lte/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/dist/js/adminlte.js')); ?>"></script>
        
        <script src="<?php echo e(asset('lte/dist/js/pages/dashboard.js')); ?>"></script>

        <?php echo $__env->yieldContent('js'); ?>

        <form id="SelectionForm" method="post" action="">
            <?php echo csrf_field(); ?>
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
                group = "<?php echo e($group); ?>";
                subgroup = "<?php echo e($subgroup); ?>";
                $('#' + group).addClass('active');
                if ($('#' + group).parent().hasClass('has-treeview')) {
                    $('#' + group).parent().addClass('menu-open');
                    $('#' + group + ' > ul').css('display', 'block');
                }
                if (subgroup != "") {
                    $('#' + subgroup).addClass('active');
                }
                /* To set the active class for the default language. */
                $('.language-selection[data-language="<?php echo e($language); ?>"]').addClass('active');
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
                    destination = "<?php echo e(route('admin_home')); ?>";
                } else if (subgroup == "SB_01_02") {
                    destination = "<?php echo e(route('admin_index2')); ?>";
                } else if (subgroup == "SB_01_03") {
                    destination = "<?php echo e(route('admin_index3')); ?>";
                } else if (group == "SB_02") {
                    destination = "<?php echo e(route('pages_widgets')); ?>";
                } else if (group == "SB_03") {
                    destination = "<?php echo e(route('pages_layout_options')); ?>";
                } else if (group == "SB_04") {
                    destination = "<?php echo e(route('pages_charts')); ?>";
                } else if (group == "SB_05") {
                    destination = "<?php echo e(route('pages_ui')); ?>";
                } else if (group == "SB_06") {
                    destination = "<?php echo e(route('pages_forms')); ?>";
                } else if (group == "SB_07") {
                    destination = "<?php echo e(route('pages_tables')); ?>";
                } else if (group == "SB_08") {
                    destination = "<?php echo e(route('pages_calendar')); ?>";
                } else if (group == "SB_09") {
                    destination = "<?php echo e(route('pages_gallery')); ?>";
                } else if (group == "SB_10") {
                    destination = "<?php echo e(route('pages_mailbox')); ?>";
                } else if (group == "SB_11") {
                    destination = "<?php echo e(route('pages_examples')); ?>";
                } else if (group == "SB_12") {
                    destination = "<?php echo e(route('pages_extras')); ?>";
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
                var ruta = "<?php echo e(route('language_change')); ?>";
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
<?php /**PATH C:\laragon\www\laravel_base\resources\views/admin/layouts/main-layout.blade.php ENDPATH**/ ?>