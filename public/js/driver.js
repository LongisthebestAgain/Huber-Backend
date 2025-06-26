 // Mobile sidebar toggle
 function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.querySelector('.d-lg-none');
    
    if (window.innerWidth < 992) {
        if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
            sidebar.classList.remove('show');
        }
    }
});

// Set minimum date to today for date inputs
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    const dateInputs = document.querySelectorAll('input[type="date"]');
    dateInputs.forEach(input => {
        input.min = today;
        if (!input.value) {
            input.value = today;
        }
    });
});

// Navigation functions
function hideAllSections() {
    document.getElementById('dashboardSection').style.display = 'none';
    document.getElementById('createRideSection').style.display = 'none';
    document.getElementById('myRidesSection').style.display = 'none';
    document.getElementById('earningsSection').style.display = 'none';
    document.getElementById('reviewsSection').style.display = 'none';
    document.getElementById('profileSection').style.display = 'none';
}

function updateActiveNavLink(activeFunction) {
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    
    // Find and activate the correct nav link
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        if (link.onclick && link.onclick.toString().includes(activeFunction)) {
            link.classList.add('active');
        }
    });
}

function showDashboard() {
    hideAllSections();
    document.getElementById('dashboardSection').style.display = 'block';
    updateActiveNavLink('showDashboard');
}

function showCreateRide() {
    hideAllSections();
    document.getElementById('createRideSection').style.display = 'block';
    updateActiveNavLink('showCreateRide');
}

function showMyRides() {
    hideAllSections();
    document.getElementById('myRidesSection').style.display = 'block';
    updateActiveNavLink('showMyRides');
}

function showEarnings() {
    hideAllSections();
    document.getElementById('earningsSection').style.display = 'block';
    updateActiveNavLink('showEarnings');
}

function showReviews() {
    hideAllSections();
    document.getElementById('reviewsSection').style.display = 'block';
    updateActiveNavLink('showReviews');
}

function showProfile() {
    hideAllSections();
    document.getElementById('profileSection').style.display = 'block';
    updateActiveNavLink('showProfile');
}

// Form submission handlers
function createRide(event) {
    event.preventDefault();
    
    // Get form data
    const formData = new FormData(event.target);
    
    // Show success message
    alert('🎉 Ride created successfully! Your ride offer is now live and passengers can book it.');
    
    // Switch to My Rides section to show the new ride
    showMyRides();
    
    // Reset form
    event.target.reset();
}

// Add event listeners for forms
document.addEventListener('DOMContentLoaded', function() {
    // Prevent default form submissions and add custom handlers
    document.querySelectorAll('form').forEach(form => {
        if (!form.onsubmit) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('✅ Information updated successfully!');
            });
        }
    });
});

// Booking Management Functions
function editRide(rideId) {
    alert(`✏️ Edit ride functionality:\n\n• Modify departure time\n• Update pickup/dropoff locations\n• Change number of available seats\n• Adjust pricing\n• Add special requirements`);
}

function cancelRide(rideId) {
    if (confirm('❌ Cancel this ride?\n\nThis will:\n• Notify all passengers\n• Process refunds\n• Remove the ride offer')) {
        alert('🚫 Ride cancelled successfully!\n\n• All passengers notified\n• Refunds being processed\n• Ride removed from listings');
    }
}

// View Passengers Modal
function viewPassengers(rideId) {
    // Different passenger lists based on ride ID
    const passengersList = rideId === 1 ? [
        { name: 'Michael Wilson', seats: 1, amount: 22.50, image: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=40&h=40&fit=crop&crop=face' },
        { name: 'David Thompson', seats: 1, amount: 22.50, image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face' }
    ] : [
        { name: 'Michael Wilson', seats: 1, amount: 22.50, image: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=40&h=40&fit=crop&crop=face' },
        { name: 'David Thompson', seats: 1, amount: 22.50, image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face' },
        { name: 'Sarah Johnson', seats: 2, amount: 45.00, image: 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=40&h=40&fit=crop&crop=face' }
    ];

    const totalEarnings = passengersList.reduce((sum, p) => sum + p.amount, 0);

    let modalContent = `
        <div class="modal fade" id="passengersModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">👥 Confirmed Passengers</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group">
                            ${passengersList.map(passenger => `
                                <div class="list-group-item">
                                    <div class="d-flex align-items-center">
                                        <img src="${passenger.image}" class="rounded-circle me-3" width="40" height="40">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">${passenger.name}</h6>
                                            <small class="text-muted">${passenger.seats} seat${passenger.seats > 1 ? 's' : ''} • $${passenger.amount.toFixed(2)}</small>
                                        </div>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                        <div class="text-end mt-3">
                            <small class="text-muted">Total Earnings: $${totalEarnings.toFixed(2)}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    // Remove existing modal if any
    const existingModal = document.getElementById('passengersModal');
    if (existingModal) {
        existingModal.remove();
    }

    // Add new modal to body
    document.body.insertAdjacentHTML('beforeend', modalContent);

    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('passengersModal'));
    modal.show();
}