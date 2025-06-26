<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiService
{
    private $apiBaseUrl;
    private $timeout;

    public function __construct()
    {
        $this->apiBaseUrl = config('app.api_base_url', 'http://localhost:8001/api'); // Your API URL
        $this->timeout = 30;
    }

    private function makeRequest($method, $endpoint, $data = [])
    {
        try {
            $response = Http::timeout($this->timeout)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->$method($this->apiBaseUrl . $endpoint, $data);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('API Request Failed', [
                'endpoint' => $endpoint,
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return [
                'success' => false,
                'message' => 'API request failed',
                'status' => $response->status()
            ];
        } catch (\Exception $e) {
            Log::error('API Request Exception', [
                'endpoint' => $endpoint,
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    // Admin Dashboard API Methods
    public function getAdminDashboardStats()
    {
        return $this->makeRequest('get', '/admin/dashboard/stats');
    }

    public function getAllUsers($filters = [])
    {
        $query = http_build_query($filters);
        return $this->makeRequest('get', '/admin/users' . ($query ? '?' . $query : ''));
    }

    public function getUserById($userId)
    {
        return $this->makeRequest('get', "/admin/users/{$userId}");
    }

    public function createUser($userData)
    {
        return $this->makeRequest('post', '/admin/users', $userData);
    }

    public function updateUser($userId, $userData)
    {
        return $this->makeRequest('put', "/admin/users/{$userId}", $userData);
    }

    public function suspendUser($userId)
    {
        return $this->makeRequest('post', "/admin/users/{$userId}/suspend");
    }

    public function deleteUser($userId)
    {
        return $this->makeRequest('delete', "/admin/users/{$userId}");
    }

    // Driver Management
    public function getDriverStats()
    {
        return $this->makeRequest('get', '/admin/drivers/stats');
    }

    public function getAllDrivers($filters = [])
    {
        $query = http_build_query($filters);
        return $this->makeRequest('get', '/admin/drivers' . ($query ? '?' . $query : ''));
    }

    public function getDriverById($driverId)
    {
        return $this->makeRequest('get', "/admin/drivers/{$driverId}");
    }

    public function suspendDriver($driverId)
    {
        return $this->makeRequest('post', "/admin/drivers/{$driverId}/suspend");
    }

    public function activateDriver($driverId)
    {
        return $this->makeRequest('post', "/admin/drivers/{$driverId}/activate");
    }

    public function getDriverRides($driverId, $filters = [])
    {
        $query = http_build_query($filters);
        return $this->makeRequest('get', "/admin/drivers/{$driverId}/rides" . ($query ? '?' . $query : ''));
    }

    // Driver Verification
    public function getVerificationStats()
    {
        return $this->makeRequest('get', '/admin/verification/stats');
    }

    public function getPendingVerifications($filters = [])
    {
        $query = http_build_query($filters);
        return $this->makeRequest('get', '/admin/verification/pending' . ($query ? '?' . $query : ''));
    }

    public function getVerificationById($verificationId)
    {
        return $this->makeRequest('get', "/admin/verification/{$verificationId}");
    }

    public function approveVerification($verificationId, $data = [])
    {
        return $this->makeRequest('post', "/admin/verification/{$verificationId}/approve", $data);
    }

    public function rejectVerification($verificationId, $data = [])
    {
        return $this->makeRequest('post', "/admin/verification/{$verificationId}/reject", $data);
    }

    public function requestMoreInfo($verificationId, $data = [])
    {
        return $this->makeRequest('post', "/admin/verification/{$verificationId}/request-info", $data);
    }

    // Ride Management
    public function getRideStats()
    {
        return $this->makeRequest('get', '/admin/rides/stats');
    }

    public function getAllRides($filters = [])
    {
        $query = http_build_query($filters);
        return $this->makeRequest('get', '/admin/rides' . ($query ? '?' . $query : ''));
    }

    public function getRideById($rideId)
    {
        return $this->makeRequest('get', "/admin/rides/{$rideId}");
    }

    public function getRidePassengers($rideId)
    {
        return $this->makeRequest('get', "/admin/rides/{$rideId}/passengers");
    }

    public function cancelRide($rideId, $reason = '')
    {
        return $this->makeRequest('post', "/admin/rides/{$rideId}/cancel", ['reason' => $reason]);
    }

    // Driver Dashboard API Methods
    public function getDriverDashboardStats($driverId)
    {
        return $this->makeRequest('get', "/driver/{$driverId}/dashboard/stats");
    }

    public function getDriverProfile($driverId)
    {
        return $this->makeRequest('get', "/driver/{$driverId}/profile");
    }

    public function updateDriverProfile($driverId, $profileData)
    {
        return $this->makeRequest('put', "/driver/{$driverId}/profile", $profileData);
    }

    // Driver Rides
    public function createRide($driverId, $rideData)
    {
        return $this->makeRequest('post', "/driver/{$driverId}/rides", $rideData);
    }

    public function getDriverRidesList($driverId, $filters = [])
    {
        $query = http_build_query($filters);
        return $this->makeRequest('get', "/driver/{$driverId}/rides" . ($query ? '?' . $query : ''));
    }

    public function updateRide($driverId, $rideId, $rideData)
    {
        return $this->makeRequest('put', "/driver/{$driverId}/rides/{$rideId}", $rideData);
    }

    public function cancelDriverRide($driverId, $rideId, $reason = '')
    {
        return $this->makeRequest('post', "/driver/{$driverId}/rides/{$rideId}/cancel", ['reason' => $reason]);
    }

    public function getRidePassengersList($driverId, $rideId)
    {
        return $this->makeRequest('get', "/driver/{$driverId}/rides/{$rideId}/passengers");
    }

    // Driver Earnings
    public function getDriverEarnings($driverId, $period = 'all')
    {
        return $this->makeRequest('get', "/driver/{$driverId}/earnings?period={$period}");
    }

    public function getDriverEarningsChart($driverId, $period = '7days')
    {
        return $this->makeRequest('get', "/driver/{$driverId}/earnings/chart?period={$period}");
    }

    // Driver Reviews
    public function getDriverReviews($driverId, $filters = [])
    {
        $query = http_build_query($filters);
        return $this->makeRequest('get', "/driver/{$driverId}/reviews" . ($query ? '?' . $query : ''));
    }

    public function getDriverRatingBreakdown($driverId)
    {
        return $this->makeRequest('get', "/driver/{$driverId}/reviews/breakdown");
    }

    // Vehicle Management
    public function updateVehicleInfo($driverId, $vehicleData)
    {
        return $this->makeRequest('put', "/driver/{$driverId}/vehicle", $vehicleData);
    }

    public function uploadVehiclePhoto($driverId, $photoData)
    {
        return $this->makeRequest('post', "/driver/{$driverId}/vehicle/photo", $photoData);
    }

    // General Utility Methods
    public function searchLocation($query)
    {
        return $this->makeRequest('get', "/locations/search?q=" . urlencode($query));
    }

    public function getNearbyDrivers($latitude, $longitude, $radius = 10)
    {
        return $this->makeRequest('get', "/drivers/nearby?lat={$latitude}&lon={$longitude}&radius={$radius}");
    }

    public function getRealtimeRideUpdates($rideId)
    {
        return $this->makeRequest('get', "/rides/{$rideId}/updates");
    }

    // Authentication (if needed)
    public function authenticateDriver($credentials)
    {
        return $this->makeRequest('post', '/auth/driver/login', $credentials);
    }

    public function authenticateAdmin($credentials)
    {
        return $this->makeRequest('post', '/auth/admin/login', $credentials);
    }

    // File Uploads
    public function uploadDriverDocument($driverId, $documentType, $file)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->attach('document', $file, $documentType . '_' . $driverId . '.pdf')
                ->post($this->apiBaseUrl . "/driver/{$driverId}/documents/{$documentType}");

            return $response->json();
        } catch (\Exception $e) {
            Log::error('Document Upload Failed', [
                'driver_id' => $driverId,
                'document_type' => $documentType,
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    // Bulk Operations
    public function bulkApproveVerifications($verificationIds)
    {
        return $this->makeRequest('post', '/admin/verification/bulk-approve', [
            'verification_ids' => $verificationIds
        ]);
    }

    public function bulkRejectVerifications($verificationIds, $reason = '')
    {
        return $this->makeRequest('post', '/admin/verification/bulk-reject', [
            'verification_ids' => $verificationIds,
            'reason' => $reason
        ]);
    }

    public function exportUsers($filters = [])
    {
        return $this->makeRequest('get', '/admin/users/export?' . http_build_query($filters));
    }

    public function exportDrivers($filters = [])
    {
        return $this->makeRequest('get', '/admin/drivers/export?' . http_build_query($filters));
    }
} 