<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    protected $apiBaseUrl; // Variable untuk menyimpan URL API dasar

    public function __construct()
    {
        // Mengambil URL API dasar dari environment saat konstruksi
        $this->apiBaseUrl = env('API_BASE_URL');
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'admin',
            'page' => 'admin/dashboard.php',
            'navbar' => 'admin/template/navbar.php',
            'footer' => 'admin/template/footer.php',
            'sidebar' => 'admin/template/sidebar.php',
        ];

        return view('admin/template/header', $data);
    }

    public function predictions()
    {
        // Initialize HTTP client
        $client = \Config\Services::curlrequest();

        // Make the API request
        $response = $client->request('GET', $this->apiBaseUrl . '/predictions');

        // Check if the response is successful
        if ($response->getStatusCode() == 200) {
            // Decode the JSON response
            $responseData = json_decode($response->getBody(), true);

            // Check if the response contains data
            if ($responseData['Status'] == 200) {
                $data = [
                    'judul' => 'Predictions Data',
                    'subjudul' => 'Predictions',
                    'page' => 'admin/predictions.php',
                    'navbar' => 'admin/template/navbar.php',
                    'footer' => 'admin/template/footer.php',
                    'sidebar' => 'admin/template/sidebar.php',
                    'predictionsData' => $responseData['Data'], // Pass the predictions data to the view
                ];

                // Tampilkan view untuk dashboard admin
                return view('admin/template/header', $data);
            } else {
                // Handle the case where the API response status is not 200
                return 'Error: ' . $responseData['Message'];
            }
        } else {
            // Handle the case where the API request failed
            return 'Error: Could not retrieve data from API';
        }
    }

    public function recomendation()
    {
        // Initialize HTTP client
        $client = \Config\Services::curlrequest();

        // Make the API request
        $response = $client->request('GET', $this->apiBaseUrl . '/recomendations');

        // Check if the response is successful
        if ($response->getStatusCode() == 200) {
            // Decode the JSON response
            $responseData = json_decode($response->getBody(), true);

            // Check if the response contains data
            if ($responseData['Status'] == 200) {
                $data = [
                    'judul' => 'Recomendation Data',
                    'subjudul' => 'recomendation',
                    'page' => 'admin/recomendation.php',
                    'navbar' => 'admin/template/navbar.php',
                    'footer' => 'admin/template/footer.php',
                    'sidebar' => 'admin/template/sidebar.php',
                    'recomendationsData' => $responseData['Data'], // Pass the recommendations data to the view
                ];

                // Tampilkan view untuk dashboard admin
                return view('admin/template/header', $data);
            } else {
                // Handle the case where the API response status is not 200
                return 'Error: ' . $responseData['Message'];
            }
        } else {
            // Handle the case where the API request failed
            return 'Error: Could not retrieve data from API';
        }
    }

    public function trypredictions()
    {
        $data = [
            'judul' => 'Predict Post',
            'subjudul' => 'try-predictions',
            'page' => 'admin/try-predictions.php',
            'navbar' => 'admin/template/navbar.php',
            'footer' => 'admin/template/footer.php',
            'sidebar' => 'admin/template/sidebar.php',
            'response' => session()->getFlashdata('response')
        ];
        // Tampilkan view untuk dashboard admin
        return view('admin/template/header', $data);
    }

    public function postPrediction()
    {
        if ($this->request->getMethod() === 'post') {
            $text = $this->request->getPost('text');

            // Initialize HTTP client
            $client = \Config\Services::curlrequest();

            // Make the API request
            $response = $client->request('POST', $this->apiBaseUrl . '/api/v2/predictions', [
                'form_params' => [
                    'text' => $text
                ]
            ]);

            // Check if the response is successful
            if ($response->getStatusCode() == 201) {
                // Decode the JSON response
                $responseData = json_decode($response->getBody(), true);

                if ($responseData['Status'] == 201) {
                    session()->setFlashdata('response', $responseData['Data']);
                    return redirect()->to('/admin/try-predictions')->with('pesan', 'Prediction posted successfully');
                } else {
                    return redirect()->to('/admin/try-predictions')->with('pesan', 'Error: ' . $responseData['Message']);
                }
            } else {
                return redirect()->to('/admin/try-predictions')->with('pesan', 'Error: Could not post prediction to API');
            }
        }
    }

    public function tryrekomendations()
    {
        $data = [
            'judul' => 'Tryrekomendations',
            'subjudul' => 'try-rekomendations',
            'page' => 'admin/tryrekomendations.php',
            'navbar' => 'admin/template/navbar.php',
            'footer' => 'admin/template/footer.php',
            'sidebar' => 'admin/template/sidebar.php',
            'response' => session()->getFlashdata('response')
        ];
        // Tampilkan view untuk dashboard admin
        return view('admin/template/header', $data);
    }

    public function postRecommendation()
    {
        if ($this->request->getMethod() === 'post') {
            $emotion = $this->request->getPost('emotion');

            // Initialize HTTP client
            $client = \Config\Services::curlrequest();

            // Make the API request
            $response = $client->request('POST', $this->apiBaseUrl . '/api/recomendation', [
                'form_params' => [
                    'emotion' => $emotion
                ]
            ]);

            // Check if the response is successful
            if ($response->getStatusCode() == 201) {
                // Decode the JSON response
                $responseData = json_decode($response->getBody(), true);

                if ($responseData['Status'] == 201) {
                    session()->setFlashdata('response', $responseData['Data']);
                    return redirect()->to('/admin/try-recomendations')->with('pesan', 'Recommendation posted successfully');
                } else {
                    return redirect()->to('/admin/try-recomendations')->with('pesan', 'Error: ' . $responseData['Message']);
                }
            } else {
                return redirect()->to('/admin/try-recomendations')->with('pesan', 'Error: Could not post recommendation to API');
            }
        }
    }
}
