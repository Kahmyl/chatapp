const url = "https://api.cloudinary.com/v1_1/hpiddhw8y/image/upload"
let imgUrl;

const cloudImage = async () => {
  const files = document.querySelector("[type=file]").files;
  const formData = new FormData();

  for (let i = 0; i < files.length; i++) {
    let file = files[i];
    formData.append("file", file);
    formData.append("upload_preset", "ml_default");

    const res = await fetch(url, {
      method: "POST",
      body: formData
    });

    const data = await res.json();
    imgUrl = await data.secure_url;
    console.log(imgUrl);
  }
}

const submitImage = async (e) => {
  e.preventDefault();
  console.log("calling")
  console.log(imgUrl);
  const pdata = new FormData();
  pdata.append("json", JSON.stringify(imgUrl));

  const res = await fetch('php/signup.php',{
    method: "POST",
    body: pdata
  });

  const data = await res.json();
  console.log(data)
}
