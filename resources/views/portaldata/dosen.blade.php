@extends('portaldata.template')
@section('content')

<section class="text-light p-5" style="background-color: #091392">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
                  <h1>Data Dosen</h1>
                  <p class="fs-lg text-gray-700 mb-7 mb-md-9">
                    Data dosen adalah dosen tetap yang terdaftar dan memiliki NIDN / NIDK.
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
                          <option value="0">- Semua -</option>
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

    <section class="text-dark p-5">
        <div class="container">
          <div class="text-center">
            <p>Data Berdasarkan</p>
            <h1 style="font-weight: 600;">Jenis Kelamin</h1>
          </div>
          <div class="row mt-5">
            <div class="col-12 col-md-6 text-center">
              <table class="table">
                <thead style="background-color: #e7ecff">
                  <tr>
                    <th scope="col" id="jk_table_name">Jenis Kelamin</th>
                    <th scope="col">Laki-Laki</th>
                    <th scope="col">Perempuan</th>
                    <th scope="col">Jumlah</th>
                  </tr>
                </thead>
                <tbody id="barisjeniskelamin"></tbody>
              </table>
            </div>
            <div class="col-12 col-md-6" id="id_chart_2">
                <canvas id="jeniskelamin_chart" width="300" height="300"></canvas>
            </div>
          </div>        
        </div>
    </section>

    <section class="text-dark p-5" style="background-color: white">
      <div class="container">
        <div class="text-center">
          <p>Data Berdasarkan</p>
          <h1 style="font-weight: 600;">Pendidikan Terakhir</h1>
        </div>
        <div class="row mt-5">
          <div class="col-12 col-md-6" id="id_chart_3">
            <canvas id="pendidikan_chart" width="300" height="300"></canvas>
          </div>
          <div class="col-12 col-md-6 text-center">
            <table class="table">
              <thead style="background-color: #e7ecff">
                <tr>
                  <th scope="col">Pendidikan</th>
                  <th scope="col">Jumlah</th>
                </tr>
              </thead>
              <tbody id="barispendidikan"></tbody>
            </table>
          </div>    
        </div>     
      </div>
  </section>

  <section class="text-dark p-5">
    <div class="container">
      <div class="text-center">
        <p>Data Berdasarkan</p>
        <h1 style="font-weight: 600;">Jabatan Fungsional</h1>
      </div>
      <div class="row mt-5">
        <div class="col-12 col-md-6 text-center">
          <table class="table">
            <thead style="background-color: #e7ecff">
              <tr>
                <th scope="col" id="fungsional_table_name">Jabatan Fungsional</th>
                <th scope="col">Jumlah</th>
              </tr>
            </thead>
            <tbody id="barisfungsional"></tbody>
          </table>
        </div>
        <div class="col-12 col-md-6" id="id_chart_4">
            <canvas id="fungsional_chart" width="300" height="300"></canvas>
        </div>
      </div>    
    </div>
