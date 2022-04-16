<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    @foreach(config('header-menu') as $el)
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ $el['alias'] ? Routing::url($el['alias']) : '#' }}"
               class="nav-link"
            >{{ $el['title'] }}</a>
        </li>
    @endforeach
</ul>
