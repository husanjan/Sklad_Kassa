<!DOCTYPE html>
<!-- saved from url=(0027)https://store.zippy.com.ua/ -->
<html style="height: auto;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta lang="ua">
    <title>  Хазина</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css1/adminlte.css')}}">

    <link href=" {{asset('css/app.css')}}" rel="stylesheet">
    <!--<link rel="stylesheet" href="/vendor/leon-mbs/zippy/assets/css/bootstrap.css">   -->

       <script src=" {{asset('js1/jquery.js')}}" type="text/javascript"></script>
{{--      <script src=" {{asset('js1/bootstrap.bundle.js')}}" type="text/javascript"></script>--}}
     <script src=" {{asset('js1/adminlte.js')}}" type="text/javascript"></script>
     <script src=" {{asset('js1/app.js')}}" type="text/javascript"></script>




 </head>

<body class="sidebar-mini sidebar-collapse" style="height: auto;">



<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand    ">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link  text-dark" data-widget="pushmenu" href=" "><i class="fas fa-bars"></i></a>
            </li>

        </ul>



        <ul class="navbar-nav ml-auto">


            <li class="nav-item dropdown   ">
            @guest
                @if(Route::has('login'))
                    <li class="nav-item dropdown">
                        {{--                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">--}}
                        {{--                                <!--	<img src=" " class="avatar img-fluid rounded me-1" alt="Charles Hall" />-->--}}
                        {{--                                <span class="text-dark">--}}
                        {{--                              Вход--}}
                        {{--                            </span>--}}
                        {{--                            </a>--}}
                    </li>

                @endif
            @else
                <a href=" " class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span zippy="username" id="username">{{Auth::user()->name}}</span> </a>
                <ul class="navbar-nav navbar-align">

                        <li class="nav-item dropdown">



                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Пользователи</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Группы</a>
                                <div class="dropdown-divider"></div>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{__('Выход')}}
                                </a>
                                <form action="{{route('logout')}}" id="logout-form" method="POST" class="d-none" >
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            <li class="nav-item  ">
                &nbsp; &nbsp; &nbsp; &nbsp;
            </li>
        </ul></nav>

    <aside class="  main-sidebar sidebar-dark-primary elevation-4   h-100 "><!-- Brand Logo -->
        <a href=" " class="brand-link text-decoration-none">

            <span class="brand-text font-weight-light">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Касса   </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            @can('spr-list')
            <nav class="mt-2">
                <ul class="nav  nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                    <li class="nav-item  ">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Главная
                            </p>
                        </a>
                    </li>


                    <li class="nav-item has-treeview {{ request()->is('spr*')?'menu-open':'' }}">
                        <a href=" " class="nav-link  ">
                            <i class="nav-icon fa fa-file "></i>
                            <p>
                                Справочники
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item has-treeview">
                                <a href="{{ route('spraccounts.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Счет
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            
                            <li class="nav-item has-treeview">
                                <a href="{{ route('bank_spr.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Счет банк
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('spreds.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Единицы
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>

                            <li class="nav-item has-treeview">
                                <a href="{{ route('sprsafes.index') }}" class="nav-link">

                                    <i class="nav-icon fa fa-safe "></i>
                                    <p>Хранилище
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('sprshkafs.index') }}" class="nav-link">

                                    <i class="nav-icon fa fa-safe "></i>
                                    <p>Шкаф/Полка
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('sprqators.index') }}" class="nav-link">

                                    <i class="nav-icon fa fa-safe "></i>
                                    <p>Ряд
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('sprcell.index') }}" class="nav-link">

                                    <i class="nav-icon fa fa-safe "></i>
                                    <p>Ячейка
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>
                        </ul>
                            </li>

                    <li class="nav-item has-treeview {{ request()->is('fondemission*')?'menu-open':'' }}">
                        <a href=" " class="nav-link  ">
                            <i class="nav-icon fa fa-funnel-dollar "></i>
                            <p>
                              {{ __('Фонды') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item has-treeview">
                                <a href="{{ route('fondemission.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Эмиссионный
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('fondunusable.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Коршоям
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('fondwornou.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Фарсуда
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                           
                          
                            <li class="nav-item has-treeview">
                                <a href="{{ route('fondcanceled.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Ботилшуда
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('korshoyam_tanga.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Коршоям танга
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('farsuda_tanga.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Фарсуда танга
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('botilshuda_tanga.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Ботилшуда танга
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                      
                        </ul>
                        
                    </li>
                    {{-- <li class="nav-item has-treeview {{ request()->is('bank*')?'menu-open':'' }} {{ request()->is('oborot*')?'menu-open':'' }}"> --}}
                        {{-- <a href="{{ route('oborot_spr.index') }}" class="nav-link  ">
                            <i class="nav-icon fa fa-folder-tree "></i>
                            <p>
                                {{ __('Справочники') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a> --}}
                        {{-- <ul class="nav nav-treeview"> --}}

                            <li class="nav-item has-treeview">
                                <a href="{{ route('oborot_spr.index') }}" class="nav-link">
                                    <i class="nav-icon fa fa-folder-tree "></i>
                                    <p>Oборот
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('oborot_tanga.index') }}" class="nav-link">
                                    <i class="nav-icon fa fa-folder-tree "></i>
                                    <p>Oборот Танга
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                        {{-- </ul> --}}
                    {{-- </li> --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-folder-tree "></i>
                            <p>Oстатки
                                <i class="right fas fa-angle-left"></i>
                            </p>

                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item has-treeview">
                                <a href="{{ route('ostatkisafe.index') }}" class="nav-link">
                                    <i class="fa    nav-icon"></i>
                                    <p>Хранилище
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                            
                        
                            <li class="nav-item has-treeview">
                                <a href="{{ route('ostatkischets.index') }}" class="nav-link">
                                    <i class="fa  nav-icon"></i>
                                    <p>Счет
                                        <i class="right fas fa-angle-left"></i>
                                    </p>

                                </a>

                            </li>
                        </ul>
                    </li>


           </ul>

            </nav>
            @endcan
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-4" style="height:auto;">

        <!-- Main content -->
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <div id="sidebar-overlay"></div>
</div>
<!-- ./wrapper -->





</body></html>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('/js/jquery.slim.min.js')}}"   ></script>
<script src="{{asset('js/ajax.min.js')}}"></script>


<script src="{{asset('/js/bootstrap.min.js')}}"  ></script>
