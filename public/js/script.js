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

  // ubah pada views customer
  $(".tambahCust").on("click", function () {
    $("#judulModal").html("Tambah Data Customer");
    $(".modal-footer button[type=submit").html("Tambah Data");
    $(".hilangButton").show();
    $(".modal-body input").prop("disabled", false);
    $(".modal-body textarea").prop("disabled", false);
  });

  // details
  $(".tampilDetailCust").on("click", function (e) {
    e.preventDefault();
    $("#judulModal").html("Detail Customer");
    $(".hilangButton").hide();

    const id = $(this).data("id");
    console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://localhost/phpmvc/public/customer/getdetail",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "POST",
      dataType: "json",
      success: function (data) {
        // console.log(result);

        $("#nama").val(data.nama);
        $("#tgl_lahir").val(data.tgl_lahir);
        $("#alamat").val(data.alamat);
        $("#email").val(data.email);
        $("#username").val(data.username);
        $("#password").val(data.password);
        $("#id").val(data.id_cust);
        $(".modal-body input").prop("disabled", true);
        $(".modal-body textarea").prop("disabled", true);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      },
    });
  });

  $(".tampilUbahCust").on("click", function (e) {
    e.preventDefault();
    $("#judulModal").html("Ubah Data Customer");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".hilangButton").show();
    $(".modal-body form").attr("action", "http://localhost/phpmvc/public/customer/ubah");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://localhost/phpmvc/public/customer/getdetail",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "POST",
      dataType: "json",
      success: function (data) {
        // console.log(result);

        $("#nama").val(data.nama);
        $("#tgl_lahir").val(data.tgl_lahir);
        $("#alamat").val(data.alamat);
        $("#email").val(data.email);
        $("#username").val(data.username);
        $("#password").val(data.password);
        $("#id").val(data.id_cust);
        $(".modal-body input").prop("disabled", false);
        $(".modal-body textarea").prop("disabled", false);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      },
    });
  });

  // --------------------------------------------------------

  // ubah pada views staff
  $(".tambahStaff").on("click", function () {
    $("#judulModal").html("Tambah Data Staff");
    $(".modal-footer button[type=submit").html("Tambah Data");
    $(".hilangButton").show();
    $(".modal-body input").prop("disabled", false);
    $(".modal-body textarea").prop("disabled", false);
  });

  // details
  $(".tampilDetailStaff").on("click", function (e) {
    e.preventDefault();
    $("#judulModal").html("Detail Staff");
    $(".hilangButton").hide();

    const id = $(this).data("id");
    console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://localhost/phpmvc/public/staff/getdetail",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "POST",
      dataType: "json",
      success: function (data) {
        // console.log(result);

        $("#nama").val(data.nama);
        $("#tgl_lahir").val(data.tgl_lahir);
        $("#alamat").val(data.alamat);
        $("#email").val(data.email);
        $("#username").val(data.username);
        $("#password").val(data.password);
        $("#id").val(data.id_cust);
        $(".modal-body input").prop("disabled", true);
        $(".modal-body textarea").prop("disabled", true);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      },
    });
  });

  $(".tampilUbahStaff").on("click", function (e) {
    e.preventDefault();
    $("#judulModal").html("Ubah Data Staff");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".hilangButton").show();
    $(".modal-body form").attr("action", "http://localhost/phpmvc/public/staff/ubah");

    const id = $(this).data("id");
    // console.log(id);
    // console.log("OK");

    $.ajax({
      url: "http://localhost/phpmvc/public/staff/getdetail",
      data: { id: JSON.parse(JSON.stringify(id)) },
      method: "POST",
      dataType: "json",
      success: function (data) {
        // console.log(result);

        $("#nama").val(data.nama);
        $("#tgl_lahir").val(data.tgl_lahir);
        $("#alamat").val(data.alamat);
        $("#email").val(data.email);
        $("#username").val(data.username);
        $("#password").val(data.password);
        $("#id").val(data.id_staff);
        $(".modal-body input").prop("disabled", false);
        $(".modal-body textarea").prop("disabled", false);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      },
    });
  });
});
