<div class="row fv-plugins-icon-container">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">Rincian Jumlah Mahasiswa</h5>
  
        <form action="/prodi/data/mahasiswa" method="POST" enctype="multipart/form-data">
         @csrf
        <!-- Account -->
        <hr class="my-0">
        <div class="card-body">
          
            <div class="row">
  
              <div class="mb-3 col-md-6">
                <label for="mahasiswabaru" class="form-label">Mahasiswa Baru</label>
                <input class="form-control" type="number" id="mahasiswabaru" name="baru" value="{{$mahasiswa->baru ?? 0}}">
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="upload_mahasiswabaru" class="form-label">UPLOAD SK MAHASISWA BARU (OPSIONAL)</label>
                <div class="input-group">
                  <input type="file" accept="application/pdf" class="form-control" id="upload_mahasiswabaru" name="upload1">
                  @if ($mahasiswa->upload1 ?? 0)
                    <a href="{{ Storage::url($mahasiswa->upload1)}}"><button class="btn btn-primary" type="button"><span class="tf-icons bx bx-show"></span></button></a>
                  @endif
                </div>
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="mahasiswaaktif" class="form-label">Mahasiswa Aktif</label>
                <input class="form-control" type="number" id="mahasiswaaktif" name="aktif" value="{{$mahasiswa->aktif ?? 0}}">
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="upload_mahasiswaaktif" class="form-label">UPLOAD SK MAHASISWA AKTIF (OPSIONAL)</label>
                <div class="input-group">
                  <input type="file" accept="application/pdf" class="form-control" id="upload_mahasiswaaktif" name="upload2">
                  @if ($mahasiswa->upload2 ?? 0)
                    <a href="{{Storage::url($mahasiswa->upload2)}}"><button class="btn btn-primary" type="button"><span class="tf-icons bx bx-show"></span></button></a>
                  @endif
                </div>
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="mahasiswanonaktif" class="form-label">Mahasiswa Non-Aktif</label>
                <input class="form-control" type="number" id="mahasiswanonaktif" name="nonaktif" value="{{$mahasiswa->nonaktif ?? 0}}">
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="upload_mahasiswanonaktif" class="form-label">UPLOAD SK MAHASISWA NON-AKTIF (OPSIONAL)</label>
                <div class="input-group">
                  <input type="file" accept="application/pdf" class="form-control" id="upload_mahasiswanonaktif" name="upload3">
                  @if ($mahasiswa->upload3 ?? 0)
                    <a href="{{Storage::url($mahasiswa->upload3)}}"><button class="btn btn-primary" type="button"><span class="tf-icons bx bx-show"></span></button></a>
                  @endif
                </div>
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="mahasiswacuti" class="form-label">Mahasiswa Cuti</label>
                <input class="form-control" type="number" id="mahasiswacuti" name="cuti" value="{{$mahasiswa->cuti ?? 0}}">
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="upload_mahasiswacuti" class="form-label">UPLOAD SK MAHASISWA CUTI (OPSIONAL)</label>
                <div class="input-group">
                  <input type="file" accept="application/pdf" class="form-control" id="upload_mahasiswacuti" name="upload4">
                  @if ($mahasiswa->upload4 ?? 0)
                    <a href="{{Storage::url($mahasiswa->upload4)}}"><button class="btn btn-primary" type="button"><span class="tf-icons bx bx-show"></span></button></a>
                  @endif
                </div>
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="mahasiswalulus" class="form-label">Mahasiswa Lulus</label>
                <input class="form-control" type="number" id="mahasiswalulus" name="lulus" value="{{$mahasiswa->lulus ?? 0}}">
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="upload_mahasiswalulus" class="form-label">UPLOAD SK MAHASISWA LULUS (OPSIONAL)</label>
                <div class="input-group">
                  <input type="file" accept="application/pdf" class="form-control" id="upload_mahasiswalulus" name="upload5">
                  @if ($mahasiswa->upload5 ?? 0)
                    <a href="{{Storage::url($mahasiswa->upload5)}}"><button class="btn btn-primary" type="button"><span class="tf-icons bx bx-show"></span></button></a>
                  @endif
                </div>
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="mahasiswatepatwaktu" class="form-label">Mahasiswa Lulus Tepat Waktu</label>
                <input class="form-control" type="number" id="mahasiswatepatwaktu" name="tepat_waktu" value="{{$mahasiswa->tepat_waktu ?? 0}}">
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="upload_mahasiswatepatwaktu" class="form-label">UPLOAD SK MAHASISWA LULUS TEPAT WAKTU (OPSIONAL)</label>
                <div class="input-group">
                  <input type="file" accept="application/pdf" class="form-control" id="upload_mahasiswatepatwaktu" name="upload6">
                  @if ($mahasiswa->upload6 ?? 0)
                    <a href="{{Storage::url($mahasiswa->upload6)}}"><button class="btn btn-primary" type="button"><span class="tf-icons bx bx-show"></span></button></a>
                  @endif 
                </div>
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="mahasiswabidikmisi" class="form-label">Mahasiswa Bidikmisi</label>
                <input class="form-control" type="number" id="mahasiswabidikmisi" name="bidikmisi" value="{{$mahasiswa->bidikmisi ?? 0}}">
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="upload_mahasiswabidikmisi" class="form-label">UPLOAD SK MAHASISWA LULUS (OPSIONAL)</label>
                <div class="input-group">
                  <input type="file" accept="application/pdf" class="form-control" id="upload_mahasiswabidikmisi" name="upload7">
                  @if ($mahasiswa->upload7 ?? 0)
                    <a href="{{Storage::url($mahasiswa->upload7)}}"><button class="btn btn-primary" type="button"><span class="tf-icons bx bx-show"></span></button></a>
                  @endif
                </div>
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="mahasiswatugasakhir" class="form-label">Mahasiswa Tugas Akhir</label>
                <input class="form-control" type="number" id="mahasiswatugasakhir" name="tugas_akhir" value="{{$mahasiswa->tugas_akhir ?? 0}}">
              </div>
  
              <div class="mb-3 col-md-6">
                <label for="upload_mahasiswatugasakhir" class="form-label">UPLOAD SK TUGAS AKHIR (OPSIONAL)</label>
                <div class="input-group">
                  <input type="file" accept="application/pdf" class="form-control" id="upload_mahasiswatugasakhir" name="upload8">
                  @if ($mahasiswa->upload8 ?? 0)
                    <a href="{{Storage::url($mahasiswa->upload8)}}"><button class="btn btn-primary" type="button"><span class="tf-icons bx bx-show"></span></button></a>
                  @endif
                </div>
              </div>
  
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
            </div>
          <div></div>
        </div>
        <!-- /Account -->
      </form>
  
      </div>
  
    </div>
  </div>