<!DOCTYPE html>
<html lang="en">

<head>
<?php include './Inc/head.php' ?>
</head>

<body>

  <!-- ======= Header ======= -->
  
  <?php include './Inc/header.php' ?>
  <?php include './Inc/sidebar.php' ?>
  <!-- ======= Sidebar ======= -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <!-- <li class="breadcrumb-item">Pages</li> -->
          <li class="breadcrumb-item active">Tables</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  
    <?php
// Replace 'your_database_name', 'your_username', 'your_password', and 'your_table_name' with your actual database credentials and table name.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes_count";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the table
$sql = "SELECT * FROM counter";

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    // Fetch data and store it in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>

<section>
<div class="row">
        <div class="col-lg-9">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Counter Table</h5>

              <!-- Default Table -->
              <table class="table">
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
              
// Assuming you have already set up your database connection ($pdo)
$table_name = 'counter'; // Replace this with your actual table name

// Retrieve column information
$sql = "SHOW COLUMNS FROM $table_name";
$result = $pdo->query($sql);
$columns = $result->fetchAll(PDO::FETCH_ASSOC);
?>
                <thead>
                  <tr>
                  <?php
        // Generate table headers using column names
        foreach ($columns as $column) {
            $column_name = $column['Field'];
            echo '<th>' . $column_name . '</th>';
        }
        ?>
                    <!-- <th scope="col">Others</th> -->
                  </tr>
                </thead>
                <tbody>
                <?php
              // Loop through the data array and populate the table rows
             
              // Display data in a loop
              foreach ($data as $row) {
                  echo '<tr>';
                  foreach ($columns as $column) {
                      $column_name = $column['Field'];
                      
                          echo '<td>' . $row[$column_name] . '</td>';
                     
                  }
                  echo '</tr>';
              }
              ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</div>
</div>
<?php
// Replace 'your_database_name', 'your_username', 'your_password', and 'your_table_name' with your actual database credentials and table name.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes_count";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the table
$sql = "SELECT * FROM safe";

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    // Fetch data and store it in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>
         <div class="row">
        <div class="col-lg-9">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Safe Table</h5>

              <!-- Default Table -->
              <table class="table">
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
              
// Assuming you have already set up your database connection ($pdo)
$table_name = 'safe'; // Replace this with your actual table name

// Retrieve column information
$sql = "SHOW COLUMNS FROM $table_name";
$result = $pdo->query($sql);
$columns = $result->fetchAll(PDO::FETCH_ASSOC);
?>
                <thead>
                <tr>
                <?php
        // Generate table headers using column names
        foreach ($columns as $column) {
            $column_name = $column['Field'];
            echo '<th>' . $column_name . '</th>';
        }
        ?>
                  </tr>
                </thead>
                <tbody>
                <?php
              // Loop through the data array and populate the table rows
             
              // Display data in a loop
              foreach ($data as $row) {
                  echo '<tr>';
                  foreach ($columns as $column) {
                      $column_name = $column['Field'];
                      
                          echo '<td>' . $row[$column_name] . '</td>';
                     
                  }
                  echo '</tr>';
              }
              ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</div>
</div>
<?php
// Replace 'your_database_name', 'your_username', 'your_password', and 'your_table_name' with your actual database credentials and table name.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes_count";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the table
$sql = "SELECT * FROM bank_account";

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    // Fetch data and store it in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>
<div class="row">
          <div class="col-lg-9">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Bank Account Table</h5>

              <!-- Default Table -->
              <table class="table">
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
              
// Assuming you have already set up your database connection ($pdo)
$table_name = 'bank_account'; // Replace this with your actual table name

// Retrieve column information
$sql = "SHOW COLUMNS FROM $table_name";
$result = $pdo->query($sql);
$columns = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Inside your HTML -->
<thead>
    <tr>
        <?php
        // Generate table headers using column names
        foreach ($columns as $column) {
            $column_name = $column['Field'];
            echo '<th>' . $column_name . '</th>';
        }
        ?>
    </tr>
</thead>
                <tbody>
                <?php
              // Loop through the data array and populate the table rows
             
              // Display data in a loop
              foreach ($data as $row) {
                  echo '<tr>';
                  foreach ($columns as $column) {
                      $column_name = $column['Field'];
                      
                          echo '<td>' . $row[$column_name] . '</td>';
                     
                  }
                  echo '</tr>';
              }
              ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
          <?php
// Replace 'your_database_name', 'your_username', 'your_password', and 'your_table_name' with your actual database credentials and table name.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes_count";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the table
$sql = "SELECT * FROM expense";

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    // Fetch data and store it in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>
<div class="row">
          <div class="col-lg-9">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Expense Table</h5>

              <!-- Default Table -->
              <table class="table">
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
              
// Assuming you have already set up your database connection ($pdo)
$table_name = 'expense'; // Replace this with your actual table name

// Retrieve column information
$sql = "SHOW COLUMNS FROM $table_name";
$result = $pdo->query($sql);
$columns = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Inside your HTML -->
<thead>
    <tr>
        <?php
        // Generate table headers using column names
        foreach ($columns as $column) {
            $column_name = $column['Field'];
            echo '<th>' . $column_name . '</th>';
        }
        ?>
    </tr>
</thead>
                <tbody>
                <?php
              // Loop through the data array and populate the table rows
             
              // Display data in a loop
              foreach ($data as $row) {
                  echo '<tr>';
                  foreach ($columns as $column) {
                      $column_name = $column['Field'];
                      
                          echo '<td>' . $row[$column_name] . '</td>';
                     
                  }
                  echo '</tr>';
              }
              ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
          <?php
// Replace 'your_database_name', 'your_username', 'your_password', and 'your_table_name' with your actual database credentials and table name.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes_count";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the table
$sql = "SELECT * FROM employees";

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    // Fetch data and store it in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>
<div class="row">
          <div class="col-lg-8">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Employees Table</h5>

              <!-- Default Table -->
              <table class="table">
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
              
// Assuming you have already set up your database connection ($pdo)
$table_name = 'employees'; // Replace this with your actual table name

// Retrieve column information
$sql = "SHOW COLUMNS FROM $table_name";
$result = $pdo->query($sql);
$columns = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Inside your HTML -->
<thead>
    <tr>
        <?php
        // Generate table headers using column names
        foreach ($columns as $column) {
            $column_name = $column['Field'];
            echo '<th>' . $column_name . '</th>';
        }
        ?>
    </tr>
</thead>
                <tbody>
                <?php
              // Loop through the data array and populate the table rows
             
              // Display data in a loop
              foreach ($data as $row) {
                  echo '<tr>';
                  foreach ($columns as $column) {
                      $column_name = $column['Field'];
                      
                          echo '<td>' . $row[$column_name] . '</td>';
                     
                  }
                  echo '</tr>';
              }
              ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</div>
</section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './Inc/footer.php' ?>

</body>

</html>