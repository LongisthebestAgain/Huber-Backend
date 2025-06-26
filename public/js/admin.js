
// Mobile sidebar toggle
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}

// Navigation functions
function showUserManagement() {
    hideAllViews();
    document.getElementById('userManagementView').style.display = 'block';
    updateActiveNavLink('user-management');
}

function showDriverManagement() {
    hideAllViews();
    document.getElementById('driverManagementView').style.display = 'block';
    updateActiveNavLink('driver-management');
}
function showDriverVerification() {
    hideAllViews();
    document.getElementById('driverVerificationView').style.display = 'block';
    updateActiveNavLink('driver-verification');
}

function showRideManagement() {
    hideAllViews();
    document.getElementById('rideManagementView').style.display = 'block';
    updateActiveNavLink('ride-management');
}

function hideAllViews() {
    const views = ['dashboardView', 'userManagementView', 'driverManagementView', 'rideManagementView'];
    views.forEach(view => {
        const element = document.getElementById(view);
        if (element) element.style.display = 'none';
    });
}

function updateActiveNavLink(section) {
    // Remove active class from all nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });

    // Add active class to the clicked link
    const activeLink = document.querySelector(`.nav-link[data-section="${section}"]`);
    if (activeLink) activeLink.classList.add('active');
}

function showDashboard() {
    hideAllViews();
    document.getElementById('dashboardView').style.display = 'block';
    updateActiveNavLink('dashboard');
}

// Click handlers and initial setup
document.addEventListener('DOMContentLoaded', function() {
    // Show dashboard by default
    showDashboard();

    // Add click handlers for navigation
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
            }
        });
    });

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

    // Set default date to today for ride date selector
    const today = new Date().toISOString().split('T')[0];
    const rideDateInput = document.getElementById('rideDate');
    if (rideDateInput) {
        rideDateInput.value = today;
        rideDateInput.max = today;
    }

    // Add event listener for date change
    rideDateInput.addEventListener('change', function() {
        filterRides();
    });

    // Add event listener for status filter
    document.querySelector('.form-select').addEventListener('change', function() {
        filterRides();
    });
});

function filterRides() {
    const selectedDate = document.getElementById('rideDate').value;
    const selectedStatus = document.querySelector('.form-select').value;

    // In a real application, this would make an API call to get rides for the selected date
    alert(`🔄 Fetching rides for ${selectedDate}\nStatus Filter: ${selectedStatus}\n\nThis would typically:\n• Load rides for selected date\n• Apply status filter\n• Update the table content\n• Refresh statistics`);
}

// Driver Management Functions
function viewDriverDetails(driverId) {
    alert(`🔍 Viewing detailed profile for driver: ${driverId}\n\n• Personal Information\n• Vehicle Documentation\n• Ride History\n• Performance Analytics\n• Customer Reviews\n• Earnings Summary`);
}

function viewDriverRides(driverId) {
    alert(`🚗 Viewing ride history for driver: ${driverId}\n\n• Recent rides\n• Route patterns\n• Passenger feedback\n• Earnings breakdown\n• Performance metrics`);
}

function suspendDriver(driverId) {
    const reason = prompt(`⚠️ Suspend driver account: ${driverId}\n\nPlease enter reason for suspension:`);
    if (reason) {
        if (confirm(`Confirm suspension of ${driverId}?\n\nReason: ${reason}\n\nThis will:\n• Disable their account\n• Cancel active rides\n• Notify the driver`)) {
            alert(`✅ Driver ${driverId} has been suspended.\n\n• Account disabled\n• Active rides cancelled\n• Notification sent\n• Case logged for review`);
        }
    }
}

function reactivateDriver(driverId) {
    if (confirm(`✅ Reactivate driver account: ${driverId}?\n\nThis will:\n• Restore account access\n• Allow new ride bookings\n• Send reactivation notification`)) {
        alert(`🎉 Driver ${driverId} has been reactivated!\n\n• Account restored\n• Full access granted\n• Welcome back notification sent`);
    }
}

function permanentBan(driverId) {
    const reason = prompt(`🚫 PERMANENT BAN for driver: ${driverId}\n\nThis is irreversible. Please enter detailed reason:`);
    if (reason) {
        if (confirm(`⚠️ FINAL CONFIRMATION\n\nPermanently ban ${driverId}?\n\nReason: ${reason}\n\nThis action CANNOT be undone!`)) {
            alert(`🚫 Driver ${driverId} has been permanently banned.\n\n• Account permanently disabled\n• All data archived\n• Legal compliance notification sent\n• Case documented`);
        }
    }
}

