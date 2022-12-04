<div class="page-heading">
  <h2><?= $data["pageTitle"] ?></h2>
</div>

<!-- MODAL KOST -->
<div class="modal fade" id="modalKost" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
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

<!-- MODAL KAMAR KOST -->
<div class="modal fade" id="tampilModalUbahKamarKost" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="judulModalKost">Detail Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/kost/addKamarKost" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_kost" id="id_kost" value="<?= $data['detailKost']['id_kost'] ?>">
          <input type="hidden" name="id_kamar" id="id_kamar">
          <div class="mb-3">
            <label for="no_kamar" class="form-label">No Kamar</label>
            <input type="numeric" class="form-control" id="no_kamar" name="no_kamar" placeholder="Masukan nomor kamar"
              autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="fasilitas_kamar" class="form-label">Fasilitas Kamar</label>
            <textarea class="form-control" name="fasilitas_kamar" id="fasilitas_kamar"
              placeholder="Masukan fasilitas kamar" cols="30" rows="5" autocomplete="off"></textarea>
          </div>
          <div class="mb-3">
            <label for="kapasitas_kamar" class="form-label">Kapasitas Kamar</label>
            <input type="numeric" class="form-control" id="kapasitas_kamar" name="kapasitas_kamar"
              placeholder="Masukan kapasitas kamar" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="harga_kamar" class="form-label">Harga Kamar</label>
            <input type="numeric" class="form-control" id="harga_kamar" name="harga_kamar"
              placeholder="Masukan harga kamar" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Upload Foto Kamar Kost</label>
            <input type="file" name="foto_kamar[]" multiple id="foto_kamar">
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

<!-- Carousel Modal -->
<div class="modal fade" id="carouselModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
              aria-label="Slide 3"></button> -->
          </div>
          <div class="carousel-inner">
            <?php foreach($data['fotoKost'] as $foto): ?>
            <div class="carousel-item active">
              <img src="<?= BASEURL; ?>/img/<?= $foto['nama_file']; ?>" class="d-block w-100" alt="...">
            </div>
            <?php endforeach; ?>
            <!-- <div class="carousel-item">
              <img src="<?= BASEURL; ?>/img/63870b80c0aca.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?= BASEURL; ?>/img/samples/3.png" class="d-block w-100" alt="...">
            </div> -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="page-content">
  <h3><?= $data["detailKost"]["nama_kost"]; ?></h3>
  <p><span class="fw-bold text-primary">Alamat Kost :</span> <?= $data['detailKost']['alamat_kost']; ?></p>
  <p><span class="fw-bold text-primary">Kategori Kost :</span> <?= $data['detailKost']['kategori_kost']; ?></p>
  <p><span class="fw-bold text-primary">Fasilitas Kost :</span> <?= $data['detailKost']['fasilitas_kost']; ?></p>


  <button type="button" class="btn btn-info btnTambahKamar me-2" data-bs-toggle="modal"
    data-bs-target="#tampilModalUbahKamarKost">
    <i class="bi bi-plus-circle me-2"></i>Tambah Data Kamar
  </button>
  <a href="<?= BASEURL; ?>/kost/showKamar/<?= $data['kost'][0]['id_kost'] ?>" class="tampilModalUbahKost"
    data-bs-toggle="modal" data-bs-target="#modalKost" data-id="<?= $data['kost'][0]['id_kost'] ?>"><button
      class="btn btn-primary me-2"><i class=" bi bi-pencil-fill me-2"></i>Ubah Data Kost</button></a>
  <a href="<?= BASEURL ?>/kost/deleteKost/<?= $data['kost'][0]['id_kost'] ?>"
    onclick="return confirm('Yakin hapus data?');"><button class=" btn btn-danger me-2"><i
        class="bi bi-trash-fill me-2"></i>Hapus Data Kost</button></a>

  <?php if($data['kost']==null): ?>
  <p>Kamar belum tersedia.</p>
  <?php else : ?>
  <div class="row my-3">
    <div class="col">
      <table
        class="table bg-white rounded shadow-sm table-hover align-middle table-responsive table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">No Kamar</th>
            <th scope="col">Kapasitas</th>
            <th scope="col">Fasilitas</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php $i = 1; ?>
          <?php foreach ($data["kost"] as $kost): ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $kost["no_kamar"] ?></td>
            <td scope="row"><?= $kost["kapasitas_kamar"] ?></td>
            <td class="col-3 align-middle text-start"><?= $kost["fasilitas_kamar"] ?></td>
            <td class="col-3 align-middle text-start"><?= $kost["harga_kamar"] ?></td>
            <td class="aksi">
              <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal"
                data-bs-target="#carouselModal">
                <i class="bi bi-image"></i>
              </button>
              <a href="<?= BASEURL; ?>/kost/editKamarKost/<?= $kost['id_kamar'] ?>" class="tampilModalUbahKamarKost"
                data-id="<?= $kost['id_kamar'] ?>" data-bs-toggle="modal"
                data-bs-target="#tampilModalUbahKamarKost"><button class="btn btn-outline-primary me-2"><i
                    class=" bi bi-pencil-fill"></i></button></a>
              <a href="<?= BASEURL ?>/kost/deleteKamarKost/<?= $kost['id_kamar']?>"
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
  <?php endif; ?>
</div>