<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ödeme Başarılı</title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
            <main class="mt-5">
                <h1>Ödeme Başarılı</h1>
                <p>Ödeme işleminiz başarıyla gerçekleştirildi.</p>
                <p>Ana sayfaya yönlendiriliyorsunuz...</p>
            </main>
        </div>
    </div>
</div>
<script>
    setTimeout(function () {
        window.location.href = '/';
    }, 3000)
</script>
</body>
</html>
