<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AnalystModel;


class Emotion extends BaseController
{
    protected $apiUrl;
    protected $apiKey;
    public function __construct()
    {
        // Inisialisasi model AnalystModel
        $this->analystModel = new AnalystModel();
        $this->apiUrl = getenv('API_URL');
        $this->apiKey = getenv('API_KEY');
    }
    public function index()
    {
        //
    }
    private function callGeminiApi($inputText)
    {
        $client = \Config\Services::curlrequest();

        $postData = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $inputText,
                        ]
                    ]
                ]
            ]
        ];

        try {
            $response = $client->post($this->apiUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    'key' => $this->apiKey,
                ],
                'json' => $postData,
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody();

            log_message('debug', 'API Response Status: ' . $statusCode);
            log_message('debug', 'API Response Body: ' . $body);

            if ($statusCode == 200) {
                $data = json_decode($body, true);
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Error: Unable to generate text';
            } else {
                return 'Error: API request failed with status code ' . $statusCode;
            }
        } catch (\Exception $e) {
            log_message('error', 'API request failed: ' . $e->getMessage());
            return 'Error: API request failed with exception ' . $e->getMessage();
        }
    }
    public function preditions()
    {
        $date = date('Y-m-d H:i:s');
        // Terima data input dari permintaan API
        $id_user = $this->request->getPost('id_user');
        $predictions = $this->request->getPost('predictions');

        // Validasi input
        if (empty($id_user) || empty($predictions)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Input not complete']);
        }

        // Panggil fungsi generate dengan input yang diterima
        $response = $this->callGeminiApi("What I do today is {$predictions}, try to guess my emotions in my one word, which must be in empty, sadness, enthusiasm, neutral, surprise, love, fun, happiness, boredom, relief, anger. remember answer the question only one word.");

        // Hapus karakter newline dari $response
        $response = str_replace(" \n", '', $response);

        // // Simpan data ke dalam database
        // $date = date('Y-m-d H:i:s');
        // $data = [
        //     'id_user' => $id_user,
        //     'emotion_analyst' => $emotion,
        //     'result_analyst' => $response,
        //     'date' => $date,
        // ];

        // // Simpan data ke dalam database menggunakan model AnalystModel
        // $analystModel = new AnalystModel();
        // $analystModel->insert($data);

        // Siapkan data untuk respons JSON
        $data = [
            'id_user' => $id_user,
            'predictions' => $predictions,
            'emotion' => $response,
            'date' => $date,
        ];

        // Kirim respons JSON
        return $this->response->setJSON($data);
    }


}
