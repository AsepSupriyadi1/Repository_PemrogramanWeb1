export const getAllArticleForMainPage = async () => {
  try {
    const res = await fetch("https://newsapi.org/v2/everything?q=technology&apiKey=d831b1df0ad84ac5af95d6413ce510e2&pageSize=3&sortBy=relevancy");
    if (res.ok) {
      const result = await res.json();

      return result?.articles?.map((item) => ({
        author: item.author,
        title: item.title.length > 30 ? item.title.slice(0, 50) + "..." : item.title,
        fullTitle: item.title,
        desc: item.description
      }));
    } else {
      alert("Failed to fetch articles");
      window.location.reload();
      return [];
    }
  } catch {
    alert("Failed to fetch articles \n Please turn on your internet");
    window.location.reload();
    return [];
  }
};

export const getDetailArticleByTitle = async (reqTitle) => {
  try {
    const res = await fetch(`https://newsapi.org/v2/everything?q=${reqTitle}&apiKey=d831b1df0ad84ac5af95d6413ce510e2&pageSize=1&sortBy=relevancy`);
    if (res.ok) {
      const result = await res.json();
      return result?.articles?.map((item) => ({
        author: item.author,
        title: item.title.length > 30 ? item.title.slice(0, 50) + "..." : item.title,
        fullTitle: item.title,
        desc: item.description,
        content: item.content,
        image: item.urlToImage,
        url: item.url
      }));
    } else {
      alert("Failed to fetch articles");
      window.location.reload();
      return [];
    }
  } catch {
    alert("Failed to fetch articles \n Please turn on your internet");
    window.location.reload();
    return [];
  }
};