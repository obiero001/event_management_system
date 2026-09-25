<?php 
include 'header.php'; 
$preselected_event = isset($_GET['event']) ? htmlspecialchars($_GET['event']) : '';
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Student Registration Form</h3>
            </div>
            <div class="card-body p-4">
                
                <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registration Successful!</strong> Your response has been safely stored.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Registration Failed!</strong> <?php echo isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : 'An error occurred.'; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form id="registrationForm" action="process_registration.php" method="POST" novalidate>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name *</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required>
                        <div class="invalid-feedback">Please enter your full name.</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="admission_number" class="form-label">Admission Number *</label>
                            <input type="text" name="admission_number" id="admission_number" class="form-control" placeholder="CS/1001/22" required>
                            <div class="invalid-feedback">Enter a valid admission number.</div>
                        </div>
                       <div class="col-md-6 mb-3">
    <label for="course" class="form-label">Course *</label>
    <select name="course" id="course" class="form-select" required>
        <option value="" disabled selected>-- Select your course --</option>
        <option value="Computer Science">B.Sc. Computer Science</option>
        <option value="Information Technology">B.Sc. Information Technology</option>
        <option value="Software Engineering">B.Sc. Software Engineering</option>
        <option value="Business Administration">Bachelor of Business Administration (BBA)</option>
        <option value="Data Science">B.Sc. Data Science & Analytics</option>
        <option value="Cyber Security">B.Sc. Cyber Security</option>
        <option value="Graphic Design">B.A. Graphic & Digital Design</option>
          <option value="Mass Communication">Bmmc. Mass comm</option>
        <option value="Electrical Engineering">B.Sc. Electrical Engineering</option>
        <option value="Other">Other / Unlisted Course</option>
    </select>
    <div class="invalid-feedback">Please select your course from the list.</div>
</div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number *</label>
                            <input type="tel" name="phone" id="phone" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid phone number.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="event_name" class="form-label">Select Event *</label>
                        <select name="event_name" id="event_name" class="form-select" required>
                            <option value="">-- Choose an Event --</option>
                            <option value="Tech Hackathon" <?php echo ($preselected_event == 'Tech Hackathon') ? 'selected' : ''; ?>>Tech Hackathon</option>
                            <option value="Career Fair" <?php echo ($preselected_event == 'Career Fair') ? 'selected' : ''; ?>>Career & Internship Fair</option>
                            <option value="Cultural Night" <?php echo ($preselected_event == 'Cultural Night') ? 'selected' : ''; ?>>Cultural Night Gala</option>
                        </select>
                        <div class="invalid-feedback">Please pick an event.</div>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="button" id="openModalBtn" class="btn btn-primary btn-lg">Submit Registration</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Confirm Event Registration</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Please double check your details before submitting:</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Name:</strong> <span id="modalName"></span></li>
            <li class="list-group-item"><strong>Admission No:</strong> <span id="modalAdm"></span></li>
            <li class="list-group-item"><strong>Event:</strong> <span id="modalEvent"></span></li>
            <li class="list-group-item"><strong>Email:</strong> <span id="modalEmail"></span></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Edit Details</button>
        <button type="button" id="finalSubmitBtn" class="btn btn-success">Confirm & Submit</button>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>