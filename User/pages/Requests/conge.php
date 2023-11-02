<?php

session_start();

if(!isset($_SESSION['email'])){
  header('location:../userlog/loginuser.php');
}

?>
<?php

include"../acesstest/acesstest.php";
$conn = connect();

$requette = "SELECT libelle FROM motif";

$resultat =$conn->query($requette);

$motifs = $resultat->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Demande de Congé</title>
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
          
          <a class="navbar-brand brand-logo-mini" href="../../user.php">
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
            <?php if($_SESSION['role'] =="Employee") { 
              print' <img class="img-xs rounded-circle" src="../../images/u.png" alt="Profile image"> </a>';
            }else {
              print' <img class="img-xs rounded-circle" src="../../images/r.png" alt="Profile image"> </a>';
            }
            
            ?>
              <!-- <img class="img-xs rounded-circle" src="../../images/u.png" alt="Profile image"> </a> -->
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
              <?php if($_SESSION['role'] =="Employee") { 
              print'  <img class="img-md rounded-circle" src="../../images/u.png" alt="Profile image" width="40dp"> ';
            }else {
              print'  <img class="img-md rounded-circle" src="../../images/r.png" alt="Profile image" width="40dp"> ';
            }
            
            ?>
                <!-- <img class="img-md rounded-circle" src="../../images/u.png" alt="Profile image" width="40dp"> -->
                <p class="mb-1 mt-3 font-weight-semibold"><?php   echo $_SESSION['nom'];?><?php   echo $_SESSION['prenom']   ;?> </p>
                <p class="fw-light text-muted mb-0"><?php   echo $_SESSION['email'];?></p>
                <p class="fw-light text-muted mb-0"><?php   echo $_SESSION['role'];?></p>

              </div>
              <a class="dropdown-item"  href="../../user.php"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profile </a> 
              <a class="dropdown-item" href="../userlog/deconnexion.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Déconnexion</a>
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
            print'<li class="nav-item nav-category">La Liste des Demandes </li>
            <li class="nav-item">
              <a class="nav-link "   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Liste</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../Listes des demandes/list1.php">Demande de Congé</a></li>
                  
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
                <li class="nav-item"> <a class="nav-link" href="../Listes des demandes/list2.php">Demande de Perdiem</a></li>
                  
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
                <li class="nav-item"> <a class="nav-link" href="../Listes des demandes/list3.php">Demande de  déplacement</a></li>
                  
                </ul>
              </div>
              
            </li>';
          }
          elseif($_SESSION['role'] =="Responsable Avance") {
            print'<li class="nav-item nav-category">La Liste des Demandes </li>
            <li class="nav-item">
              <a class="nav-link "   data-bs-toggle="collapse" href="#list" aria-expanded="false" aria-controls="list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Liste</span>
                <i class="menu-arrow"></i> 
               
              </a>
              <div class="collapse" id="list">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item "> <a class="nav-link" href="../Listes des demandes/list4.php">Demande d\'Avance </a></li>
                  
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
                <li class="nav-item"> <a class="nav-link" href="../Listes des demandes/list1.php">Liste de Conge</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Listes des demandes/list2.php">Liste de Perdiem</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Listes des demandes/list3.php">Liste de déplacement</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Listes des demandes/list4.php">Liste d'Avance sur salaire</a></li>
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
                <li class="nav-item active"> <a class="nav-link" href="conge.php">Demande de Congé</a></li>
                <li class="nav-item"> <a class="nav-link" href="perdiem.php">Demande de Perdiem</a></li>
                <li class="nav-item"> <a class="nav-link" href="deplacement.php">Frais de déplacement</a></li>
                <li class="nav-item"> <a class="nav-link" href="avance.php">Avance sur salaire</a></li>
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
                      <a class="nav-link  " id="more-tab"  href="../Listes des demandes/list1.php" role="tab"  aria-selected="false">Liste</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" id="profile-tab"  href="conge.php" role="tab" aria-selected="false">Demandes</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link border-0" id="more-tab"  href="../History/history.php" role="tab" aria-selected="false">Histoire</a>
                    </li>
                  </ul>


                


                </div>

                <div class="tab-content tab-content-basic">


                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                     <div class="row">
                      

                    
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                       
                        
                        
                        
                          
                          

                          
                        <?php

                            if( isset($_GET['ajouteconge']) &&   $_GET['ajouteconge'] == "ok"  )      {

                                print'  <div class="alert alert-success">

                              <b> Demande Envoyée avec Succès </b>


                                      </div>';
                                }   
                                ?>     

                               

                                  <div class="row flex-grow">
                          
                          
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">Demande De Congé</h4>






                                <form  action="gestion/ajouteconge.php"  method="POST">





                                  <p class="card-description">
                                   Remplir les champs     (<span class="text-danger">*</span> Obligatoire)
                                  </p>

                                 

                                  <div class="row">
                                    <div class="col-md-6">

                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Début <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                          <input type="date" class="form-control" name="debut"  required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Fin<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                          <input type="date" class="form-control" name="fin"  required>
                                        </div>
                                      </div>
                                    </div>
                                  </div>


                                  <div class="row">
                                    
                                    <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Durée<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                          <input type="number" class="form-control"  name="duree" min="0.5" step="0.5" Required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Motif<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                          <select class="form-control form-select " name="motif" required >
                                            <option value="" selected disabled hidden>Choisir votre motif</option>
                                            <option></option>
                                            <?php foreach($motifs as $motif){
                                            print '<option> '.$motif['libelle'].'</option>';
                                           }?>
                                            
                                          </select>
                                          <p class="text-danger">Si vous n'avez pas trouvé votre motif, vous pouvez 
                                            l'ajouter  dans la formulaire ci-dessous.</p>
                                        
                                        </div>
                                      </div>
                                    </div> 
                                  </div>
                                  
                                 
                                    <div>
                                  <button  type="submit" class="btn btn-primary btn-lg  text-light ">Submit</button>
                                   <button type="reset" class="btn btn-light btn-lg ">Cancel</button></div>
                                </form>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="row flex-grow">
                          
                          
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">Ajouter un nouveau motif</h4>
                                <form  action="gestion/ajoutemotif.php"  method="POST">
                                  <div class="row">
                                    <div class="col-md-6">

                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nouveau Motif </label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control " name="libelle" required >
                                         
                                        </div>
                                        
                                      </div>
                                    </div>
                                   
                                  </div>
                                 
                                    <div>
                                  <button  type="submit" class="btn btn-primary btn-lg  text-light ">Submit</button>
                                   <button type="reset" class="btn btn-light btn-lg ">Cancel</button></div>
                                </form>
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

