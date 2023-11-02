<?php

include"../acesstest/acesstest.php";
$conn = connect();

$requette = "SELECT * FROM perdiem WHERE etat='Saisie'";

$resultat =$conn->query($requette);

$perdiems = $resultat->fetchAll();


?>
<?php

session_start();

if(!isset($_SESSION['email'])){
  header('location:../userlog/loginuser.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Liste de Perdiem</title>
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
          
          <a class="navbar-brand brand-logo-mini" href="../../dashboard.php">
          <?php if($_SESSION['role'] =="Employee") { 
              print'   <img src="../../images/u.png" alt="logo"  />';
            }else {
              print'   <img src="../../images/r.png" alt="logo"  />';
            }
            
            ?>
            <!-- <img src="../../images/logo-mini.svg" alt="logo"  /> -->
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
              <!-- <img class="img-xs rounded-circle" src="../../images/u.png" alt="Profile image"> </a> -->
              <?php if($_SESSION['role'] =="Employee") { 
              print' <img class="img-xs rounded-circle" src="../../images/u.png" alt="Profile image"> </a>';
            }else {
              print' <img class="img-xs rounded-circle" src="../../images/r.png" alt="Profile image"> </a>';
            }
            
            ?>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
              <?php if($_SESSION['role'] =="Employee") { 
              print'  <img class="img-md rounded-circle" src="../../images/u.png" alt="Profile image" width="40dp"> ';
            }else {
              print'  <img class="img-md rounded-circle" src="../../images/r.png" alt="Profile image" width="40dp"> ';
            }
            
            ?>
                <!-- <img class="img-md rounded-circle" src="../../images/u.png" alt="Profile image" width="40dp"> -->
                <p class="mb-1 mt-3 font-weight-semibold"><?php   echo $_SESSION['nom'];?> </p>
                <p class="fw-light text-muted mb-0"><?php   echo $_SESSION['email'];?></p>
                <p class="fw-light text-muted mb-0"><?php   echo $_SESSION['role'];?></p>
              </div>
              <a class="dropdown-item"  href="../../user.php"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profile </a> 

              <a class="dropdown-item" href="../userlog/deconnexion.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Déconnexion </a>
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
      </div> -->

    

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../User.php">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <?php if($_SESSION['role'] =="Responsable de Conge") {
            print'<li class="nav-item nav-category">List des Demandes </li>
            <li class="nav-item">
              <a class="nav-link "   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">List</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="list1.php">Demande de Congé</a></li>
                  
                </ul>
              </div>
              
            </li>';}
           elseif($_SESSION['role'] =="Responsable de Perdiem") {
            print'<li class="nav-item nav-category">List des Demandes </li>
            <li class="nav-item">
              <a class="nav-link"   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">List</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item active"> <a class="nav-link" href="list2.php">Demande de Perdiem</a></li>
                  
                </ul>
              </div>
              
            </li>';}
          elseif($_SESSION['role'] =="Responsable de Deplacement") {
            print'<li class="nav-item nav-category">List des Demandes </li>
            <li class="nav-item">
              <a class="nav-link"   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">List</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="list3.php">Demande de déplacement</a></li>
                  
                </ul>
              </div>
              
            </li>';
          }
          elseif($_SESSION['role'] =="Responsable Avance") {
            print'<li class="nav-item nav-category">List des Demandes </li>
            <li class="nav-item">
              <a class="nav-link "   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">List</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item "> <a class="nav-link" href="list4.php">Demande d\'Avance </a></li>
                  
                </ul>
              </div>
              
            </li>';
          }
          else {
            print'';
          }
          
          ?>

        
          <li class="nav-item nav-category">Les Demandes </li>
          <li class="nav-item">
            <a class="nav-link"   data-bs-toggle="collapse" href="#request" aria-expanded="false" aria-controls="request">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Demandes</span>
              <i class="menu-arrow"></i> 
             
            </a>
            <div class="collapse" id="request">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Requests/conge.php">Demande de Conge</a></li>
                <li class="nav-item "> <a class="nav-link" href="../Requests/perdiem.php">Demande de Perdiem</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Requests/deplacement.php">Frais de déplacement</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Requests/avance.php">Avance sur salaire</a></li>
              </ul>
            </div>
            
          </li>
        
          
          <li class="nav-item nav-category"> L'Histoire</li>

          <li class="nav-item">
            <a class="nav-link"  href="../History/history.php" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-history"></i>
              <span class="menu-title">Histoire</span>
              
            </a>
            
          </li>
       
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
                      <a class="nav-link  ps-0" id="home-tab"  href="../../User.php" role="tab" aria-controls="overview" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active " id="more-tab"  href="list2.php" role="tab"  aria-selected="false">Liste</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " id="profile-tab"  href="../Requests/conge.php" role="tab" aria-selected="false">Demande</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link border-0" id="more-tab"  href="../History/history.php" role="tab" aria-selected="false">Histoire</a>
                    </li>
                  </ul>


                 


                </div>

                <div class="tab-content tab-content-basic">


                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                     <div class="row">
                       <!--
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">Bounce Rate</p>
                            <h3 class="rate-percentage">32.53%</h3>
                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                          </div>
                          <div>
                            <p class="statistics-title">Page Views</p>
                            <h3 class="rate-percentage">7,682</h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                          </div>
                          <div>
                            <p class="statistics-title">New Sessions</p>
                            <h3 class="rate-percentage">68.8</h3>
                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Avg. Time on Site</p>
                            <h3 class="rate-percentage">2m:35s</h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">New Sessions</p>
                            <h3 class="rate-percentage">68.8</h3>
                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Avg. Time on Site</p>
                            <h3 class="rate-percentage">2m:35s</h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                          </div>
                        </div>
                      </div>
                    </div>  -->
                   

                    
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <!-- <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Market Overview</h4>
                                   <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                  </div>
                                  <div>
                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <h6 class="dropdown-header">Settings</h6>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                  <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">$36,2531.00</h2><h4 class="me-2">USD</h4><h4 class="text-success">(+1.37%)</h4></div>
                                  <div class="me-3"><div id="marketing-overview-legend"></div></div>
                                </div>
                                <div class="chartjs-bar-wrapper mt-3">
                                  <canvas id="marketingOverview"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!-- <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded table-darkBGImg">
                              <div class="card-body">
                                <div class="col-sm-8">
                                  <h3 class="text-white upgrade-info mb-0">
                                    Enhance your <span class="fw-bold">Campaign</span> for better outreach
                                  </h3>
                                  <a href="#" class="btn btn-info upgrade-btn">Upgrade Account!</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> -->

                        <?php

                            if( isset($_GET['validerperdiem']) &&   $_GET['validerperdiem'] == "ok"  )      {

                                print'  <div class="alert alert-success">

                              <b> Demande Validée avec Succès </b>


                                      </div>';
                                }   
                                ?>    
                                <?php

                                if( isset($_GET['refuserperdiem']) &&   $_GET['refuserperdiem'] == "ok"  )      {
    
                                    print'  <div class="alert alert-danger">
    
                                  <b> Demande Refusée avec Succès </b>
    
    
                                          </div>';
                                    }   
                                    ?>      
                        
                        <div class="row flex-grow">
                          
                          

                          <div class="col-12 grid-margin stretch-card ">
                            <div class="card card-rounded ">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Les Demandes</h4>
                                   <p class="card-subtitle card-subtitle-dash">Liste De Demande De Perdiem</p>
                                  </div>
                                  
                                </div>

                                <div class="table-responsive  mt-1">




                                  

                                  <table id="example" class="table  table-hover display nowrap  border" style="width:100%">
                                    <thead >
                                        <tr class="badge-opacity-primary" height=60px">
                                            <th>#</th>
                                           <th>Nom Prenom</th>
                                            
                                            
                                            <th>Date de Mission</th>
                                            <th>Montant</th>
                                            <th>Pays</th>
                                            <th>Ville</th>
                                           

                                            <th>Statuts</th>
                                            <th>Action</th>
                                            <th>Email</th>
                                            <th>Client</th>
                                            
                                            <th>Projet</th> 
                                            <th>Cin/Pass</th>
                                            <th>Details</th>
                                          
                                         
                                        </tr>
                                        
                                    </thead>
                                    <tbody>


                                    <?php 
                                    $i=0;
                                    foreach($perdiems as $perdiem){
                                      $i++;

                                       print' <tr height=60px">
                                       <td>'.$i.'</td>
                                       <td>'.$perdiem['nom'].' '.$perdiem['prenom'].'</td>
                                       
                                      
                                       
                                       <td>'.$perdiem['datemission'].'</td>
                                       <td>'.$perdiem['montant'].'</td>
                                      
                                      
                                       <td>'.$perdiem['pays'].'</td>
                                       <td>'.$perdiem['ville'].'</td>
                                      
                                       <td><div class="badge badge-opacity-warning ">'.$perdiem['etat'].'</div></td>
                                       <td>  <a href="valider/validerperdiem.php?idperdiem='.$perdiem['id'].'" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                         <a href="refuser/refuserperdiem.php?idrperdiem='.$perdiem['id'].'" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>

                                         <td>'.$perdiem['email'].'</td>
                                       <td>'.$perdiem['client'].'</td>
                                       <td>'.$perdiem['projet'].'</td>
                                       <td>'.$perdiem['cinpass'].'</td>
                                       <td>'.$perdiem['details'].'</td>
                                       
                                      
                                      
                                         
                                       
                                   </tr>';
                                  }
                                       
                                       ?>
                                        <!-- <tr height=60px">
                                            <td>1</td>
                                            <td>Nixon</td>
                                            
                                            
                                            
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                           
                                           
                                            <td>Poste</td>
                                            <td>Workflow</td>
                                            <td>Nathan</td>
                                           
                                            <td><div class="badge badge-opacity-warning ">en cours</div></td>
                                            <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                              <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                                              <td>France</td>
                                              <td>Paris</td>
                                              <td>12345678</td>
                                              <td> Maladie</td>
                                            
                                        </tr>
                                        <tr height=60px">
                                          <td>2</td>
                                          <td>Nixon</td>
                                          
                                          
                                          
                                          <td>2011/04/25</td>
                                          <td>$320,800</td>
                                         
                                         
                                          <td>Poste</td>
                                          <td>Workflow</td>
                                          <td>Nathan</td>
                                         
                                          <td><div class="badge badge-opacity-warning ">en cours</div></td>
                                          <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                            <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                                            <td>France</td>
                                            <td>Paris</td>
                                            <td>12345678</td>
                                            <td> Maladie</td>
                                          
                                      </tr>
                                      <tr height=60px">
                                        <td>3</td>
                                        <td>Nixon</td>
                                        
                                        
                                        
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                       
                                       
                                        <td>Poste</td>
                                        <td>Workflow</td>
                                        <td>Nathan</td>
                                       
                                        <td><div class="badge badge-opacity-warning ">en cours</div></td>
                                        <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                          <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                                          <td>France</td>
                                          <td>Paris</td>
                                          <td>12345678</td>
                                          <td> Maladie</td>
                                        
                                    </tr>
                                    <tr height=60px">
                                      <td>4</td>
                                      <td>Nixon</td>
                                      
                                      
                                      
                                      <td>2011/04/25</td>
                                      <td>$320,800</td>
                                     
                                     
                                      <td>Poste</td>
                                      <td>Workflow</td>
                                      <td>Nathan</td>
                                     
                                      <td><div class="badge badge-opacity-warning ">en cours</div></td>
                                      <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                        <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                                        <td>France</td>
                                        <td>Paris</td>
                                        <td>12345678</td>
                                        <td> Maladie</td>
                                      
                                  </tr>
                                  <tr height=60px">
                                    <td>5</td>
                                    <td>Nixon</td>
                                    
                                    
                                    
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                   
                                   
                                    <td>Poste</td>
                                    <td>Workflow</td>
                                    <td>Nathan</td>
                                   
                                    <td><div class="badge badge-opacity-warning ">en cours</div></td>
                                    <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                      <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                                      <td>France</td>
                                      <td>Paris</td>
                                      <td>12345678</td>
                                      <td> Maladie</td>
                                    
                                </tr>
                                <tr height=60px">
                                  <td>6</td>
                                  <td>Nixon</td>
                                  
                                  
                                  
                                  <td>2011/04/25</td>
                                  <td>$320,800</td>
                                 
                                 
                                  <td>Poste</td>
                                  <td>Workflow</td>
                                  <td>Nathan</td>
                                 
                                  <td><div class="badge badge-opacity-warning ">en cours</div></td>
                                  <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                    <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                                    <td>France</td>
                                    <td>Paris</td>
                                    <td>12345678</td>
                                    <td> Maladie</td>
                                  
                              </tr>
                              <tr height=60px">
                                <td>7</td>
                                <td>Nixon</td>
                                
                                
                                
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                               
                               
                                <td>Poste</td>
                                <td>Workflow</td>
                                <td>Nathan</td>
                               
                                <td><div class="badge badge-opacity-warning ">en cours</div></td>
                                <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                  <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                                  <td>France</td>
                                  <td>Paris</td>
                                  <td>12345678</td>
                                  <td> Maladie</td>
                                
                            </tr>
                            <tr height=60px">
                              <td>8</td>
                              <td>Nixon</td>
                              
                              
                              
                              <td>2011/04/25</td>
                              <td>$320,800</td>
                             
                             
                              <td>Poste</td>
                              <td>Workflow</td>
                              <td>Nathan</td>
                             
                              <td><div class="badge badge-opacity-warning ">en cours</div></td>
                              <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                                <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                                <td>France</td>
                                <td>Paris</td>
                                <td>12345678</td>
                                <td> Maladie</td>
                              
                          </tr>
                          <tr height=60px">
                            <td>9</td>
                            <td>Nixon</td>
                            
                            
                            
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                           
                           
                            <td>Poste</td>
                            <td>Workflow</td>
                            <td>Nathan</td>
                           
                            <td><div class="badge badge-opacity-warning ">en cours</div></td>
                            <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                              <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                              <td>France</td>
                              <td>Paris</td>
                              <td>12345678</td>
                              <td> Maladie</td>
                            
                        </tr>
                        <tr height=60px">
                          <td>10</td>
                          <td>Nixon</td>
                          
                          
                          
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                         
                         
                          <td>Poste</td>
                          <td>Workflow</td>
                          <td>Nathan</td>
                         
                          <td><div class="badge badge-opacity-warning ">en cours</div></td>
                          <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                            <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                            <td>France</td>
                            <td>Paris</td>
                            <td>12345678</td>
                            <td> Maladie</td>
                          
                      </tr>
                      <tr height=60px">
                        <td>11</td>
                        <td>Nixon</td>
                        
                        
                        
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                       
                       
                        <td>Poste</td>
                        <td>Workflow</td>
                        <td>Nathan</td>
                       
                        <td><div class="badge badge-opacity-warning ">en cours</div></td>
                        <td>  <a href="#" class="btn btn-success btn-lg rounded text-light">Valider</a>
                          <a href="#" class="btn btn-danger btn-lg rounded text-light">Refuser</a></td>
                          <td>France</td>
                          <td>Paris</td>
                          <td>12345678</td>
                          <td> Maladie</td>
                        
                    </tr> -->
                                       
                                        
                                       
                                          
                                       
                                    </tbody>
                                </table>






                                  
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>



                        <!-- <div class="row flex-grow">
                          <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body card-rounded">
                                <h4 class="card-title  card-title-dash">Recent Events</h4>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Change in Directors
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Other Events
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Quarterly Report
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Change in Directors
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="list align-items-center pt-3">
                                  <div class="wrapper w-100">
                                    <p class="mb-0">
                                      <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                  <h4 class="card-title card-title-dash">Activities</h4>
                                  <p class="mb-0">20 finished, 5 remaining</p>
                                </div>
                                <ul class="bullet-line-list">
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                      <p>Just now</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Oliver Noah</span> assign you a task</div>
                                      <p>1h</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Jack William</span> assign you a task</div>
                                      <p>1h</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Leo Lucas</span> assign you a task</div>
                                      <p>1h</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Thomas Henry</span> assign you a task</div>
                                      <p>1h</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                      <p>1h</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                      <p>1h</p>
                                    </div>
                                  </li>
                                </ul>
                                <div class="list align-items-center pt-3">
                                  <div class="wrapper w-100">
                                    <p class="mb-0">
                                      <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> -->

                        
                      </div>



                      
                      <!-- <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <h4 class="card-title card-title-dash">Todo list</h4>
                                      <div class="add-items d-flex mb-0">
                                         <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">                                      <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                      </div>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">24 June 2020</div>
                                              <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                              <i class="mdi mdi-flag ms-2 flag-color"></i>
                                            </div>
                                          </div>
                                        </li>
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">23 June 2020</div>
                                              <div class="badge badge-opacity-success me-3">Done</div>
                                            </div>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">24 June 2020</div>
                                              <div class="badge badge-opacity-success me-3">Done</div>
                                            </div>
                                          </div>
                                        </li>
                                        <li class="border-bottom-0">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">24 June 2020</div>
                                              <div class="badge badge-opacity-danger me-3">Expired</div>
                                            </div>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="card-title card-title-dash">Type By Amount</h4>
                                    </div>
                                    <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                    <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash">Leave Report</h4>
                                      </div>
                                      <div>
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                            <h6 class="dropdown-header">week Wise</h6>
                                            <a class="dropdown-item" href="#">Year Wise</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <canvas id="leaveReport"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash">Top Performer</h4>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Brandon Washington</p>
                                            <small class="text-muted mb-0">162543</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="images/faces/face2.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                            <small class="text-muted mb-0">162543</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="images/faces/face3.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                            <small class="text-muted mb-0">162543</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="images/faces/face4.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                            <small class="text-muted mb-0">162543</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="images/faces/face5.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                            <small class="text-muted mb-0">Alaska, USA</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
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
  <script src="tablejs2.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

