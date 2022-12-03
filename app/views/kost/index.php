<div class="page-heading">
  <h2><?= $data["pageTitle"] ?></h2>
</div>

<div class="page-content">
  <div class="row">
    <div class="col-lg">
      <?php Flasher::flash() ?>
    </div>
  </div>

  <button type="button" class="btn btn-primary btnTambahKost" data-bs-toggle="modal" data-bs-target="#formModal">
    <i class="bi bi-plus-circle me-2"></i>Tambah
  </button>

  <!-- MODAL -->
  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="judulModalKost">Detail Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL ?>/kost/addKost" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_kost" id="id_kost">
            <div class="mb-3">
              <label for="nama_kost" class="form-label">Nama Kost</label>
              <input type="text" class="form-control" id="nama_kost" name="nama_kost" placeholder="Masukan nama kost"
                autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="id_owner" class="form-label">Pemilik Kost</label>
              <!-- <input type="text" class="form-control" name="gender_user" id="gender_user"
                placeholder="Masukan stok customer" autocomplete="off"> -->
              <select class="form-select" aria-label="Default select example" name="id_owner" id="id_owner">
                <!-- <option selected>Gender</option> -->
                <option value="none" class="text-secondary">Pilih pemilik kost</option>
                <?php foreach($data['owners'] as $kost): ?>
                <option value="<?= $kost['id_owner'] ?>"><?= $kost['nama_owner'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="kategori_kost" class="form-label">Kategori Kost</label>
              <select class="form-select" aria-label="Default select example" name="kategori_kost" id="kategori_kost">
                <option value="none">Pilih kategori kost</option>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
                <option value="campuran">Campuran</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="alamat_kost" class="form-label">Alamat Kost</label>
              <textarea class="form-control" name="alamat_kost" id="alamat_kost" placeholder="Masukan alamat kost"
                cols="30" rows="5" autocomplete="off"></textarea>
            </div>
            <div class="mb-3">
              <label for="fasilitas_kost" class="form-label">Fasilitas Kost</label>
              <textarea class="form-control" name="fasilitas_kost" id="fasilitas_kost"
                placeholder="Masukan alamat pemilik" cols="30" rows="5" autocomplete="off"></textarea>
            </div>

            <!-- <div class="mb-3">
              <label for="formFile" class="form-label">Upload Foto KTP</label>
              <img class="img-preview img-fluid mb-3 col-sm-5">
              <div class="frameFoto"><img src="" alt="" id="foto_ktp_owner" class="mb-1" width="100px"></div>
              <input class="form-control" type="file" name="foto_ktp_owner" id="foto_ktp_owner"
                onchange="previewImage()">
              <input type="hidden" name="foto_ktp_owner_old" id="foto_ktp_owner_old">
              <input type="hidden" name="foto_ktp_owner" id="fileFoto">
            </div> -->
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
            <th scope="col">Nama Kost</th>
            <th scope="col">Alamat Kost</th>
            <th scope="col">Nama Pemilik</th>
            <th scope="col">Kontak</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php $i = 1; ?>
          <?php foreach ($data["kost"] as $kost): ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $kost["nama_kost"] ?></td>
            <td scope="row"><?= $kost["alamat_kost"] ?></td>
            <td class="col-3 align-middle text-start"><?= $kost["nama_owner"] ?></td>
            <td class="col-3 align-middle text-start"><?= $kost["no_tlp_owner"] ?></td>
            <td class="aksi">
              <a href="<?= BASEURL; ?>/kost/editKost/<?= $kost['id_kost'] ?>" data-bs-toggle="modal"
                data-bs-target="#formModal" class="tampilModalUbahKost" data-id="<?= $kost['id_kost'] ?>"><button
                  class="btn btn-outline-primary me-2"><i class=" bi bi-pencil-fill"></i></button></a>
              <a href="<?= BASEURL ?>/kost/deleteKost/<?= $kost['id_kost'] ?>"
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

<script src="<?= BASEURL ?>/js/script.js"></script>