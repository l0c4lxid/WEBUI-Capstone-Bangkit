<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PublicController extends BaseController
{
    protected $apiBaseUrl; // Variable untuk menyimpan URL API dasar

    public function __construct()
    {
        // Mengambil URL API dasar dari environment saat konstruksi
        $this->apiBaseUrl = env('API_BASE_URL');
    }

    public function trypredictions()
    {
        $data = [
            'judul' => 'Emotion Prediction',
            'subjudul' => 'try-predictions',
            'page' => 'public/try-predictions.php',
            'navbar' => 'public/template/navbar.php',
            'footer' => 'public/template/footer.php',
            'sidebar' => 'public/template/sidebar.php',
            'response' => session()->getFlashdata('response')
        ];
        // Tampilkan view untuk dashboard public
        return view('public/template/header', $data);
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
                    return redirect()->to('/try-predictions')->with('pesan', 'Prediction posted successfully');
                } else {
                    return redirect()->to('/try-predictions')->with('pesan', 'Error: ' . $responseData['Message']);
                }
            } else {
                return redirect()->to('/try-predictions')->with('pesan', 'Error: Could not post prediction to API');
            }
        }
    }

    public function tryrekomendations()
    {
        $data = [
            'judul' => 'Try rekomendations',
            'subjudul' => 'try-rekomendations',
            'page' => 'public/tryrekomendations.php',
            'navbar' => 'public/template/navbar.php',
            'footer' => 'public/template/footer.php',
            'sidebar' => 'public/template/sidebar.php',
            'response' => session()->getFlashdata('response')
        ];
        // Tampilkan view untuk dashboard public
        return view('public/template/header', $data);
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
                    return redirect()->to('/try-recomendations')->with('pesan', 'Recommendation posted successfully');
                } else {
                    return redirect()->to('/try-recomendations')->with('pesan', 'Error: ' . $responseData['Message']);
                }
            } else {
                return redirect()->to('/try-recomendations')->with('pesan', 'Error: Could not post recommendation to API');
            }
        }
    }
    public function chatAI()
    {
        $data = [
            'judul' => 'Try Chat AI Mental Health',
            'subjudul' => 'try-ai',
            'page' => 'public/chat-ai.php',
            'navbar' => 'public/template/navbar.php',
            'footer' => 'public/template/footer.php',
            'sidebar' => 'public/template/sidebar.php',
            'response' => session()->getFlashdata('response')
        ];
        return view('public/template/header', $data);
    }

    public function postChatAI()
    {
        if ($this->request->getMethod() === 'post') {
            $chat = $this->request->getPost('chat');

            // Initialize HTTP client
            $client = \Config\Services::curlrequest();

            // Make the API request
            $response = $client->request('POST', $this->apiBaseUrl . '/api/chat', [
                'form_params' => [
                    'chat' => $chat
                ]
            ]);

            // Check if the response is successful
            if ($response->getStatusCode() == 201) {
                // Decode the JSON response
                $responseData = json_decode($response->getBody(), true);

                if ($responseData['Status'] == 201) {
                    session()->setFlashdata('response', $responseData['Data']);
                    return redirect()->to('/try-ai')->with('pesan', 'Chat posted successfully');
                } else {
                    return redirect()->to('/try-ai')->with('pesan', 'Error: ' . $responseData['Message']);
                }
            } else {
                return redirect()->to('/try-ai')->with('pesan', 'Error: Could not post chat to API');
            }
        }
    }
}

