<div class="page-heading">
  <h2><?= $data["pageTitle"] ?></h2>
</div>
<div class="page-content">

  <div class="row">
    <div class="col-lg">
      <?php Flasher::flash() ?>
    </div>
  </div>

  <button type="button" class="btn btn-primary tambahOwner" data-bs-toggle="modal" data-bs-target="#formModal">
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
          <form action="<?= BASEURL ?>/users/addOwner" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_owner" id="id_owner">
            <div class="mb-3">
              <label for="nama_owner" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama_owner" name="nama_owner"
                placeholder="Masukan nama pemilik" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="gender_owner" class="form-label">Gender</label>
              <select class="form-select" aria-label="Default select example" name="gender_owner" id="gender_owner">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="tgl_lahir_owner" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" id="tgl_lahir_owner" name="tgl_lahir_owner"
                placeholder="Masukan tanggal lahir" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="alamat_rumah_owner" class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat_rumah_owner" id="alamat_rumah_owner"
                placeholder="Masukan alamat pemilik" cols="30" rows="5" autocomplete="off"></textarea>
            </div>
            <div class="mb-3">
              <label for="no_tlp_owner" class="form-label">No Telepon</label>
              <input type="text" class="form-control" name="no_tlp_owner" id="no_tlp_owner"
                placeholder="Masukan no telepon pemilik" autocomplete="off">
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
              <!-- <div class="frameFoto"><img src="" alt="" id="foto_ktp_owner" class="mb-1" width="100px"></div> -->
              <input class="form-control" type="file" name="foto_ktp_owner" id="foto_ktp_owner"
                onchange="previewImage()">
              <input type="hidden" name="foto_ktp_owner_old" id="foto_ktp_owner_old">
              <!-- <input type="hidden" name="foto_ktp_owner" id="fileFoto"> -->
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
        class="table bg-white rounded shadow-sm table-hover align-middle table-responsive table-bordered text-center">
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
          <?php foreach ($data["owners"] as $owner): ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $owner["nama_owner"] ?></td>
            <td scope="row"><?= $owner["tgl_lahir_owner"] ?></td>
            <td class="col-3 align-middle text-start"><?= $owner["alamat_rumah_owner"] ?></td>
            <td class="aksi">
              <a href="<?= BASEURL; ?>/owners/editOwner/<?= $owner['id_owner'] ?>" data-bs-toggle="modal"
                data-bs-target="#formModal" class="tampilModalUbahOwner" data-id="<?= $owner['id_owner'] ?>"><button
                  class="btn btn-outline-primary me-2"><i class=" bi bi-pencil-fill"></i></button></a>
              <a href="<?= BASEURL ?>/owners/deleteOwner/<?= $owner['id_owner'] ?>"
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
</div>

<script>
function previewImage() {
  const image = document.querySelector('#foto_ktp_owner');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const blob = URL.createObjectURL(image.files[0]);
  imgPreview.src = blob;
}
// console.log('test');
</script>