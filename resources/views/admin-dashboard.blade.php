<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Hubber</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    
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
                <div>
                    <h6 class="mb-0 fw-bold">🛡️ Admin Panel</h6>
                    <small class="text-muted">System Administrator</small>
                </div>
            </div>

            <nav>
                <a href="#" class="nav-link" data-section="dashboard" onclick="showDashboard()">
                    <i class="fas fa-home"></i> 
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-link" data-section="user-management" onclick="showUserManagement()">
                    <i class="fas fa-users"></i>
                    <span>User Management</span>
                </a>
                <a href="#" class="nav-link" data-section="driver-management" onclick="showDriverManagement()">
                    <i class="fas fa-id-card"></i> 
                    <span>Driver Management</span>
                </a>
                <a href="#" class="nav-link" data-section="ride-management" onclick="showRideManagement()">
                    <i class="fas fa-route"></i> 
                    <span>Ride Management</span>
                </a>
                <a href="#" class="nav-link" data-section="driver-verification" onclick="showDriverVerification()">
                    <i class="fas fa-user-check"></i> 
                    <span>Driver Verification</span>
                </a>
                <a href="index.html" class="nav-link" style="color: #ff6b6b; margin-top: 2rem; background: rgba(255, 107, 107, 0.1);">
                    <i class="fas fa-home"></i> 
                    <span>Back to Home</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Dashboard Overview -->
            <div id="dashboardView">
                <div class="text-center mb-5 fadeInUp">
                    <h1 class="page-title" style="color: black;">Admin Dashboard</h1>
                    <p class="page-subtitle" style="color: black;">Manage your ride-sharing platform efficiently</p>
                </div>
                
                <!-- Stats Overview -->
                <div class="row fadeInUp stagger-1">
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">2,456</h3>
                            <p class="text-muted mb-0">Total Users</p>
                            <small class="text-success">📈 +12% from last month</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-success bg-opacity-10 text-success">
                                <i class="fas fa-route"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">1,234</h3>
                            <p class="text-muted mb-0">Active Rides</p>
                            <small class="text-info">📊 +8% from last month</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">23</h3>
                            <p class="text-muted mb-0">Pending Verifications</p>
                            <small class="text-danger">⚠️ Requires attention</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-info bg-opacity-10 text-info">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">$45,678</h3>
                            <p class="text-muted mb-0">Total Revenue</p>
                            <small class="text-success">💰 +15% from last month</small>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4 fadeInUp stagger-2">
                    <div class="col-md-4">
                        <div class="quick-action-card" onclick="window.location.href='driver-verification.html'">
                            <h5><i class="fas fa-user-check me-2"></i>Driver Verification</h5>
                            <p class="mb-0">Review and approve driver applications</p>
                            <span class="badge bg-warning text-dark">23 Pending</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="quick-action-card" onclick="showUserManagement()">
                            <h5><i class="fas fa-users me-2"></i>User Management</h5>
                            <p class="mb-0">Manage passengers and drivers</p>
                            <span class="badge bg-info">2,456 Users</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="quick-action-card" onclick="showRideManagement()">
                            <h5><i class="fas fa-route me-2"></i>Ride Monitoring</h5>
                            <p class="mb-0">Monitor active rides and reports</p>
                            <span class="badge bg-success">1,234 Active</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity & Alerts -->
                <div class="row fadeInUp stagger-3">
                    <div class="col-md-12">
                        <div class="data-card">
                            <h5 class="mb-3">Recent User Activity</h5>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Last Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="User">
                                                    <div>
                                                        <strong>Michael Thompson</strong><br>
                                                        <small class="text-muted">michael@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary">Driver</span></td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>2 min ago</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="User">
                                                    <div>
                                                        <strong>Sarah Wilson</strong><br>
                                                        <small class="text-muted">sarah@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-info">Passenger</span></td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>5 min ago</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671d66?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="User">
                                                    <div>
                                                        <strong>James Rodriguez</strong><br>
                                                        <small class="text-muted">james@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary">Driver</span></td>
                                            <td><span class="status-badge status-inactive">Offline</span></td>
                                            <td>1 hour ago</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

            <!-- User Management View (Hidden by default) -->
            <div id="userManagementView" style="display: none;">
                <h1 class="mb-4">User Management</h1>
                <div class="data-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>All Users</h5>
                        <div>
                            <button class="btn btn-primary">Add User</button>
                            <button class="btn btn-outline-secondary">Export</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table user-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Total Rides</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="User">
                                            <div>
                                                <strong>Michael Thompson</strong><br>
                                                <small class="text-muted">michael@email.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary">Driver</span></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>Jan 15, 2023</td>
                                    <td>423</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button class="btn btn-outline-primary">Edit</button>
                                            <button class="btn btn-outline-warning">Suspend</button>
                                            <button class="btn btn-outline-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- More users would be loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Driver Management View (Hidden by default) -->
            <div id="driverManagementView" style="display: none;">
                <div class="text-center mb-5 fadeInUp">
                    <h1 class="page-title" style="color: black;">🚗 Driver Management</h1>
                    <p class="page-subtitle" style="color: black;">Manage verified and approved drivers</p>
                </div>

                <!-- Driver Stats Overview -->
                <div class="row mb-4 fadeInUp stagger-1">
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-success bg-opacity-10 text-success">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">156</h3>
                            <p class="text-muted mb-0">Verified Drivers</p>
                            <small class="text-success">✅ All active</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                <i class="fas fa-car"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">134</h3>
                            <p class="text-muted mb-0">Online Now</p>
                            <small class="text-info">📱 Available for rides</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">4.7</h3>
                            <p class="text-muted mb-0">Average Rating</p>
                            <small class="text-success">⭐ Excellent performance</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                                <i class="fas fa-ban"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">5</h3>
                            <p class="text-muted mb-0">Suspended</p>
                            <small class="text-danger">⚠️ Under review</small>
                        </div>
                    </div>
                </div>

                <!-- Driver Management Table -->
                <div class="data-card fadeInUp stagger-2">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">
                            <i class="fas fa-users me-2"></i>Verified Drivers
                        </h5>
                        <div class="d-flex gap-2">
                            <select class="form-select" style="width: auto;">
                                <option>All Status</option>
                                <option>Active</option>
                                <option>Online</option>
                                <option>Offline</option>
                                <option>Suspended</option>
                            </select>
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-download me-1"></i>Export
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>Add Driver
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table user-table">
                            <thead>
                                <tr>
                                    <th>Driver Info</th>
                                    <th>Vehicle</th>
                                    <th>Performance</th>
                                    <th>Status</th>
                                    <th>Verification</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Driver 1 -->
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=50&h=50&fit=crop&crop=face" class="rounded-circle me-3" width="50" height="50" alt="Driver">
                                            <div>
                                                <strong>Michael Smith</strong><br>
                                                <small class="text-muted">📧 michael.smith@email.com</small><br>
                                                <small class="text-muted">📱 +1 (555) 123-4567</small><br>
                                                <small class="text-primary">🏆 Joined: Jan 15, 2023</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>Honda Accord 2022</strong><br>
                                            <small class="text-muted">🚗 License: ABC-1234</small><br>
                                            <small class="text-muted">🪑 4 Seats</small><br>
                                            <small class="text-success">✅ Verified</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="d-flex align-items-center mb-1">
                                                <span class="me-2">⭐ 4.8</span>
                                                <small class="text-muted">(156 reviews)</small>
                                            </div>
                                            <div class="text-success fw-bold">342 rides</div>
                                            <small class="text-muted">$8,450 earned</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <span class="status-badge status-active">Online</span>
                                        </div>
                                        <small class="text-success">🟢 Available</small><br>
                                        <small class="text-muted">Last active: 2 min ago</small>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="badge bg-success mb-1">✅ Verified</span><br>
                                            <small class="text-muted">ID: ✅</small><br>
                                            <small class="text-muted">License: ✅</small><br>
                                            <small class="text-muted">Insurance: ✅</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical btn-group-sm" role="group">
                                            <button class="btn btn-outline-primary mb-1" onclick="viewDriverDetails('michael-smith')">
                                                👁️ View Details
                                            </button>
                                            <button class="btn btn-outline-info mb-1" onclick="viewDriverRides('michael-smith')">
                                                🚗 View Rides
                                            </button>
                                            <button class="btn btn-outline-warning mb-1" onclick="suspendDriver('michael-smith')">
                                                ⏸️ Suspend
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Driver 2 -->
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=50&h=50&fit=crop&crop=face" class="rounded-circle me-3" width="50" height="50" alt="Driver">
                                            <div>
                                                <strong>David Wilson</strong><br>
                                                <small class="text-muted">📧 david.wilson@email.com</small><br>
                                                <small class="text-muted">📱 +1 (555) 987-6543</small><br>
                                                <small class="text-primary">🏆 Joined: Feb 3, 2023</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>Toyota Camry 2021</strong><br>
                                            <small class="text-muted">🚗 License: XYZ-5678</small><br>
                                            <small class="text-muted">🪑 4 Seats</small><br>
                                            <small class="text-success">✅ Verified</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="d-flex align-items-center mb-1">
                                                <span class="me-2">⭐ 4.9</span>
                                                <small class="text-muted">(89 reviews)</small>
                                            </div>
                                            <div class="text-success fw-bold">198 rides</div>
                                            <small class="text-muted">$4,950 earned</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <span class="status-badge status-active">Online</span>
                                        </div>
                                        <small class="text-success">🟢 Available</small><br>
                                        <small class="text-muted">Last active: 5 min ago</small>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="badge bg-success mb-1">✅ Verified</span><br>
                                            <small class="text-muted">ID: ✅</small><br>
                                            <small class="text-muted">License: ✅</small><br>
                                            <small class="text-muted">Insurance: ✅</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical btn-group-sm" role="group">
                                            <button class="btn btn-outline-primary mb-1" onclick="viewDriverDetails('david-wilson')">
                                                👁️ View Details
                                            </button>
                                            <button class="btn btn-outline-info mb-1" onclick="viewDriverRides('david-wilson')">
                                                🚗 View Rides
                                            </button>
                                            <button class="btn btn-outline-warning mb-1" onclick="suspendDriver('david-wilson')">
                                                ⏸️ Suspend
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Driver 3 -->
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671d66?w=50&h=50&fit=crop&crop=face" class="rounded-circle me-3" width="50" height="50" alt="Driver">
                                            <div>
                                                <strong>James Rodriguez</strong><br>
                                                <small class="text-muted">📧 james.rodriguez@email.com</small><br>
                                                <small class="text-muted">📱 +1 (555) 456-7890</small><br>
                                                <small class="text-primary">🏆 Joined: Mar 10, 2023</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>BMW 3 Series 2020</strong><br>
                                            <small class="text-muted">🚗 License: DEF-9012</small><br>
                                            <small class="text-muted">🪑 4 Seats</small><br>
                                            <small class="text-success">✅ Verified</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="d-flex align-items-center mb-1">
                                                <span class="me-2">⭐ 4.6</span>
                                                <small class="text-muted">(124 reviews)</small>
                                            </div>
                                            <div class="text-success fw-bold">267 rides</div>
                                            <small class="text-muted">$6,175 earned</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <span class="status-badge status-inactive">Offline</span>
                                        </div>
                                        <small class="text-muted">🔴 Unavailable</small><br>
                                        <small class="text-muted">Last active: 2 hours ago</small>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="badge bg-success mb-1">✅ Verified</span><br>
                                            <small class="text-muted">ID: ✅</small><br>
                                            <small class="text-muted">License: ✅</small><br>
                                            <small class="text-muted">Insurance: ✅</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical btn-group-sm" role="group">
                                            <button class="btn btn-outline-primary mb-1" onclick="viewDriverDetails('james-rodriguez')">
                                                👁️ View Details
                                            </button>
                                            <button class="btn btn-outline-info mb-1" onclick="viewDriverRides('james-rodriguez')">
                                                🚗 View Rides
                                            </button>
                                            <button class="btn btn-outline-warning mb-1" onclick="suspendDriver('james-rodriguez')">
                                                ⏸️ Suspend
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Driver 4 - Suspended Example -->
                                <tr style="opacity: 0.7;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=50&h=50&fit=crop&crop=face" class="rounded-circle me-3" width="50" height="50" alt="Driver">
                                            <div>
                                                <strong>Robert Johnson</strong><br>
                                                <small class="text-muted">📧 robert.johnson@email.com</small><br>
                                                <small class="text-muted">📱 +1 (555) 321-0987</small><br>
                                                <small class="text-primary">🏆 Joined: Jan 28, 2023</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>Mercedes C-Class 2019</strong><br>
                                            <small class="text-muted">🚗 License: GHI-3456</small><br>
                                            <small class="text-muted">🪑 4 Seats</small><br>
                                            <small class="text-warning">⚠️ Under Review</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="d-flex align-items-center mb-1">
                                                <span class="me-2">⭐ 4.2</span>
                                                <small class="text-muted">(87 reviews)</small>
                                            </div>
                                            <div class="text-muted fw-bold">156 rides</div>
                                            <small class="text-muted">$3,840 earned</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <span class="status-badge" style="background: linear-gradient(135deg, #ff6b6b, #ee5a52); color: white;">Suspended</span>
                                        </div>
                                        <small class="text-danger">🚫 Account suspended</small><br>
                                        <small class="text-muted">Reason: Policy violation</small>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="badge bg-warning mb-1">⚠️ Under Review</span><br>
                                            <small class="text-muted">ID: ✅</small><br>
                                            <small class="text-muted">License: ⚠️</small><br>
                                            <small class="text-muted">Insurance: ✅</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical btn-group-sm" role="group">
                                            <button class="btn btn-outline-primary mb-1" onclick="viewDriverDetails('robert-johnson')">
                                                👁️ View Details
                                            </button>
                                            <button class="btn btn-outline-success mb-1" onclick="reactivateDriver('robert-johnson')">
                                                ✅ Reactivate
                                            </button>
                                            <button class="btn btn-outline-danger mb-1" onclick="permanentBan('robert-johnson')">
                                                🚫 Permanent Ban
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Driver 5 -->
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=50&h=50&fit=crop&crop=face" class="rounded-circle me-3" width="50" height="50" alt="Driver">
                                            <div>
                                                <strong>Emily Chen</strong><br>
                                                <small class="text-muted">📧 emily.chen@email.com</small><br>
                                                <small class="text-muted">📱 +1 (555) 654-3210</small><br>
                                                <small class="text-primary">🏆 Joined: Apr 5, 2023</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>Nissan Altima 2022</strong><br>
                                            <small class="text-muted">🚗 License: JKL-7890</small><br>
                                            <small class="text-muted">🪑 4 Seats</small><br>
                                            <small class="text-success">✅ Verified</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="d-flex align-items-center mb-1">
                                                <span class="me-2">⭐ 4.9</span>
                                                <small class="text-muted">(45 reviews)</small>
                                            </div>
                                            <div class="text-success fw-bold">78 rides</div>
                                            <small class="text-muted">$1,950 earned</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <span class="status-badge status-active">Online</span>
                                        </div>
                                        <small class="text-success">🟢 Available</small><br>
                                        <small class="text-muted">Last active: 1 min ago</small>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="badge bg-success mb-1">✅ Verified</span><br>
                                            <small class="text-muted">ID: ✅</small><br>
                                            <small class="text-muted">License: ✅</small><br>
                                            <small class="text-muted">Insurance: ✅</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical btn-group-sm" role="group">
                                            <button class="btn btn-outline-primary mb-1" onclick="viewDriverDetails('emily-chen')">
                                                👁️ View Details
                                            </button>
                                            <button class="btn btn-outline-info mb-1" onclick="viewDriverRides('emily-chen')">
                                                🚗 View Rides
                                            </button>
                                            <button class="btn btn-outline-warning mb-1" onclick="suspendDriver('emily-chen')">
                                                ⏸️ Suspend
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Passengers Modal -->
                    <div class="modal fade" id="passengersModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">👥 Passenger Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="passengersModalBody">
                                    <!-- Content will be dynamically inserted here -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Showing 5 of 156 verified drivers
                        </div>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Ride Management View -->
            <div id="rideManagementView" style="display: none;">
                <div class="text-center mb-5 fadeInUp">
                    <h1 class="page-title" style="color: black;">🚗 Ride Management</h1>
                    <p class="page-subtitle" style="color: black;">Monitor and manage all ride activities</p>
                </div>

                <!-- Stats Overview -->
                <div class="row mb-4 fadeInUp stagger-1">
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                <i class="fas fa-car"></i>
                            </div>
                            <h3 class="text-primary">1,234</h3>
                            <p class="mb-0">Active Rides</p>
                            <small class="text-success">🟢 Currently ongoing</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-success bg-opacity-10 text-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h3 class="text-success">45,678</h3>
                            <p class="mb-0">Completed Today</p>
                            <small class="text-info">✅ Successfully finished</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <h3 class="text-warning">12</h3>
                            <p class="mb-0">Issues Reported</p>
                            <small class="text-danger">⚠️ Needs attention</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <h3 class="text-danger">3</h3>
                            <p class="mb-0">Cancelled</p>
                            <small class="text-muted">❌ Today's cancellations</small>
                        </div>
                    </div>
                </div>
                
                <!-- Ride List -->
                <div class="data-card fadeInUp stagger-2">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">
                            <i class="fas fa-list me-2"></i>Confirmed Bookings
                        </h5>
                        <div class="d-flex gap-2">
                            <input type="date" class="form-control" id="rideDate" style="width: auto;">
                            <select class="form-select" style="width: auto;">
                                <option>All Rides</option>
                                <option>Active</option>
                                <option>Completed</option>
                            </select>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-sync-alt me-1"></i>Refresh
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table user-table">
                            <thead>
                                <tr>
                                    <th>Ride Details</th>
                                    <th>Driver</th>
                                    <th>Passengers</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Active Ride Example -->
                                <tr>
                                    <td>
                                        <div>
                                            <strong>#RID-2024-001</strong><br>
                                            <small class="text-muted">📍 From: Downtown Station</small><br>
                                            <small class="text-muted">🎯 To: Airport Terminal 1</small><br>
                                            <small class="text-primary">🕒 Started: 10:30 AM</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="Driver">
                                            <div>
                                                <strong>Michael Thompson</strong><br>
                                                <small class="text-muted">⭐ 4.8 Rating</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>2 Passengers</strong><br>
                                            <small class="text-success">✅ All Confirmed</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-active">Near Airport Terminal 1</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <strong class="text-success">$35.00</strong>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPassengers(1)">
                                                👥 View
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Completed Ride Example -->
                                <tr>
                                    <td>
                                        <div>
                                            <strong>#RID-2024-002</strong><br>
                                            <small class="text-muted">📍 From: Shopping Mall</small><br>
                                            <small class="text-muted">🎯 To: Central Park</small><br>
                                            <small class="text-success">✅ Completed: 9:45 AM</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="Driver">
                                            <div>
                                                <strong>David Wilson</strong><br>
                                                <small class="text-muted">⭐ 4.9 Rating</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>1 Passenger</strong><br>
                                            <small class="text-success">✅ Completed</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Completed</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <strong class="text-success">$22.50</strong>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPassengers(2)">
                                                👥 View
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Another Active Ride -->
                                <tr>
                                    <td>
                                        <div>
                                            <strong>#RID-2024-004</strong><br>
                                            <small class="text-muted">📍 From: Central Station</small><br>
                                            <small class="text-muted">🎯 To: Business District</small><br>
                                            <small class="text-primary">🕒 Started: 11:15 AM</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="Driver">
                                            <div>
                                                <strong>Emily Chen</strong><br>
                                                <small class="text-muted">⭐ 4.7 Rating</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>3 Passengers</strong><br>
                                            <small class="text-success">✅ All Confirmed</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-active">Completed</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <strong class="text-success">$45.00</strong>
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewPassengers(4)">
                                                👥 View
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Passengers Modal -->
                    <div class="modal fade" id="passengersModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">👥 Passenger Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="passengersModalBody">
                                    <!-- Content will be dynamically inserted here -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Showing 3 of 24 confirmed rides today
                        </div>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="driverVerificationView" style="display: none;">
    <div class="text-center mb-5 fadeInUp">
        <h1 class="page-title" style="color: black;">🛡️ Driver Verification Center</h1>
        <p class="page-subtitle" style="color: black;">Review, approve, and manage all driver applications</p>
    </div>

    <div class="row mb-4 fadeInUp stagger-1">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <h3 class="text-warning">15</h3>
                <p class="mb-0">Pending Applications</p>
                <small class="text-muted">⏳ Awaiting first review</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="text-primary">8</h3>
                <p class="mb-0">Under Review</p>
                <small class="text-info">👁️ Actively being reviewed</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="text-success">234</h3>
                <p class="mb-0">Approved Total</p>
                <small class="text-success">✅ Ready for the road</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-times-circle"></i>
                </div>
                <h3 class="text-danger">12</h3>
                <p class="mb-0">Rejected Total</p>
                <small class="text-danger">❌ Did not meet criteria</small>
            </div>
        </div>
    </div>

    <div class="data-card fadeInUp stagger-2">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <h5 class="mb-0">
                <i class="fas fa-list-alt me-2"></i>Incoming Applications
            </h5>
            <div class="d-flex flex-wrap gap-2">
                <select class="form-select" id="statusFilter" style="width: auto;" onchange="filterApplications()">
                    <option value="all">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="under-review">Under Review</option>
                </select>
                <input type="text" class="form-control" id="searchFilter" placeholder="Search by name or ID..." style="width: auto;" oninput="filterApplications()">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkActionsModal">
                    <i class="fas fa-tasks me-1"></i> Bulk Actions
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table user-table">
                <thead>
                    <tr>
                        <th>Applicant Details</th>
                        <th>Vehicle Info</th>
                        <th>Documents</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="Driver">
                                <div>
                                    <strong>Michael Thompson</strong><br>
                                    <small class="text-muted">#DRV-2024-045</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <strong>2022 Honda Accord</strong><br>
                                <small class="text-muted">License: ABC-1234</small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <span class="badge bg-success" title="License Verified">✓ ID</span>
                                <span class="badge bg-success" title="Registration Verified">✓ REG</span>
                                <span class="badge bg-warning" title="Insurance Issue">! INS</span>
                            </div>
                        </td>
                        <td>
                            <span class="status-badge status-pending">Pending</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-primary" onclick="approveDriver('DRV-2024-045')">Review</button>
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="assignReviewer('DRV-2024-045')"><i class="fas fa-user-plus me-2"></i>Assign</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="requestMoreInfo('DRV-2024-045')"><i class="fas fa-question-circle me-2"></i>Request Info</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#" onclick="rejectDriver('DRV-2024-045')"><i class="fas fa-times-circle me-2"></i>Reject</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="Driver">
                                <div>
                                    <strong>Sarah Wilson</strong><br>
                                    <small class="text-muted">#DRV-2024-044</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <strong>2021 Toyota Camry</strong><br>
                                <small class="text-muted">License: XYZ-5678</small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                 <span class="badge bg-info" title="Background Check In Progress">⧗ BG</span>
                            </div>
                        </td>
                        <td>
                            <span class="status-badge status-review">Under Review</span>
                        </td>
                        <td>
                             <div class="btn-group">
                                <button class="btn btn-sm btn-outline-primary" onclick="approveDriver('DRV-2024-044')">Review</button>
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="addNotes('DRV-2024-044')"><i class="fas fa-sticky-note me-2"></i>Add Notes</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="contactDriver('DRV-2024-044')"><i class="fas fa-phone me-2"></i>Contact</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671d66?w=40&h=40&fit=crop&crop=face" class="rounded-circle me-2" width="40" height="40" alt="Driver">
                                <div>
                                    <strong>James Rodriguez</strong><br>
                                    <small class="text-muted">#DRV-2024-043</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <strong>2020 Nissan Altima</strong><br>
                                <small class="text-muted">License: DEF-9012</small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <span class="badge bg-success" title="All Documents Verified">✓ All Docs</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-success">Approved</span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary" disabled>View Profile</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                Showing 3 of 23 applications
            </div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

            <!-- Other views (Reports, Notifications, Settings) would follow similar pattern -->
        </div>
    </div>

    <!-- Passengers Modal -->
    <div class="popup-overlay" id="passengerPopup">
        <div class="popup-card">
            <div class="popup-header">
                <h5 class="mb-0">👥 Passenger Information</h5>
                <button class="popup-close" onclick="closePassengerPopup()">&times;</button>
            </div>
            <div id="passengerList"></div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    </script>
</body>
</html> 