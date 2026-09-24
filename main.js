document.addEventListener('DOMContentLoaded', () => {

    // 1. Dark/Light Mode Toggle
    const themeBtn = document.getElementById('themeToggle');
    if (themeBtn) {
        themeBtn.addEventListener('click', () => {
            document.body.classList.toggle('bg-dark');
            document.body.classList.toggle('text-white');
        });
    }

    // 2. Event Countdown Timers
    const countdowns = document.querySelectorAll('.countdown');
    countdowns.forEach(el => {
        const targetDate = new Date(el.getAttribute('data-date')).getTime();
        const interval = setInterval(() => {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                clearInterval(interval);
                el.innerHTML = "Event Passed";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            el.innerHTML = `${days}d ${hours}h left`;
        }, 1000);
    });

    // 3. Homepage Event Filter
    const eventSearch = document.getElementById('eventSearch');
    if (eventSearch) {
        eventSearch.addEventListener('keyup', (e) => {
            const term = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.event-card-item');
            cards.forEach(card => {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                card.style.display = title.includes(term) ? 'block' : 'none';
            });
        });
    }

    // 4. Client-side Form Validation & Modal Confirmation
    const openModalBtn = document.getElementById('openModalBtn');
    const form = document.getElementById('registrationForm');

    if (openModalBtn && form) {
        openModalBtn.addEventListener('click', () => {
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
            } else {
                // Populate Modal details
                document.getElementById('modalName').textContent = document.getElementById('full_name').value;
                document.getElementById('modalAdm').textContent = document.getElementById('admission_number').value;
                document.getElementById('modalEvent').textContent = document.getElementById('event_name').value;
                document.getElementById('modalEmail').textContent = document.getElementById('email').value;

                // Trigger Bootstrap Modal programmatically
                const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
                modal.show();
            }
        });

        document.getElementById('finalSubmitBtn').addEventListener('click', () => {
            form.submit();
        });
    }
});