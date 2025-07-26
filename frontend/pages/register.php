<!DOCTYPE html>
<html lang="en">
    <?php
       session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo shop</title>

    <?php
       include_once (__DIR__. '/../layouts/style.php'); ?>

</head>
<body>
    <?php
       include_once (__DIR__. '/../layouts/partials/header.php'); ?>
     <main></main>  
     <main>
      <form method="post" action="/demoshop/frontend/pages/save_register.php">

            <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                  <form>

                  <div class="row">
                    <!-- Username -->
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="username" name="username" class="form-control form-control-lg" required />
                        <label class="form-label" for="username">Username</label>
                      </div>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                        <label class="form-label" for="password">Password</label>
                      </div>
                    </div>
                  </div>

                  <!-- Email -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                        <label class="form-label" for="email">Email</label>
                      </div>
                    </div>

                    <!-- Address -->
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="address" name="address" class="form-control form-control-lg" />
                        <label class="form-label" for="address">Address</label>
                      </div>
                    </div>
                  </div>

                  <!-- Role -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <label class="form-label" for="role">Role</label>
                      <select class="form-select form-control-lg" id="role" name="role" required>
                        <option value="" disabled selected>Choose role</option>
                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>
                        <option value="staff">Staff</option>
                      </select>
                    </div>
                  </div>


                    <div class="mt-4 pt-2">
                      <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</form>
     </main>

    <?php
       include_once (__DIR__. '/../layouts/partials/footer.php'); ?>

      <?php
       include_once (__DIR__. '/../layouts/scripts.php'); ?>
    
</body>
</html>