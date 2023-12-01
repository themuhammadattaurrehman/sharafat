<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './Inc/head.php' ?>
</head>

<body>


  <?php include './Inc/header.php' ?>
  <?php include './Inc/sidebar.php' ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <!-- <li class="breadcrumb-item">Users</li> -->
          <li class="breadcrumb-item active">Notes form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <?php
    // $host = 'localhost';
    // $dbname = 'notes_count';
    // $username = 'root';
    // $password = '';

    // try {
    //     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // } catch (PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage();
    //     exit;
    // }
    //   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     // Step 5: Insert the data into the database
    //     $insert_into = $_POST['insert_into']; // Get the selected table name
    //     unset($_POST['insert_into']); // Remove the table name from the $_POST array

    //     // Prepare the INSERT statement based on the chosen table
    //     $table_name = $insert_into;
    // $employee= $_POST['employee'];
    //     $columns = array_keys($_POST);
    //     $column_names = implode(', ', array_map(function($column) {
    //         return "`$column`"; // Wrap column names with backticks
    //     }, $columns));

    //     $placeholders = implode(', ', array_fill(0, count($columns), '?'));

    //     $sql = "INSERT INTO $table_name (`employee`,$column_names) VALUES (?,$placeholders)";
    //     $stmt = $pdo->prepare($sql);
    //     $values = array_merge([$employee], $values);
    //     // Bind the form input values to the statement
    //     $values = array_values($_POST);
    //     $stmt->execute($values);

    //     // Set a message to display after the form submission
    //     $status = true; // You can set this to false if you want to display an error message instead
    //     $message = "Data inserted successfully!";
    // }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // ... Your existing code for handling form submission ...

      if (isset($_POST["note"])) {
        // Handle notes form submission
        // Process the form data and save to the database
        // Provide appropriate feedback or redirection
        unset($_POST["note"]);
        $insert_into = $_POST['insert_into']; // Get the selected table name
        unset($_POST['insert_into']);

        // Prepare the INSERT statement based on the chosen table
        $table_name = $insert_into;
        $employee = $_POST['employee'];
        $columns = array_keys($_POST);

        // Remove 'employee' column from columns array
        $index = array_search('employee', $columns);
        if ($index !== false) {
          unset($columns[$index]);
        }

        $column_names = implode(', ', array_map(function ($column) {
          return "`$column`"; // Wrap column names with backticks
        }, $columns));

        $placeholders = implode(', ', array_fill(0, count($columns), '?'));

        $sql = "INSERT INTO $table_name (`employee`, $column_names) VALUES (?, $placeholders)";
        $stmt = $pdo->prepare($sql);

        // Bind the form input values to the statement
        $stmt->bindParam(1, $employee);
        $paramIndex = 2;
        foreach ($columns as $column) {
          $stmt->bindParam($paramIndex, $_POST[$column]);
          $paramIndex++;
        }
        try {
          $stmt->execute();
          $status = true; // Success
          $message = "Data inserted successfully!";
      } catch (PDOException $e) {
          $status = false; // Failure
          $message = "Error: " . $e->getMessage();
      }
      } elseif (isset($_POST["expense_submit"])) {
        $petrol = $_POST['petrol'];
        $repair = $_POST['repair'];
        $mantenance = $_POST['mantenance'];
        $challan = $_POST['challan'];
        $description = $_POST['description'];

        // Assuming you have a valid PDO connection in $pdo
        $expenseSql = "INSERT INTO expense (petrol, repair, mantenance, challan, description)
                     VALUES (:petrol, :repair, :mantenance, :challan, :description)";

        $stmt = $pdo->prepare($expenseSql);
        $stmt->bindParam(':petrol', $petrol);
        $stmt->bindParam(':repair', $repair);
        $stmt->bindParam(':mantenance', $mantenance);
        $stmt->bindParam(':challan', $challan);
        $stmt->bindParam(':description', $description);

        try {
          $stmt->execute();
          $status1 = true;
          $message2 = "Expense record inserted successfully";
        } catch (PDOException $e1) {
          $status1 = false;
          $message2 = "Error: " . $e1->getMessage();
        }
      }
    }


    ?>


    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Notes counter</h5>
              <!-- General Form Elements -->
              <form method="post" action="users-profile.php">
                <?php
                $table_name = 'counter'; // Replace this with your actual table name
                $sql = "SHOW COLUMNS FROM $table_name";
                $result = $pdo->query($sql);
                $columns = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($columns as $column) {
                  $column_name = $column['Field'];
                  $data_type = $column['Type'];
                  if ($column_name === 'Id' || $column_name === 'employee' || $column_name === 'created_at') {
                    continue;
                  }
                  $input_type = 'text'; // Default to text input
                  if (strpos($data_type, 'int') !== false || strpos($data_type, 'float') !== false) {
                    $input_type = 'number';
                  } elseif (strpos($data_type, 'text') !== false || strpos($data_type, 'char') !== false) {
                    $input_type = 'text';
                  }
                  echo '<div class="row mb-3">';
                  echo "<label for='$column_name' class='col-sm-3 col-form-label'>$column_name</label>";
                  echo '<div class="col-sm-8">';
                  echo "<input type='$input_type' name='$column_name' class='form-control'>";
                  echo '</div>';
                  echo '</div>';
                }
                ?>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Employee</label>
                  <div class="col-sm-8">
                    <select class="form-select" name="employee" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <?php
                      $stmt = $pdo->query("SELECT c_Id, name FROM employees");

                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $employeeId = $row['c_Id'];
                        $employeeName = $row['name'];
                        echo "<option value=\"$employeeName\">$employeeId-$employeeName</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Insert</label>
                  <div class="col-sm-8">
                    <select class="form-select" name="insert_into" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="counter">Counter</option>
                      <option value="safe">Safe</option>
                      <option value="bank_account">Bank Account</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <!-- <button type="submit" name="notes_submit" class="btn btn-primary">Submit Button</button> -->
                    <input type="submit" name="note" value="Submit Notes" class="btn btn-primary">
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
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Expense</h5>
              <form method="post" action="users-profile.php">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Petrol</label>
                <div class="col-sm-8">
                  <input type="text" name="petrol" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Repair</label>
                <div class="col-sm-8">
                  <input type="text" name="repair" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Mantenance</label>
                <div class="col-sm-8">
                  <input type="text" name="mantenance" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Challan</label>
                <div class="col-sm-8">
                  <input type="text" name="challan" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-8">
                  <textarea class="form-control" name="description" style="height: 100px"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">
                  <!-- <button type="submit" name="expense_submit" class="btn btn-primary">Submit Button</button> -->
                  <input type="submit" name="expense_submit" value="Submit Expense" class="btn btn-primary">
                </div>
              </div>
              <?php
              if (isset($status1)) {
                if ($status1 == true) {
              ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                      <?= $message2 ?>
                    </strong>

                  </div>
                <?php
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>
                      <?= $message2 ?>
                    </strong>
                  </div>
              <?php
                }
              }
              ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './Inc/footer.php' ?>
</body>

</html>