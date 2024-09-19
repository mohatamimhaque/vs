const facebookBtn = document.querySelector(".fb-button");
const twitterBtn = document.querySelector(".tw-button");
const pinterestBtn = document.querySelector(".pt-button");
const linkedinBtn = document.querySelector(".ln-button");

function init() {
    const image = document.querySelector(".single-post-media img");
    const title = document.querySelector(".single-post-title").textContent;
    let postUrl = encodeURI(document.location.href);
    let postImg = encodeURI(image.src);
    facebookBtn.setAttribute(
        "href",
        `https://www.facebook.com/sharer.php?u=${postUrl}`
      );
    twitterBtn.setAttribute(
      "href",
      `https://twitter.com/share?url=${postUrl}&text=${title}`
    );
    pinterestBtn.setAttribute(
        "href",
        `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${title}`
      );
      linkedinBtn.setAttribute(
        "href",
        `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${title}`
      )
}
init();