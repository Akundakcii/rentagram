<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home" class="align-text-bottom"></span>
            Admin Paneli
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/user">
            <span data-feather="file" class="align-text-bottom"></span>
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
    <li class="nav-item">
        <a class="nav-link {{Str::of(url()->current())->contains("/cars") ? "active" : ""}}"
           href="/cars">
            <span data-feather="grid"></span>
            Arabalar
        </a>
    </li>
    </li>

</ul>
