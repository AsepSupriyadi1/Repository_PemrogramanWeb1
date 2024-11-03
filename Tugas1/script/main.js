import { getAllArticleForMainPage } from "./request.js";

// INISIALISASI TARGET ELEMENT
const targetHeaderElement = document.querySelector('#header');
const targetFooterElement = document.querySelector('#footer');

const homeContainer = document.querySelector("#home_article");
const listPostContainer = document.querySelector("#list_post");

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

async function GenerageAllArticle() {
    const articles = await getAllArticleForMainPage(); // `await` digunakan di sini

    let itemsHtml = "";
    let postsHtml = "";

    articles.forEach((article) => {
        let item = `
           <div class="content-box">
                <div class="title row">
                  <div class="col-md-10">
                    <h4 class="p-3">${article.title}</h4>
                  </div>
                  <div class="col-md-2 number-of-yntkts">
                    <h4 class="p-3 text-center">20</h4>
                  </div>
                </div>
                <div class="mb-5">
                  <p>${article.desc}</p>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <p class="fst-italic">
                      Written by : <span class="fw-bold">${article.author}</span>
                    </p>
                    <p class="fst-italic">
                      Tags :
                      <span class="text-danger">HTML, CSS, JAVASCRIPT</span>
                    </p>
                  </div>
  
                  <div class="col-md-3 text-end">
                    <a href="${`../detail_article.html?keyword=${article.fullTitle}`}" class="btn btn-success"
                      >Continue Reading</a
                    >
                  </div>
                </div>
              </div>
          `;

        let post = `
            <li class="list-group-item text-danger list-on-hover-primary">
              <a href="../detail_article.html?keyword=${article.fullTitle}" class="text-decoration-none">${article.title}</a>
            </li>
          `

        itemsHtml += item;
        postsHtml += post;
    });

    const url = new URL(window.location.href);
    const pageName = url.pathname.split('/').pop().split('.')[0];

    if (pageName == "home") {
        homeContainer.innerHTML = itemsHtml;
    }

    listPostContainer.innerHTML = postsHtml;
}

window.onload = async () => {
    GenerageAllArticle();
    loadHeader();
    loadFooter();
}