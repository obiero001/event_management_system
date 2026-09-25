<?php 
require_once 'connect_db.php';
include 'header.php';

// Retrieve all records from the database ordered by latest registration.
try {
    $stmt = $pdo->query("SELECT * FROM registrations ORDER BY registration_date DESC");
    $registrations = $stmt->fetchAll();
} catch (\PDOException $e) {
    $error = $e->getMessage();
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2>Event Registration Records</h2>
        <p class="text-muted mb-0">Total Registered Students: <span class="badge bg-primary fs-6" id="recordCount"><?php echo count($registrations); ?></span></p>
    </div>
    <div class="w-25">
        <input type="text" id="adminSearchInput" class="form-control" placeholder="🔍 Search records...">
    </div>
</div>

<?php if (isset($error)): ?>
    <div class="alert alert-danger">Error retrieving data: <?php echo htmlspecialchars($error); ?></div>
<?php else: ?>
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover table-striped align-middle mb-0" id="recordsTable">
            <thead class="table-dark">
                <tr>
                    <th>Reg ID</th>
                    <th>Student Name</th>
                    <th>Admission No</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Event</th>
                    <th>Date Registered</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($registrations) > 0): ?>
                    <?php foreach ($registrations as $row): ?>
                        <tr>
                            <td>#<?php echo htmlspecialchars($row['id']); ?></td>
                            <td class="fw-semibold"><?php echo htmlspecialchars($row['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['admission_number']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['course']); ?></td>
                            <td><span class="badge bg-secondary"><?php echo htmlspecialchars($row['event_name']); ?></span></td>
                            <td><?php echo date("M d, Y h:i A", strtotime($row['registration_date'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr id="noRecordsRow">
                        <td colspan="8" class="text-center py-4 text-muted">No registration records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<script src="admin.js"></script>
<?php include 'footer.php'; ?>