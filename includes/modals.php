<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1 class="modal-title fs-5 header-title" id="exampleModalLabel">Login to Severabs</h1>
        <hr>
        <form method="POST" action="processes/accounts/login.php">
          <label class="label-content">Email Address</label>
          <input type="Text" name="email" placeholder="Enter your email address here" class="form-control  form-severabs">
          <label class="label-content">Password</label>
          <input type="password" name="password" placeholder="Enter your password here" class="form-control  form-severabs">
          <br>
          <input type="submit" value="Login" name="Login" class="form-control form-severabs btn-form">
        </form>
        <br>
        <div class="row">
          <div class="col">
            <a href="create_account.php" class="link-modal">
              Create an Account
            </a>
          </div>
      
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="editInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1 class="modal-title fs-5 header-title" id="exampleModalLabel">Change Account Information</h1>
        <hr>
        <?php
            if (isset($_SESSION['USER_ID'])) {
            $user_id = $_SESSION['USER_ID'];
            $query = "SELECT * FROM user WHERE id = :user_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $accountData = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($accountData) {
              $first_name = $accountData['first_name'];
              $middle_init = $accountData['middle_init'];
              $last_name = $accountData['last_name'];
              $gender = $accountData['gender'];
              $birth_date = $accountData['birth_date'];
              $email = $accountData['email'];
              $password = $accountData['password'];
          ?>

        <form method="POST" action="processes/accounts/change_account_info.php">
          <div class="row">
            <div class="col">
              <label class="label-content" for="first_name">First Name</label><br>
              <input type="text" name="first_name" class="severabs-form form-control" value="<?php echo $first_name?>" >
            </div>
            <div class="col">
              <label class="label-content" for="middle_init">Middle Initial</label><br>
              <input type="text" name="middle_init" class="severabs-form form-control" value="<?php echo $middle_init?>" >
            </div>
            <div class="col">
              <label class="label-content" for="last_name">Last Name</label><br>
              <input type="text" name="last_name" class="severabs-form form-control" value="<?php echo $last_name?>">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <label class="label-content" for="gender">Gender</label><br>
              <select name="gender" class="severabs-form form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
             
          
            </div>
            <div class="col">
              <label class="label-content" for="birth_date">Birth Date</label><br>
              <input type="date" name="birth_date" class="severabs-form form-control"  value="<?php echo $birth_date?>">
            </div>
            <div class="col">
              <label class="label-content" for="email">Email</label><br>
              <input type="email" name="email" class="severabs-form form-control" value="<?php echo $email?>">
            </div>
          </div>


      </div>
      <br>
      <input type="submit" value="Submit" name="Submit" class="form-control form-severabs btn-form profile-btn">
      <br>
      </form>
      <?php } } ?>

    </div>
  </div>
</div>
</div>

