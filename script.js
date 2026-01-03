const waktu = new Date();

const tanggal = waktu.getDate();
const bulan = waktu.getMonth();
const tahun = waktu.getFullYear();
const jam = waktu.getHours();
const menit = waktu.getMinutes();
const detik = waktu.getSeconds();

const arrBulan = [
  "1",
  "2",
  "3",
  "4",
  "5",
  "6",
  "7",
  "8",
  "9",
  "10",
  "11",
  "12",
];

const tanggal_full = tanggal + "/" + arrBulan[bulan] + "/" + tahun;
const jam_full = jam + ":" + menit + ":" + detik;

document.getElementById(tanggal).innerHTML = tanggal_full;
document.getElementById(jam).innerHTML = jam_full;
