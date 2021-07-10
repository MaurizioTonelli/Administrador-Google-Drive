<?php

include_once __DIR__ . '/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=credentials.json');



function uploadFile($service, $folderId, $filePath, $fileName, $mimeType){
    $file = new Google_Service_Drive_DriveFile();
    $file->setName($fileName);
    
    $file->setParents(array($folderId));
    $file->setMimeType($mimeType);
    
    $result = $service->files->create(
        $file, 
        array(
            'data' => file_get_contents($filePath),
            'mimeType' => $mimeType,
            'uploadType' => 'media',
        )
    );
}

function uploadFiles($service, $folderId){
    $ds = DIRECTORY_SEPARATOR;
    $storeFolder = 'uploads';   
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];   
        $mimeType = $_FILES['file']['type'];             
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  
        $fileName = $_FILES['file']['name'];
        $targetFile =  $targetPath. $fileName;
        move_uploaded_file($tempFile,$targetFile);
        uploadFile($service, $folderId, $targetFile, $fileName, $mimeType);
    }
}
function addFolder($service, $parentFolderId, $folderName){
    $file = new Google_Service_Drive_DriveFile();
    $file->setName($folderName);
    $file->setParents(array($parentFolderId));
    $file->setMimeType("application/vnd.google-apps.folder");

    $result = $service->files->create($file);
}

function printFilesInFolder($service) {
    $result = $service->files->listFiles();
    foreach($result as $elem){
        echo $elem->id . ", ";
    }
}

function deleteFilesInFolder($service){
    $result = $service->files->listFiles();
    foreach($result as $elem){
        try{
            $service->files->delete($elem->id);
        }catch(Exception $e){
            print "An error ocurred: " . $e->getMessage();
        }
    }
}

$folderId = "1ow35_Di38XxzLliGmhMYOUWZdMVMzK89";

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/drive.file']);
try{
    $service = new Google_Service_Drive($client);
    //deleteFilesInFolder($service);
    uploadFiles($service, $folderId);
}catch(Google_Service_Exception $gs){
    $m = json_decode($gs->getMessage());
    echo $m->error->message;
}catch(Exception $e){
    echo $e->getMessage();
}

?> 