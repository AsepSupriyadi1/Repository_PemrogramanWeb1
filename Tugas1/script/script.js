// INISIALISASI TARGET ELEMENT
const targetElement = document.querySelector('#header');

// KIRIM REQUEST DAN LOAD HEADER PADA TARGET TARGET
const loadSnippet = () => {
    fetch(`../component/header.html`)
        .then((res) => {
            if (res.ok) {
                return res.text();
            }
        })
        .then((htmlSnippet) => {
            targetElement.innerHTML = htmlSnippet;
        })
}

// KETIKA DOCUMENT NYA DI LOAD MAKA JALANKAN LOADSNIPPET UNTUK LOAD HEADER PADA TARGET ELEMENT
window.onload = () => {
    loadSnippet();
}