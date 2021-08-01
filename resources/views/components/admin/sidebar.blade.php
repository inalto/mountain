    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a class="flex nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>

   
                @can('user_management_access')
                    <li 
                    x-data="{ open: {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*") ? 'true' : 'false' }} }"
                      class="nav-item">
                        <a @click.prevent="open = !open" class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p >
                                {{ trans('cruds.userManagement.title') }}
                            </p>
                            <i :class="[ open ? 'ease-in-out duration-500 transform -rotate-90 right fa fa-fw fa-angle-left nav-icon' : 'ease-in-out duration-500 transform right fa fa-fw fa-angle-left nav-icon']"></i>
                        </a>
                        <ul 
                        x-ref="inner"
                        class="relative overflow-hidden transition-all duration-700 max-h-0"
                        x-bind:style="open ? `max-height:  ${ $refs.inner.scrollHeight }px` : ``"
                         >
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase"></i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user"></i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                            
                @can('content_management_access')
                    <li 
                    x-data="{ open: {{ request()->is("admin/content-categories*") ||request()->is("admin/content-tags*")||request()->is("admin/content-pages*")? 'true' : 'false' }} }"

                        class="nav-item has-treeview ">
                        <a @click="open = !open" class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-book"></i>
                            <p>
                                {{ trans('cruds.contentManagement.title') }}
                            </p>
                            <i :class="[ open ? 'transform -rotate-90 right fa fa-fw fa-angle-left nav-icon' : 'transform right fa fa-fw fa-angle-left nav-icon']"></i>
                        </a>
                        <ul 
                        x-ref="inner"
                        class="relative overflow-hidden transition-all duration-700 max-h-0"
                        x-bind:style="open ? `max-height:  ${ $refs.inner.scrollHeight }px` : ``"
                         >
                            @can('content_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder"></i>
                                        <p>
                                            {{ trans('cruds.contentCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-tags.index") }}" class="nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags"></i>
                                        <p>
                                            {{ trans('cruds.contentTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-pages.index") }}" class="nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file"></i>
                                        <p>
                                            {{ trans('cruds.contentPage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('inalto_access')
                    <li
                    x-data="{ open: {{ request()->is("admin/reports*")||request()->is("admin/pois*")||request()->is("admin/reports-tags*")||request()->is("admin/reports-categories*")? 'true' : 'false' }} }"
                        class="nav-item has-treeview ">
                        <a @click="open = !open" class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-walking"></i>
                            <p>
                                {{ trans('cruds.inalto.title') }}
                            </p>
                            <i :class="[ open ? 'transform -rotate-90 right fa fa-fw fa-angle-left nav-icon' : 'transform right fa fa-fw fa-angle-left nav-icon']"></i>
                        </a>
                        <ul 
                        x-ref="inner"
                        class="relative overflow-hidden transition-all duration-700 max-h-0"
                        x-bind:style="open ? `max-height:  ${ $refs.inner.scrollHeight }px` : ``"
                         >
                            @can('report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reports.index") }}" class="nav-link {{ request()->is("admin/reports") || request()->is("admin/reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-street-view"></i>
                                        <p>
                                            {{ trans('cruds.report.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('poi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pois.index") }}" class="nav-link {{ request()->is("admin/pois") || request()->is("admin/pois/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs"></i>
                                        <p>
                                            {{ trans('cruds.poi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            {{--
                            @can('reports_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reports-tags.index") }}" class="nav-link {{ request()->is("admin/reports-tags") || request()->is("admin/reports-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags"></i>
                                        <p>
                                            {{ trans('cruds.reportsTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('reports_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reports-categories.index") }}" class="nav-link {{ request()->is("admin/reports-categories") || request()->is("admin/reports-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list"></i>
                                        <p>
                                            {{ trans('cruds.reportsCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            --}}
                        </ul>
                    </li>
                @endcan
                @can('news_access')
                    <li
                        x-data="{ open: {{ request()->is("admin/news-posts*")||request()->is("admin/news-categories*")||request()->is("admin/news-tags*")? 'true' : 'false' }} }"
                        class="nav-item has-treeview">
                        <a @click="open = !open" class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-newspaper"></i>
                            <p>
                                {{ trans('cruds.news.title') }}
                            </p>
                            <i :class="[ open ? 'transform -rotate-90 right fa fa-fw fa-angle-left nav-icon' : 'transform right fa fa-fw fa-angle-left nav-icon']"></i>
                        </a>
                        <ul 
                        x-ref="inner"
                        class="relative overflow-hidden transition-all duration-700 max-h-0"
                        x-bind:style="open ? `max-height:  ${ $refs.inner.scrollHeight }px` : ``"
                         >
                         {{--
                            @can('news_post_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.news-posts.index") }}" class="nav-link {{ request()->is("admin/news-posts") || request()->is("admin/news-posts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-alt"></i>
                                        <p>
                                            {{ trans('cruds.newsPost.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('news_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.news-categories.index") }}" class="nav-link {{ request()->is("admin/news-categories") || request()->is("admin/news-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list"></i>
                                        <p>
                                            {{ trans('cruds.newsCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('news_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.news-tags.index") }}" class="nav-link {{ request()->is("admin/news-tags") || request()->is("admin/news-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags"></i>
                                        <p>
                                            {{ trans('cruds.newsTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            --}}
                        </ul>
                    </li>
                @endcan
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