</section>

  <section class="text-dark p-5" style="background-color: white">
    <div class="container">
      <div class="text-center">
        <p>Data Berdasarkan</p>
        <h1 style="font-weight: 600;">Golongan</h1>
      </div>
      <div class="row mt-5">
        <div class="col-12 col-md-6" id="id_chart_5">
          <canvas id="golongan_chart" width="300" height="300"></canvas>
        </div>
        <div class="col-12 col-md-6 text-center">
          <table class="table">
            <thead style="background-color: #e7ecff">
              <tr>
                <th scope="col">Golongan</th>
                <th scope="col">Jumlah</th>
              </tr>
            </thead>
            <tbody id="barisgolongan"></tbody>
          </table>
        </div>       
      </div>     
    </div>
  </section>


  <script type="text/javascript">

    //Fungsi untuk menjalankan getDataDosen setelah halaman di load
    $(document).ready(function() { getDataDosen(); });

    //Fungsi untuk meload data berdasarkan tahun yang di pilih
    function selectTahun() {
        document.querySelector("select[name=fakultas]").value = '0';
        reloadProdi();
        //Reload div
        $("#maindata").load(window.location.href + " #maindata>*", "" );
        //Jalankan fungsi
        getDataDosen();
    }

    //Fungsi untuk meload data berdasarkan fakultas yang di pilih
    function selectFakultas() {
        document.querySelector("select[name=prodi]").value = '0';
        $("#maindata").load(window.location.href + " #maindata>*", "" );
        reloadProdi();
        getListProdi();
        getDataDosen();
    }

    //Fungsi untuk meload data berdasarkan prodi yang di pilih
    function selectProdi() {
        $("#maindata").load(window.location.href + " #maindata>*", "" );
        getDataDosen();
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
        $("#form-prodi").empty();
        $('#form-prodi').append('<label for="">Prodi</label><select class="form-select" aria-label="program studi" name="prodi" id="prodi" onchange="selectProdi()"><option value="0">- Semua -</option></select>');
    }

    //Fungsi mereload tabel berdasarkan jenis kelamin
    function reloadElement() {
        //Mengosongkan elemen
        $("#barisjeniskelamin").empty();
        $("#barispendidikan").empty();
        $("#barisfungsional").empty();
        $("#barisgolongan").empty();
        $("#id_chart_2").empty();
        $("#id_chart_3").empty();
        $("#id_chart_4").empty();
        $("#id_chart_5").empty();

        //Menambahkan ulang elemen
        $("#id_chart_2").append('<canvas id="jeniskelamin_chart"></canvas>');
        $("#id_chart_3").append('<canvas id="pendidikan_chart"></canvas>');
        $("#id_chart_4").append('<canvas id="fungsional_chart"></canvas>');
        $("#id_chart_5").append('<canvas id="golongan_chart"></canvas>');
        
    }

    //AJAX Untuk mendapatkan data
    function getDataDosen() {

        var tahun = $("select[name=tahun]").val();
        var fakultas = $("select[name=fakultas]").val();
        var prodi = $("select[name=prodi]").val();
        var token = $("input[name=_token]").val();

        $.ajax({
          type: 'POST',
          url: "/data/dosen",
          data: {
            prodi: prodi,
            fakultas: fakultas,
            tahun: tahun,
            _token: token
          },
          dataType: 'json',
          success: function(data) {
            reloadElement();
            prosesData(data, fakultas, prodi, tahun);
          }
        });
    }

    //Fungsi untuk memproses data yang telah didapatkan dari AJAX dan menampilkan dalam grafik
    function prosesData(e, b, pr, th) {

      let m = e;
      let nama = [];
      let dosen = [];
      let total_dosen = 0;
      let chart_kelamin = [];

      if (b == 0) {
          for (let i = 0; i < m.length; i++) {
            const t = m[i];
            total_dosen += t.dosen.length;
          }
          document.getElementById('totaldata').innerText = total_dosen;
          document.getElementById('jk_table_name').innerText = 'Fakultas';

          var lk = 0; var wn = 0;
          for (let i = 0; i < m.length; i++) {

            nama.push(m[i].name);
            dosen.push(m[i].dosen.length);
            jumlah_dosen = m[i].dosen_kelamin[0]+m[i].dosen_kelamin[1];
            lk += m[i].dosen_kelamin[0];
            wn += m[i].dosen_kelamin[1];

            //Menampilkan tabel jenis kelamin
            $('#barisjeniskelamin').append('<tr><td>'+m[i].singkatan+'</td><td>'+m[i].dosen_kelamin[0]+'</td><td>'+m[i].dosen_kelamin[1]+'</td><td><strong>'+jumlah_dosen+'</strong></td></tr>');
          }

          chart_kelamin.push(lk); chart_kelamin.push(wn);

          //Menampilkan data dalam tabel
          tampilkan_dalam_tabel(m);

      } else {

        document.getElementById('jk_table_name').innerText = 'Prodi';
        let n = e[b-1];
        let m = n.prodi;
        let temporary = [];
        if (pr == 0) {
          document.getElementById('totaldata').innerText = n.dosen.length;
        } else {
          for (let u = 0; u < m.length; u++) {
            const w = m[u];
            if (w.id == pr) {
              temporary.push(w);
              document.getElementById('totaldata').innerText = w.dosen.length;
            }   
          }
          m = temporary;
          n.prodi = temporary;
        }

        var lk = 0; var wn = 0;
        for (let i = 0; i < m.length; i++) {
          nama.push(m[i].nama);
          dosen.push(m[i].dosen.length);
          jumlah_dosen = m[i].dosen_kelamin[0]+m[i].dosen_kelamin[1];

          lk += m[i].dosen_kelamin[0];
          wn += m[i].dosen_kelamin[1];
          
          //Menampilkan tabel jenis kelamin
          $('#barisjeniskelamin').append('<tr><td>'+m[i].nama+'</td><td>'+m[i].dosen_kelamin[0]+'</td><td>'+m[i].dosen_kelamin[1]+'</td><td><strong>'+jumlah_dosen+'</strong></td></tr>');
        }

        chart_kelamin.push(lk); chart_kelamin.push(wn);

        //Menampilkan data dalam tabel
        tampilkan_dalam_tabel(m);

      }
      
      //Menampilkan chart paling atas
      tampilkan_chart_pertama(nama, dosen);
      
      //Menampilkan chart kelamin
      tampilkan_chart_lain(
        'jeniskelamin_chart',
        ['Laki-laki','Perempuan'],
        'Dosen berdasarkan jenis kelamin',
        ['rgb(255, 99, 132)','rgb(54, 162, 235)'],
        chart_kelamin,
      );

    }

    //FUNGSI UNTUK MENAMPILKAN DATA KE DALAM TABEL
    function tampilkan_dalam_tabel(arrays) {

      m = arrays;

      //Menampilkan tabel pendidikan
      let array_a = [{ kode: "1", nama: "S1" },{ kode: "2", nama: "S2" },{ kode: "3", nama: "S3" },{ kode: "4", nama: "PROFESOR" } ];
      let chart_data_1 = [];
      for (let x = 0; x < array_a.length; x++) {
        const na = array_a[x];
        var h = 0
        for (let y = 0; y < m.length; y++) {
          const el = m[y];
          h += el.dosen_pendidikan[na.kode];
        }
        chart_data_1.push(h);
        $('#barispendidikan').append('<tr><td>'+na.nama+'</td><td>'+h+'</td></tr>');
      }

      //Menampilkan chart pendidikan
      tampilkan_chart_lain(
        'pendidikan_chart',
        ['S1','S2','S3','PROFESOR'],
        'Dosen berdasarkan pendidikan terakhir',
        ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgba(153, 102, 255)', 'rgb(255, 140, 18)'],
        chart_data_1,
      );

      //Menampilkan tabel fungsional
      let array_b = [{ kode: "1", nama: "Asisten Ahli" },{ kode: "2", nama: "Lektor" },{ kode: "3", nama: "Lektor Kepala" },{ kode: "4", nama: "Guru Besar" } ];
      let chart_data_2 = [];
      for (let x = 0; x < array_b.length; x++) {
        const n = array_b[x]; var h = 0;
        for (let y = 0; y < m.length; y++) {
          const s = m[y];
          h += s.dosen_fungsional[n.kode];
        }
        chart_data_2.push(h);
        $('#barisfungsional').append('<tr><td>'+n.nama+'</td><td>'+h+'</td></tr>');
      }

      //Menampilkan chart fungsional
      tampilkan_chart_lain(
        'fungsional_chart',
        ['Asisten Ahli','Lektor','Lektor Kepala','Guru Besar'],
        'Dosen berdasarkan jabatan fungsional',
        ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgba(153, 102, 255)', 'rgb(255, 140, 18)'],
        chart_data_2,
      );
        
      //Menampilkan tabel golongan
      let array_c = [{ kode: "III/a", nama: "III/a" },{ kode: "III/b", nama: "III/b" },{ kode: "III/c", nama: "III/c" },{ kode: "III/d", nama: "III/d" }, { kode: "IV/a", nama: "IV/a" }, { kode: "IV/b", nama: "IV/b" }, { kode: "IV/c", nama: "IV/c" }, { kode: "IV/d", nama: "IV/d" }, { kode: "IV/e", nama: "IV/e" } ];
      let chart_data_3 = [];
      for (let x = 0; x < array_c.length; x++) {
        const n = array_c[x]; var h = 0;
        for (let y = 0; y < m.length; y++) {
          const s = m[y];
          h += s.dosen_golongan[n.kode];
        }
        chart_data_3.push(h);
        $('#barisgolongan').append('<tr><td>'+n.nama+'</td><td>'+h+'</td></tr>');
      }

      //Menampilkan chart golongan
      tampilkan_chart_lain(
        'golongan_chart',
        ['III/A', 'III/B', 'III/C', 'III/D', 'IV/A', 'IV/B', 'IV/C', 'IV/D', 'IV/E'],
        'Dosen berdasarkan golongan',
        [ 'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(153, 102, 255)', 'rgb(201, 203, 207)', 'rgb(255, 140, 18)', 'rgb(186, 2, 54)' ],
        chart_data_3,
      );
    }

    //FUNGSI MENAMPILKAN CHART PALING ATAS
    function tampilkan_chart_pertama(nama, dosen) {
      const ctx = document.getElementById('myChart');
      const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: nama,
              datasets: [{
                  label: 'Jumlah Dosen',
                  data: dosen,
                  backgroundColor: "yellow",
                  borderColor: "white",
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              indexAxis: 'y',
              scales: {
                  x: { ticks:{color: "white"}, grid:{color: "white"} },
                  y: { beginAtZero: true, ticks:{color: "white"}, grid:{display: false}
                }
              },
              plugins:{
                legend:{ display: false}
              }
          }
      });
    }

    //FUNGSI MENAMPILKAN CHART LAIN
    function tampilkan_chart_lain(a, b, c, d, e) {
      
      const chart = document.getElementById(a);
      const mychart = new Chart(chart, {
          type: 'pie',
          data: {
              labels: b,
              datasets: [{
                  label: c,
                  data: e,
                  backgroundColor: d,
                  borderColor: "white",
                  borderWidth: 1,
                  hoverOffset: 4
              }]
          },
          options: {
              responsive: false,
              plugins:{
                legend:{
                  display:true,
                  position: 'top'
                }
              }
          }
      });
      chart.style.margin = 'auto';
    }

  </script>

@endsection