
<div class="card">
    <div class="row">
      <div class="col-sm"><h5 class="card-header">Daftar User</h5></div>
      <div class="col-sm mt-3" style="text-align: right">
        <button type="button" class="btn btn-primary" style="margin-right: 15px" onclick="openModal()"><i class='bx bx-plus mt-n1'></i> Tambah Pengguna</button></div>
    </div>
  
    <div class="table-responsive text-wrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Account Linked</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          
          @foreach ($user as $u)
          <tr>
            <td>{{ucwords($u->name) ?? ''}}</td>
            <td>{{ $u->username ?? ''}}</td>
            <td>
                @if ($u->role)
                    @if ($u->role == 1)
                    <span class="badge bg-label-success">Administrator</span>
                    @elseif($u->role == 2)
                    <span class="badge bg-label-secondary">Universitas</span>
                    @elseif($u->role == 3)
                    <span class="badge bg-label-secondary">Rektor</span>
                    @elseif($u->role == 4)
                    <span class="badge bg-label-secondary">Dekan</span> <span class="badge bg-label-info">{{ $u->faculty['singkatan'] }}</span>
                    @elseif($u->role == 5)
                    <span class="badge bg-label-primary">Prodi</span>
                    @else
                      Tidak Ada   
                    @endif
                @endif
            </td>
            <td><span class="badge bg-label-primary">{{ $u->prodi['nama']}}</span></td>
            <td>
              <div class="d-inline-block text-nowrap">
                <button data-user="{{ $u }}" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Reset Password</span>" class="btn btn-sm btn-icon delete-record" onclick="resetPassword(this)"><i class='bx bx-lock-open-alt'></i></button>
  
                <button data-user="{{ $u }}" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Edit</span>" class="btn btn-sm btn-icon delete-record" onclick="editUser(this)"><i class="bx bx-edit"></i></button>
                
                <form action="/admin/user" method="post" style="display: contents">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="id" value="{{ $u->id }}" required>
                  <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Hapus</span>" class="btn btn-sm btn-icon delete-record" onclick="return confirm('Yakin menghapus akun ini?')"><i class="bx bx-trash"></i></button>
                </form>
  
              </div>
            </td>
          </tr>
          @endforeach
  
        </tbody>
      </table>
    </div>
  </div>
