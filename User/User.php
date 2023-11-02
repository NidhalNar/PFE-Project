<?php
session_start();

include"pages/acesstest/acesstest.php";
$conn = connect();

$requette = "SELECT * FROM conge WHERE (etat='saisie' AND email='".$_SESSION['email']."' )";

$resultat =$conn->query($requette);

$conges = $resultat->fetchAll();


?>
<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette2 = "SELECT * FROM perdiem WHERE (etat='saisie' AND email='".$_SESSION['email']."' )";

$resultat2 =$conn->query($requette2);

$perdiems = $resultat2->fetchAll();


?>

<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette3 = "SELECT * FROM deplacement WHERE (etat='saisie' AND email='".$_SESSION['email']."' )";

$resultat3 =$conn->query($requette3);

$deplacements = $resultat3->fetchAll();


?>
<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette4 = "SELECT * FROM avance WHERE (etat='saisie' AND email='".$_SESSION['email']."' )";

$resultat4 =$conn->query($requette4);

$avances = $resultat4->fetchAll();


?>




<?php

//session_start();

if(!isset($_SESSION['email'])){
  header('location:pages/userlog/loginuser.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="btn.css">
</head>
<body>

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          
          <a class="navbar-brand brand-logo-mini" href="User.php">
          <?php if($_SESSION['role'] =="Employee") { 
              print' <img class="img-xs rounded-circle" src="images/u.png" alt="Profile image"> </a>';
            }else {
              print' <img class="img-xs rounded-circle" src="images/r.png" alt="Profile image"> </a>';
            }
            
            ?>
            <!-- <img src="images/logo-mini.svg" alt="logo"  /> -->
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Salut, <span class="text-black fw-bold"><?php   echo $_SESSION['nom'];?></span></h1>
            <h3 class="welcome-sub-text">Bienvenue </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">

          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
         
         
          
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if($_SESSION['role'] =="Employee") { 
              print' <img class="img-xs rounded-circle" src="images/u.png" alt="Profile image"> </a>';
            }else {
              print' <img class="img-xs rounded-circle" src="images/r.png" alt="Profile image"> </a>';
            }
            
            ?>
              <!-- <img class="img-xs rounded-circle" src="images/u.png" alt="Profile image"> </a> -->
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
              <?php if($_SESSION['role'] =="Employee") { 
              print'  <img class="img-md rounded-circle" src="images/u.png" alt="Profile image" width="40dp"> ';
            }else {
              print'  <img class="img-md rounded-circle" src="images/r.png" alt="Profile image" width="40dp"> ';
            }
            
            ?>
                <!-- <img class="img-md rounded-circle" src="images/u.png" alt="Profile image" width="40dp"> -->
                <p class="mb-1 mt-3 font-weight-semibold"><?php   echo $_SESSION['nom']   ;?>  <?php   echo $_SESSION['prenom']   ;?> </p>
                <p class="fw-light text-muted mb-0"><?php   echo $_SESSION['email'];?></p>
                <p class="fw-light text-muted mb-0"><?php   echo $_SESSION['role'];?></p>
              </div>
              <a class="dropdown-item" href="user.php"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profile </a>
              <a class="dropdown-item"  href="pages/userlog/deconnexion.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Déconnexion</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">Sidebar Colors</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">Header Colors</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> -->

      

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" href="User.php">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>

          <?php if($_SESSION['role'] =="Responsable de Conge") {
            print'<li class="nav-item nav-category">La Liste des Demandes </li>
            <li class="nav-item">
              <a class="nav-link"   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Liste</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/Listes des demandes/list1.php">Demande de Congé</a></li>
                  
                </ul>
              </div>
              
            </li>';}
           elseif($_SESSION['role'] =="Responsable de Perdiem") {
            print'<li class="nav-item nav-category">La Liste des Demandes </li>
            <li class="nav-item">
              <a class="nav-link"   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Liste</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Listes des demandes/list2.php">Demande de Perdiem</a></li>
                  
                </ul>
              </div>
              
            </li>';}
          elseif($_SESSION['role'] =="Responsable de Deplacement") {
            print'<li class="nav-item nav-category">La Liste des Demandes </li>
            <li class="nav-item">
              <a class="nav-link"   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Liste</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Listes des demandes/list3.php">Demande de  déplacement</a></li>
                  
                </ul>
              </div>
              
            </li>';
          }
          elseif($_SESSION['role'] =="Responsable Avance") {
            print'<li class="nav-item nav-category">La Liste des Demandes </li>
            <li class="nav-item">
              <a class="nav-link"   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Liste</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Listes des demandes/list4.php">Demande d\'Avance </a></li>
                  
                </ul>
              </div>
              
            </li>';
          }
          else {
            print'';
          }
          
          ?>

           <!--   Partie Responsable-->
          <!-- <li class="nav-item nav-category">List des Demandes </li>
          <li class="nav-item">
            <a class="nav-link"   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">List</span>
              <i class="menu-arrow"></i> 
             
            </a>
            <div class="collapse" id="list">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Listes des demandes/list1.php">Liste de Conge</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Listes des demandes/list2.php">Liste de Perdiem</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Listes des demandes/list3.php">Liste de  déplacement</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Listes des demandes/list4.php">Liste d\'Avance sur salaire</a></li>
              </ul>
            </div>
            
          </li> -->
         
          
        
          <li class="nav-item nav-category">Les Demandes </li>
          <li class="nav-item">
            <a class="nav-link"   data-bs-toggle="collapse" href="#request" aria-expanded="false" aria-controls="request">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Demandes</span>
              <i class="menu-arrow"></i> 
             
            </a>
            <div class="collapse" id="request">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Requests/conge.php">Demande de Congé</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Requests/perdiem.php">Demande de Perdiem</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Requests/deplacement.php">Frais de déplacement</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Requests/avance.php">Avance sur salaire</a></li>
              </ul>
            </div>
            
          </li>

          
        
          


          <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="menu-icon mdi mdi-layers-outline"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li> -->
          
          <li class="nav-item nav-category"> L'Histoire</li>

          <li class="nav-item">
            <a class="nav-link"  href="pages/History/history.php" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-history"></i>
              <span class="menu-title">Histoire</span>
              
            </a>
            
          </li>
          <!-- <li class="nav-item nav-category">help</li>
          <li class="nav-item">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab"  href="User.php" role="tab" aria-controls="overview" aria-selected="true">Profile</a>
                    </li>

                    <!-- partie responsable-->
                   
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab"  href="pages/Listes des demandes/list1.php" role="tab" aria-selected="false">Liste</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab"  href="pages/Requests/conge.php" role="tab" aria-selected="false">Demandes</a>
                    </li>
                   
                    <li class="nav-item">
                      <a class="nav-link border-0" id="more-tab"  href="pages/History/history.php" role="tab" aria-selected="false">Histoire</a>
                    </li>
                  </ul>


                  <!-- <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div> -->


                </div>

                <div class="tab-content tab-content-basic">


                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                     <div class="row">
                       
                    <div class="row">
                     
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card  bg-success  card-rounded">
                              <div class="card-body pb-0">
                                <h4 class="card-title card-title-dash text-white mb-4">Total Demandes Acceptées
                                </h4>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <p class="status-summary-ight-white mb-1">Demandes Acceptées</p>
                                    <h2 class="text-light"> 
                                      <?php
                                    $rows1=0;
                                    $rows2=0;
                                    $rows3=0;
                                    $rows4=0;
                                    $rowtotal=0;
                                  $conn = connect();

                                  $requette5 = "SELECT count(*) FROM conge WHERE (etat='Validée' AND email='".$_SESSION['email']."' )";
                                  
                                  $resultat5 =$conn->query($requette5);
                                  
                                  $rows1 = $resultat5->fetchColumn();

                                  $requette6 = "SELECT count(*) FROM perdiem WHERE (etat='Validée' AND email='".$_SESSION['email']."' )";
                                  
                                  $resultat6 =$conn->query($requette6);
                                  
                                  $rows2 = $resultat6->fetchColumn();

                                  $requette7 = "SELECT count(*) FROM deplacement WHERE (etat='Validée' AND email='".$_SESSION['email']."' )";
                                  
                                  $resultat7 =$conn->query($requette7);
                                  
                                  $rows3 = $resultat7->fetchColumn();

                                  $requette8 = "SELECT count(*) FROM avance WHERE (etat='Validée' AND email='".$_SESSION['email']."' )";
                                  
                                  $resultat8 =$conn->query($requette8);
                                  
                                  $rows4 = $resultat8->fetchColumn();

                                $rowtotal=$rows1+$rows2+$rows3+$rows4;

                                echo $rowtotal;
                                  
                                  
                                  ?>
                                  </h2>
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                          

                         

                          
                        </div>

                      </div>

                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card  bg-danger card-rounded">
                              <div class="card-body pb-0">
                                <h4 class="card-title card-title-dash text-white mb-4">Total demandes refusées</h4>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <p class="status-summary-ight-white mb-1">Demandes Refusées</p>
                                    <h2 class="text-light"> 
                                      <?php
                                    $rows1=0;
                                    $rows2=0;
                                    $rows3=0;
                                    $rows4=0;
                                    $rowtotal=0;
                                  $conn = connect();

                                  $requette5 = "SELECT count(*) FROM conge WHERE (etat='Refusée' AND email='".$_SESSION['email']."' )";
                                  
                                  $resultat5 =$conn->query($requette5);
                                  
                                  $rows1 = $resultat5->fetchColumn();

                                  $requette6 = "SELECT count(*) FROM perdiem WHERE (etat='Refusée' AND email='".$_SESSION['email']."' )";
                                  
                                  $resultat6 =$conn->query($requette6);
                                  
                                  $rows2 = $resultat6->fetchColumn();

                                  $requette7 = "SELECT count(*) FROM deplacement WHERE (etat='Refusée' AND email='".$_SESSION['email']."' )";
                                  
                                  $resultat7 =$conn->query($requette7);
                                  
                                  $rows3 = $resultat7->fetchColumn();

                                  $requette8 = "SELECT count(*) FROM avance WHERE (etat='Refusée' AND email='".$_SESSION['email']."' )";
                                  
                                  $resultat8 =$conn->query($requette8);
                                  
                                  $rows4 = $resultat8->fetchColumn();

                                $rowtotal=$rows1+$rows2+$rows3+$rows4;

                                echo $rowtotal;
                                  
                                  
                                  ?>
                                  </h2>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <!-- center 
                    <div class="col d-flex justify-content-center"> -->

                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card  bg-secondary card-rounded">
                              <div class="card-body pb-0">
                                <h4 class="card-title card-title-dash text-white mb-4">Solde Congé</h4>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <p class="status-summary-ight-white mb-1">Solde Congé</p>
                                    <h2 class="text-light">160DT</h2>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    
                      
                    </div>


                    
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                       

                        
                        
                        <div class="row flex-grow">
                          
                          

                          <div class="col-12 grid-margin stretch-card ">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Les Demandes</h4>
                                   <p class="card-subtitle card-subtitle-dash">Demandes En Attentes</p>
                                  </div>
                                  
                                </div>
                                <div class="table-responsive  mt-1">
                                 
                                  <table id="example" class="table  table-hover display nowrap  border " style="width:100%">
                                    <thead >
                                        <tr class="badge-opacity-primary" height=60px">
                                            <th>#</th>
                                            <th>Name Et Prenom</th>
                                            <th>Type de demande</th>
                                           
                                            <th>Responsable</th>
                                            <th>Etat</th>
                                           
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php 
                                    $i=0;

                                    foreach($conges as $conge){
                                      $i++;

                                       print' <tr height=60px">
                                       <td>'.$i.'</td>
                                       <td>  '.$conge['nom'].' '.$conge['prenom'].'</td>
                                       <td>Demande de Congé</td>
                                       
                                       
                                       
                                       
                                       <td> '.$conge['responsable'].'</td>
                                       <td><div class="badge badge-opacity-warning "> '.$conge['etat'].'</div></td>
                                       
                                       
                                       
                                   </tr>';
                                       
                                       }
                                    foreach($perdiems as $perdiem){
                                      $i++;

                                       print' <tr height=60px">
                                       <td>'.$i.'</td>
                                       <td>  '.$perdiem['nom'].' '.$perdiem['prenom'].'</td>
                                       <td>Demande de Perdiem</td>
                                       
                                       
                                       
                                       
                                       <td> '.$perdiem['responsable'].'</td>
                                       <td><div class="badge badge-opacity-warning "> '.$perdiem['etat'].'</div></td>
                                       
                                       
                                       
                                   </tr>';
                                       
                                       }
                                       foreach($deplacements as $deplacement){
                                        $i++;
  
                                         print' <tr height=60px">
                                         <td>'.$i.'</td>
                                         <td>  '.$deplacement['nom'].' '.$deplacement['prenom'].'</td>
                                         <td>Demande de Déplacement</td>
                                         
                                         
                                         
                                         
                                         <td> '.$deplacement['responsable'].'</td>
                                         <td><div class="badge badge-opacity-warning "> '.$deplacement['etat'].'</div></td>
                                         
                                         
                                         
                                     </tr>';
                                         
                                         }
                                         foreach($avances as $avance){
                                          $i++;
    
                                           print' <tr height=60px">
                                           <td>'.$i.'</td>
                                           <td>  '.$avance['nom'].' '.$avance['prenom'].'</td>
                                           <td>Demande d\'Avance</td>
                                           
                                           
                                           
                                           
                                           <td> '.$avance['responsable'].'</td>
                                           <td><div class="badge badge-opacity-warning "> '.$avance['etat'].'</div></td>
                                           
                                           
                                           
                                       </tr>';
                                           
                                           }?>

                                      
                                    </tbody>
                                </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© SCSI All rights reserved</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="tablejs2.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

