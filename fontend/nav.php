  <!-- Navigation-->
  <style>
.fixed2 {
    position: sticky;
    top: 0px;
    z-index: 1;
}

.navbg {
    background-color: #663399;
}
  </style>




  <nav class="fixed2 navbar navbar-expand-lg navbar-light navbg">
      <div class="container px-4 px-lg-5">
          <a id="myindex" class="navbar-brand text-white">AKK SOFTTECH</a>
          <button class="navbar-toggler btn btn-demo" type="button" id="menu_mobile" class="" data-toggle="modal"
              data-target="#myModal">
              <i class="bi-list me-1 text-white"></i></button>


          <div class="collapse navbar-collapse" id="">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

              </ul>


              <?php if($_SESSION['akksofttechsess_cususername'] != ""){ ?>
              <div class="d-flex" style="">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <li class="nav-item dropdown ">
                          <a class="nav-link  text-white dropdown-toggle" id="navbarDropdown" href="#" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person-circle"></i>
                              <seme class="mx-2"><?php echo $_SESSION['akksofttechsess_cusname'] ;?></seme>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" id="myorder">All Order</a></li>
                              <li>
                                  <hr class="dropdown-divider" />
                              </li>
                              <li><a class="dropdown-item" id="myaccount">Profile</a></li>
                              <li><a class="dropdown-item" id="mylogout">Checkout</a></li>
                          </ul>
                      </li>
                  </ul>
                  <button id="mytable" class="btn btn-outline-dark text-white" type="submit">
                      <i class="bi bi-building-add"></i>
                      Reserve
                  </button>
                  <button class="mx-1 btn btn-outline-dark text-white" type="submit">
                      <i class="bi-cart-fill me-1"></i>
                      Cart
                      <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                  </button>
              </div>
              <?php }else{ ?>
              <div class="d-flex">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <li class="nav-item dropdown ">
                          <a id="mylogin" class="text-white nav-link " role="button" aria-expanded="false"><i
                                  class="bi bi-person-circle"></i>
                              <seme class="mx-2">Login</seme>
                          </a>
                      </li>
                  </ul>
                  <button class="btn btn-outline-dark text-white" type="submit">
                      <i class="bi-cart-fill me-1"></i>
                      Cart
                      <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                  </button>
              </div>
              <?php } ?>
          </div>
      </div>



  </nav>





  <style>
.modal-dialog22222 {
    margin-left: 0;
    width: 60%;
}

p:hover {
    transition: transform .5s ease;
    color: #663399;
}
  </style>







  <div class="modal fade" id="menu_mobile_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog22222 ">
          <div class="modal-content">





              <div class="center modal-header text-white" style="background-color:#663399">
                  <div class="col-md-12">
                      <i class="bi bi-person-circle " style='font-size:26px;'></i>
                      <seme class="mx-2">AKK SOFTTECH</seme>
                  </div>
              </div>




              <div class="modal-body">

                  <div class="container">






                      <hr>


                      <?php if($_SESSION['akksofttechsess_cususername'] != ""){ ?>


                      <p id="myindex">CART</p>



                      <p id="myorder">ORDER</p>


                      <p id="mytable">RESERVE</p>



                      <p id="myaccount">PROFILE</p>


                      <hr>

                      <p>HEKP CENTER</p>


                      <p id="mylogout">LOGOUT</p>



                      <?php }else{ ?>



                      <p id="myindex">CART</p>



                      <p id="mylogin">LOGIN</p>




                      <?php } ?>



                  </div>



              </div>

          </div>
      </div>
  </div>




  