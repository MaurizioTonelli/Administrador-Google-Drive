<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Drive Administrador</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./dropzone-5.7.0/dist/dropzone.css">
    <link rel ="stylesheet" href="./dropzone-5.7.0/dist/basic.css">
    <script src="./dropzone-5.7.0/dist/dropzone.js"></script>
</head>
<body>
    <div class="encabezado">

        <h1><p>Administrador</p> Google Drive</h1>
        <img src="./images/Google_Drive_logo.png" alt="">
    </div>
    <div id="dropzone-mensaje">
      Se permite subir un máximo de 50 archivos a la vez
    </div>
    <div class="contenedor-principal-archivos">
      <div class="contenedor-archivos">
        <form action="upload.php"
          class="dropzone" id="dropzone" enctype="multipart/form-data">
          <div class="dz-message" data-dz-message><span>Arrastra o selecciona archivos aquí</span></div>
          <div class="fallback">
            <input name="file" type="file" multiple />
          </div>
        </form>
        <div class="contenedor-boton">
    
          <button id="enviar">Enviar archivos a Drive</button>
        </div>
      </div>
    </div>
    <script>
      Dropzone.autoDiscover = false;

      const dropzoneFormulario = document.querySelector("#dropzone");
      const dropzone = new Dropzone(dropzoneFormulario, {
        url: "upload.php",
        autoProcessQueue: false,
        parallelUploads: 10,
        maxFiles: 10,
      });

      const enviarBoton = document.querySelector("#enviar");
      enviarBoton.addEventListener("click", () => {
        dropzone.processQueue();
      });

    </script>
    <script src="index.js"></script>
</body>
</html>