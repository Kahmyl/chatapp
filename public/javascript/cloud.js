const url = "https://api.cloudinary.com/v1_1/hpiddhw8y/image/upload";
const bol = document.querySelector("form");

bol.addEventListener("submit", (e) => {

  const files = document.querySelector("[type=file]").files;
  const formData = new FormData();

  for (let i = 0; i < files.length; i++) {
    let file = files[i];
    formData.append("file", file);
    formData.append("upload_preset", "ml_default");

    fetch(url, {
      method: "POST",
      body: formData
    })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
          const imgUrl = data.secure_url;
          console.log(imgUrl);
      });
  }
});

