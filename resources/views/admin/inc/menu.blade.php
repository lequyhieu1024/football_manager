<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo p-2">
                <img width="40" src="/admin/img/logo.jpg" alt="Web Logo" class="img-fluid">
            </span>
            <span
                class="app-brand-text demo menu-text text-base fw-bolder ms-2 text-uppercase">{{ __('Yard Manager') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard"> {{ __('Dashboard') }} </div>
            </a>
        </li>

        {{--        @canany(['list_student', 'create_student'])--}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle no-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke-width="1.5" fill="currentColor" class="bi bi-trophy menu-icon" viewBox="0 0 16 16">
                    <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935M3.504 1q.01.775.056 1.469c.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.5.5 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667q.045-.694.056-1.469z"/>
                </svg>
                <div data-i18n="Student"> {{ __('Match Manager') }} </div>
            </a>
            <ul class="menu-sub">
                {{--                    @can('list_student')--}}
                <li class="menu-item">
                    <a href="{{ route('matches.index') }}" class="menu-link">
                        <div data-i18n="Danh sách khách hàng">{{ __('Match List') }}</div>
                    </a>
                </li>
                {{--                    @endcan--}}
                {{--                    @can('create_student')--}}
                <li class="menu-item">
                    <a href="{{ route('matches.create') }}" class="menu-link">
                        <div data-i18n="Tạo khách hàng mới"> {{ __('Create Match') }} </div>
                    </a>
                </li>
                {{--                    @endcan--}}
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle no-warning">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="menu-icon  bx bx-layout">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                </svg>
                <div data-i18n="Student"> {{ __('Player Manager') }} </div>
            </a>
            <ul class="menu-sub">
                {{--                    @can('list_student')--}}
                <li class="menu-item">
                    <a href="{{ route('players.index') }}" class="menu-link">
                        <div data-i18n="Danh sách khách hàng">{{ __('Player List') }}</div>
                    </a>
                </li>
                {{--                    @endcan--}}
                {{--                    @can('create_student')--}}
                <li class="menu-item">
                    <a href="{{ route('players.create') }}" class="menu-link">
                        <div data-i18n="Tạo khách hàng mới"> {{ __('Create Player') }} </div>
                    </a>
                </li>
                {{--                    @endcan--}}
            </ul>
        </li>
        {{--        @endcanany--}}
        {{--        @canany(['list_department', 'create_department'])--}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle no-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke-width="1.5"
                     fill="currentColor" class="bi bi-buildings menu-icon  bx bx-layout" viewBox="0 0 16 16">
                    <path
                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                    <path
                        d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
                </svg>
                <div data-i18n="Department"> {{ __('Club Manager') }} </div>
            </a>
            <ul class="menu-sub">
                {{--                    @can('list_department')--}}
                <li class="menu-item">
                    <a href="{{ route('clubs.index') }}" class="menu-link">
                        <div data-i18n="Danh sách khách hàng">{{ __('Club List') }}</div>
                    </a>
                </li>
                {{--                    @endcan--}}
                {{--                    @can('create_department')--}}
                <li class="menu-item">
                    <a href="{{ route('clubs.create') }}" class="menu-link">
                        <div data-i18n="Tạo khách hàng mới"> {{ __('Create Club') }} </div>
                    </a>
                </li>
                {{--                    @endcan--}}
            </ul>
        </li>
        {{--        @endcanany--}}
        {{--        @canany(['list_subject', 'create_subject'])--}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle no-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke-width="1.5"
                     fill="currentColor" class="bi bi-card-list menu-icon bx bx-layout" viewBox="0 0 16 16">
                    <path
                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                    <path
                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                </svg>
                <div data-i18n="Department"> {{ __('Coach Manager') }} </div>
            </a>
            <ul class="menu-sub">
                {{--                    @can('list_subject')--}}
                <li class="menu-item">
                    <a href="{{ route('coaches.index') }}" class="menu-link">
                        <div data-i18n="Danh sách khách hàng">{{ __('Coach List') }}</div>
                    </a>
                </li>
                {{--                    @endcan--}}
                {{--                    @can('create_student')--}}
                <li class="menu-item">
                    <a href="{{ route('coaches.create') }}" class="menu-link">
                        <div data-i18n="Tạo khách hàng mới"> {{ __('Create Coach') }} </div>
                    </a>
                </li>
                {{--                    @endcan--}}
            </ul>
        </li>
        {{--        @endcanany--}}
        {{--        @canany(['list_department', 'create_department'])--}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle no-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-life-preserver menu-icon  bx bx-layout" viewBox="0 0 16 16">
                    <path
                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m6.43-5.228a7.03 7.03 0 0 1-3.658 3.658l-1.115-2.788a4 4 0 0 0 1.985-1.985zM5.228 14.43a7.03 7.03 0 0 1-3.658-3.658l2.788-1.115a4 4 0 0 0 1.985 1.985zm9.202-9.202-2.788 1.115a4 4 0 0 0-1.985-1.985l1.115-2.788a7.03 7.03 0 0 1 3.658 3.658m-8.087-.87a4 4 0 0 0-1.985 1.985L1.57 5.228A7.03 7.03 0 0 1 5.228 1.57zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                </svg>
                <div data-i18n="Department"> {{ __('Yard Manager') }} </div>
            </a>
            <ul class="menu-sub">
                {{--                    @can('list_department')--}}
                <li class="menu-item">
                    <a href="{{ route('yards.index') }}" class="menu-link">
                        <div data-i18n="Danh sách khách hàng">{{ __('Yard List') }}</div>
                    </a>
                </li>
                {{--                    @endcan--}}
                {{--                    @can('create_department')--}}
                <li class="menu-item">
                    <a href="{{ route('yards.create') }}" class="menu-link">
                        <div data-i18n="Tạo khách hàng mới"> {{ __('Create Yard') }} </div>
                    </a>
                </li>
                {{--                    @endcan--}}
            </ul>
        </li>
        {{--        @endcanany--}}
        {{--        @canany(['list_role', 'create_role'])--}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle no-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke-width="1.5"
                     fill="currentColor" class="bi bi-person-gear menu-icon  bx bx-layout" viewBox="0 0 16 16">
                    <path
                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                </svg>
                <div data-i18n="Department"> {{ __('Role Manager') }} </div>
            </a>
            <ul class="menu-sub">
                {{--                    @can('list_role')--}}
                <li class="menu-item">
                    <a href="{{ route('roles.index') }}" class="menu-link">
                        <div data-i18n="Danh sách khách hàng">{{ __('Role List') }}</div>
                    </a>
                </li>
                {{--                    @endcan--}}
                {{--                    @can('create_role')--}}
                <li class="menu-item">
                    <a href="{{ route('roles.create') }}" class="menu-link">
                        <div data-i18n="Tạo khách hàng mới"> {{ __('Create Role') }} </div>
                    </a>
                </li>
                {{--                    @endcan--}}
            </ul>
        </li>
        {{--        @endcanany--}}
        {{--        @can('self_manager_profile')--}}
        <li class="menu-item">
            <a href="{{ route('profile.edit') }}" class="menu-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke-width="1.5" fill="currentColor"
                     class="bi bi-gear menu-icon" viewBox="0 0 16 16">
                    <path
                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                    <path
                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                </svg>
                <div data-i18n="Tạo khách hàng mới"> {{ __('Profile Manager') }} </div>
            </a>
        </li>
    </ul>
</aside>
