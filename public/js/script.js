$(function () {
  // console.log("hello");
  // ubah pada views user
  $(".tambahUser").on("click", function () {
    // alert("hello");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/users/addUser");
    $("#judulModal").html("Tambah Data User");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nama_user").val("");
    $("#gender_user").val("pria");
    $("#tgl_lahir_user").val("");
    $("#alamat_rumah_user").val("");
    $("#no_tlp_user").val("");
    $("#fileFoto").val("");
    $(".img-preview").attr("src", "");
    $(".img-preview").hide();
  });

  $(".tampilModalUbah").on("click", function (e) {
    // e.preventDefault();
    $("#judulModal").html("Ubah Data User");
    $(".modal-footer button[type=submit").html("Ubah Data");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/users/editUser");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://pemweb-project-uts2.local/users/getEdit",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#nama_user").val(data.nama_user);
        $("#gender_user").val(data.gender_user);
        $("#tgl_lahir_user").val(data.tgl_lahir_user);
        $("#alamat_rumah_user").val(data.alamat_rumah_user);
        $("#no_tlp_user").val(data.no_tlp_user);
        $("#id_user").val(data.id_user);
        // $(".frameFoto").show();
        // $("#fotoMenu").val(data.foto);
        $("#foto_ktp_user_old").val(data.foto_ktp_user);
        $(".img-preview").css("display", "block");
        $(".img-preview").attr("src", "http://pemweb-project-uts2.local/img/" + data.foto_ktp_user);
        // $("#foto").attr("class", "mb-3");
      },
    });
  });

  // --------------------------------------------------------

  // UBAH PADA VIEW OWNER
  $(".tambahOwner").on("click", function () {
    // alert("hello");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/owners/addOwner");
    $("#judulModal").html("Tambah Data Pemilik Kost");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nama_user").val("");
    $("#gender_user").val("pria");
    $("#tgl_lahir_user").val("");
    $("#alamat_rumah_user").val("");
    $("#no_tlp_user").val("");
    $("#fileFoto").val("");
    $(".img-preview").attr("src", "");
    $(".img-preview").hide();
  });

  $(".tampilModalUbahOwner").on("click", function (e) {
    // e.preventDefault();
    $("#judulModal").html("Ubah Data Pemilik Kost");
    $(".modal-footer button[type=submit").html("Ubah Data");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/owners/editOwner");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://pemweb-project-uts2.local/owners/getEdit",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#nama_owner").val(data.nama_owner);
        $("#gender_owner").val(data.gender_owner);
        $("#tgl_lahir_owner").val(data.tgl_lahir_owner);
        $("#alamat_rumah_owner").val(data.alamat_rumah_owner);
        $("#no_tlp_owner").val(data.no_tlp_owner);
        $("#id_owner").val(data.id_owner);
        // $(".frameFoto").show();
        // $("#fotoMenu").val(data.foto);
        $("#foto_ktp_owner_old").val(data.foto_ktp_owner);
        $(".img-preview").css("display", "block");
        $(".img-preview").attr("src", "http://pemweb-project-uts2.local/img/" + data.foto_ktp_owner);
        // $("#foto").attr("class", "mb-3");
      },
    });
  });

  // --------------------------------------------------------

  $(".btnTambahKost").on("click", function () {
    // alert("hello");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/kost/addKost");
    $("#judulModalKost").html("Tambah Data Kost");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nama_kost").val("");
    $("#id_owner").val("none");
    $("#alamat_kost").val("");
    $("#fasilitas_kost").val("");
    $("#kategori_kost").val("none");
  });

  $(".tampilModalUbahKost").on("click", function (e) {
    // e.preventDefault();
    $("#judulModalKost").html("Ubah Data Kost");
    $(".modal-footer button[type=submit").html("Ubah Data");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/kost/editKost");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://pemweb-project-uts2.local/kost/getEdit",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#nama_kost").val(data.nama_kost);
        $("#id_kost").val(data.id_kost);
        $("#id_owner").val(data.id_owner);
        $("#alamat_kost").val(data.alamat_kost);
        $("#fasilitas_kost").val(data.fasilitas_kost);
        $("#kategori_kost").val(data.kategori_kost);
        // $("#id_owner").val(data.id_owner);
        // $(".frameFoto").show();
        // $("#fotoMenu").val(data.foto);
        // $("#foto_ktp_owner_old").val(data.foto_ktp_owner);
        // $(".img-preview").css("display", "block");
        // $(".img-preview").attr("src", "http://pemweb-project-uts2.local/img/" + data.foto_ktp_owner);
        // $("#foto").attr("class", "mb-3");
      },
    });
  });

  $(".btnTambahKamar").on("click", function () {
    // alert("hello");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/kost/addKamarKost");
    $("#judulModalKost").html("Tambah Data Kamar Kost");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#id_kost").val("");
    $("#no_kamar").val("");
    $("#fasilitas_kamar").val("");
    $("#kapasitas_kamar").val("");
    $("#harga_kamar").val("");
  });

  $(".tampilModalUbahKamarKost").on("click", function (e) {
    // e.preventDefault();
    $("#judulModalKost").html("Ubah Data Kamar Kost");
    $(".modal-footer button[type=submit").html("Ubah Data");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/kost/editKamarKost");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://pemweb-project-uts2.local/kost/getEditKamar",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_kamar").val(data.id_kamar);
        $("#id_kost").val(data.id_kost);
        $("#no_kamar").val(data.no_kamar);
        $("#fasilitas_kamar").val(data.fasilitas_kamar);
        $("#kapasitas_kamar").val(data.kapasitas_kamar);
        $("#harga_kamar").val(data.harga_kamar);
        // $("#id_owner").val(data.id_owner);
        // $(".frameFoto").show();
        // $("#fotoMenu").val(data.foto);
        // $("#foto_ktp_owner_old").val(data.foto_ktp_owner);
        // $(".img-preview").css("display", "block");
        // $(".img-preview").attr("src", "http://pemweb-project-uts2.local/img/" + data.foto_ktp_owner);
        // $("#foto").attr("class", "mb-3");
      },
    });
  });

  $(".btnTambahTransaksi").on("click", function () {
    // alert("hello");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/transaksi/addTransaksi");
    $("#judulModalKost").html("Tambah Data Transaksi");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#id_user").val("none");
    $("#id_kamar").val("");
    $("#tgl_sewa_awal").val("");
    $("#tgl_sewa_akhir").val("");
    $("#total_harga").val("");
    $("#tgl_bayar").val("");
  });

  $(".tampilModalUbahTransaksi").on("click", function (e) {
    // e.preventDefault();
    $("#judulModal").html("Ubah Data Transaksi");
    $(".modal-footer button[type=submit").html("Ubah Data");
    $(".modal-body form").attr("action", "http://pemweb-project-uts2.local/transaksi/editTransaksi");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://pemweb-project-uts2.local/transaksi/getEditTransaksi",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_transaksi").val(data.id_transaksi);
        $("#id_user").val(data.id_user);
        $("#id_kamar").val(data.id_kamar);
        $("#tgl_sewa_awal").val(data.tgl_sewa_awal);
        $("#tgl_sewa_akhir").val(data.tgl_sewa_akhir);
        $("#total_harga").val(data.total_harga);
        $("#tgl_bayar").val(data.tgl_bayar);
      },
    });
  });
});
