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
    <div id="dropzone-test"></div>

    <form action="upload.php"
      class="dropzone" id="dropzone">
      <div class="fallback">
        <input name="file" type="file" multiple />
      </div>
    </form>
    <div class="contenedor-boton">

      <button id="enviar">Enviar archivos a Drive</button>
    </div>
    <script src="index.js"></script>
</body>
</html>