// console.log("hello");
$(function () {
  // ubah pada views user
  $(".tambahUser").on("click", function () {
    // alert("hello");
    $(".modal-body form").attr("action", "http://localhost/pemweb-project-uts2/public/users/addUser");
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
    e.preventDefault();
    $("#judulModal").html("Ubah Data User");
    $(".modal-footer button[type=submit").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/pemweb-project-uts2/public/users/editUser");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://localhost/pemweb-project-uts2/public/users/getEdit",
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
        $(".img-preview").attr("src", "http://localhost/pemweb-project-uts2/public/img/" + data.foto_ktp_user);
        // $("#foto").attr("class", "mb-3");
      },
    });
  });

  // --------------------------------------------------------

  // UBAH PADA VIEW OWNER
  $(".tambahOwner").on("click", function () {
    // alert("hello");
    $(".modal-body form").attr("action", "http://localhost/pemweb-project-uts2/public/owners/addOwner");
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
    e.preventDefault();
    $("#judulModal").html("Ubah Data Pemilik Kost");
    $(".modal-footer button[type=submit").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/pemweb-project-uts2/public/owners/editOwner");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://localhost/pemweb-project-uts2/public/owners/getEdit",
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
        $(".img-preview").attr("src", "http://localhost/pemweb-project-uts2/public/img/" + data.foto_ktp_owner);
        // $("#foto").attr("class", "mb-3");
      },
    });
  });

  // --------------------------------------------------------

  $(".tambahKost").on("click", function () {
    // alert("hello");
    $(".modal-body form").attr("action", "http://localhost/pemweb-project-uts2/public/kost/addKost");
    $("#judulModal").html("Tambah Data Kost");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nama_kost").val("");
    $("#id_owner").val("none");
    $("#alamat_kost").val("");
    $("#fasilitas_kost").val("");
    $("#kategori_kost").val("none");
  });
});
