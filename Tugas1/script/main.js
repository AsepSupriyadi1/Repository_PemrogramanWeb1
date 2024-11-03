// INISIALISASI TARGET ELEMENT
const targetHeaderElement = document.querySelector('#header');
const targetFooterElement = document.querySelector('#footer');
const targetOtherSectionElement = document.querySelector('#other_section');

// KIRIM REQUEST DAN LOAD HEADER PADA TARGET TARGET
const loadHeader = () => {
    fetch(`../component/header.html`)
        .then((res) => {
            if (res.ok) {
                return res.text();
            }
        })
        .then((htmlSnippet) => {
            targetHeaderElement.innerHTML = htmlSnippet;
        })
}

const loadFooter = () => {
    fetch(`../component/footer.html`)
        .then((res) => {
            if (res.ok) {
                return res.text();
            }
        })
        .then((htmlSnippet) => {
            targetFooterElement.innerHTML = htmlSnippet;
        })
}

const loadOtherSection = () => {
    fetch(`../component/other_section.html`)
        .then((res) => {
            if (res.ok) {
                return res.text();
            }
        })
        .then((htmlSnippet) => {
            targetOtherSectionElement.innerHTML = htmlSnippet;
        })
}

// KETIKA DOCUMENT NYA DI LOAD MAKA JALANKAN LOADSNIPPET UNTUK LOAD HEADER PADA TARGET ELEMENT
window.onload = () => {
    loadHeader();
    loadFooter();
    loadOtherSection();
}