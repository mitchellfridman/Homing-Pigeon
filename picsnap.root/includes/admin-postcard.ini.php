<?php
            include_once('./includes/config/db_config.php');
            include_once('functions.inc.php');
            if(isset($_POST['add'])){
                            extract($_POST);
                            //returns the last id so that the filename can be changed
                            $lastID=addPostcard($conn,$name,$description,$price,$artist);
                            storeImage($localImgDir,$_FILES,$lastID,$artist,'recto');
                            storeImage($localImgDir,$_FILES,$lastID,$artist,'verso');
                            // var_dump($_FILES);
                            // header('location: ../picsnap.root/admin-postcard.php');
                            refreshPage('http://localhost/picsnap.root/admin-postcard.php');
                            exit();
            }
            
            if(isset($_POST['edit'])){
                extract($_POST);
                $oldPostcardInfo=getPreEditInfo($conn,$id);
                if($oldPostcardInfo['artist']!=$artist){
                    //checks if any images were uploaded, if not, it ports the images of the old artist to the new artist
                    if(empty($_FILES['front_upload']['name'])){
                        portImages($localImgDir,$oldPostcardInfo['id'],$oldPostcardInfo['artist'],$artist);
                    }
                    deletePostcardFromDir($oldPostcardInfo['id'],$oldPostcardInfo['artist'],$localImgDir);
                    deleteEmptyDir($localImgDir,$oldPostcardInfo['artist']);
                }
                editPostcard($conn,$id,$name,$description,$price,$artist);
                storeImage($localImgDir,$_FILES,$oldPostcardInfo['id'],$artist,'recto');
                storeImage($localImgDir,$_FILES,$oldPostcardInfo['id'],$artist,'verso');
                // header('location: ../picsnap.root/admin-postcard.php');
                refreshPage('http://localhost/picsnap.root/admin-postcard.php');
                exit();
            }
            
            if(isset($_GET['delete'])){
                deletePostcard($conn,$_GET['delete'],$_GET['artist'],$localImgDir);
                // header('location: ../picsnap.root/admin-postcard.php');
                refreshPage('http://localhost/picsnap.root/admin-postcard.php');
                exit();
            }

            displayPostcardRows($conn,$imgDir);
            displayAddPostcard($conn);