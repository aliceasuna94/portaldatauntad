@extends('portaldata.template')

@section('content')

    <section class="text-light p-5" style="background-color: #091392">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
      
                  <!-- Heading -->
                  <h1>{{$judul ?? ''}}</h1>
      
                  <!-- Text -->
                  <p class="fs-lg text-gray-700 mb-7 mb-md-9">
                    {{$subjudul ?? ''}}
                  </p>
      
                </div>
                <form>
                  @csrf
                <div class="row mt-4">
                    <div class="col">
                      <label for="">Tahun</label>
                      <select class="form-select" aria-label="tahun periode" name="tahun" onchange="selectTahun()">
                        @foreach ($periode as $p)
                          <option value="{{ $p->tahun }}">{{ $p->tahun }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col">
                      <label for="">Jenjang</label>
                      <select class="form-select" aria-label="jenjang studi" name="jenjang" onchange="selectJenjang()">
                        <option value="">- Semua -</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="PROF">PROFESI</option>
                      </select>
                    </div>
                    <div class="col">
                        <label for="">Fakultas</label>
                        <select class="form-select" aria-label="fakultas" name="fakultas" onchange="selectFakultas()">
                          <option value="0">- Semua -</option>
                          <option value="1">Fakultas Keguruan dan Ilmu Pendidikan</option>
                          <option value="2">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                          <option value="3">Fakultas Ekonomi</option>
                          <option value="4">Fakultas Hukum</option>
                          <option value="5">Fakultas Pertanian</option>
                          <option value="6">Fakultas Teknik</option>
                          <option value="7">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                          <option value="8">Fakultas Kehutanan</option>
                          <option value="9">Fakultas Kedokteran</option>
                          <option value="10">Fakultas Peternakan dan Perikanan</option>
                          <option value="11">Fakultas Kesehatan Masyarakat</option>
                          <option value="12">Pasca Sarjana</option>
                          <option value="13">PSDKU Morowali</option>
                          <option value="14">PSDKU Tojo Una-Una</option>
                          
                        </select>
                      </div>
                      <div class="col" id="form-prodi">
                        <label for="">Prodi</label>
                        <select class="form-select" aria-label="program studi" name="prodi" id="prodi" onchange="selectProdi()">
                          <option value="" selected>- Semua -</option>
                        </select>
                      </div>
                      <button type="button" name="submit" id="submit" hidden>SUBMIT</button>
                </div>
                </form>
                <div class="row mt-5" id="maindata">
                    <div class="col-12 col-md-4 text-center">
                        <h1 style="font-size: 50pt" id="totaldata">0</h1>
                        <h3>Total data</h3>
                    </div>
                    <div class="col-12 col-md-8">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
              </div>
        </div>
    </section>

  <script type="text/javascript">

    //Fungsi untuk menjalankan getDatamahasiswa setelah halaman di load
    $(document).ready(function() {
      getDataMahasiswa();
    });

    //Fungsi untuk meload data berdasarkan tahun yang di pilih
    function selectTahun() {
        document.querySelector("select[name=jenjang]").value = '';
        document.querySelector("select[name=fakultas]").value = '0';

        reloadProdi();

        //Reload div
        $("#maindata").load(window.location.href + " #maindata>*", "" );

        //Jalankan fungsi
        getDataMahasiswa();

    }

    //Fungsi untuk meload data berdasarkan jenjang yang di pilih
    function selectJenjang() {
        document.querySelector("select[name=fakultas]").value = '0';

        reloadProdi();

        //Reload div
        $("#maindata").load(window.location.href + " #maindata>*", "" );

        //Jalankan fungsi
        getDataMahasiswa();

    }

    //Fungsi untuk meload data berdasarkan fakultas yang di pilih
    function selectFakultas() {
        document.querySelector("select[name=prodi]").value = '0';

        //Reload div
        $("#maindata").load(window.location.href + " #maindata>*", "" );

        reloadProdi();

        //Menambahkan list prodi
        getListProdi();

        //Jalankan fungsi
        getDataMahasiswa();

    }

    //Fungsi untuk meload data berdasarkan prodi yang di pilih
    function selectProdi() {

        //Reload div
        $("#maindata").load(window.location.href + " #maindata>*", "" );

        //Jalankan fungsi
        getDataMahasiswa();

    }

    //AJAX Untuk mendapatkan data prodi list
    function getListProdi() {

    var fakultas = $("select[name=fakultas]").val();
    var token = $("input[name=_token]").val();

        $.ajax({
          type: 'POST',
          url: "{{ route('get-prodi-list') }}",
          data: {
            fakultas: fakultas,
            _token: token
          },
          dataType: 'json',
          success: function(data) { 
              tampilkanListProdi(data);
          }
        });
    }

    //Fungsi untuk menambahkan daftar prodi ke form
    function tampilkanListProdi(m) {

        for (let o = 0; o < m.length; o++) {

          const nama = m[o].nama;
          const id = m[o].id;

          var h = '<option value="'+id+'">'+nama+'</option>';

          $('#prodi').append(h);

        }
        
    }

    //Fungsi mereload list prodi
    function reloadProdi() {
        //Mengosongkan elemen
        $("#form-prodi").empty();

        //menambahkan elemen
        $('#form-prodi').append('<label for="">Prodi</label><select class="form-select" aria-label="program studi" name="prodi" id="prodi" onchange="selectProdi()"><option value="">- Semua -</option></select>');
    }

    //AJAX Untuk mendapatkan data
    function getDataMahasiswa() {

        var tahun = $("select[name=tahun]").val();
        var jenjang = $("select[name=jenjang]").val();
        var fakultas = $("select[name=fakultas]").val();
        var prodi = $("select[name=prodi]").val();
        var token = $("input[name=_token]").val();

        $.ajax({
          type: 'POST',
          url: "{{ route('portal-mahasiswa-get') }}",
          data: {
            prodi: prodi,
            fakultas: fakultas,
            jenjang: jenjang,
            tahun: tahun,
            url: '{{$url ?? ''}}',
            _token: token
          },
          dataType: 'json',
          success: function(data) {
            prosesData(data, fakultas);
          }
        });
    }

    //Fungsi untuk memproses data yang telah didapatkan dari AJAX dan menampilkan dalam grafik
    function prosesData(e, b) {

      let m = e;
      let nama = [];
      let mahasiswa = [];
      let jumlah_mahasiswa = 0;

      if (b == 0) {

          for (let i = 0; i < m.length; i++) {
            const fak = m[i].name;
            nama.push(fak);
            mahasiswa.push(m[i].jumlah_mahasiswa);
            jumlah_mahasiswa += m[i].jumlah_mahasiswa;
          }

      } else {

        let n = e[0].prodi;
        let m = [];

        var prodi = document.querySelector('#prodi').value;

        if (prodi != '') {
          for (let i = 0; i < n.length; i++) {
            const element = n[i];
            if (element.id == prodi) {
              m.push(element);
            }   
          }
          n = m;
        }

          for (let c = 0; c < n.length; c++) {

              nama.push(n[c].nama);
              mahasiswa.push(n[c].jumlah_mahasiswa);
              jumlah_mahasiswa += n[c].jumlah_mahasiswa;
          }
      }

      //menampilkan total data
      document.getElementById('totaldata').innerText = jumlah_mahasiswa;
      
      const ctx = document.getElementById('myChart');
      const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: nama,
              datasets: [{
                  label: 'Jumlah Mahasiswa',
                  data: mahasiswa,
                  backgroundColor: "yellow",
                  borderColor: "white",
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              indexAxis: 'y',
              scales: {
                  x: {
                      ticks:{
                        color: "white"
                      },
                      grid:{
                        color: "white"
                      }
                  },
                  y: {
                      beginAtZero: true,
                      ticks:{
                        color: "white"
                      },
                      grid:{
                        display: false
                      }
                  }
              },
              plugins:{
                legend:{
                  display: false
                }
              }
          }
      });
    }

  </script>
  
@endsection