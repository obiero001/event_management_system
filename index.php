<?php include 'header.php'; ?>

<div class="row mb-4 align-items-center">
    <div class="col-md-8">
        <h1 class="display-5 fw-bold">Upcoming Campus Events</h1>
        <p class="lead">Explore upcoming academic and social events and reserve your spot today.</p>
    </div>
    <div class="col-md-4">
        <input type="text" id="eventSearch" class="form-control form-control-lg" placeholder="🔍 Search events...">
    </div>
</div>

<div class="row g-4" id="eventCardsList">
    <!-- Event Card 1 -->
    <div class="col-md-4 event-card-item">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <span class="badge bg-primary mb-2">Tech</span>
                <h5 class="card-title">Annual Tech Hackathon</h5>
                <p class="card-text text-muted">A 24-hour coding challenge for developers, designers, and innovators.</p>
                <div class="alert alert-info py-2 small">
                    ⏳ Starts in: <span class="countdown" data-date="2026-11-15T09:00:00">Loading...</span>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 pb-3">
                <a href="register.php?event=Tech%20Hackathon" class="btn btn-outline-primary w-100">Register Now</a>
            </div>
        </div>
    </div>

    <!-- Event Card 2 -->
    <div class="col-md-4 event-card-item">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <span class="badge bg-success mb-2">Career</span>
                <h5 class="card-title">Career & Internship Fair</h5>
                <p class="card-text text-muted">Connect with top employers and explore internships across various industries.</p>
                <div class="alert alert-info py-2 small">
                    ⏳ Starts in: <span class="countdown" data-date="2026-12-01T10:00:00">Loading...</span>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 pb-3">
                <a href="register.php?event=Career%20Fair" class="btn btn-outline-primary w-100">Register Now</a>
            </div>
        </div>
    </div>

    <!-- Event Card 3 -->
    <div class="col-md-4 event-card-item">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <span class="badge bg-warning text-dark mb-2">Culture</span>
                <h5 class="card-title">Cultural Night Gala</h5>
                <p class="card-text text-muted">An evening celebrating diversity with music, dance, and food performances.</p>
                <div class="alert alert-info py-2 small">
                    ⏳ Starts in: <span class="countdown" data-date="2026-10-20T18:00:00">Loading...</span>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 pb-3">
                <a href="register.php?event=Cultural%20Night" class="btn btn-outline-primary w-100">Register Now</a>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>