
<div class="card">
    <div class="row">
      <div class="col-sm"><h5 class="card-header">Daftar Prodi</h5></div>
      <div class="col-sm mt-3" style="text-align: right">
        <button type="button" class="btn btn-primary" style="margin-right: 15px" onclick="tambahProdi()"><i class='bx bx-plus mt-n1'></i> Tambah Prodi</button></div>
    </div>
  
    <div class="table-responsive text-wrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Kode Prodi</th>
            <th>Nama Prodi</th>
            <th>Fakultas</th>
            <th>Jenjang</th>
            <th>User Linked</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          
          @foreach ($prodi as $p)
          <tr>
            <td>{{ $p->kode ?? ''}}</td>
            <td>{{ ucwords($p->nama) ?? ''}}</td>
            <td>{{ $p->faculty['singkatan'] ?? ''}}</td>
            <td>{{ $p->jenjang ?? ''}}</td>
            
            <td><span class="badge bg-label-primary">{{ $p->users['username']}}</span></td>
            <td>
              <div class="d-inline-block text-nowrap">
  
                <button data-user="{{ $p }}" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Sambungkan Akun</span>" class="btn btn-sm btn-icon delete-record" onclick="linkAccount(this)"><i class="bx bx-link-alt"></i></button>
                
                <form action="/admin/prodi" method="post" style="display: contents">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="id" value="{{ $p->id }}" required>
                  <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Hapus</span>" class="btn btn-sm btn-icon delete-record" onclick="return confirm('Yakin menghapus prodi ini?')"><i class="bx bx-trash"></i></button>
                </form>
  
              </div>
            </td>
          </tr>
          @endforeach
  
        </tbody>
      </table>
    </div>
  </div>