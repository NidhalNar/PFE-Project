<?php
session_start();

include"../acesstest/acesstest.php";
$conn = connect();

$requette = "SELECT * FROM conge WHERE etat='Validée' ";

$resultat =$conn->query($requette);

$congeval = $resultat->fetchAll();


?>
<?php



$conn = connect();

$requette1 = "SELECT * FROM conge WHERE etat='Refusée'";

$resultat1 =$conn->query($requette1);

$congeref = $resultat1->fetchAll();


?>
<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette2 = "SELECT * FROM perdiem WHERE etat='Validée'";

$resultat2 =$conn->query($requette2);

$perdiemval = $resultat2->fetchAll();


?>
<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette3 = "SELECT * FROM perdiem WHERE etat='Refusée'";

$resultat3 =$conn->query($requette3);

$perdiemref = $resultat3->fetchAll();


?>

<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette4 = "SELECT * FROM deplacement WHERE etat='Validée'";

$resultat4 =$conn->query($requette4);

$deplacementval = $resultat4->fetchAll();


?>
<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette5 = "SELECT * FROM deplacement WHERE etat='Refusée'";

$resultat5 =$conn->query($requette5);

$deplacementref = $resultat5->fetchAll();


?>
<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette6 = "SELECT * FROM avance WHERE etat='Validée'";

$resultat6 =$conn->query($requette6);

$avanceval = $resultat6->fetchAll();


?>
<?php


//include"pages/acesstest/acesstest.php";
$conn = connect();

$requette7 = "SELECT * FROM avance WHERE etat='Refusée' ";

$resultat7 =$conn->query($requette7);

$avanceref = $resultat7->fetchAll();


?>

<?php

//session_start();

