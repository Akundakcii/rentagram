<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RentAGram @yield("section_title") </title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">RENT A GRAM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="@yield("btn_url")">Anasayfa</a>
                            </li>

                            @auth()
                                <li class="nav-item">
                                    <a class="nav-link" href="@yield("btn_url")">Bilgilerim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="@yield("btn_url")">Sepetim</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="@yield("btn_url")">Çıkış</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="@yield("btn_url")">Giriş Yap</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="@yield("btn_url")">Üye ol</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
