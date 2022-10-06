<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Data | Pangkalan Data Universitas Tadulako</title>
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js" integrity="sha512-zjlf0U0eJmSo1Le4/zcZI51ks5SjuQXkU0yOdsOBubjSmio9iCUp8XPLkEAADZNBdR9crRy3cniZ65LF2w8sRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="{{URL::asset('js/jquery-3.6.0.min.js')}}"></script>

  <body class="bg-light" style="font-family: 'Fira Sans Condensed', sans-serif;">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom p-3">
      <div class="container-fluid">
        <img src="/images/untadlogo.png" width="30" height="30" class="d-inline-block align-top" style="margin-right: 20px" alt=""><a class="navbar-brand fw-bold text-primary" href="/data/mahasiswa/aktif">Portaldata.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border-color:transparent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mahasiswa
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/data/mahasiswa/aktif">Mahasiswa Aktif</a></li>
                  <li><a class="dropdown-item" href="/data/mahasiswa/nonaktif">Mahasiswa Non-Aktif</a></li>
                  <li><a class="dropdown-item" href="/data/mahasiswa/cuti">Mahasiswa Cuti</a></li>
                  <li><a class="dropdown-item" href="/data/mahasiswa/baru">Mahasiswa Baru</a></li>
                  <li><a class="dropdown-item" href="/data/mahasiswa/bidikmisi">Mahasiswa Bidikmisi</a></li>
                  <li><a class="dropdown-item" href="/data/mahasiswa/lulus">Mahasiswa Lulus</a></li>
                  <li><a class="dropdown-item" href="/data/mahasiswa/tepat_waktu">Mahasiswa Lulus Tepat Waktu</a></li>
                  <li><a class="dropdown-item" href="/data/mahasiswa/tugas_akhir">Mahasiswa Tugas Akhir</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/data/dosen">Dosen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/data/spmi">SPMI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/home/dashboard">Dashboard</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    @yield('content')

    <section class="text-light p-5" style="background-color: #091392">
      <div class="container">
        <div style="text-align: center">
          <span><img src="/images/untadlogo.png" alt="" height="50px"></span><h2>Portaldata.</h2>
        </div>
      </div>
    </section>

    <section class="text-light p-3 pt-5" style="background-color: #00006f">
      <div class="container">
        <p class="text-center">2022 © Copyright <strong>Universitas Tadulako</strong><br> <span style="font-size: 10pt">Developed by LPPMP Universitas Tadulako</span></p>
      </div>
    </section>

  </body>

</html>