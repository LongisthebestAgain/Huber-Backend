<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ApiService;

class DriverController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function dashboard($driverId = null)
    {
        // For demo purposes, using a default driver ID if not provided
        $driverId = $driverId ?? 1;
        
        // Get driver dashboard data from API
        $stats = $this->apiService->getDriverDashboardStats($driverId);
        $profile = $this->apiService->getDriverProfile($driverId);
        $recentRides = $this->apiService->getDriverRidesList($driverId, ['limit' => 5, 'sort' => 'recent']);
        
        return view('driver-dashboard', compact('stats', 'profile', 'recentRides', 'driverId'));
    }

    // Driver Profile Management
    public function getProfile($driverId)
    {
        $profile = $this->apiService->getDriverProfile($driverId);
        
        return response()->json($profile);
    }

    public function updateProfile(Request $request, $driverId)
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email',
            'phone' => 'sometimes|string',
            'profile_photo' => 'sometimes|file|image|max:5120', // 5MB max
        ]);

        // Handle profile photo upload if provided
        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo'] = $request->file('profile_photo');
        }

        $result = $this->apiService->updateDriverProfile($driverId, $validated);
        
        return response()->json($result);
    }

    // Ride Management
    public function createRide(Request $request, $driverId)
    {
        $validated = $request->validate([
            'pickup_location' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i',
            'available_seats' => 'required|integer|min:1|max:8',
            'price_per_seat' => 'required|numeric|min:1',
            'notes' => 'sometimes|string|max:1000',
        ]);

        $result = $this->apiService->createRide($driverId, $validated);
        
        return response()->json($result);
    }

    public function getRides(Request $request, $driverId)
    {
        $filters = $request->only(['status', 'date_from', 'date_to', 'search', 'limit', 'page']);
        $rides = $this->apiService->getDriverRidesList($driverId, $filters);
        
        return response()->json($rides);
    }

    public function getRideDetails($driverId, $rideId)
    {
        $ride = $this->apiService->getRideById($rideId);
        $passengers = $this->apiService->getRidePassengersList($driverId, $rideId);
        
        return response()->json([
            'ride' => $ride,
            'passengers' => $passengers
        ]);
    }

    public function updateRide(Request $request, $driverId, $rideId)
    {
        $validated = $request->validate([
            'pickup_location' => 'sometimes|string|max:255',
            'destination' => 'sometimes|string|max:255',
            'date' => 'sometimes|date',
            'time' => 'sometimes|date_format:H:i',
            'available_seats' => 'sometimes|integer|min:1|max:8',
            'price_per_seat' => 'sometimes|numeric|min:1',
            'notes' => 'sometimes|string|max:1000',
        ]);

        $result = $this->apiService->updateRide($driverId, $rideId, $validated);
        
        return response()->json($result);
    }

    public function cancelRide(Request $request, $driverId, $rideId)
    {
        $reason = $request->input('reason', 'Cancelled by driver');
        $result = $this->apiService->cancelDriverRide($driverId, $rideId, $reason);
        
        return response()->json($result);
    }

    public function getRidePassengers($driverId, $rideId)
    {
        $passengers = $this->apiService->getRidePassengersList($driverId, $rideId);
        
        return response()->json($passengers);
    }

    // Dashboard Stats
    public function getDashboardStats($driverId)
    {
        $stats = $this->apiService->getDriverDashboardStats($driverId);
        
        return response()->json($stats);
    }

    // Earnings Management
    public function getEarnings(Request $request, $driverId)
    {
        $period = $request->input('period', 'all');
        $earnings = $this->apiService->getDriverEarnings($driverId, $period);
        
        return response()->json($earnings);
    }

    public function getEarningsChart(Request $request, $driverId)
    {
        $period = $request->input('period', '7days');
        $chartData = $this->apiService->getDriverEarningsChart($driverId, $period);
        
        return response()->json($chartData);
    }

    // Reviews and Ratings
    public function getReviews(Request $request, $driverId)
    {
        $filters = $request->only(['rating', 'date_from', 'date_to', 'limit', 'page']);
        $reviews = $this->apiService->getDriverReviews($driverId, $filters);
        
        return response()->json($reviews);
    }

    public function getRatingBreakdown($driverId)
    {
        $breakdown = $this->apiService->getDriverRatingBreakdown($driverId);
        
        return response()->json($breakdown);
    }

    // Vehicle Management
    public function updateVehicle(Request $request, $driverId)
    {
        $validated = $request->validate([
            'make' => 'sometimes|string|max:100',
            'model' => 'sometimes|string|max:100',
            'year' => 'sometimes|integer|min:1990|max:' . (date('Y') + 1),
            'color' => 'sometimes|string|max:50',
            'license_plate' => 'sometimes|string|max:20',
            'seats' => 'sometimes|integer|min:1|max:8',
            'vehicle_photo' => 'sometimes|file|image|max:5120', // 5MB max
        ]);

        // Handle vehicle photo upload if provided
        if ($request->hasFile('vehicle_photo')) {
            $result = $this->apiService->uploadVehiclePhoto($driverId, [
                'photo' => $request->file('vehicle_photo')
            ]);
            
            if (!$result['success']) {
                return response()->json($result, 400);
            }
        }

        $result = $this->apiService->updateVehicleInfo($driverId, $validated);
        
        return response()->json($result);
    }

    // Location and utility functions
    public function searchLocation(Request $request)
    {
        $query = $request->input('query');
        $result = $this->apiService->searchLocation($query);
        
        return response()->json($result);
    }

    // Real-time updates
    public function getRideUpdates($driverId, $rideId)
    {
        $updates = $this->apiService->getRealtimeRideUpdates($rideId);
        
        return response()->json($updates);
    }

    // Document uploads (for verification)
    public function uploadDocument(Request $request, $driverId)
    {
        $validated = $request->validate([
            'document_type' => 'required|in:license,insurance,registration,id',
            'document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240' // 10MB max
        ]);

        $result = $this->apiService->uploadDriverDocument(
            $driverId,
            $validated['document_type'],
            $request->file('document')
        );
        
        return response()->json($result);
    }

    // Profile settings and preferences
    public function getSettings($driverId)
    {
        $profile = $this->apiService->getDriverProfile($driverId);
        
        // Extract settings-specific data from profile
        $settings = [
            'notifications' => $profile['notifications'] ?? [],
            'privacy' => $profile['privacy'] ?? [],
            'preferences' => $profile['preferences'] ?? []
        ];
        
        return response()->json($settings);
    }

    public function updateSettings(Request $request, $driverId)
    {
        $validated = $request->validate([
            'notifications.email' => 'sometimes|boolean',
            'notifications.sms' => 'sometimes|boolean',
            'notifications.push' => 'sometimes|boolean',
            'privacy.show_phone' => 'sometimes|boolean',
            'privacy.show_location' => 'sometimes|boolean',
            'preferences.auto_accept' => 'sometimes|boolean',
            'preferences.max_distance' => 'sometimes|integer|min:1|max:100',
        ]);

        $result = $this->apiService->updateDriverProfile($driverId, $validated);
        
        return response()->json($result);
    }

    // Quick actions
    public function toggleOnlineStatus($driverId)
    {
        // This would toggle driver's online/offline status
        $result = $this->apiService->updateDriverProfile($driverId, [
            'is_online' => !($this->apiService->getDriverProfile($driverId)['is_online'] ?? false)
        ]);
        
        return response()->json($result);
    }

    public function acceptBooking(Request $request, $driverId, $bookingId)
    {
        // Accept a passenger booking request
        $result = $this->apiService->makeRequest('post', "/driver/{$driverId}/bookings/{$bookingId}/accept");
        
        return response()->json($result);
    }

    public function rejectBooking(Request $request, $driverId, $bookingId)
    {
        $reason = $request->input('reason', 'Driver unavailable');
        $result = $this->apiService->makeRequest('post', "/driver/{$driverId}/bookings/{$bookingId}/reject", [
            'reason' => $reason
        ]);
        
        return response()->json($result);
    }

    // Trip management
    public function startTrip($driverId, $rideId)
    {
        $result = $this->apiService->makeRequest('post', "/driver/{$driverId}/rides/{$rideId}/start");
        
        return response()->json($result);
    }

    public function completeTrip($driverId, $rideId)
    {
        $result = $this->apiService->makeRequest('post', "/driver/{$driverId}/rides/{$rideId}/complete");
        
        return response()->json($result);
    }

    public function updateTripLocation(Request $request, $driverId, $rideId)
    {
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $result = $this->apiService->makeRequest('post', "/driver/{$driverId}/rides/{$rideId}/location", $validated);
        
        return response()->json($result);
    }
} 