// View Passengers Modal Function
function viewPassengers(rideId) {
    const passengersData = {
        1: [
            "Sarah Wilson (+1 555-123-4567)",
            "James Brown (+1 555-234-5678)"
        ],
        2: [
            "John Davis (+1 555-987-6543)"
        ],
        4: [
            "Lisa Anderson (+1 555-345-6789)",
            "Tom Wilson (+1 555-456-7890)",
            "Emma Davis (+1 555-567-8901)"
        ]
    };

    const passengers = passengersData[rideId];
    if (passengers) {
        const passengerList = document.getElementById('passengerList');
        passengerList.innerHTML = `
            <ul class="passenger-list">
                ${passengers.map(passenger => `
                    <li class="passenger-item">
                        <div class="passenger-icon">👤</div>
                        <div>${passenger}</div>
                    </li>
                `).join('')}
            </ul>
        `;
        document.getElementById('passengerPopup').style.display = 'block';
    }
}

function closePassengerPopup() {
    document.getElementById('passengerPopup').style.display = 'none';
}

// Close popup when clicking outside
document.getElementById('passengerPopup').addEventListener('click', function(e) {
    if (e.target === this) {
        closePassengerPopup();
    }
});

// Filter applications
function filterApplications() {
    const status = document.getElementById('statusFilter').value;
    const priority = document.getElementById('priorityFilter').value;
    const searchTerm = document.getElementById('searchFilter').value.toLowerCase();

    const applications = document.querySelectorAll('.verification-card');

    applications.forEach(app => {
        let show = true;

        if (status !== 'all' && !app.classList.contains(status)) {
            show = false;
        }

        if (priority !== 'all' && app.dataset.priority !== priority) {
            show = false;
        }

        if (searchTerm && !app.textContent.toLowerCase().includes(searchTerm)) {
            show = false;
        }

        app.style.display = show ? 'block' : 'none';
    });
}

// Document modal functionality
document.querySelectorAll('.document-thumbnail').forEach(thumb => {
    thumb.addEventListener('click', function() {
        const docType = this.dataset.doc;
        const docImage = document.getElementById('documentImage');

        // Set appropriate image based on document type
        switch (docType) {
            case 'license':
                docImage.src = 'https://via.placeholder.com/600x400/007bff/ffffff?text=Driver%27s+License+Document';
                break;
            case 'registration':
                docImage.src = 'https://via.placeholder.com/600x400/28a745/ffffff?text=Vehicle+Registration+Document';
                break;
            case 'insurance':
                docImage.src = 'https://via.placeholder.com/600x400/ffc107/000000?text=Insurance+Certificate';
                break;
            case 'background':
                docImage.src = 'https://via.placeholder.com/600x400/17a2b8/ffffff?text=Background+Check+Report';
                break;
        }
    });
});

// Application actions
function approveDriver(applicationId) {
    if (confirm(`Are you sure you want to approve application ${applicationId}?`)) {
        alert(`Application ${applicationId} approved successfully!`);
        // Update UI to show approved status
    }
}

function rejectDriver(applicationId) {
    const reason = prompt(`Please provide a reason for rejecting application ${applicationId}:`);
    if (reason) {
        alert(`Application ${applicationId} rejected. Reason: ${reason}`);
        // Update UI to show rejected status
    }
}

function requestMoreInfo(applicationId) {
    const info = prompt(`What additional information is needed for ${applicationId}?`);
    if (info) {
        alert(`Information request sent for application ${applicationId}`);
    }
}

function assignReviewer(applicationId) {
    const reviewer = prompt(`Enter reviewer name for application ${applicationId}:`);
    if (reviewer) {
        alert(`Application ${applicationId} assigned to ${reviewer}`);
    }
}

function addNotes(applicationId) {
    const notes = prompt(`Add notes for application ${applicationId}:`);
    if (notes) {
        alert(`Notes added for application ${applicationId}`);
    }
}

function contactDriver(applicationId) {
    alert(`Opening contact form for application ${applicationId}`);
}

// Document review functions
function verifyDocument() {
    alert('Document verified successfully!');
}

function flagDocument() {
    const issue = prompt('Please describe the issue with this document:');
    if (issue) {
        alert('Document flagged for review.');
    }
}

function rejectDocument() {
    const reason = prompt('Please provide a reason for rejecting this document:');
    if (reason) {
        alert('Document rejected.');
    }
}

function saveDocumentReview() {
    const notes = document.getElementById('documentNotes').value;
    alert('Document review saved successfully!');
    const modal = bootstrap.Modal.getInstance(document.getElementById('documentModal'));
    modal.hide();
}

function executeBulkAction() {
    const action = document.getElementById('bulkAction').value;
    if (action) {
        alert(`Executing bulk action: ${action}`);
        const modal = bootstrap.Modal.getInstance(document.getElementById('bulkActionsModal'));
        modal.hide();
    } else {
        alert('Please select an action first.');
    }
}