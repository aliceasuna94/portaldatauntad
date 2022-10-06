<div class="col-md-6">
    <div class="card">
          <h5 class="card-header">Daftar Periode</h5>
      
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Tahun Periode</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              
              @foreach ($periode as $p)
              <tr>
                <td>{{$p->tahun ?? ''}}</td>
                <td>
                  <div class="d-inline-block text-nowrap">
                    <form action="/admin/periode" method="post">
                        @csrf @method('delete')
                        <input type="hidden" name="id" value="{{ $p->id }}">
                        <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Hapus</span>" class="btn btn-sm btn-icon delete-record" onclick="return confirm('Yakin menghapus periode ini ?')"><i class="bx bx-trash"></i></button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
      
            </tbody>
          </table>
        </div>
      </div>
</div>