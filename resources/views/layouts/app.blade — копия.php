<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="text/html;charset=utf-8"/>
    <meta http-equiv="Content-Type" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">






    <link href=" {{asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">



        <style>
            .bgColor{
                background-color: #222e3c;
            }
        </style>

    <title>Хазина</title>



</head>
<body   >
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar" >
            <a class="sidebar-brand" href="/" style="text-decoration: none">
                <span class="align-middle">Хазина</span>
            </a>

            <ul class="sidebar-nav mt-2 ">
                <div class="accordion  "  id="accordionExample">
                    <div class="accordion-item bgColor"   >
                        @can('spr-list')

                        <h2 class="accordion-header text-white" id="headingOne">

                            <button type="button"  style="border:none" onclick="Addclass(event)"id="btn1"   data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    class="btn btn-outline-light col-md-12  {{ request()->is('spr*')?'active':'' }} "  >	<i class="align-middle" data-feather="book"></i>
                                {{ __('Справочники') }}
                            </button>
                        </h2>
                        <div id="collapseOne"  class="accordion-collapse collapse {{ request()->is('spr*')?'show':'' }} " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <li class="sidebar-item    {{ request()->is('spraccounts*')?'active':'' }}">
                                    <a class="sidebar-link" href="{{ route('spraccounts.index') }}">
                                        <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Суратҳисобҳо</span>
                                    </a>
                                </li>

                                <li class="sidebar-item {{ request()->is('spreds*')?'active':'' }}">
                                    <a class="sidebar-link" href="{{ route('spreds.index') }}">
                                        <i class="align-middle" data-feather="maximize-2"></i> <span class="align-middle">Воҳидҳои ченак</span>
                                    </a>
                                </li>
                                <li class="sidebar-item {{ request()->is('sprsafes*')?'active':'' }}">
                                    <a class="sidebar-link" href="{{ route('sprsafes.index') }}">
                                        <i class="align-middle" data-feather="server"></i> <span class="align-middle">Ганҷхонаҳо</span>
                                    </a>
                                </li>

                                <li class="sidebar-item {{ request()->is('sprshkafs*')?'active':'' }}">
                                    <a class="sidebar-link" href="{{ route('sprshkafs.index') }}">
                                        <i class="align-middle" data-feather="tablet"></i>
                                        <span class="align-middle">Ҷевон/Раф</span>
                                    </a>
                                </li>

                                <li class="sidebar-item {{ request()->is('sprqators*')?'active':'' }}">
                                    <a class="sidebar-link" href="{{ route('sprqators.index') }}">
                                        <i class="chevrons-down" data-feather="chevrons-down"></i> <span class="align-middle">Қатор</span>
                                    </a>
                                </li>
                                <li class="sidebar-item {{ request()->is('sprcell*')?'active':''   }}">
                                    <a class="sidebar-link" href="{{ route('sprcell.index') }}">
                                        <i class=" " data-feather="chevrons-right"></i> <span class="align-middle">Ячейка</span>
                                    </a>
                                </li>


                            </div>
                        </div>

                    </div>

                    <div class="accordion-item bgColor mt-2">
                        <h2 class="accordion-header" id="headingTwo">

                            <button type="button"  style="border:none" onclick="Addclass(event)" id="btn2"  data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="true" aria-controls="collapseTwo" class="btn btn-outline-light  col-md-12  {{ request()->is('fond*')?'active':'' }}"  >
                                <i class="align-middle" data-feather="dollar-sign"></i> {{ __('Фонды') }}
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse {{ request()->is('fond*')?'show':'' }}" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <li class="sidebar-item {{ request()->is('fondemission*')?'active':''   }}">
                                    <a class="sidebar-link" href="{{ route('fondemission.index') }}">
                                        <i   data-feather="grid"></i>
                                        Эмиссионный
                                    </a>
                                </li>

                            </div>
                        </div>
                    </div>



{{--                    Spr Bank--}}
                    <div class="accordion-item bgColor mt-2">
                        <h2 class="accordion-header" id="headingTwo">

                            <button type="button"  style="border:none" onclick="Addclass(event)" id="btn3"   data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree" class="btn btn-outline-light  col-md-12  {{ request()->is('bank*')?'active':'' }}"  >
                                <i class="align-middle" data-feather="dollar-sign"></i> {{ __('Справочник банк') }}
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse {{ request()->is('bank*')?'show':'' }}" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <li class="sidebar-item {{ request()->is('bank*')?'active':''   }}">
                                    <a class="sidebar-link" href="{{ route('bank_spr.index') }}">  <i   data-feather="grid"></i>   Счет банк
   </a>
                                </li>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bgColor mt-2">
                        <h2 class="accordion-header" id="headingTwo">

                            <button type="button" onclick="Addclass(event)" id="btn3"   data-bs-toggle="collapse" data-bs-target="#collapsesss"
                                    aria-expanded="true" aria-controls="collapsesss"  style="border:none"  class="btn btn-outline-light    col-md-12  {{ request()->is('oborot*')?'active':'' }}"  >
                                <i class="align-middle" data-feather="dollar-sign"></i> {{ __('Справочник оборот') }}
                            </button>
                        </h2>
                        <div id="collapsesss" class="accordion-collapse collapse {{ request()->is('oborot*')?'show':'' }}" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <li class="sidebar-item {{ request()->is('oborot*')?'active':''   }}">
                                    <a class="sidebar-link" href="{{ route('oborot_spr.index') }}">  <i   data-feather="grid"></i>   Oборот банк
                                    </a>
                                </li>

                            </div>
                        </div>
                    </div>
                    @endcan

                </div>



            </ul>


        </div>
    </nav>

    <div class="main">

        <nav class="navbar navbar-expand navbar-light navbar-bg ">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
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
                    <li class="nav-item dropdown">


                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <!--	<img src=" " class="avatar img-fluid rounded me-1" alt="Charles Hall" />-->
                            <span class="text-dark">
                             {{Auth::user()->name}}
                            </span>
                        </a>

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
            </div>
        </nav>


        <main class="content">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">

                </div>
            </div>
        </footer>
    </div>
</div>








</body>

    <script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('/js/jquery.slim.min.js')}}"   ></script>
    <script src="{{asset('js/ajax.min.js')}}"></script>

<script src="{{asset('/js/popper.min.js')}}" ></script>
<script src="{{asset('/js/bootstrap.min.js')}}"  ></script>

</html>
