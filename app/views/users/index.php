<div class="page-heading">
  <h2><?= $data["pageTitle"] ?></h2>
</div>

<div class="row">
  <div class="col-lg">
    <?php Flasher::flash() ?>
  </div>
</div>

<button type="button" class="btn btn-primary tambahUser" data-bs-toggle="modal" data-bs-target="#formModal">
  <i class="bi bi-plus-circle me-2"></i>Tambah
</button>

<!-- MODAL -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="judulModal">Detail Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/users/addUser" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_user" id="id_user">
          <div class="mb-3">
            <label for="nama_user" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukan nama user"
              autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="gender_user" class="form-label">Gender</label>
            <!-- <input type="text" class="form-control" name="gender_user" id="gender_user"
                placeholder="Masukan stok customer" autocomplete="off"> -->
            <select class="form-select" aria-label="Default select example" name="gender_user" id="gender_user">
              <!-- <option selected>Gender</option> -->
              <option value="pria">Pria</option>
              <option value="wanita">Wanita</option>
              <!-- <option value="3">Three</option> -->
            </select>
          </div>
          <div class="mb-3">
            <label for="tgl_lahir_user" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir_user" name="tgl_lahir_user"
              placeholder="Masukan tanggal lahir" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="alamat_rumah_user" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat_rumah_user" id="alamat_rumah_user"
              placeholder="Masukan alamat user" cols="30" rows="5" autocomplete="off"></textarea>
          </div>
          <div class="mb-3">
            <label for="no_tlp_user" class="form-label">No Telepon</label>
            <input type="text" class="form-control" name="no_tlp_user" id="no_tlp_user"
              placeholder="Masukan no telepon user" autocomplete="off">
          </div>
          <!-- <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Masukan stok customer"
                autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password"
                placeholder="Masukan password customer" autocomplete="off">
            </div> -->
          <div class="mb-3">
            <label for="formFile" class="form-label">Upload Foto KTP</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <!-- <div class="frameFoto"><img src="" alt="" id="foto_ktp_user" class="mb-1" width="100px"></div> -->
            <input class="form-control" type="file" name="foto_ktp_user" id="foto_ktp_user" onchange="previewImage()">
            <input type="hidden" name="foto_ktp_user_old" id="foto_ktp_user_old">
            <!-- <input type="hidden" name="foto_ktp_user" id="fileFoto"> -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary hilangButton" name="submit">Tambah Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <table
      class="table bg-white rounded shadow-sm table-hover align-middle table-responsive table-bordered text-center w-100">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Alamat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php $i = 1; ?>
        <?php foreach ($data["users"] as $user): ?>
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $user["nama_user"] ?></td>
          <td scope="row"><?= $user["tgl_lahir_user"] ?></td>
          <td class="col-3 align-middle text-start"><?= $user[
                "alamat_rumah_user"
            ] ?></td>
          <td class="aksi">
            <a href="<?= BASEURL; ?>/users/editUser/<?= $user['id_user'] ?>" data-bs-toggle="modal"
              data-bs-target="#formModal" class="tampilModalUbah" data-id="<?= $user['id_user'] ?>"><button
                class="btn btn-outline-primary me-2"><i class=" bi bi-pencil-fill"></i></button></a>
            <a href="<?= BASEURL ?>/users/deleteUser/<?= $user['id_user'] ?>"
              onclick="return confirm('Yakin hapus data?');"><button class=" btn btn-outline-danger"><i
                  class="bi bi-trash-fill"></i></button></a>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
function previewImage() {
  const image = document.querySelector('#foto_ktp_user');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const blob = URL.createObjectURL(image.files[0]);
  imgPreview.src = blob;
}
</script>