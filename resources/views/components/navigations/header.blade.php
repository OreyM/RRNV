<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    @include('components.navigations.header.left-navbar-links')

    <ul class="navbar-nav ml-auto">

        @include('components.navigations.header.navbar-search')

        @include('components.navigations.header.messages-dropdown-menu')

        @include('components.navigations.header.notifications-dropdown-menu')

        @include('components.navigations.header.language-dropdown-menu')

        @include('components.navigations.header.user-menu')

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
