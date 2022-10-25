<?php
            include_once('./includes/config/db_config.php');
            include_once('functions.inc.php');
            if(isset($_POST['add'])){
                            extract($_POST);
                            admin_account_validation($first_name,$last_name,$email,$password,$address);
                            addUser($conn,$first_name,$last_name,$email,$password,$address,$type,$is_blocked);
                            // header("Refresh:0");
                            // // header('location: ../picsnap.root/admin-accounts.php');
                            refreshPage('http://localhost/picsnap.root/admin-accounts.php');
                            exit();
            }
            
            if(isset($_POST['edit'])){
                extract($_POST);
                admin_account_validation($first_name,$last_name,$email,$password,$address,$id,true);
                editUser($conn,$id,$first_name,$last_name,$email,$password,$address,$type,$is_blocked);
                refreshPage('http://localhost/picsnap.root/admin-accounts.php');
                // header('location: ../picsnap.root/admin-accounts.php');
                exit();
            }
            
            if(isset($_GET['delete'])){
                deleteUser($conn,$_GET['delete']);
                refreshPage('http://localhost/picsnap.root/admin-accounts.php');
                // header('location: ../picsnap.root/admin-accounts.php');
                exit();
            }

            displayUserRows($conn);
            displayAddAccount($conn);
            
           
            