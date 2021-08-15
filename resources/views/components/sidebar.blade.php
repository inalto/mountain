<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Divider -->
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        
                        <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg" class="mr-3 w-5 h-5 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150"><path fill="currentColor" d="M128 288c-17.67 0-32 14.33-32 32s14.33 32 32 32 32-14.33 32-32-14.33-32-32-32zm154.65-97.08l16.24-48.71c1.16-3.45 3.18-6.35 4.92-9.43-4.73-2.76-9.94-4.78-15.81-4.78-17.67 0-32 14.33-32 32 0 15.78 11.63 28.29 26.65 30.92zM176 176c-17.67 0-32 14.33-32 32s14.33 32 32 32 32-14.33 32-32-14.33-32-32-32zM288 32C128.94 32 0 160.94 0 320c0 52.8 14.25 102.26 39.06 144.8 5.61 9.62 16.3 15.2 27.44 15.2h443c11.14 0 21.83-5.58 27.44-15.2C561.75 422.26 576 372.8 576 320c0-159.06-128.94-288-288-288zm212.27 400H75.73C57.56 397.63 48 359.12 48 320 48 187.66 155.66 80 288 80s240 107.66 240 240c0 39.12-9.56 77.63-27.73 112zM416 320c0 17.67 14.33 32 32 32s32-14.33 32-32-14.33-32-32-32-32 14.33-32 32zm-56.41-182.77c-12.72-4.23-26.16 2.62-30.38 15.17l-45.34 136.01C250.49 290.58 224 318.06 224 352c0 11.72 3.38 22.55 8.88 32h110.25c5.5-9.45 8.88-20.28 8.88-32 0-19.45-8.86-36.66-22.55-48.4l45.34-136.01c4.17-12.57-2.64-26.17-15.21-30.36zM432 208c0-15.8-11.66-28.33-26.72-30.93-.07.21-.07.43-.14.65l-19.5 58.49c4.37 2.24 9.11 3.8 14.36 3.8 17.67-.01 32-14.34 32-32.01z"></path></svg>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*")||request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/content-categories*")||request()->is("admin/content-tags*")||request()->is("admin/content-pages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            {{ trans('cruds.contentManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('content_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-folder">
                                        </i>
                                        {{ trans('cruds.contentCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-tags">
                                        </i>
                                        {{ trans('cruds.contentTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-pages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-pages.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file">
                                        </i>
                                        {{ trans('cruds.contentPage.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('inalto_access')
                {{-- 
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/reports*")||request()->is("admin/tags*")||request()->is("admin/pois*")||request()->is("admin/categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            {{ trans('cruds.inalto.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('report_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/reports*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.reports.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.report.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.tag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('poi_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/pois*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.pois.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.poi.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.category.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    --}}
                @endcan
                @can('news_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/posts*")||request()->is("admin/news-tags*")||request()->is("admin/news-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            {{ trans('cruds.news.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('post_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/posts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.posts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-file-alt">
                                        </i>
                                        {{ trans('cruds.post.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('news_tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/news-tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.news-tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.newsTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('news_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/news-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.news-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-list">
                                        </i>
                                        {{ trans('cruds.newsCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.password.edit") }}" class="{{ request()->is("profile/password") || request()->is("profile/password/*") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fas fa-cogs"></i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>