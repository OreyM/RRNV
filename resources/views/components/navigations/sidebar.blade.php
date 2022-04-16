<aside class="main-sidebar sidebar-dark-primary elevation-4">

    @include('components.navigations.sidebar.brand-logo')

    <div class="sidebar">

        @include('components.navigations.sidebar.sidebar-search-form')

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false"
            >
                @foreach(config('sidebar-menu') as $el)

                    @if($el['type'] === 'header')
                        <li class="nav-header">{{ $el['title'] }}</li>
                        @continue
                    @endif

                    @if($el['children'])
                        <li class="nav-item">
                            <a href="{{ $el['alias'] ? Routing::url($el['alias']) : '#' }}"
                               class="nav-link"
                            >
                                <i class="nav-icon {{ $el['icon'] }}"></i>
                                <p>
                                    {{ $el['title'] }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($el['children'] as $subEl)
                                    <li class="nav-item">
                                        <a href="{{ $subEl['alias'] ? Routing::url($subEl['alias']) : '#' }}"
                                           class="nav-link"
                                        >
                                            <i class="{{ $subEl['icon'] }}"></i>
                                            <p>{{ $subEl['title'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ $el['alias'] ? Routing::url($el['alias']) : '#' }}"
                               class="nav-link"
                            >
                                <i class="nav-icon {{ $el['icon'] }}"></i>
                                <p>
                                    {{ $el['title'] }}
                                </p>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
