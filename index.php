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
    <?php
      define('__ROOT__', dirname(dirname(__FILE__)));
      require_once(__ROOT__.'/googleDriveManager/upload.php');
      $results = getAllFiles();
    ?>
    <div class="encabezado">

        <h1><p>Administrador</p> Google Drive</h1>
        <img src="./images/Google_Drive_logo.png" alt="">
    </div>
    <div id="dropzone-mensaje">
      Se permite subir un máximo de 10 archivos a la vez
    </div>
    <div class="contenedor-principal-archivos">
      <div class="contenedor-archivos">
        <form action="upload.php"
          class="dropzone" id="dropzone" enctype="multipart/form-data">
          <div class="dz-message" data-dz-message><span>Arrastra o selecciona archivos aquí</span></div>
          <div class="fallback">
            <input name="file" type="file" multiple />
          </div>
          <input type="hidden" name="archivos" value="archivos">
        </form>
        <div class="contenedor-boton">
          <button id="enviar">Enviar archivos a Drive</button>
        </div>
      </div>
    </div>
    <div class="contenedor-boton">
      <a id="abrir-folder-drive" href="https://drive.google.com/drive/u/0/folders/1ow35_Di38XxzLliGmhMYOUWZdMVMzK89" target="_blank">Abrir carpeta de Drive</a>
    </div>
    <div class="contenedor-principal-archivos">
      <div class="archivos">
        <div class="archivos-encabezado">
          <form action="upload.php" method="POST" class="borrar">
            <input type="submit" name="borrar-archivos" value="Borrar Archivos de la Carpeta">
          </form>
          <form action="upload.php" method="POST" class="folder" autocomplete="off">
            <input type="text" name="nombre">
            <input type="submit" name="agregar-carpeta" value="Agregar Carpeta">
          </form>
        </div>
        <div class="folder-contenedor">
          <div class="folder-encabezado">
            <img src="./images/folder.png" alt="">
            <h1>Principal</h1>
          </div>
          <div class="folder-contenido" id="folder-contenido">
            <?php 
              foreach($results as $elem)
                {
                  echo 
                    "<div class=\"archivo\" data-name=\"".$elem->name."\" data-id=\"".$elem->id."\" data-mimeType=\"".$elem->mimeType."\">".
                      "<img />
                      <a href=\"https://drive.google.com/file/d/".$elem->id."/view\" target=\"_blank\">".$elem->name."</a>".
                      "<form action=\"upload.php\" method=\"POST\">
                        <input type=\"hidden\" name=\"archivo-id\" value=\"".$elem->id."\"/>
                        <input type=\"submit\" name=\"borrar-archivo\" value=\"Eliminar\" class=\"borrar-archivo\"/>
                      </form>".
                    "</div>";
                } 
            ?>
          </div>
        </div>
      </div>
    </div>

    <script src="index.js"></script>
</body>
</html>