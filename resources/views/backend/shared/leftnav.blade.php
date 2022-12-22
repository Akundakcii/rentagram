
<ul class="nav flex-column">

  @if(auth()->user()->is_admin===10)
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/user">
            <span data-feather="home" class="align-text-bottom"></span>
            Admin Paneli
        </a>
    </li>
        <li class="nav-item">
            <a class="nav-link {{Str::of(url()->current())->contains("/user") ? "active" : ""}}"
               href="/user">
                <span data-feather="users"></span>
                Kullanıcılar
            </a>
        </li>
    <li class="nav-item">
        <a class="nav-link {{Str::of(url()->current())->contains("/categories") ? "active" : ""}}"
           href="/categories">
            <span data-feather="grid"></span>
            Kategoriler
        </a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link {{Str::of(url()->current())->contains("/cars") ? "active" : ""}}"
           href="/cars">
            <span data-feather="shopping-cart"></span>
            Arabalar
        </a>
    </li>


</ul>
