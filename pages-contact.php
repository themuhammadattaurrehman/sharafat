<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './Inc/head.php' ?>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Extract form data
  $id = $_POST["id"];
  $name = $_POST["name"];

  // Perform data validation and sanitization if needed

  // Database insertion code
  try {
      $pdo = new PDO("mysql:host=localhost;dbname=notes_count", "root", "");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $stmt = $pdo->prepare("INSERT INTO employees (c_Id, name) VALUES (:id, :name)");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      
      $stmt->execute();

      // Set status message
      $status = true;
      $message = "Data inserted successfully";
  } catch (PDOException $e) {
      // Set error status message
      $status = false;
      $message = "Error: " . $e->getMessage();
  }
}

?>

</head>

<body>


  <?php include './Inc/header.php' ?>
  <?php include './Inc/sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Employees</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <section class="section contact">
     <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Employees</h5>

              <!-- General Form Elements -->
              <form method="post" action="pages-contact.php">
              <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Id</label>
                  <div class="col-sm-10">
                    <input type="text" name="id" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                  </div>
                  <?php
                  if (isset($status)) {
                    if ($status == true) {
                  ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>
                          <?= $message ?>
                        </strong>
                      </div>
                    <?php
                    } else {
                    ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>
                          <?= $message ?>
                        </strong>
                      </div>
                  <?php
                    }
                  }
                  ?>
                <!-- </div> -->
              </form>
            </div>
          </div>
        </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include './Inc/footer.php' ?>
</body>
</html>