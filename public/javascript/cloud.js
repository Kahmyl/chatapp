const url = "https://api.cloudinary.com/v1_1/kahmyl/image/upload";
const bol = document.querySelector("form");

bol.addEventListener("submit", (e) => {
  e.preventDefault();

  const image = document.querySelector("[type=file]").image;
  const formData = new FormData();

  for (let i = 0; i < image.length; i++) {
    let file = image[i];
    formData.append("file", file);
    formData.append("upload_preset", "ml_default");

    fetch(url, {
      method: "POST",
      body: formData
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        document.getElementById("data").innerHTML += data;
      });
  }
});