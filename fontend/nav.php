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
          <a  id="myindex" class="navbar-brand text-white">AKK SOFTTECH</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
               
              </ul>


              <?php if($_SESSION['akksofttechsess_cususername'] != ""){ ?>
              <form class="d-flex">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <li class="nav-item dropdown ">
                          <a class="nav-link  text-white dropdown-toggle" id="navbarDropdown" href="#" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false"> <i
                                  class="bi bi-person-circle"></i><?php echo $_SESSION['akksofttechsess_cusname'] ;?></a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="#!">All Order</a></li>
                              <li>
                                  <hr class="dropdown-divider" />
                              </li>
                              <li><a class="dropdown-item" href="#!">Profile</a></li>
                              <li><a class="dropdown-item" href="#!">Checkout</a></li>
                          </ul>
                      </li>
                  </ul>
                  <button class="btn btn-outline-dark text-white" type="submit">
                      <i class="bi-cart-fill me-1"></i>
                      Cart
                      <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                  </button>
              </form>
              <?php }else{ ?>
              <form class="d-flex">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <li class="nav-item dropdown ">
                          <a id="mylogin" class="text-white nav-link " role="button" aria-expanded="false"><i
                                  class="bi bi-person-circle"></i>เข้าสู่ระบบ</a>
                      </li>
                  </ul>
                  <button class="btn btn-outline-dark text-white" type="submit">
                      <i class="bi-cart-fill me-1"></i>
                      Cart
                      <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                  </button>
              </form>
              <?php } ?>
          </div>
      </div>
  </nav>