if(!isset($_SESSION['email'])){
  header('location:../admin/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>History </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  
  

  

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
          
          <a class="navbar-brand brand-logo-mini" href="../../dashboard.php">
            <img src="../../images/logo-mini.svg" alt="logo"  />
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
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>
          <li class="nav-item ">
            <a class="nav-link count-indicator" id="notificationDropdown" href="#" title="Mails" >
              <i class="icon-mail icon-lg"></i>
            </a>
            
          </li>
          <li class="nav-item "> 
            <a class="nav-link count-indicator" id="countDropdown" href="#"  aria-expanded="false" title="Requests">
              <i class="icon-bell"></i>
              
            </a>
            
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="../../images/logo-mini.svg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="../../images/logo-mini.svg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?php   echo $_SESSION['nom'];?> </p>
                <p class="fw-light text-muted mb-0"><?php   echo $_SESSION['email'];?></p>
              </div>
              <a class="dropdown-item" href="../../dashboard.php" ><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Dashboard <span class="badge badge-pill badge-danger">1</span></a>
              <!-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a> -->
              <a class="dropdown-item" href="../admin/deconnexion.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
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
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

    
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../dashboard.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Users List</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Users list/List.php">List</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Users list/Add.php">Add</a></li>
               
                
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Requests and mails</li>
          <li class="nav-item">
            <a class="nav-link"   data-bs-toggle="collapse" href="#request" aria-expanded="false" aria-controls="request">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Requests</span>
              <i class="menu-arrow"></i> 
             
            </a>
            <div class="collapse" id="request">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Requests/conge.php">Congé</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Requests/perdiem.php"> perdiem</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Requests/deplacement.php">frais de déplacement</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Requests/avance.php">Avance sur salaire</a></li>
              </ul>
            </div>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../Mails/mails.php" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-mail-ru"></i>
              <span class="menu-title">Mails</span>
              
            </a>
            
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
          
          <li class="nav-item nav-category">Requests History</li>

          <li class="nav-item">
            <a class="nav-link"  href="history.php" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-history"></i>
              <span class="menu-title">History</span>
              
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
                      <a class="nav-link  ps-0" id="home-tab"  href="../../dashboard.php" role="tab" aria-controls="overview" aria-selected="true">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " id="more-tab"  href="../Users list/List.php" role="tab" aria-selected="false">Users</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab"  href="../Requests/conge.php" role="tab" aria-selected="false">Requests</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab"  href="../Mails/mails.php" role="tab" aria-selected="false">Mails</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active border-0" id="more-tab"  href="history.php" role="tab" aria-selected="false">History</a>
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
                      
                       

            




             
            
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Request History</h4>
                    <p class="card-description">
                      History <code>.Per User</code>
                    </p>
                    <div class="table-responsive">
                        

                   


                        
                            <table id="myTable" class="table  table-hover display nowrap  border " style="width:100%">
                                <thead>
                                    <tr class="badge-opacity-primary" height=60px">
                                    <th>#</th>
                                        <th>Nom Et Prenom</th>
                                       
                                        <th>Type de Demande</th>
                                        <th>Responsable</th>
                                        
                                        <th>Etat</th>
                                        
                                    </tr>
                                </thead>
                                <tbody> 
                                  <?php 
                                    $i=0;

                                    foreach($congeval as $conge){
                                      $i++;

                                       print' <tr height=60px">
                                       <td>'.$i.'</td>
                                       <td> '.$conge['nom'].' '.$conge['prenom'].'</td>
                                       <td>Demande de Congé</td>
                                       
                                       
                                       
                                       
                                       <td> '.$conge['responsable'].'</td>
                                       <td><div class="badge badge-opacity-success"> '.$conge['etat'].'</div></td>
                                       
                                       
                                       
                                   </tr>';
                                       
                                       }
                                       foreach($congeref as $congee){
                                        $i++;
  
                                         print' <tr height=60px">
                                         <td>'.$i.'</td>
                                         <td> '.$congee['nom'].' '.$congee['prenom'].'</td>
                                         <td>Demande de Congé</td>
                                         
                                         
                                         
                                         
                                         <td> '.$congee['responsable'].'</td>
                                         <td><div class="badge rounded-pill bg-gradient-danger"> '.$congee['etat'].'</div></td>
                                         
                                         
                                         
                                     </tr>';
                                         
                                         }
                                         foreach($perdiemval as $perdiem){
                                          $i++;
    
                                           print' <tr height=60px">
                                           <td>'.$i.'</td>
                                           <td> '.$perdiem['nom'].' '.$perdiem['prenom'].'</td>
                                           <td>Demande de Perdiem</td>
                                           
                                           
                                           
                                           
                                           <td> '.$perdiem['responsable'].'</td>
                                           <td><div class="badge badge-opacity-success"> '.$perdiem['etat'].'</div></td>
                                           
                                           
                                           
                                       </tr>';
                                           
                                           }
                                           foreach($perdiemref as $perdiemm){
                                            $i++;
      
                                             print' <tr height=60px">
                                             <td>'.$i.'</td>
                                             <td> '.$perdiemm['nom'].' '.$perdiemm['prenom'].'</td>
                                             <td>Demande de Perdiem</td>
                                             
                                             
                                             
                                             
                                             <td> '.$perdiemm['responsable'].'</td>
                                             <td><div class="badge rounded-pill bg-gradient-danger"> '.$perdiemm['etat'].'</div></td>
                                             
                                             
                                             
                                         </tr>';
                                             
                                             }
                                             foreach($deplacementval as $deplacement){
                                              $i++;
        
                                               print' <tr height=60px">
                                               <td>'.$i.'</td>
                                               <td> '.$deplacement['nom'].' '.$deplacement['prenom'].'</td>
                                               <td>Demande de Déplacement</td>
                                               
                                               
                                               
                                               
                                               <td> '.$deplacement['responsable'].'</td>
                                               <td><div class="badge badge-opacity-success"> '.$deplacement['etat'].'</div></td>
                                               
                                               
                                               
                                           </tr>';
                                               
                                               }
                                               foreach($deplacementref as $deplacementt){
                                                $i++;
          
                                                 print' <tr height=60px">
                                                 <td>'.$i.'</td>
                                                 <td> '.$deplacementt['nom'].' '.$deplacementt['prenom'].'</td>

                                                 <td>Demande de Déplacement</td>
                                                 
                                                 
                                                 
                                                 
                                                 <td> '.$deplacementt['responsable'].'</td>
                                                 <td><div class="badge rounded-pill bg-gradient-danger"> '.$deplacementt['etat'].'</div></td>
                                                 
                                                 
                                                 
                                             </tr>';
                                                 
                                                 }
                                                 foreach($avanceval as $avance){
                                                  $i++;
            
                                                   print' <tr height=60px">
                                                   <td>'.$i.'</td>
                                                   <td> '.$avance['nom'].' '.$avance['prenom'].'</td>
                                                   <td>Demande d\'Avance</td>
                                                   
                                                   
                                                   
                                                   
                                                   <td> '.$avance['responsable'].'</td>
                                                   <td><div class="badge badge-opacity-success"> '.$avance['etat'].'</div></td>
                                                   
                                                   
                                                   
                                               </tr>';
                                                   
                                                   }
                                                   foreach($avanceref as $avancee){
                                                    $i++;
              
                                                     print' <tr height=60px">
                                                     <td>'.$i.'</td>
                                                     <td> '.$avancee['nom'].' '.$avancee['prenom'].'</td>
                                                     <td>Demande d\'Avance</td>
                                                     
                                                     
                                                     
                                                     
                                                     <td> '.$avancee['responsable'].'</td>
                                                     <td><div class="badge rounded-pill bg-gradient-danger"> '.$avancee['etat'].'</div></td>
                                                     
                                                     
                                                     
                                                 </tr>';
                                                     
                                                     }
                                       ?>



                                    <!-- <tr>
                                        <td>Tiger Nixon</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2011/04/25</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2011/07/25</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                      
                                       
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2009/01/12</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2012/03/29</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2008/11/28</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                      
                                      
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2012/12/02</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                      
                                       
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2012/08/06</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2010/10/14</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                      
                                       
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2009/09/15</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2008/12/13</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                        
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>Responsable</td>
                                        <td>Demande de perdiem</td>
                                        <td>2008/12/19</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2013/03/03</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                        
                                       
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2008/10/16</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                   
                                       
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2012/12/18</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2010/03/17</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>Responsable</td>
                                        <td>Demande de perdiem</td>
                                        <td>2012/11/27</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                     
                                        
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>Employée)</td>
                                        <td>Demande de congé</td>
                                        <td>2010/06/09</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                      
                                      
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2009/04/10</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2012/10/13</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2012/09/26</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                      
                                    </tr>
                                    <tr>
                                        <td>Jenette Caldwell</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2011/09/03</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                      
                                    </tr>
                                    <tr>
                                        <td>Yuri Berry</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2009/06/25</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                      
                                    </tr>
                                    <tr>
                                        <td>Caesar Vance</td>
                                        <td>Employée</td>
                                        <td>Demande de congé</td>
                                        <td>2011/12/12</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Doris Wilder</td>
                                        <td>Responsable</td>
                                        <td>Demande de perdiem</td>
                                        <td>2010/09/20</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                      
                                    <tr>
                                        <td>Angelica Ramos</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2009/10/09</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                      
                                    </tr>
                                    <tr>
                                        <td>Gavin Joyce</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2010/12/22</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                      
                                      
                                    </tr>
                                    <tr>
                                        <td>Jennifer Chang</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2010/11/14</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                      
                                        
                                    </tr>
                                    <tr>
                                        <td>Brenden Wagner</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2010/11/14</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                        
                                       
                                    </tr>
                                    <tr>
                                        <td>Fiona Green</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2010/03/11</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                      
                                    </tr>
                                    <tr>
                                        <td>Shou Itou</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2011/08/14</td>
                                        <td><div class="badge badge-opacity-success">Accepteé</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Michelle House</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2011/06/02</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                       
                                      
                                    </tr>
                                    <tr>
                                        <td>Suki Burks</td>
                                        <td>Employée</td>
                                        <td>Demande de perdiem</td>
                                        <td>2009/10/22</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                      
                                      
                                    </tr>
                                    <tr>
                                        <td>Prescott Bartlett</td>
                                        <td>Responsable</td>
                                        <td>Demande de perdiem</td>
                                        <td>2011/05/07</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                       
                                     
                                    </tr>
                                    <tr>
                                        <td>Gavin Cortez</td>
                                        <td>Responsable</td>
                                        <td>Demande de perdiem</td>
                                        <td>2008/10/26</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                      
                                      
                                    </tr>
                                    <tr>
                                        <td>Martena Mccray</td>
                                        <td>Responsable</td>
                                        <td>Demande de déplacement</td>
                                        <td>2011/03/09</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Unity Butler</td>
                                        <td>Responsable</td>
                                        <td>Demande de déplacement</td>
                                        <td>2009/12/09</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                       
                                        
                                    </tr>
                                    <tr>
                                        <td>Howard Hatfield</td>
                                        <td>Responsable</td>
                                        <td>Demande de déplacement</td>
                                        <td>2008/12/16</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <td>Hope Fuentes</td>
                                        <td>Responsable</td>
                                        <td>Demande de déplacement</td>
                                        <td>2010/02/12</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                        
                                      
                                    </tr>
                                    <tr>
                                        <td>Vivian Harrell</td>
                                        <td>Responsable</td>
                                        <td>Demande de déplacement</td>
                                        <td>2009/02/14</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                      
                                     
                                    </tr>
                                    <tr>
                                        <td>Timothy Mooney</td>
                                        <td>Responsable</td>
                                        <td>Demande de déplacement</td>
                                        <td>2008/12/11</td>
                                        <td><div class="badge rounded-pill bg-gradient-danger">Refusée</div></td>
                                        
                                       
                                    </tr> -->
                                   
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../../vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/Chart.roundedBarCharts.js"></script>
  
  <script src="tablejs.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- End custom js for this page-->
</body>

</html>

