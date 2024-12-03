<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'dosen') {
    // Redirect to login if not logged in or not a dosen
    header('Location: /pages/login.php');
    exit();
}

// Include the database connection file
include_once '../../config/database.php'; // Ensure this path is correct

// Get user details based on session user_id
$user_id = $_SESSION['user_id'];

// Query to get the dosen's name using the user_id
$sql = "SELECT name FROM Dosen WHERE id_dosen = ?";
$params = array($user_id);

// Prepare and execute the statement
$stmt = sqlsrv_prepare($conn, $sql, $params);
if ($stmt) {
    sqlsrv_execute($stmt);
    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $username = $user['name']; // Fetch the dosen's name
} else {
    // In case of query error, log it and redirect to error page
    error_log("Error fetching user data: " . print_r(sqlsrv_errors(), true));
    header('Location: /pages/login.php?error=Database error');
    exit();
}

// Include the header
include '../../includes/header.php';
?>

<div class="container my-5">
    <!-- Display the welcome message with the user's name -->
    <h2 class="text-center mb-4">Welcome, <?php echo htmlspecialchars($username); ?> (Dosen)</h2>
    <p class="text-center mb-5">Access your academic dashboard below.</p>

    <div class="row g-4">
        <!-- View Tata Tertib -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Tata Tertib</h5>
                    <p class="card-text">View the faculty's rules and regulations.</p>
                    <a href="tata_tertib.php" class="btn btn-primary">View Tata Tertib</a>
                </div>
            </div>
        </div>

        <!-- Buat Laporan (Create Report) -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Buat Laporan</h5>
                    <p class="card-text">Report student violations here.</p>
                    <a href="buat_laporan.php" class="btn btn-primary">Create Report</a>
                </div>
            </div>
        </div>

        <!-- Laporan Tata Tertib (View Reports) -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Laporan Tata Tertib</h5>
                    <p class="card-text">View and verify violation reports.</p>
                    <a href="laporan.php" class="btn btn-primary">View Reports</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include the footer
include '../../includes/footer.php';
?>
