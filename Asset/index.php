<?php
header("content-type: text/plain");
$assetId = (int)($_GET['id'] ?? die(json_encode(["message" => "Unable to process request."])));

        switch(file_exists($_SERVER["DOCUMENT_ROOT"] . "/Asset/assets/" . $assetId)){
            case true:
                $file = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/Asset/assets/" . $assetId);
                echo $file;
                break;
            default:
                die(header('Location: https://assetdelivery.roblox.com/v1/asset/?id='. $assetId));
                break;
        }
?>