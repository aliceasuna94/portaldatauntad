@extends('portaldata.template')

@section('content')

      <section class="text-light p-5" style="background-color: #091392">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
      
                  <!-- Heading -->
                  <h1>Data SPMI</h1>
      
                  <!-- Text -->
                  <p class="fs-lg text-gray-700 mb-7 mb-md-9">
                    Sistem Penjaminan Mutu Internal
                  </p>
      
                </div>
                <form>
                  {{ csrf_field() }}
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
                      <button type="button" name="submit" id="submit" hidden>SUBMIT</button>
                </div>
                </form>
                <div class="row mt-5" id="maindata">
                    <div class="col-md-4 text-center">
                        <h1 style="font-size: 50pt" id="totaldata">0</h1>
                        <h3>Program Studi</h3><br>
                        <h1 style="font-size: 50pt" id="totalfakultas">0</h1>
                        <h3>Fakultas</h3>
                    </div>
                    <div class="col-md-8">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
              </div>
        </div>
    </section>

    <section class="text-dark py-5 px-2">
        <div class="container">
          <div class="text-center">
            <p>Data Berdasarkan</p>
            <h1 style="font-weight: 600;">Kelengkapan Pengisian</h1>
          </div>
          <div class="row mt-5">
            <div class="col-md-12 text-left">
              <div class="table-responsive">
                <table class="table">
                  <thead style="background-color: #e7ecff">
                    <tr>
                      <th scope="col" width="120">Fakultas</th>
                      <th scope="col">Prodi</th>
                      <th scope="col">Pengisian</th>
                      <th scope="col">Terverifikasi</th>
                    </tr>
                  </thead>
                  <tbody id="barisprofil">
                    
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>  
        </div>
    </section>



  <script type="text/javascript">

    $(document).ready(function() {
      getDataSPMI();
    });

    function selectTahun() {
        document.querySelector("select[name=fakultas]").value = '0';
        $("#maindata").load(window.location.href + " #maindata>*", "" );
        $("#barisprofil").empty();
        getDataSPMI();
    }

    function selectFakultas() {
        $("#maindata").load(window.location.href + " #maindata>*", "" );
        $("#barisprofil").empty();
        getDataSPMI();
    }

    function getDataSPMI() {
        var tahun = $("select[name=tahun]").val();
        var fakultas = $("select[name=fakultas]").val();
        var token = $("input[name=_token]").val();
        $.ajax({
          type: 'POST',
          url: "{{ route('portal-spmi-get') }}",
          data: {
            fakultas: fakultas,
            tahun: tahun,
            _token: token
          },
          dataType: 'json',
          success: function(data) {
            console.log(data);
            prosesData(data);
          }
        });
    }

    function prosesData(e) {

      var fakultas = $("select[name=fakultas]").val();
      let m = e.data;
      let total_sub = e.total_subs;
      let nama = [];
      let persen = [];
      let total_prodi = 0;
 
      if (fakultas != 0) {
        var w = [];
        for (let i = 0; i < m.length; i++) {
          if (m[i].code == fakultas) {
            w.push(m[i]);
          }
        }
        m = w;
      }

      console.log(m);

      for (let c = 0; c < m.length; c++) {
        nama.push(m[c].name);
        persen.push(Math.round((m[c].isian_jumlah / m[c].jumlah_prodi) / total_sub * 100));
        total_prodi += m[c].jumlah_prodi;

        let prodi = m[c].prodi;
        for (let f = 0; f < prodi.length; f++) {
          const x = prodi[f];

          var pengisian = '<div class="progress"><div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: '+Math.round(x.isian_jumlah / total_sub * 100)+'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>';

          var terverifikasi = '<div class="progress"><div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: '+Math.round(x.isian_jawaban_verifikasi_diterima / total_sub * 100)+'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>';

          var tabels = '<tr><td>'+m[c].singkatan+'</td><td>'+x.nama+'</td><td>'+pengisian+'</td><td>'+terverifikasi+'</td></tr>';

          $('#barisprofil').append(tabels);
        }
      }

      document.getElementById('totaldata').innerText = total_prodi;
      document.getElementById('totalfakultas').innerText = m.length;
      
      //Chart paling atas
      const ctx = document.getElementById('myChart');
      const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: nama,
              datasets: [{
                  label: 'Persentase Pengisian SPMI',
                  data: persen,
                  backgroundColor: "yellow",
                  borderColor: "white",
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              indexAxis: 'y',
              scales: {
                  x: { ticks:{ color: "white" }, grid:{ color: "white" }, min: 0, max: 100 },
                  y: { beginAtZero: true, ticks:{ color: "white" }, grid:{ display: false } }
              },
              plugins:{ legend:{ display: false } }
          }
      });
    }

  </script>

@endsection