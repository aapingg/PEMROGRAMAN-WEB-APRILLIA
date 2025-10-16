<html>
<head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @yield('judul_menu')
    <nav>
        <a href="/barang">Barang</a> |
        <a href="/produk">Produk</a>
    </nav>
    <p>
        Selamat datang di Aping Store! Anda telah berhasil masuk ke halaman home.
    </p>
    <div class="container">
        @yield('isi_menu')
    </div>
</body>
</html>
