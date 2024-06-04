<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AnalystModel;

class Jurnalis extends BaseController
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

        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'jurnalis',
            'page' => 'jurnalis/dashboard.php',
            'navbar' => 'jurnalis/template/navbar.php',
            'footer' => 'jurnalis/template/footer.php',
            'sidebar' => 'jurnalis/template/sidebar.php',
        ];
        // Tampilkan view untuk dashboard jurnalis
        return view('jurnalis/template/header', $data);
    }

    public function post()
    {
        $id_user = session()->get('id_user');

        // Cari data analis berdasarkan id_user
        $analysts = $this->analystModel->where('id_user', $id_user)->findAll();

        $data = [
            'judul' => 'Post Data',
            'subjudul' => 'post',
            'page' => 'jurnalis/post.php',
            'navbar' => 'jurnalis/template/navbar.php',
            'footer' => 'jurnalis/template/footer.php',
            'sidebar' => 'jurnalis/template/sidebar.php',
            'analysts' => $analysts, // Tambahkan data analis ke dalam array data
        ];
        return view('jurnalis/template/header', $data);
    }
    public function postdetail($id)
    {
        // Ambil data analis berdasarkan id
        $analyst = $this->analystModel->find($id);

        // Kirim data analis ke view
        $data = [
            'judul' => 'Detail Emosi',
            'subjudul' => 'post',
            'page' => 'jurnalis/detail_post.php',
            'navbar' => 'jurnalis/template/navbar.php',
            'footer' => 'jurnalis/template/footer.php',
            'sidebar' => 'jurnalis/template/sidebar.php',
            'analyst' => $analyst,
        ];

        return view('jurnalis/template/header', $data);
    }

    public function getAnalystDetail($id)
    {
        // Ambil data analis berdasarkan id
        $analyst = $this->analystModel->find($id);

        // Pastikan data ditemukan
        if ($analyst === null) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Analyst not found']);
        }

        // Kembalikan data analis dalam format JSON
        return $this->response->setJSON($analyst);
    }


    public function analyst()
    {

        $data = [
            'judul' => 'Analyst',
            'subjudul' => 'analyst',
            'page' => 'jurnalis/add_post.php',
            'navbar' => 'jurnalis/template/navbar.php',
            'footer' => 'jurnalis/template/footer.php',
            'sidebar' => 'jurnalis/template/sidebar.php',
        ];
        return view('jurnalis/template/header', $data);
    }
    public function setting()
    {

        $data = [
            'judul' => 'Setting',
            'subjudul' => 'setting',
            'page' => 'jurnalis/setting.php',
            'navbar' => 'jurnalis/template/navbar.php',
            'footer' => 'jurnalis/template/footer.php',
            'sidebar' => 'jurnalis/template/sidebar.php',
        ];
        return view('jurnalis/template/header', $data);
    }
    public function generate()
    {
        $inputText = $this->request->getPost('input_text');
        $additionalText = "write a suggestion to regulate it emotion in one paragraph, then give me reference one url link to read about it, link a must active, put it after the end paragraph no enter.";

        // Menggabungkan input user dengan kata-kata semangat
        $combinedText = "I Feel" . $inputText . " " . $additionalText;

        $response = $this->callGeminiApi($combinedText);

        $data = [
            'judul' => 'Analyst',
            'subjudul' => 'analyst',
            'page' => 'jurnalis/add_post',
            'navbar' => 'jurnalis/template/navbar',
            'footer' => 'jurnalis/template/footer',
            'sidebar' => 'jurnalis/template/sidebar',
            'inputText' => $inputText,
            'generatedText' => $response,
        ];

        return view('jurnalis/template/header', $data);
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
    public function saveanalyst()
    {
        // Dapatkan id_user dari session
        $id_user = session()->get('id_user');

        // Pastikan id_user tidak kosong
        if (empty($id_user)) {
            // Lakukan penanganan kesalahan sesuai kebutuhan Anda
            return redirect()->back()->with('error', 'Session id_user tidak tersedia.');
        }

        // Dapatkan data dari input
        $inputText = $this->request->getPost('input_text');
        $generatedText = $this->request->getPost('generated_text');

        $date = date('Y-m-d H:i:s');

        // Simpan ke dalam model yang telah diinisialisasi melalui konstruktor
        $data = [
            'id_user' => $id_user,
            'emotion_analyst' => $inputText,
            'result_analyst' => $generatedText,
            'date' => $date,
        ];
        $this->analystModel->insert($data);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/jurnalis/post')->with('success', 'Data berhasil disimpan.');
    }
    public function generateapi()
    {
        // Terima data input dari permintaan API
        $id_user = $this->request->getPost('id_user');
        $emotion = $this->request->getPost('emotion');

        // Validasi input
        if (empty($id_user) || empty($emotion)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Input not complete']);
        }

        // Panggil fungsi generate dengan input yang diterima
        $response = $this->callGeminiApi("I Feel {$emotion} write a suggestion to regulate it emotion in one paragraph, then give me reference one url link to read about it, link a must active, put it after the end paragraph no enter.");
        // Simpan data ke dalam database
        $date = date('Y-m-d H:i:s');
        $data = [
            'id_user' => $id_user,
            'emotion_analyst' => $emotion,
            'result_analyst' => $response,
            'date' => $date,
        ];

        // Simpan data ke dalam database menggunakan model AnalystModel
        $analystModel = new AnalystModel();
        $analystModel->insert($data);

        // Siapkan data untuk respons JSON
        $data = [
            'id_user' => $id_user,
            'emotion' => $emotion,
            'recomendation' => $response,
        ];

        // Kirim respons JSON
        return $this->response->setJSON($data);
    }


}

