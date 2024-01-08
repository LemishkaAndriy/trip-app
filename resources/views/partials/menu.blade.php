<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.trips.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/trips") || request()->is("admin/trips/*") ? "c-active" : "" }}">
                {{ trans('cruds.trip.title') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.trip-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/trip-reports") || request()->is("admin/trip-reports/*") ? "c-active" : "" }}">
                {{ trans('cruds.trip_reports.title') }}
            </a>
        </li>
    </ul>

</div>
