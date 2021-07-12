Dropzone.autoDiscover = false;

const dropzoneFormulario = document.querySelector("#dropzone");
const dropzone = new Dropzone(dropzoneFormulario, {
  url: "upload.php",
  autoProcessQueue: false,
  parallelUploads: 10,
  maxFiles: 10,
});

dropzone.on("complete", (file) => {
  if (dropzone.getUploadingFiles().length == 0) {
    window.location.reload(false);
  }
});

const enviarBoton = document.querySelector("#enviar");
enviarBoton.addEventListener("click", () => {
  dropzone.processQueue();
});

const folderContenido = document.querySelector("#folderContenido");
const archivos = document.querySelectorAll(".archivo");

archivos.forEach((archivo) => {
  console.log(archivo.dataset.mimetype);
  if (archivo.dataset.mimetype == "application/vnd.google-apps.folder") {
    const img = archivo.querySelector("img");
    img.src = "./images/folder.png";

    const aTag = archivo.querySelector("a");
    archivo.removeChild(aTag);

    const deleteButton = archivo.querySelector("form");
    archivo.removeChild(deleteButton);

    const fileNameTag = document.createElement("p");
    fileNameTag.textContent = archivo.dataset.name;
    archivo.appendChild(fileNameTag);

    const newATag = document.createElement("a");
    newATag.classList.add("folderLink");
    newATag.textContent = "Abrir en Drive";
    newATag.target = "_blank";
    newATag.href =
      "https://drive.google.com/drive/u/0/folders/" + archivo.dataset.id;
    archivo.appendChild(newATag);
  } else if (archivo.dataset.mimetype.includes("image")) {
    const img = archivo.querySelector("img");
    img.src = "./images/image.png";
  } else if (archivo.dataset.mimetype.includes("pdf")) {
    const img = archivo.querySelector("img");
    img.src = "./images/pdf.png";
  } else {
    const img = archivo.querySelector("img");
    img.src = "./images/file.png";
  }
});
