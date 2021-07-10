Dropzone.autoDiscover = false;

const dropzoneFormulario = document.querySelector("#dropzone");
const dropzone = new Dropzone(dropzoneFormulario, {
  url: "upload.php",
  autoProcessQueue: true,
  parallelUploads: 1,
});

const enviarBoton = document.querySelector("#enviar");
enviarBoton.addEventListener("click", () => {
  dropzone.processQueue();
});
