// ambil elemen2 yang dibutuhkan
var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var container1 = document.getElementById("container1");

// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  // buat object ajax
  var xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container1.innerHTML = xhr.responseText;
      console.log(xhr.responseText);
    }
  };

  // eksekusi ajax
  xhr.open("GET", "searchBank.php?keyword=" + keyword.value, true);
  xhr.send();
});
