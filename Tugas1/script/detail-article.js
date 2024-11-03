import { getDetailArticleByTitle } from "./request.js";

// AMBIL TARGET ELEMENT
const targetTitleElement = document.querySelector('#article_title');
const targetImgElement = document.querySelector('#article_img');
const targetContentElement = document.querySelector("#article_content");
const targetAuthorElement = document.querySelector("#article_author");

// AMBIL NAMA DARI URL
const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);
const keyword = params.get('keyword');


async function GenerageDetailArticle(keyword) {
    const detailArticle = await getDetailArticleByTitle(keyword); // `await` digunakan di sini

    targetTitleElement.textContent = detailArticle[0].fullTitle;
    targetImgElement.setAttribute("src", detailArticle[0].image);
    targetContentElement.innerHTML = `
    <p>${detailArticle[0].content} <a target="_blank" href="${detailArticle[0].url}">See more</a></p>`;
    targetAuthorElement.textContent = detailArticle[0].author;

}

GenerageDetailArticle(keyword);
