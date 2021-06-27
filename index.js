Dropzone.autoDiscover = false;

const dropzoneFormulario = document.querySelector("#dropzone");
const dropzone = new Dropzone(dropzoneFormulario, {
  url: "upload.php",
  autoProcessQueue: false,
});

const enviarBoton = document.querySelector("#enviar");
enviarBoton.addEventListener("click", () => {
  dropzone.processQueue();
});
