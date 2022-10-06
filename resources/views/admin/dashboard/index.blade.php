@extends('admin.layout.index')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Dashboard </h4>


<div class="row">

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Mahasiswa Baru</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $mahasiswa['baru'] ?? 0 }}</h4>
              </div>
              <small>Angkatan Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-success rounded p-2">
                <i class="bx bx-trending-up bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Mahasiswa Aktif</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $mahasiswa['aktif'] ?? 0 }}</h4>
              </div>
              <small>Aktif Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-primary rounded p-2">
                <i class="bx bx-user bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Mahasiswa Nonaktif</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $mahasiswa['nonaktif'] ?? 0 }}</h4>
              </div>
              <small>Nonaktif Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-danger rounded p-2">
                <i class="bx bx-x-circle bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Mahasiswa Cuti</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $mahasiswa['cuti'] ?? 0 }}</h4>
                
              </div>
              <small>Cuti Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-warning rounded p-2">
                <i class="bx bx-time-five bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Mahasiswa Lulus</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $mahasiswa['lulus'] ?? 0 }}</h4>
              </div>
              <small>Lulus Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-primary rounded p-2">
                <i class="bx bx-user bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Lulus Tepat Waktu</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $mahasiswa['tepat_waktu'] ?? 0 }}</h4>
              </div>
              <small>Tepat Waktu Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-primary rounded p-2">
                <i class="bx bx-user bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Mahasiswa Bidikmisi</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $mahasiswa['bidikmisi'] ?? 0 }}</h4>
              </div>
              <small>Bidikmisi Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-primary rounded p-2">
                <i class="bx bx-user bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Mahasiswa Tugas Akhir</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $mahasiswa['tugas_akhir'] ?? 0 }}</h4>
              </div>
              <small>Skripsi Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-primary rounded p-2">
                <i class="bx bx-user bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Jumlah Dosen</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">{{ $dosen['jumlah'] }}</h4>
              </div>
              <small>Total Dosen Tahun {{$periode ?? null}}</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-primary rounded p-2">
                <i class="bx bx-user-circle bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Dosen Magister</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">0</h4>
              </div>
              <small>Dosen Lulusan S2</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-secondary rounded p-2">
                <i class="bx bx-user-circle bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Dosen Doctoral</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">0</h4>
              </div>
              <small>Dosen Lulusan S3</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-warning rounded p-2">
                <i class="bx bx-user-circle bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="card-info">
              <p class="card-text">Dosen Profesor</p>
              <div class="d-flex align-items-end mb-2">
                <h4 class="card-title mb-0 me-2">0</h4>
              </div>
              <small>Dosen Profesor</small>
            </div>
            <div class="card-icon">
              <span class="badge bg-label-success rounded p-2">
                <i class="bx bx-user-circle bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection