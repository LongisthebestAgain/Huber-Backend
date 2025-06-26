<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ApiService;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function dashboard()
    {
        // Get dashboard stats from API
        $stats = $this->apiService->getAdminDashboardStats();
        $recentUsers = $this->apiService->getAllUsers(['limit' => 10, 'sort' => 'recent']);
        
        return view('admin-dashboard', compact('stats', 'recentUsers'));
    }

    // User Management
    public function getUsers(Request $request)
    {
        $filters = $request->only(['status', 'type', 'search', 'limit', 'page']);
        $users = $this->apiService->getAllUsers($filters);
        
        return response()->json($users);
    }

    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'type' => 'required|in:passenger,driver',
            'phone' => 'required|string',
        ]);

        $result = $this->apiService->createUser($validated);
        
        return response()->json($result);
    }

    public function updateUser(Request $request, $userId)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email',
            'phone' => 'sometimes|string',
            'status' => 'sometimes|in:active,inactive,suspended',
        ]);

        $result = $this->apiService->updateUser($userId, $validated);
        
        return response()->json($result);
    }

    public function suspendUser($userId)
    {
        $result = $this->apiService->suspendUser($userId);
        
        return response()->json($result);
    }

    public function deleteUser($userId)
    {
        $result = $this->apiService->deleteUser($userId);
        
        return response()->json($result);
    }

    // Driver Management
    public function getDrivers(Request $request)
    {
        $filters = $request->only(['status', 'search', 'limit', 'page', 'verification_status']);
        $drivers = $this->apiService->getAllDrivers($filters);
        
        return response()->json($drivers);
    }

    public function getDriverStats()
    {
        $stats = $this->apiService->getDriverStats();
        
        return response()->json($stats);
    }

    public function getDriverDetails($driverId)
    {
        $driver = $this->apiService->getDriverById($driverId);
        $rides = $this->apiService->getDriverRides($driverId, ['limit' => 20]);
        
        return response()->json([
            'driver' => $driver,
            'rides' => $rides
        ]);
    }

    public function suspendDriver($driverId)
    {
        $result = $this->apiService->suspendDriver($driverId);
        
        return response()->json($result);
    }

    public function activateDriver($driverId)
    {
        $result = $this->apiService->activateDriver($driverId);
        
        return response()->json($result);
    }

    // Driver Verification
    public function getVerificationStats()
    {
        $stats = $this->apiService->getVerificationStats();
        
        return response()->json($stats);
    }

    public function getPendingVerifications(Request $request)
    {
        $filters = $request->only(['status', 'search', 'limit', 'page']);
        $verifications = $this->apiService->getPendingVerifications($filters);
        
        return response()->json($verifications);
    }

    public function getVerificationDetails($verificationId)
    {
        $verification = $this->apiService->getVerificationById($verificationId);
        
        return response()->json($verification);
    }

    public function approveVerification(Request $request, $verificationId)
    {
        $data = $request->only(['notes', 'admin_id']);
        $result = $this->apiService->approveVerification($verificationId, $data);
        
        return response()->json($result);
    }

    public function rejectVerification(Request $request, $verificationId)
    {
        $validated = $request->validate([
            'reason' => 'required|string',
            'notes' => 'sometimes|string'
        ]);

        $result = $this->apiService->rejectVerification($verificationId, $validated);
        
        return response()->json($result);
    }

    public function requestMoreInfo(Request $request, $verificationId)
    {
        $validated = $request->validate([
            'message' => 'required|string',
            'required_documents' => 'sometimes|array'
        ]);

        $result = $this->apiService->requestMoreInfo($verificationId, $validated);
        
        return response()->json($result);
    }

    public function bulkApproveVerifications(Request $request)
    {
        $validated = $request->validate([
            'verification_ids' => 'required|array',
            'verification_ids.*' => 'required|integer'
        ]);

        $result = $this->apiService->bulkApproveVerifications($validated['verification_ids']);
        
        return response()->json($result);
    }

    public function bulkRejectVerifications(Request $request)
    {
        $validated = $request->validate([
            'verification_ids' => 'required|array',
            'verification_ids.*' => 'required|integer',
            'reason' => 'required|string'
        ]);

        $result = $this->apiService->bulkRejectVerifications(
            $validated['verification_ids'], 
            $validated['reason']
        );
        
        return response()->json($result);
    }

    // Ride Management
    public function getRides(Request $request)
    {
        $filters = $request->only(['status', 'driver_id', 'date_from', 'date_to', 'limit', 'page']);
        $rides = $this->apiService->getAllRides($filters);
        
        return response()->json($rides);
    }

    public function getRideStats()
    {
        $stats = $this->apiService->getRideStats();
        
        return response()->json($stats);
    }

    public function getRideDetails($rideId)
    {
        $ride = $this->apiService->getRideById($rideId);
        $passengers = $this->apiService->getRidePassengers($rideId);
        
        return response()->json([
            'ride' => $ride,
            'passengers' => $passengers
        ]);
    }

    public function getRidePassengers($rideId)
    {
        $passengers = $this->apiService->getRidePassengers($rideId);
        
        return response()->json($passengers);
    }

    public function cancelRide(Request $request, $rideId)
    {
        $reason = $request->input('reason', 'Cancelled by admin');
        $result = $this->apiService->cancelRide($rideId, $reason);
        
        return response()->json($result);
    }

    // Export functions
    public function exportUsers(Request $request)
    {
        $filters = $request->only(['status', 'type', 'date_from', 'date_to']);
        $result = $this->apiService->exportUsers($filters);
        
        return response()->json($result);
    }

    public function exportDrivers(Request $request)
    {
        $filters = $request->only(['status', 'verification_status', 'date_from', 'date_to']);
        $result = $this->apiService->exportDrivers($filters);
        
        return response()->json($result);
    }

    // Real-time updates
    public function getRealtimeStats()
    {
        $stats = $this->apiService->getAdminDashboardStats();
        
        return response()->json($stats);
    }

    // Location and utility
    public function searchLocation(Request $request)
    {
        $query = $request->input('query');
        $result = $this->apiService->searchLocation($query);
        
        return response()->json($result);
    }

    public function getNearbyDrivers(Request $request)
    {
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'sometimes|numeric|min:1|max:50'
        ]);

        $result = $this->apiService->getNearbyDrivers(
            $validated['latitude'],
            $validated['longitude'],
            $validated['radius'] ?? 10
        );
        
        return response()->json($result);
    }
} 