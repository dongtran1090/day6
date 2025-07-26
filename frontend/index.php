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
       include_once (__DIR__. '/layouts/style.php'); ?>

</head>
<body>
    <?php
       include_once (__DIR__. '/layouts/partials/header.php'); ?>
   <main>

  <!-- Carousel -->
  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">

    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">

      <!-- Slide 1 -->
      <div class="carousel-item">
         <img src="http://localhost/demoshop/asset/uploads/silder/side1.webp" class="d-block w-100" alt="Slide 1">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Example headline.</h1>
            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item active">
        <img src="http://localhost/demoshop/asset/uploads/silder/side2.webp" class="d-block w-100" alt="Slide 1">
        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <img src="http://localhost/demoshop/asset/uploads/silder/side3.jpg" class="d-block w-100" alt="Slide 1">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>

    </div>

    <!-- Carousel controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Marketing content -->
  <div class="container marketing">

    <!-- Three columns -->
   <div class="row">

  <div class="col-lg-4 text-center">
    <img src="/demoshop/asset/uploads/image/image.jpg" class="rounded-circle" width="140" height="140" alt="Image 1">
    <h2 class="fw-normal">Order</h2>
    <p>Order </p>
    <p><a class="btn btn-secondary" href="#">View details »</a></p>
  </div>

  <div class="col-lg-4 text-center">
    <img src="/demoshop/asset/uploads/image/image.jpg" class="rounded-circle" width="140" height="140" alt="Image 2">
    <h2 class="fw-normal">Create Order</h2>
    <p>Create order </p>
    <p><a class="btn btn-secondary" href="#">View details »</a></p>
  </div>

  <div class="col-lg-4 text-center">
    <img src="/demoshop/asset/uploads/image/image.jpg" class="rounded-circle" width="140" height="140" alt="Image 3">
    <h2 class="fw-normal">Driver</h2>
    <p>Driver something</p>
    <p><a class="btn btn-secondary" href="#">View details »</a></p>
  </div>

</div>


    </div>

    <!-- Featurettes -->
    <hr class="featurette-divider" />

    <!-- Featurette 1 -->
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">
        Fast order <span class="text-body-secondary">It’ll blow your mind.</span>
        </h2>
        <p class="lead">Great order</p>
      </div>
      <div class="col-md-5">
       <img src="/demoshop/asset/uploads/image/image1.jpg" class="rounded-circle" width="140" height="140" alt="Image 3">
      </div>
    </div>

    <hr class="featurette-divider" />

    <!-- Featurette 2 -->
    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">
          Oh yeah, it’s that good. <span class="text-body-secondary">See for yourself.</span>
        </h2>
        <p class="lead">Another featurette? Of cours</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="/demoshop/asset/uploads/image/image1.jpg" class="rounded-circle" width="140" height="140" alt="Image 3">
      </div>
    </div>

    <hr class="featurette-divider" />

    <!-- Featurette 3 -->
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">
          And lastly, this one. <span class="text-body-secondary">Checkmate.</span>
        </h2>
        <p class="lead">And yes, this is the last block of representative placeholder content</p>
      </div>
      <div class="col-md-5">
       <img src="/demoshop/asset/uploads/image/image1.jpg" class="rounded-circle" width="140" height="140" alt="Image 3">
      </div>
    </div>

    <hr class="featurette-divider" />

  </div> <!-- /.container -->


  <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php 
           include_once __DIR__ . '/../connectDB.php';
            $conn = connectDb();
            $sql = "SELECT id, name,description,price, image_url FROM products";
            $result = $conn->query($sql);
           $data = [];    
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_array(MYSQLI_NUM)) {
                      $data[] = $row;
                  }
                  $result->free_result();
              }
              $conn->close();

        ?>
       <?php
        include_once __DIR__ . '/../connectDB.php';
        $conn = connectDb();
        $sql =" select id , name ,description, price, image_url from products";
        $result = $conn->query($sql);
        $data = [];
        if($result->num_rows>0){
            while($row=$result->fetch_array(MYSQLI_NUM)){
                $data[] = $row;
            }
            $result->free_result();
        }
        $conn->close();
        ?>
        <?php
        foreach($data as $item):
        ?>
        <div class="col" >
         <div class="card shadow-sm"> 
              <img src="/demoshop/asset/<?= $item[4] ?>" alt="<?= $item[1] ?>" class="img-fluid" style="height: 225px; object-fit: cover;">
                <rect width="100%" height="100%" fill="#55595c"></rect>
            </svg>
            <div class="card-body">
              <p class="card-text"><?=$item[1]?></p>
              <p class="card-text"><?=$item[2]?></p>
              <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="/demoshop/frontend/pages/detail.php?id=<?= $item[0] ?>" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
              <!-- <a href="API/add_cart.php" class="btn btn-sm btn-outline-secondary">Add cart</a> -->
                <button 
                  class="add-to-cart-btn btn-outline-secondary btn-add-cart"
                  data-id="<?= $item[0] ?>"
                  data-name="<?= $item[1] ?>"
                   data-price="<?= preg_replace('/[^0-9]/', '', $item[2]) ?>"
                  data-image="<?= $item[4] ?>">
                  ADD cart
              </button>

            </div>
            </div>
          </div>
        </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>

</main>

    <?php
       include_once (__DIR__. '/layouts/partials/footer.php'); ?>

      <?php
       include_once (__DIR__. '/layouts/scripts.php'); ?>
   <script>
  $('.btn-add-cart').on('click', function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    const name = $(this).data('name');
    const price = $(this).data('price');
    const image = $(this).data('image');

    const data = {
      id: id,
      name: name,
      price: price,
      image: image,
      quantity: 1 // Default số lượng là 1
    };

    $.ajax({
      url: '/demoshop/frontend/API/add_cart.php',
      method: 'POST',
      dataType: 'json',
      data: data,
      success: function(response) {
        alert('Product added to cart successfully!');
        console.log(response); // In ra session giỏ hàng nếu cần
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error:', textStatus, errorThrown);
      }
    });
  });
</script>

</body>
</html>