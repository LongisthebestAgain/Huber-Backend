<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard - Hubber</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/driver.css') }}">
  
</head>
<body>
    <div class="dashboard-container">
        <!-- Mobile Toggle Button -->
        <button class="btn btn-primary d-lg-none position-fixed" style="top: 20px; left: 20px; z-index: 1060;" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">🚗 Michael Smith</h6>
                    <small class="text-muted">Driver</small>
                </div>
            </div>

            <nav>
                <a href="#" class="nav-link active" onclick="showDashboard()">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-link" onclick="showCreateRide()">
                    <i class="fas fa-plus-circle"></i>
                    <span>Create Ride</span>
                </a>
                <a href="#" class="nav-link" onclick="showMyRides()">
                    <i class="fas fa-route"></i>
                    <span>My Rides</span>
                </a>
                <a href="#" class="nav-link" onclick="showEarnings()">
                    <i class="fas fa-chart-line"></i>
                    <span>Earnings</span>
                </a>
                <a href="#" class="nav-link" onclick="showReviews()">
                    <i class="fas fa-star"></i>
                    <span>Reviews</span>
                </a>
                <a href="#" class="nav-link" onclick="showProfile()">
                    <i class="fas fa-user-cog"></i>
                    <span>Profile</span>
                </a>
                <a href="index.html" class="nav-link" style="color: #ff6b6b; margin-top: 2rem; background: rgba(255, 107, 107, 0.1);">
                    <i class="fas fa-home"></i>
                    <span>Back to Home</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Dashboard Section -->
            <div id="dashboardSection">
                <div class="text-center mb-5 fadeInUp">
                    <h1 class="page-title">Driver Dashboard</h1>
                    <p class="page-subtitle">Manage your rides and track your earnings</p>
                </div>

            <!-- Stats Overview -->
                <div class="row fadeInUp stagger-1">
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fas fa-route"></i>
                        </div>
                            <h3 class="mb-1 fw-bold">34</h3>
                        <p class="text-muted mb-0">Total Rides</p>
                            <small class="text-success">📈 +5 this week</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-icon bg-success bg-opacity-10 text-success">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                            <h3 class="mb-1 fw-bold">$1,248</h3>
                        <p class="text-muted mb-0">Total Earnings</p>
                            <small class="text-info">💰 +$150 this week</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fas fa-star"></i>
                        </div>
                            <h3 class="mb-1 fw-bold">4.8</h3>
                        <p class="text-muted mb-0">Average Rating</p>
                            <small class="text-success">⭐ Excellent</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-icon bg-info bg-opacity-10 text-info">
                                <i class="fas fa-clock"></i>
                        </div>
                            <h3 class="mb-1 fw-bold">2</h3>
                            <p class="text-muted mb-0">Active Rides</p>
                            <small class="text-primary">🚗 In progress</small>
                    </div>
                </div>
            </div>

                <!-- Recent Activity -->
                <div class="ride-list">
                    <h5 class="mb-4">Recent Activity</h5>
                    <div class="ride-item">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="route-info">
                                    <div class="route-point">
                                        <small class="text-muted">Pickup</small>
                                        <div>Central Station</div>
                                    </div>
                                    <div class="route-point">
                                        <small class="text-muted">Dropoff</small>
                                        <div>Airport Terminal 1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="ride-date-time">
                                <small class="text-muted d-block">Date & Time</small>
                                    <div class="ride-date">Feb 16, 2024</div>
                                    <div class="ride-time">14:30</div>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="booking-status-section">
                                    <div class="status-number">2</div>
                                    <div class="status-description">Total Passengers</div>
                                    <div class="status-details">2/4 seats booked</div>
                                    <div class="seat-progress">
                                        <div class="seat-progress-bar">
                                            <div class="seat-progress-fill" style="width: 50%"></div>
                            </div>
                                        <small class="text-muted mt-1 d-block">2 seats available</small>
                            </div>
                        </div>
                    </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <span class="status-badge status-active" style="color:white;">Active</span>
                                </div>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm mb-2 w-100" onclick="viewPassengers(1)">
                                        👥 View Passengers
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm w-100" onclick="editRide(1)">✏️ Edit Ride</button>
                                </div>
                                <div class="earnings-preview mt-2">
                                    <div class="earnings-amount">$45.00</div>
                                    <div class="earnings-label">Current Earnings</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Create Ride Section -->
            <div id="createRideSection" style="display: none;">
                <div class="text-center mb-5">
                    <h1 class="page-title">Create New Ride</h1>
                    <p class="page-subtitle">Add a new ride offer for passengers</p>
                </div>

                <div class="add-ride-form">
                    <h5 class="mb-4">📝 Ride Details</h5>
                    <form class="row g-3" onsubmit="createRide(event)">
                    <div class="col-md-6">
                            <label class="form-label">📍 Pickup Location</label>
                            <input type="text" class="form-control" placeholder="Enter pickup location" required>
                    </div>
                    <div class="col-md-6">
                            <label class="form-label">🎯 Destination</label>
                            <input type="text" class="form-control" placeholder="Enter destination" required>
                    </div>
                    <div class="col-md-3">
                            <label class="form-label">📅 Date</label>
                            <input type="date" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                            <label class="form-label">🕐 Time</label>
                            <input type="time" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                            <label class="form-label">👥 Available Seats</label>
                            <select class="form-select" required>
                                <option value="">Select seats</option>
                                <option value="1">1 seat</option>
                                <option value="2">2 seats</option>
                                <option value="3">3 seats</option>
                                <option value="4">4 seats</option>
                                <option value="5">5 seats</option>
                                <option value="6">6 seats</option>
                            </select>
                    </div>
                    <div class="col-md-3">
                            <label class="form-label">💰 Price per Seat</label>
                            <input type="number" class="form-control" placeholder="Enter price" min="1" required>
                    </div>
                    <div class="col-12">
                            <label class="form-label">📝 Additional Notes (Optional)</label>
                            <textarea class="form-control" rows="3" placeholder="Any special instructions or preferences..."></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-plus"></i> Create Ride Offer
                        </button>
                    </div>
                </form>
                </div>
            </div>

            <!-- My Rides Section -->
            <div id="myRidesSection" style="display: none;">
                <div class="text-center mb-5">
                    <h1 class="page-title">My Rides</h1>
                    <p class="page-subtitle">Manage all your ride offers and booking requests</p>
                </div>

                <!-- Filter Options -->
                <div class="add-ride-form mb-4">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>📋 All Rides</option>
                                <option>🟢 Active</option>
                                <option>⏳ Pending Bookings</option>
                                <option>✅ Completed</option>
                                <option>❌ Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="🔍 Search rides...">
                        </div>
                    </div>
                </div>

                <!-- Active Rides with Booking Requests -->
            <div class="ride-list">
                    <h5 class="mb-4">🟢 Active Rides</h5>
                    
                    <!-- Ride 1 - Not Fully Booked -->
                    <div class="ride-item">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="route-info">
                                <div class="route-point">
                                    <small class="text-muted">Pickup</small>
                                    <div>Central Station</div>
                                </div>
                                <div class="route-point">
                                    <small class="text-muted">Dropoff</small>
                                    <div>Airport Terminal 1</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="ride-date-time">
                            <small class="text-muted d-block">Date & Time</small>
                                    <div class="ride-date">Feb 16, 2024</div>
                                    <div class="ride-time">14:30</div>
                        </div>
                        </div>
                            <div class="col-md-3">
                                <div class="booking-status-section">
                                    <div class="status-number">2</div>
                                    <div class="status-description">Total Passengers</div>
                                    <div class="status-details">2/4 seats booked</div>
                                    <div class="seat-progress">
                                        <div class="seat-progress-bar">
                                            <div class="seat-progress-fill" style="width: 50%"></div>
                        </div>
                                        <small class="text-muted mt-1 d-block">2 seats available</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <span class="status-badge status-active" style="color:white;">Active</span>
                                </div>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm mb-2 w-100" onclick="viewPassengers(1)">
                                        👥 View Passengers
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm w-100" onclick="editRide(1)">✏️ Edit Ride</button>
                                </div>
                                <div class="earnings-preview mt-2">
                                    <div class="earnings-amount">$45.00</div>
                                    <div class="earnings-label">Current Earnings</div>
                                </div>
                        </div>
                    </div>
                </div>

                    <!-- Ride 2 - Active with confirmed bookings -->
                    <div class="ride-item confirmed-full">
                        <div class="booking-status-indicator confirmed"></div>
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="route-info">
                                <div class="route-point">
                                    <small class="text-muted">Pickup</small>
                                    <div>Shopping Mall</div>
                                </div>
                                <div class="route-point">
                                    <small class="text-muted">Dropoff</small>
                                    <div>University Campus</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="ride-date-time">
                            <small class="text-muted d-block">Date & Time</small>
                                    <div class="ride-date">Feb 16, 2024</div>
                                    <div class="ride-time">16:00</div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="booking-status-section confirmed">
                                    <div class="status-number confirmed">4</div>
                                    <div class="status-description">Total Passengers</div>
                                    <div class="status-details">4/4 seats booked</div>
                                    <div class="seat-progress">
                                        <div class="seat-progress-bar">
                                            <div class="seat-progress-fill" style="width: 100%"></div>
                                        </div>
                                        <small class="text-success mt-1 d-block">Fully booked!</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <span class="status-badge status-active" style="color:white;">Fully Booked</span>
                                </div>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm mb-2 w-100" onclick="viewPassengers(2)">
                                        👥 View Passengers
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm w-100" onclick="editRide(2)">✏️ Edit Ride</button>
                                </div>
                                <div class="earnings-preview mt-2">
                                    <div class="earnings-amount">$90.00</div>
                                    <div class="earnings-label">Total Earnings</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ride 3 - No bookings yet -->
                    <div class="ride-item no-bookings">
                        <div class="booking-status-indicator none"></div>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="route-info">
                                    <div class="route-point">
                                        <small class="text-muted">Pickup</small>
                                        <div>Downtown Plaza</div>
                                    </div>
                                    <div class="route-point">
                                        <small class="text-muted">Dropoff</small>
                                        <div>Sports Stadium</div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-2">
                                <div class="ride-date-time">
                                    <small class="text-muted d-block">Date & Time</small>
                                    <div class="ride-date">Feb 17, 2024</div>
                                    <div class="ride-time">19:00</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="booking-status-section none">
                                    <div class="status-number none">0</div>
                                    <div class="status-description">No Bookings Yet</div>
                                    <div class="status-details">0/5 seats available</div>
                                    <div class="seat-progress">
                                        <div class="seat-progress-bar">
                                            <div class="seat-progress-fill" style="width: 0%"></div>
                                        </div>
                                        <small class="text-muted mt-1 d-block">Waiting for bookings</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                            <span class="status-badge status-active" style="color:white;">Active</span>
                        </div>
                                <div class="action-buttons">
                                    <button class="btn btn-outline-primary" onclick="editRide(3)">✏️ Edit Ride</button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="cancelRide(3)">❌ Cancel</button>
                                </div>
                                <div class="earnings-preview">
                                    <div class="earnings-amount">$0.00</div>
                                    <div class="earnings-label">Potential: $112.50</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings Section -->
            <div id="earningsSection" style="display: none;">
                <div class="text-center mb-5">
                    <h1 class="page-title">💰 Earnings</h1>
                    <p class="page-subtitle">Track your income and financial performance</p>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h3 class="text-success">$1,248</h3>
                            <p class="mb-0">Total Earnings</p>
                            <small class="text-success">💰 +$150 this week</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h3 class="text-primary">$312</h3>
                            <p class="mb-0">This Month</p>
                            <small class="text-info">📊 +25% vs last month</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h3 class="text-info">$78</h3>
                            <p class="mb-0">This Week</p>
                            <small class="text-success">📈 Great progress!</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h3 class="text-warning">$36.75</h3>
                            <p class="mb-0">Average per Ride</p>
                            <small class="text-muted">⭐ Above market rate</small>
                        </div>
                    </div>
                </div>

            <div class="earnings-chart">
                <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">📊 Earnings Overview</h5>
                    <select class="form-select" style="width: auto;">
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option>Last 3 Months</option>
                            <option>This Year</option>
                    </select>
                </div>
                <div style="height: 300px; border-radius: 10px; overflow: hidden; background: white; padding: 20px;">
                    <img src="https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?w=1200&h=400&fit=crop" 
                         alt="Earnings Chart" 
                         style="width: 100%; height: 100%; object-fit: contain;"
                         class="shadow-sm">
                        </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="text-muted">
                        <small>📈 Trend: +15% vs last period</small>
                    </div>
                    <div class="text-success">
                        <small>🎯 On track to meet monthly goal</small>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div id="reviewsSection" style="display: none;">
                <div class="text-center mb-5">
                    <h1 class="page-title">⭐ Reviews & Ratings</h1>
                    <p class="page-subtitle">See what passengers think about your service</p>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="stats-card text-center">
                            <h1 class="text-warning mb-2">4.8</h1>
                            <div class="mb-2">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <p class="mb-0">Overall Rating</p>
                            <small class="text-muted">Based on 34 reviews</small>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="stats-card">
                            <h6 class="mb-3">Rating Breakdown</h6>
                            <div class="mb-2">
                                <div class="d-flex justify-content-between">
                                    <span>5 stars</span>
                                    <span>28 reviews</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex justify-content-between">
                                    <span>4 stars</span>
                                    <span>4 reviews</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" style="width: 12%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex justify-content-between">
                                    <span>3 stars</span>
                                    <span>2 reviews</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width: 6%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ride-list">
                    <h5 class="mb-4">Recent Reviews</h5>
                    <div class="ride-item">
                        <div class="d-flex align-items-start">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=50&h=50&fit=crop&crop=face" class="rounded-circle me-3" width="50" height="50" alt="Reviewer">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Sarah M.</h6>
                                        <div class="text-warning mb-1">⭐⭐⭐⭐⭐</div>
                                    </div>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                                <p class="mb-1">"Excellent driver! Very punctual and the car was clean and comfortable. Highly recommend!"</p>
                                <small class="text-muted">Central Station → Airport</small>
                            </div>
                        </div>
                    </div>

                    <div class="ride-item">
                        <div class="d-flex align-items-start">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=50&h=50&fit=crop&crop=face" class="rounded-circle me-3" width="50" height="50" alt="Reviewer">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">John D.</h6>
                                        <div class="text-warning mb-1">⭐⭐⭐⭐⭐</div>
                                    </div>
                                    <small class="text-muted">5 days ago</small>
                                </div>
                                <p class="mb-1">"Great conversation and safe driving. Will definitely book again!"</p>
                                <small class="text-muted">Shopping Mall → University</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Section -->
            <div id="profileSection" style="display: none;">
                <div class="text-center mb-5">
                    <h1 class="page-title">👤 Profile Settings</h1>
                    <p class="page-subtitle">Manage your account and vehicle information</p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="add-ride-form">
                            <h5 class="mb-4">Personal Information</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Profile Photo</label>
                                    <div class="d-flex align-items-center">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face" class="rounded-circle me-3" width="80" height="80" alt="Profile">
                                        <button class="btn btn-outline-primary">Change Photo</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="Michael">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Smith">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="michael.smith@email.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="add-ride-form">
                            <h5 class="mb-4">Vehicle Information</h5>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Vehicle Photo</label>
                                    <div class="d-flex align-items-center">
                                        <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=80&h=60&fit=crop" class="rounded me-3" width="80" height="60" alt="Vehicle">
                                        <button class="btn btn-outline-primary">Change Photo</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Make</label>
                                    <input type="text" class="form-control" value="Honda">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Model</label>
                                    <input type="text" class="form-control" value="Accord">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Year</label>
                                    <input type="number" class="form-control" value="2022">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Color</label>
                                    <input type="text" class="form-control" value="Silver">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">License Plate</label>
                                    <input type="text" class="form-control" value="ABC-1234">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Number of Seats</label>
                                    <select class="form-select">
                                        <option value="4" selected>4 seats</option>
                                        <option value="5">5 seats</option>
                                        <option value="6">6 seats</option>
                                        <option value="7">7 seats</option>
                                        <option value="8">8 seats</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update Vehicle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/driver.js') }}"></script>
</body>
</html> 