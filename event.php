<?php

$pageTitle = "Upcoming Campus Events - DanFam College";

// Include shared header navigation and CSS stylesheet
include_once 'header.php';

// Define static event array (Can easily be replaced with a database query later)
$events = [
    [
        'id' => 1,
        'title' => 'Annual Tech Hackathon',
        'category' => 'Technology',
        'badge_class' => 'bg-primary',
        'date' => '2026-10-15',
        'start_time' => '2026-10-15T09:00:00',
        'description' => 'A 24-hour intense coding challenge for developers, designers, and innovators to solve real-world problems.'
    ],
    [
        'id' => 2,
        'title' => 'Career & Internship Fair',
        'category' => 'Career',
        'badge_class' => 'bg-success',
        'date' => '2026-11-01',
        'start_time' => '2026-11-01T10:00:00',
        'description' => 'Connect directly with top industry employers, present your resume, and explore internship opportunities.'
    ],
    [
        'id' => 3,
        'title' => 'Cultural Night Gala',
        'category' => 'Culture',
        'badge_class' => 'bg-warning text-dark',
        'date' => '2026-12-05',
        'start_time' => '2026-12-05T18:00:00',
        'description' => 'An evening celebrating campus diversity through live music, dance performances, fashion, and food.'
    ]
];
?>

<!-- Event Search & Header -->
<div id="eventsSection" class="row mb-4 align-items-center pt-2">
    <div class="col-lg-7 mb-3 mb-lg-0">
        <h2 class="fw-bold text-dark">Upcoming Campus Events</h2>
        <p class="text-muted mb-0">Select an event below to secure your spot online.</p>
    </div>
    <div class="col-lg-5">
        <div class="input-group shadow-sm">
            <span class="input-group-text bg-white border-end-0">🔍</span>
            <input type="text" id="eventSearch" class="form-control form-control-lg border-start-0 shadow-none" placeholder="Search...">
        </div>
    </div>
</div>

<!-- Event Cards Grid -->
<div class="row g-4" id="eventCardsList">
    <?php foreach ($events as $event): ?>
        <div class="col-md-6 col-lg-4 event-card-item">
            <div class="card h-100 shadow-sm border-0 event-card">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge <?php echo htmlspecialchars($event['badge_class']); ?> px-2 py-1">
                            <?php echo htmlspecialchars($event['category']); ?>
                        </span>
                        <small class="text-muted">
                            <?php echo date("M d, Y", strtotime($event['date'])); ?>
                        </small>
                    </div>
                    <h5 class="card-title fw-bold text-dark mb-2">
                        <?php echo htmlspecialchars($event['title']); ?>
                    </h5>
                    <p class="card-text text-secondary flex-grow-1">
                        <?php echo htmlspecialchars($event['description']); ?>
                    </p>
                    <div class="alert alert-info py-2 px-3 small rounded-3 mb-3 d-flex justify-content-between align-items-center">
                        <span>⏳ Starts in:</span>
                        <span class="fw-bold countdown" data-date="<?php echo htmlspecialchars($event['start_time']); ?>">
                            Loading...
                        </span>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pb-3">
                    <a href="register.php?event=<?php echo urlencode($event['title']); ?>" class="btn btn-outline-primary w-100 fw-semibold">
                        Register Now
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div> <!-- End Cards Grid -->

<!-- No Search Results Fallback -->
<div id="noEventsFound" class="text-center py-5 d-none">
    <h4 class="text-muted">No matching events found.</h4>
    <p class="text-secondary">Try searching for a different keyword or category.</p>
</div>

<?php 

include_once 'footer.php'; 
?>