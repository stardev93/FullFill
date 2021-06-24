<div class="dropdown-inner">
    <ul class="link-list">
        <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <em class="icon ni ni-signout"></em><span> {{ __('Logout') }}</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </il>

    </ul>
</div>