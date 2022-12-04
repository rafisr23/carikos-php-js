<div class="page-heading">
  <h2><?= $data["pageTitle"] ?></h2>
</div>

<div class="row">
  <div class="col-lg">
    <?php Flasher::flash() ?>
  </div>
</div>

<button type="button" class="btn btn-primary btnTambahTransaksi" data-bs-toggle="modal" data-bs-target="#formModal">
  <i class="bi bi-plus-circle me-2"></i>Tambah
</button>

<!-- MODAL -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="judulModal">Tambah Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/transaksi/addTransaksi" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_transaksi" id="id_transaksi">
          <div class="mb-3">
            <label for="id_user" class="form-label">Nama</label>
            <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Masukan nama user"
              autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="id_kamar" class="form-label">Kamar Kost</label>
            <input type="text" class="form-control" id="id_kamar" name="id_kamar" placeholder="Masukan nama kamar kost"
              autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="tgl_sewa_awal" class="form-label">Tanggal Sewa Awal</label>
            <input type="date" class="form-control" id="tgl_sewa_awal" name="tgl_sewa_awal"
              placeholder="Masukan tanggal sewa awal" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="tgl_sewa_akhir" class="form-label">Tanggal Sewa Akhir</label>
            <input type="date" class="form-control" id="tgl_sewa_akhir" name="tgl_sewa_akhir"
              placeholder="Masukan tanggal sewa akhir" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="total_harga" class="form-label">Total harga</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Masukan total harga"
              autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar"
              placeholder="Masukan tanggal bayar" autocomplete="off">
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
          <th scope="col">Kamar Kost</th>
          <th scope="col">Awal Sewa</th>
          <th scope="col">Akhir Sewa</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Tanggal Bayar</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php $i = 1; ?>
        <?php foreach ($data["transaksi"] as $tr): ?>
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $tr["id_user"] ?></td>
          <td scope="row"><?= $tr["id_kamar"] ?></td>
          <td scope="row"><?= $tr["tgl_sewa_awal"] ?></td>
          <td scope="row"><?= $tr["tgl_sewa_akhir"] ?></td>
          <td scope="row"><?= $tr["total_harga"] ?></td>
          <td scope="row"><?= $tr["tgl_bayar"] ?></td>
          <td class="aksi">
            <a href="<?= BASEURL; ?>/transaksi/editTransaksi/<?= $tr['id_transaksi'] ?>" data-bs-toggle="modal"
              data-bs-target="#formModal" class="tampilModalUbahTransaksi" data-id="<?= $tr['id_transaksi'] ?>"><button
                class="btn btn-outline-primary me-2"><i class=" bi bi-pencil-fill"></i></button></a>
            <a href="<?= BASEURL ?>/transaksi/deleteTransaksi/<?= $tr['id_transaksi'] ?>"
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