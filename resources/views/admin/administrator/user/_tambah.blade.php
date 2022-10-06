
<form action="/admin/user" method="POST">
    @csrf
    <div class="mt-3">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal2" id="btnModalShows" hidden>Launch modal</button>
  
      <!-- Modal -->
      <div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Pengguna</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
  
              <div class="row">
                <div class="col mb-3">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="name" class="form-label">NAMA PENGGUNA</label>
                      <input class="form-control" type="text" name="name" id="name">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="username" class="form-label">USERNAME</label>
                      <input class="form-control" type="username" name="username" id="username">
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col mb-3">
                      <label for="role" class="form-label">ROLE</label>
                      <select class="form-select" name="role" id="role">
                        <option value="0">Pilih...</option>
                        <option value="4">Fakultas</option>
                        <option value="5">Program Studi</option>
                      </select>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col mb-3">
                      <label for="fakultas" class="form-label">FAKULTAS (PILIH JIKA MEMBUAT USER DEKAN)</label>
                      <select class="form-select" name="fakultas" id="fakultas">
                        <option value="0">Pilih...</option>
  
                        @foreach ($fakultas as $faculty)
                        <option value="{{$faculty->code}}">{{$faculty->singkatan}}</option>
                        @endforeach
  
                      </select>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col mb-3">
                      <label for="password" class="form-label">password</label>
                      <input class="form-control" type="password" name="password" id="password">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="password2" class="form-label">ulangi password</label>
                      <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
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