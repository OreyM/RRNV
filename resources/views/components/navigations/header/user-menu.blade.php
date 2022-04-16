@php /**@var \App\Data\DTO\Empoyees\RootEmployeeDTO $rootEmployee */ @endphp

<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset('/images/dev/user2-160x160.jpg') }}"
             class="user-image img-circle elevation-2" alt="User Image"
        >
        <span class="d-none d-md-inline">{{ $rootEmployee->name }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <li class="user-header bg-primary">
            <img src="{{ asset('/images/dev/user2-160x160.jpg') }}"
                 class="img-circle elevation-2" alt="User Image"
            >
            <p>
                {{ $rootEmployee->name }}
                <small>{{ $rootEmployee->role }}</small>
            </p>
        </li>
        <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <form action="{{ Routing::url('logout') }}" method="post" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-default btn-flat float-right">
                    Sign out
                </button>
            </form>
        </li>
    </ul>
</li>

