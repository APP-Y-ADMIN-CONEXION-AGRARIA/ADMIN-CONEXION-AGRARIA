<?php
require '../../../../vendor/autoload.php';

use Firebase\JWT\JWT;

// Cargar la clave privada para firmar el token
$privateKey = <<<EOD
-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC2rblKSUfm53K2
Rpst0Uitt2gxl8H+AbWZEslvbufJE2Q3GRxE6sQelU9eoOxz9Irs/T2yZRq4VnF7
fily+kKtE8R1iFQM54OsqxarwhsDfhAvG0IVjp4wzzpxrzRCkMWszPRLpnsI/6eL
//N9/OGzZwejeZC1rueTQkjysvp5jgKfGXWs9K+c6sgXhLtGapGUSMnsJfCkkd0/
4ySaTjadY1HYIYAg1u3kO3nWu+cY9METOpES4SGNBtZ1zI+XmC1BfaKxVs/D3pe3
ZUEaFjcllURmUZlnEjxLLRsaxVZtJaosW453cn29s/+X5Xz6exsgIEtHL/5tXN1s
8L9HG8AlAgMBAAECggEAKrik+QT7PjpJXuxTNRtZCls2kEaD1SHUNMiqeBdxOFqD
GMmUDV/z3o0fgytSMOnzJWox6Arx/UMmBfHiwqNZPX2+d5gaw+vOpO5b/m4GAEKW
iVWwFjeEsjh8XALTz29o8zj5Nsnnwxp6teh1KrUdmWWSaT4wQ/Tz7kHVqoCFyDAz
Htc7SuWQ+qxXC3spOR6Cj7fImR73qwf5ZE1GZnbGl/jurS7gSc6FuIhmxUVNmmZW
pHb/U1f2CVKjJ1KiZyfLa2iNiyBqv5NWdfR5BMgbNVqZk1uUYYDUYP6VnKo7Yssw
UdZIDLFAkDG383t8d/xXYqxCBjMQOKo1cmp1JobJgQKBgQDgtTo6GHyMSujrx33z
ciOtdbVoDnpQtKX3Z5Az7KOirf/P4HRjqdmLlFP+jrSc/FJElXZwLBtpYzW5Di2h
7rPTy+k9qnj5i5Q7Uyww1EE4AKVC2cHONSYzvHqm3FGPyFexM3JN2kHzVnZpgTB5
y3Yxqo8XvNmyqsO/BwUYPj1pwQKBgQDQHincJQl0/HLcm58K53cCe1sLusjvEXE0
3wCfuQvqCRG8NZGTnQA2+ZsLCsKiLxNukpFHidK7rLMMuBMnME8dSHLHzC5OWULN
WYJMeY82Fvw74IJEwj3Y332WRbh//2JcZ8jbz6+2t62PuLHbOvcPEwqlcIM8qB/4
JV1ZbqzHZQKBgQCJnlQnymFU5nfaFtZLZ2b0T/em398HWGugpruJIW9iLWBTJqsB
cr96HYCHkUyKLHoR6NudfVXYaFs5l7ZYy0E1AFg7XREz+8jvwFN7IDNFIhgUZhqs
uJ5J5y/Sy3HkNhWGv/RMO9RSPGzO1sEihno/lq6GIjHNm4nAj4MOQugHwQKBgBDt
AxaGZJiBF45dkbe/T2yCP8taa5EV6BEWueRDlnZ4OlsGOEq7EBNohXWGcIHkNj5d
6TbaPKtKxl0Yc2ZShXyqMbuSHYn9tHMi/nfdwwnxIJ52CeIxsfn7YylfjjvKt2Mw
haNq5q2DjrgLm1trFkDBmbIOzn2WZtM1prvpRmAJAoGBANA+1fHP3ZsyFseFkJxQ
MdxUNPHV0QMhkbJtM/dPCna5FrWnuXWmUfkL5u4iU/RgqCTw7d4a65cOTFBEWECi
0ZZIaVst1N/lBZt4Kx7u5+EPP2o9h+bEi/4rzpJAAV/WjoszPUhW37xcoONrCuYK
W8gJ8uW3K9agjIsXcISOeH8v
-----END PRIVATE KEY-----
EOD;

// Función para generar el token JWT para Firebase
function generateToken($userEmail, $privateKey) {
    $payload = [
        "iss" => "firebase-adminsdk-ha2ts@conexion-agraria.iam.gserviceaccount.com",
        "scope" => "https://www.googleapis.com/auth/firebase.database https://www.googleapis.com/auth/userinfo.email",
        "aud" => "https://oauth2.googleapis.com/token",
        "iat" => time(), // Tiempo actual
        "exp" => time() + (60 * 60), // Expiración en 1 hora
    ];

    $jwt = JWT::encode($payload, $privateKey, 'RS256');
    return $jwt;
}

// Manejar la solicitud de generación de JWT y obtener el token de Firebase
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = $_POST['userEmail'] ?? '';

    if (!empty($userEmail)) {
        // Generar el token JWT para Firebase
        $token = generateToken($userEmail, $privateKey);

        // Realizar una solicitud POST a Google OAuth 2.0 para obtener el token de Firebase
        $url = 'https://oauth2.googleapis.com/token';
        $data = [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $token,
        ];

        $options = [
            'http' => [
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === false) {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to obtain Firebase token']);
            exit;
        }

        // Decodificar la respuesta JSON
        $responseData = json_decode($response, true);
        $firebaseToken = $responseData['access_token'] ?? null;

        if ($firebaseToken) {
            // Devolver el token de Firebase como JSON
            header('Content-Type: application/json');
            echo json_encode(['token' => $firebaseToken]);
            exit;
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to obtain Firebase token']);
            exit;
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid request']);
        exit;
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method Not Allowed']);
    exit;
}
?>