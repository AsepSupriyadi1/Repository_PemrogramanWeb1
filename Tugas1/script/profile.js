const ebutton = document.querySelectorAll(".btn-profile");
const eImage = document.querySelector("#profile-picture");
const eName = document.querySelector("#profile-name");
const eTitle = document.querySelector("#profile-title");

// AMBIL NAMA DARI URL
const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);
const nama = params.get('nama');

// JIKA PARAMETER KOSONG MAKA KEMBALIKAN KE HALAMAN UTAMA
if(!nama){
    window.location.replace("home.html");
}

const nameObj = {
    agung: "Agung Yuda Pratama",
    asep: "Asep Supriyadi",
    reihan: "Muhammad Reihan Zakya Alawi",
    zuhri: "Muhammad Zuhri Fajaruddin"
} 

// SET SUMBER DAYA SESUAI DENGAN NAMA ANGGOTA
eImage.setAttribute("src", `../assets/images/${nama}.jpg`);
eName.textContent = nameObj[nama];
eTitle.textContent = nameObj[nama];