<div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1 class="modal-title fs-5 header-title" id="exampleModalLabel">Change Password</h1>
        <hr>
        <form method="POST" action="processes/accounts/edit_password.php">
          <label class="label-content">Old Password</label>
          <input type="password" name="old_password" placeholder="Enter your password here" class="form-control  form-severabs">
          <br>
          <label class="label-content">New Password</label>
          <input type="password" name="new_password" placeholder="Enter your new password here" class="form-control  form-severabs">
          <br>
          <label class="label-content">Re-enter New Password</label>
          <input type="password" name="re_enter_new_pass" placeholder="Re-enter your new password here" class="form-control  form-severabs">
          <br>
          <input type="submit" value="Submit" name="Submit" class="form-control form-severabs btn-form">
        </form>
        <br>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editDelivInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1 class="modal-title fs-5 header-title" id="exampleModalLabel">Editing Delivery Info</h1>
        <hr>
        <form method="POST" action="processes/accounts/change_delivery_info.php">
          <?php
          if (isset($_SESSION['USER_ID'])) {
            $user_id = $_SESSION['USER_ID'];
            $query = "SELECT * FROM delivery_info WHERE user_id = :user_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $accountData = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($accountData) {
              $country = $accountData['country'];
              $province = $accountData['province'];
              $city = $accountData['city'];
              $barangay = $accountData['barangay'];
              $street_address = $accountData['street_address'];
              $full_name = $accountData['full_name'];
              $email = $accountData['email'];
              $phone_number = $accountData['phone_number'];
          ?>
              <div class="row">
                <div class="col">
                  <label for="country">Country</label><br>
                  <input type="text" name="country" value="<?php echo $country?>" class="severabs-form form-control">
                </div>
                <div class="col">
                  <label for="province">Province</label><br>
                  <input type="text" name="province" value="<?php echo $province?>" class="severabs-form form-control">
                </div>
                <div class="col">
                  <label for="last_name">City</label><br>
                  <input type="text" name="city" value="<?php echo $city?>" class="severabs-form form-control">
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col">
                  <label for="country">Barangay</label><br>
                  <?php
                  $sql = "SELECT name FROM barangay";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $barangays = $stmt->fetchAll(PDO::FETCH_COLUMN);

                  ?>

                  <select name="billing_barangay" class="form-control input-spacer" required>
                    <option> Select a barangay here</option>
                    <?php

                    foreach ($barangays as $barangay) {
                      echo "<option value='" . htmlspecialchars($barangay) . "'>" . htmlspecialchars($barangay) . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col">
                  <label for="province">Street Address</label><br>
                  <input type="text" name="street_address" value="<?php echo $street_address?>" class="severabs-form form-control">
                </div>
                <div class="col">
                  <label for="last_name">Full Name</label><br>
                  <input type="text" name="full_name" value="<?php echo $full_name?>" class="severabs-form form-control">
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col">
                  <label for="country">Email</label><br>
                  <input type="text" name="email" value="<?php echo $email?>" class="severabs-form form-control">
                </div>
                <div class="col">
                  <label for="province">Phone Number</label><br>
                  <input type="text" name="phone_number" value="<?php echo $phone_number?>" class="severabs-form form-control">
                </div>

              </div>
              <br>
              <input type="submit" value="Submit" name="Submit" class="form-control form-severabs btn-form">
          <?php }
          } ?>
        </form>
        <br>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editBillInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1 class="modal-title fs-5 header-title" id="exampleModalLabel">Editing Billing Info</h1>
        <hr>
        <?php
          if (isset($_SESSION['USER_ID'])) {
            $user_id = $_SESSION['USER_ID'];
            $query = "SELECT * FROM billing_info WHERE user_id = :user_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $accountData = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($accountData) {
              $country = $accountData['country'];
              $province = $accountData['province'];
              $city = $accountData['city'];
              $barangay = $accountData['barangay'];
              $street_address = $accountData['street_address'];
              $full_name = $accountData['full_name'];
              $email = $accountData['email'];
              $phone_number = $accountData['phone_number'];
          ?>
              <div class="row">
                <div class="col">
                  <label for="country">Country</label><br>
                  <input type="text" name="country" value="<?php echo $country?>" class="severabs-form form-control">
                </div>
                <div class="col">
                  <label for="province">Province</label><br>
                  <input type="text" name="province" value="<?php echo $province?>" class="severabs-form form-control">
                </div>
                <div class="col">
                  <label for="last_name">City</label><br>
                  <input type="text" name="city" value="<?php echo $city?>" class="severabs-form form-control">
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col">
                  <label for="country">Barangay</label><br>
                  <?php
                  $sql = "SELECT name FROM barangay";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $barangays = $stmt->fetchAll(PDO::FETCH_COLUMN);

                  ?>

                  <select name="billing_barangay" class="form-control input-spacer" required>
                    <option> Select a barangay here</option>
                    <?php

                    foreach ($barangays as $barangay) {
                      echo "<option value='" . htmlspecialchars($barangay) . "'>" . htmlspecialchars($barangay) . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col">
                  <label for="province">Street Address</label><br>
                  <input type="text" name="street_address" value="<?php echo $street_address?>" class="severabs-form form-control">
                </div>
                <div class="col">
                  <label for="last_name">Full Name</label><br>
                  <input type="text" name="full_name" value="<?php echo $full_name?>" class="severabs-form form-control">
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col">
                  <label for="country">Email</label><br>
                  <input type="text" name="email" value="<?php echo $email?>" class="severabs-form form-control">
                </div>
                <div class="col">
                  <label for="province">Phone Number</label><br>
                  <input type="text" name="phone_number" value="<?php echo $phone_number?>" class="severabs-form form-control">
                </div>

              </div>
              <br>
              <input type="submit" value="Submit" name="Submit" class="form-control form-severabs btn-form">
          <?php }
          } ?>
        </form>
        <br>

      </div>
    </div>
  </div>
</div>

<style>
  .bold{
    font-weight:bolder;
  }
</style>

<?php
if (!isset($_SESSION['USER_ID'])) {
    // Handle the case when the user is not logged in
} else {
    // Include database connection
    include_once 'conn.php'; // Replace 'conn.php' with your actual database connection file
    $subtotal = 0;
    // Fetch cart items for the logged-in user
    $userId = $_SESSION['USER_ID'];
    $stmt = $conn->prepare("SELECT cart.*, products.title, products.price, products.image FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = :user_id");
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title center-modal" id="offcanvasWithBothOptionsLabel">My Cart</h5>
            <button type="button" class="x-icon" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
        </div>
        <div class="offcanvas-body" id="cartContentContainer">
            <?php if (empty($cartItems)) : ?>
                <h5 class="center-modal">No items in cart, yet!</h5>
            <?php else : ?>
                <?php foreach ($cartItems as $cartItem) : ?>
          
                    <div class="row row-cart">
                        <div class="col-sm-3">
                            <img class="img-fluid" src="img/products/<?php echo $cartItem['image']; ?>">
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <h6 class="bold"><?php echo $cartItem['title']; ?></h6>
                                <div class="ms-auto" aria-hidden="true">
                                    <a href="processes/purchases/remove_cart.php?id=<?php echo $cartItem['product_id']; ?>" class="x-icon">X</a>
                                </div>
                            </div>
                            <h6>Qty. <?php echo $cartItem['quantity']; ?> pcs</h6>
                            <h6>₱<?php echo $cartItem['price']; ?> x <?php echo $cartItem['quantity']; ?> pcs: ₱<?php echo number_format($cartItem['price'] * $cartItem['quantity'], 2); ?></h6>
                        </div>
                    </div>
                  <?php $subtotal += $cartItem['price'] * $cartItem['quantity'];?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if (!empty($cartItems)) : ?>
            <div class="offcanvas-footer ofc-footer">
                <div class="d-flex align-items-center">
                    <a class="checkout" href="cart.php"><i class="bi bi-cart-check-fill"></i> Go to Checkout</a>
                    <div class="ms-auto" aria-hidden="true">Total: ₱<?php echo number_format($subtotal,2); ?></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php } ?>


