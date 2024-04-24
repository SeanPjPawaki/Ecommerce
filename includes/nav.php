
<link rel="stylesheet" href="external/css/nav.css">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand active name-link" href="#">SEVERABS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link nav-home work-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-home work-link" href="shop.php">SHOP</a>
                </li>
             
         
            </ul>
        </div>
        <div class="d-flex">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                    <?php if(!isset($_SESSION['USER_ID'])){ ?>
                        <a class="nav-link icon-link white-link" href="#"
                        data-bs-toggle="modal" data-bs-target="#loginModal"
                        ><i class="bi bi-person-fill"></i></a>
                        <?php }else{ ?>
                            <div class="btn-group dropstart">
                            <div class="dropdown">
  <a class="nav-link icon-link white-link" href="#"  data-bs-toggle="dropdown" aria-expanded="false">
  <i class="bi bi-person-fill"></i>
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="profile.php?url=account">My Profile</a></li>
    <li><a class="dropdown-item" href="order.php?filter=all">Orders</a></li>
    <li><a class="dropdown-item" href="processes/accounts/logout.php">Logout</a></li>
  </ul>
</div>
</div>
                       <?php } ?>
                    </li>
                    <?php if(isset($_SESSION['USER_ID'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link icon-link white-link" 
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" 
                        aria-controls="offcanvasWithBothOptions"
                        href="#"><i class="bi bi-bag"></i></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
        </div>
    </div>
    </div>
</nav>