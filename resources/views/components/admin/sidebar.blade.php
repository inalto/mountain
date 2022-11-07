<nav
  class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-10 w-64 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 h-screen"
  :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': open === false}">
  <ul class="" role="menu">
    <li class="nav-item">
      <a class="nav-link" href="{{ route("admin.home") }}">
        <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg" class="mr-3 w-5 h-5">
          <path fill="currentColor"
            d="M128 288c-17.67 0-32 14.33-32 32s14.33 32 32 32 32-14.33 32-32-14.33-32-32-32zm154.65-97.08l16.24-48.71c1.16-3.45 3.18-6.35 4.92-9.43-4.73-2.76-9.94-4.78-15.81-4.78-17.67 0-32 14.33-32 32 0 15.78 11.63 28.29 26.65 30.92zM176 176c-17.67 0-32 14.33-32 32s14.33 32 32 32 32-14.33 32-32-14.33-32-32-32zM288 32C128.94 32 0 160.94 0 320c0 52.8 14.25 102.26 39.06 144.8 5.61 9.62 16.3 15.2 27.44 15.2h443c11.14 0 21.83-5.58 27.44-15.2C561.75 422.26 576 372.8 576 320c0-159.06-128.94-288-288-288zm212.27 400H75.73C57.56 397.63 48 359.12 48 320 48 187.66 155.66 80 288 80s240 107.66 240 240c0 39.12-9.56 77.63-27.73 112zM416 320c0 17.67 14.33 32 32 32s32-14.33 32-32-14.33-32-32-32-32 14.33-32 32zm-56.41-182.77c-12.72-4.23-26.16 2.62-30.38 15.17l-45.34 136.01C250.49 290.58 224 318.06 224 352c0 11.72 3.38 22.55 8.88 32h110.25c5.5-9.45 8.88-20.28 8.88-32 0-19.45-8.86-36.66-22.55-48.4l45.34-136.01c4.17-12.57-2.64-26.17-15.21-30.36zM432 208c0-15.8-11.66-28.33-26.72-30.93-.07.21-.07.43-.14.65l-19.5 58.49c4.37 2.24 9.11 3.8 14.36 3.8 17.67-.01 32-14.34 32-32.01z">
          </path>
        </svg>

        {{ trans('global.dashboard') }}

      </a>
    </li>

    @can('user_management_access')
      <li
        x-data="{ open: {{ request()->is('admin/permissions*')||request()->is('admin/roles*')||request()->is('admin/users') ? 'true' : 'false' }} }"
        class="nav-item">
        <a @click.prevent="open = !open" class="nav-link nav-dropdown-toggle" href="#">
          <span>
            <svg viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg" class="mr-3 w-5 h-5">
              <path fill="currentColor"
                d="M544 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-112c17.6 0 32 14.4 32 32s-14.4 32-32 32-32-14.4-32-32 14.4-32 32-32zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-112c17.6 0 32 14.4 32 32s-14.4 32-32 32-32-14.4-32-32 14.4-32 32-32zm396.4 210.9c-27.5-40.8-80.7-56-127.8-41.7-14.2 4.3-29.1 6.7-44.7 6.7s-30.5-2.4-44.7-6.7c-47.1-14.3-100.3.8-127.8 41.7-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c.2-23.8-7-45.9-19.4-64.3zM464 432H176v-44.8c0-36.4 29.2-66.2 65.4-67.2 25.5 10.6 51.9 16 78.6 16 26.7 0 53.1-5.4 78.6-16 36.2 1 65.4 30.7 65.4 67.2V432zm92-176h-24c-17.3 0-33.4 5.3-46.8 14.3 13.4 10.1 25.2 22.2 34.4 36.2 3.9-1.4 8-2.5 12.3-2.5h24c19.8 0 36 16.2 36 36 0 13.2 10.8 24 24 24s24-10.8 24-24c.1-46.3-37.6-84-83.9-84zm-236 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm0-176c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64 28.7-64 64-64zM154.8 270.3c-13.4-9-29.5-14.3-46.8-14.3H84c-46.3 0-84 37.7-84 84 0 13.2 10.8 24 24 24s24-10.8 24-24c0-19.8 16.2-36 36-36h24c4.4 0 8.5 1.1 12.3 2.5 9.3-14 21.1-26.1 34.5-36.2z">
              </path>
            </svg>
            {{ trans('cruds.userManagement.title') }}
          </span>
          <i
            :class="[ open ? 'ease-in-out duration-500 transform -rotate-90 right fa fa-angle-left nav-icon' : 'ease-in-out duration-500 transform right fa fa-angle-left nav-icon']"></i>
        </a>
        <ul x-ref="inner" class="relative overflow-hidden transition-all duration-700 max-h-0"
          x-bind:style="open ? `max-height:  ${ $refs.inner.scrollHeight }px` : ``">
          @can('permission_access')
            <li class="nav-item">
              <a href="{{ route('admin.permissions.index') }}"
                class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-unlock-alt">
                </i>
                {{ trans('cruds.permission.title') }}
              </a>
            </li>
          @endcan
          @can('role_access')
            <li class="nav-item">
              <a href="{{ route('admin.roles.index') }}"
                class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  {{ trans('cruds.role.title') }}
                </p>
              </a>
            </li>
          @endcan
          @can('user_access')
            <li class="nav-item">
              <a href="{{ route('admin.users.index') }}"
                class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
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
        x-data="{ open: {{ request()->is('admin/content-categories*') ||request()->is('admin/content-tags*')||request()->is('admin/content-pages*')? 'true' : 'false' }} }"
        class="nav-item has-treeview ">
        <a x-on:click="open = !open" class="nav-link nav-dropdown-toggle" href="#">
          <span>
            <i class="nav-icon fas fa-book"></i>

            {{ trans('cruds.contentManagement.title') }}
          </span>
          <i
            :class="[ open ? 'transform -rotate-90 right fa fa-angle-left nav-icon' : 'transform right fa fa-angle-left nav-icon']"></i>
        </a>
        <ul x-ref="inner" class="relative overflow-hidden transition-all duration-700 max-h-0"
          x-bind:style="open ? `max-height:  ${ $refs.inner.scrollHeight }px` : ``">
          @can('content_category_access')
            <li class="nav-item">
              <a href="{{ route('admin.content-categories.index') }}"
                class="nav-link {{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  {{ trans('cruds.contentCategory.title') }}
                </p>
              </a>
            </li>
          @endcan
          @can('content_tag_access')
            <li class="nav-item">
              <a href="{{ route('admin.content-tags.index') }}"
                class="nav-link {{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                  {{ trans('cruds.contentTag.title') }}
                </p>
              </a>
            </li>
          @endcan
          @can('content_page_access')
            <li class="nav-item">
              <a href="{{ route('admin.content-pages.index') }}"
                class="nav-link {{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
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
        x-data="{ open: {{ request()->is('admin/reports*')||request()->is('admin/pois*')||request()->is('admin/tags*')||request()->is('admin/categories*')||request()->is('admin/have-been-there*')? 'true' : 'false' }} }"
        class="nav-item has-treeview ">
        <a x-on:click="open = !open" class="nav-link nav-dropdown-toggle" href="#">
          <span>
            <i class="nav-icon fas fa-walking"></i>
            {{ trans('cruds.inalto.title') }}
          </span>
          <i
            :class="[ open ? 'transform -rotate-90 right fa fa-angle-left nav-icon' : 'transform right fa fa-angle-left nav-icon']"></i>
        </a>
        <ul x-ref="inner" class="relative overflow-hidden transition-all duration-700 max-h-0"
          x-bind:style="open ? `max-height:  ${ $refs.inner.scrollHeight }px` : ``">
          @can('report_access')
            <li class="nav-item">
              <a href="{{ route('admin.reports.index') }}"
                class="nav-link {{ request()->is('admin/reports') || request()->is('admin/reports/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-street-view"></i>
                <p>
                  {{ trans('cruds.report.title') }}
                </p>
              </a>
            </li>
          @endcan

          @can('inalto_poi_access')
            <li class="nav-item">
              <a href="{{ route('admin.pois.index') }}"
                class="nav-link {{ request()->is('admin/oois') || request()->is('admin/pois/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  {{ trans('cruds.poi.title') }}
                </p>
              </a>
            </li>
          @endcan
          @can('inalto_havebeenthere_access')
            <li class="nav-item">
              <a href="{{ route('admin.have-been-there.index') }}"
                class="nav-link {{ request()->is('admin/have-been-there') || request()->is('admin/have-been-there/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-street-view"></i>
                <p>
                  {{ trans('cruds.havebeenthere.title') }}
                </p>
              </a>
            </li>
          @endcan
          @can('inalto_tag_access')
            <li class="nav-item">
              <a href="{{ route('admin.tags.index') }}"
                class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                  {{ trans('cruds.reportsTag.title') }}
                </p>
              </a>
            </li>
          @endcan

          @can('inalto_category_access')
            <li class="nav-item">
              <a href="{{ route('admin.categories.index') }}"
                class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  {{ trans('cruds.category.title') }}
                </p>
              </a>
            </li>
          @endcan

        </ul>
      </li>
    @endcan
    @can('news_access')
      <li
        x-data="{ open: {{ request()->is('admin/news-posts*')||request()->is('admin/news-categories*')||request()->is('admin/news-tags*')? 'true' : 'false' }} }"
        class="nav-item has-treeview">
        <a x-on:click="open = !open" class="nav-link nav-dropdown-toggle" href="#">
          <span>
            <i class="nav-icon far fa-newspaper"></i>

            {{ trans('cruds.news.title') }}
          </span>
          <i
            :class="[ open ? 'transform -rotate-90 right fa fa-angle-left nav-icon' : 'transform right fa fa-angle-left nav-icon']"></i>
        </a>
        <ul x-ref="inner" class="relative overflow-hidden transition-all duration-700 max-h-0"
          x-bind:style="open ? `max-height:  ${ $refs.inner.scrollHeight }px` : ``">

          @can('news_post_access')
            <li class="nav-item">
              <a href="{{ route('admin.news-posts.index') }}"
                class="nav-link {{ request()->is('admin/news-posts') || request()->is('admin/news-posts/*') ? 'active' : '' }}">
                <i class="nav-icon far fa-file-alt"></i>
                <p>
                  {{ trans('cruds.newsPost.title') }}
                </p>
              </a>
            </li>
          @endcan
          @can('news_category_access')
            <li class="nav-item">
              <a href="{{ route('admin.news-categories.index') }}"
                class="nav-link {{ request()->is('admin/news-categories') || request()->is('admin/news-categories/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  {{ trans('cruds.newsCategory.title') }}
                </p>
              </a>
            </li>
          @endcan
          @can('news_tag_access')
            <li class="nav-item">
              <a href="{{ route('admin.news-tags.index') }}"
                class="nav-link {{ request()->is('admin/news-tags') || request()->is('admin/news-tags/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                  {{ trans('cruds.newsTag.title') }}
                </p>
              </a>
            </li>
          @endcan

        </ul>
      </li>
    @endcan

  </ul>
</nav>
