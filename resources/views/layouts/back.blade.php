<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$page_title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="/backCssJsFonts/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/backCssJsFonts/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/backCssJsFonts/assets/css/style_.css" rel="stylesheet">

    @if( Request::route()->getName() != 'loginBack' and  Request::route()->getName() != 'registerBack' and Request::route()->getName() != 'resetPasswordBack' and
         Request::route()->getName() != 'forgotPasswordBack' and  Request::route()->getName() != 'postActivateBack' )
        <link rel="stylesheet" href="/backCssJsFonts/assets/css/style.css">
        <link rel="stylesheet" href="/backCssJsFonts/assets/css/bootstrap.css">
    @endif
    <link rel="stylesheet" href="/backCssJsFonts/assets/css/loader-style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script  type="text/javascript" src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="/backCssJsFonts/assets/css/select2.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/backCssJsFonts/assets/js/progress-bar/number-pb.css">

    <script type="text/javascript" src="/backCssJsFonts/assets/editinadmin/desc/ckeditor.js"></script>
    <script type="text/javascript" src="/backCssJsFonts/assets/js/mine_js/pagination.js"></script>
    <script type="text/javascript" src="/backCssJsFonts/assets/js/mine_js/select2.min.js"></script>
    <script type="text/javascript" src="/backCssJsFonts/assets/js/mine_js/live_search.js"></script>

    {{--Image uploade--}}
    <link media="all" rel="stylesheet"  href="/backCssJsFonts/assets/imgUpload/css/fileinput.css">
    <script type="text/javascript" src="/backCssJsFonts/assets/imgUpload/js/plugins/sortable.js"></script>
    <script type="text/javascript" src="/backCssJsFonts/assets/imgUpload/js/fileinput.js"></script>
    <script type="text/javascript" src="/backCssJsFonts/assets/imgUpload/js/locales/fr.js"></script>
    <script type="text/javascript" src="/backCssJsFonts/assets/imgUpload/js/locales/es.js"></script>
    <script type="text/javascript" src="/backCssJsFonts/assets/imgUpload/themes/explorer/theme.js"></script>
    <link rel="shortcut icon" href="/backCssJsFonts/assets/ico/minus.png">
    <style>
        .tab-headers li {
            display: inline;
            margin-right: 10px;
        }
        .tab-content >.active {
            display: block !important;
        }
    </style>
</head>
<body>
    <div class="">
        @if(Auth::check())
            <header id="header" class="header fixed-top d-flex align-items-center">

                <div class="d-flex align-items-center justify-content-between">
                    <a href="/" class="logo d-flex align-items-center">
                        <span class="d-none d-lg-block">NiceAdmin</span>
                    </a>
                </div>
                <nav class="header-nav ms-auto">
                    <ul class="d-flex align-items-center">

                        <li class="nav-item d-block d-lg-none">
                            <a class="nav-link nav-icon search-bar-toggle " href="#">
                                <i class="bi bi-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-3">

                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{route('logoutBack')}}" >
                                Logout
                            </a>
                        </li>

                    </ul>
                </nav><!-- End Icons Navigation -->

            </header>
            <aside id="sidebar" class="sidebar">

                <ul class="sidebar-nav" id="sidebar-nav">

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('adminDashboard') }}">
                            <i class="bi bi-grid"></i>
                            <span>Dashboard</span>
                        </a>
                    </li><!-- End Dashboard Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>Sliders</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminSlidersList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminSlidersAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>
                        </ul>
                    </li><!-- End Components Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-journal-text"></i><span>Article Types</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminArticleTypesList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminArticleTypesAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>
                        </ul>
                    </li><!-- End Forms Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-layout-text-window-reverse"></i><span>Articles</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminArticlesList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminArticlesAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>
                        </ul>
                    </li><!-- End Tables Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-bar-chart"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminCategoriesList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminCategoriesAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>

                        </ul>
                    </li><!-- End Charts Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-gem"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminProductsList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminProductsAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-heading">Pages</li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#icons-nav2" data-bs-toggle="collapse" href="#">
                            <span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="icons-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminSettingsList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminSettingsAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#icons-nav3" data-bs-toggle="collapse" href="#">
                            <span>Entities</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="icons-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminEntitiesList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminEntitiesAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#icons-nav4" data-bs-toggle="collapse" href="#">
                            <span>Menu</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="icons-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminMenusList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminMenusAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#icons-nav5" data-bs-toggle="collapse" href="#">
                            <span>Languages</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="icons-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('adminLanguagesList') }}">
                                    <i class="bi bi-circle"></i><span>List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminLanguagesAdd') }}">
                                    <i class="bi bi-circle"></i><span>Add</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
        @endif
        <main id="main" class="main">
            @yield('content')
        </main>
    </div>

<script src="/backCssJsFonts/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/backCssJsFonts/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/backCssJsFonts/assets/vendor/chart.js/chart.min.js"></script>
<script src="/backCssJsFonts/assets/vendor/echarts/echarts.min.js"></script>
<script src="/backCssJsFonts/assets/vendor/quill/quill.min.js"></script>
<script src="/backCssJsFonts/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/backCssJsFonts/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/backCssJsFonts/assets/vendor/php-email-form/validate.js"></script>

<script src="/backCssJsFonts/assets/js/main_.js"></script>

<script src="/backCssJsFonts/assets/js/progress-bar/src/jquery.velocity.min.js"></script>
<script src="/backCssJsFonts/assets/js/progress-bar/number-pb.js"></script>
<script src="/backCssJsFonts/assets/js/progress-bar/progress-app.js"></script>
<script src="/backCssJsFonts/assets/js/jhere-custom.js"></script>

<script type="text/javascript" src="/backCssJsFonts/assets/js/preloader.js"></script>
<script type="text/javascript" src="/backCssJsFonts/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/backCssJsFonts/assets/js/app.js"></script>
<script type="text/javascript" src="/backCssJsFonts/assets/js/load.js"></script>
<script type="text/javascript" src="/backCssJsFonts/assets/js/main.js"></script>

<script type="text/javascript" src="/backCssJsFonts/assets/js/chart/jquery.flot.js"></script>
<script type="text/javascript" src="/backCssJsFonts/assets/js/chart/jquery.flot.resize.js"></script>
<script type="text/javascript" src="/backCssJsFonts/assets/js/countdown/jquery.countdown.js"></script>
<script type="text/javascript" src="/backCssJsFonts/assets/js/mine_js/admin_edit.js"></script>
<script>
    $(document).ready(function() {
        $('.tabs').on('click', 'a[data-toggle="tab"]', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');

            // Remove "in" class from all tab content divs
            $('.tab-content .tab-pane').removeClass('in');

            // Add "in" class to the selected tab content div
            $(target).addClass('in');
        });
        $('.tabs').on('click', 'li', function(e) {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $('.tabs li').removeClass('active');
                $(this).addClass('active');
            }
        });
    });

</script>
</body>
</html>
