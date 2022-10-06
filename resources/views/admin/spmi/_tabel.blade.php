<div class="card">
    <h5 class="card-header">{{ucfirst($url)}}</h5>
    <div class="table-responsive text-wrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nama Pengaturan</th>
            <th>Pilihan</th>
            <th>Ditambahkan</th>
            <th>Validasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($pengaturan->sub_pengaturan as $data)
            <tr>
                <td>{{ $data->judul }}</td>

                @if ($data->isian != null)
                    <td>
                        @if ($data->isian['jawaban'] == 1)
                        <span class="badge bg-label-success me-1">Ada</span>
                        @else
                        <span class="badge bg-label-warning me-1">Tidak Ada</span>
                        @endif
                    </td>
                    <td>{{ substr($data->isian['created_at'], 0, 10) }}</td>
                    <td>
                        @if ($data->isian['verifikasi'] == 0)
                            <span class="badge bg-label-primary me-1">Not Validated</span>
                        @elseif($data->isian['verifikasi'] == 1)
                            <span class="badge bg-label-success me-1">Accepted</span>
                        @else
                            <span class="badge bg-label-danger me-1">Rejected</span>
                        @endif
                    </td>
                    <td style="width: 100px">
                        <button type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Tampilkan</span>" class="btn btn-sm btn-icon btn-primary" data-pengaturan="{{ $data }}" onclick="tampilkanPengaturan(this)">
                        <span class="tf-icons bx bxs-show"></span></button>
        
                        <button type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Tambah / Edit</span>" class="btn btn-sm btn-icon btn-primary" data-pengaturan="{{ $data }}" onclick="openModalTambahIsian(this)"><span class="tf-icons bx bx-edit-alt"></span></button>
                    </td>
                @else
                    <td colspan="3">
                        <span style="font-style: italic">Belum mengisi</span>
                    </td>
                    <td style="width: 100px">
                        <button type="button" class="btn btn-sm btn-icon btn-primary" disabled>
                            <span class="tf-icons bx bxs-show"></span>
                        </button>
                        <button type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Tambah / Edit</span>" class="btn btn-sm btn-icon btn-primary" data-pengaturan="{{ $data }}" onclick="openModalTambahIsian(this)"><span class="tf-icons bx bx-edit-alt"></span></button>
                    </td>
                @endif
                
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
</div>