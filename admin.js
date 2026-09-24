// Filter/Search Table Rows in Admin Page
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('adminSearchInput');
    const tableRows = document.querySelectorAll('#recordsTable tbody tr');

    if (searchInput) {
        searchInput.addEventListener('keyup', (e) => {
            const query = e.target.value.toLowerCase();
            let visibleCount = 0;

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(query)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            const countBadge = document.getElementById('recordCount');
            if (countBadge) countBadge.textContent = visibleCount;
        });
    }
});