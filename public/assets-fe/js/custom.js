function disabled_button(id) {
  $("#" + id).attr("disabled", "true");
  $("#" + id).removeClass("btn-custom-primary");
  $("#" + id).addClass("btn-secondary");
  $("#" + id).html("<i class='fa fa-spin fa-spinner'> </i> Loading..");
}

function error_handler(url, xhr, thrownError) {
  // Swal.fire({
  //     title: '',
  //     text: "Mohon Maaf Koneksi Gagal, Data Akan Di Muat Ulang",
  //     icon: 'info',
  // }).then((result) => {
  //     if (result.isConfirmed) {
  //         window.location = url;
  //     }
  // });

  console.log(xhr.status);
  console.log(xhr.responseText);
  console.log(thrownError);
}
