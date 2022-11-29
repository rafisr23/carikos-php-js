$(function () {
  // console.log("hello");

  // ubah pada views user
  $(".tambahUser").on("click", function () {
    // alert("hello");
    $("#judulModal").html("Tambah Data User");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $(".frameFoto").hide();
  });

  $(".tampilModalUbah").on("click", function () {
    $("#judulModal").html("Ubah Data User");
    $(".modal-footer button[type=submit").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/phpmvc/public/menu/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/phpmvc/public/menu/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#kategori").val(data.kategori);
        $("#nama").val(data.nama);
        $("#deskripsi").val(data.deskripsi);
        $("#harga").val(data.harga);
        $("#stok").val(data.stok);
        $("#id").val(data.id);
        $(".frameFoto").show();
        $("#fotoMenu").val(data.foto);
        $("#fileFoto").val(data.foto);
        $("#foto").attr("src", "http://localhost/phpmvc/public/img/" + data.foto);
        $("#foto").attr("class", "mb-3");
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
