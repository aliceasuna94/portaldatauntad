{{-- menampilkan tabel dosen --}}
<div class="card">
    <div class="row">
      <div class="col-sm"><h5 class="card-header">Rincian Dosen</h5></div>
      <div class="col-sm mt-3" style="text-align: right">
        <button type="button" class="btn btn-primary" style="margin-right: 15px" onclick="openModal()"><i class='bx bx-plus mt-n1'></i> Tambah Dosen</button></div>
    </div>
  
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Dosen</th>
            <th>Pendidikan</th>
            <th>Kelamin</th>
            <th>Jab. Fungsional</th>
            <th>Golongan</th>
            <th>Upload</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          
          @foreach ($dosen as $ds)
          <tr>
            <td>
              <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper">
                  <div class="avatar avatar-sm me-3">
                    <img src="/images/no-profile-picture-icon-1.png" alt="Avatar" class="rounded-circle">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <span class="fw-semibold">{{ucwords($ds->nama)}}</span>
                      <small class="text-muted">{{$ds->nidn}}</small>
                <div>
              </div>
            </td>
            <td>
              @if ($ds->pendidikan == 1)
                S1
                @elseif($ds->pendidikan == 2)
                S2
                @elseif($ds->pendidikan == 3)
                S3
                @elseif($ds->pendidikan == 4)
                PROFESOR
              @endif       
            </td>
            <td>@if($ds->kelamin === 1) Laki-Laki @else Perempuan @endif</td>
            <td>
                @if ($ds->fungsional == 1)
                Asisten Ahli
                @elseif($ds->fungsional == 2)
                Lektor
                @elseif($ds->fungsional == 3)
                Lektor Kepala
                @elseif($ds->fungsional == 4)
                Guru Besar
                @endif
            </td>
            <td>{{$ds->golongan}}</td>
            <td>
              @if($ds->upload !== '')
              <div class="d-inline-block text-nowrap">
                <a href="{{ Storage::url($ds->upload) }}" target="_blank"><button data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Lihat Dokumen</span>" class="btn btn-sm btn-icon delete-record" onclick=""><i class="bx bx-file"></i></button></a>
              </div>
              @endif
            </td>
            <td>
              <div class="d-inline-block text-nowrap">
                <form action="/prodi/data/dosen" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" id="id" value="{{ $ds->id }}" hidden>
                <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Hapus</span>"  class="btn btn-sm btn-icon delete-record" onclick="return confirm('Yakin menghapus dosen ?')"><i class="bx bx-trash"></i></button>
                </form>
                
              </div>
            </td>
          </tr>
          @endforeach

          @if (count($dosen) < 1)
             <tr>
                <td colspan="7" class="text-center">
                    Tidak ada dosen.
                </td>
            </tr>
          @endif

        </tbody>
      </table>
    </div>
  </div>
  
  <!-- MENAMPILKAN MODAL INPUT ISIAN KHUSUS EVALUASI TAMBAHAN -->
  <form action="/prodi/data/dosen" method="POST" enctype="multipart/form-data">
    @csrf
  
    <div class="mt-3">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal2" id="btnModalShows" hidden>Launch modal</button>
  
      <!-- Modal -->
      <div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Dosen</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
  
              <div class="row">
                <div class="col mb-3">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nidn" class="form-label">NIDN</label>
                      <input class="form-control" type="text" name="nidn" id="nidn">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nama" class="form-label">NAMA DOSEN</label>
                      <input class="form-control" type="text" name="nama" id="nama">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="kelamin" class="form-label">JENIS KELAMIN</label>
                      <select class="form-control" name="kelamin" id="kelamin">
                        <option value="">Pilih...</option>
                        <option value="0">Laki-Laki</option>
                        <option value="1">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="pendidikan" class="form-label">PENDIDIKAN TERAKHIR</label>
                      <select class="form-control" name="pendidikan" id="pendidikan">
                        <option value="">Pilih...</option>
                        <option value="1">S1</option>
                        <option value="2">S2</option>
                        <option value="3">S3</option>
                        <option value="4">PROFESOR</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="fungsional" class="form-label">JABATAN FUNGSIONAL</label>
                      <select class="form-control" name="fungsional" id="fungsional">
                        <option value="">Pilih...</option>
                        <option value="1">Asisten Ahli</option>
                        <option value="2">Lektor</option>
                        <option value="3">Lektor Kepala</option>
                        <option value="4">Guru Besar</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="golongan" class="form-label">GOLONGAN</label>
                      <select class="form-control" name="golongan" id="golongan">
                        <option value="">Pilih...</option>
                        <option value="III/a">III/a</option>
                        <option value="III/b">III/b</option>
                        <option value="III/c">III/c</option>
                        <option value="III/d">III/d</option>
                        <option value="IV/a">IV/a</option>
                        <option value="IV/b">IV/b</option>
                        <option value="IV/c">IV/c</option>
                        <option value="IV/d">IV/d</option>
                        <option value="IV/e">IV/e</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="upload" class="form-label">SK DOSEN / SK PNS (PDF)</label>
                      <input class="form-control" accept="application/pdf" type="file" id="upload" name="upload">
                    </div>
                  </div>
                </div>
              </div>
  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  
  <script>
  
  function openModal() {
    document.getElementById('btnModalShows').click();
  }
  
  </script>