<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <style>
            :root {
                --bs-body-font-family: 'Inter', sans-serif;
                --bs-primary: #ff6b35;
                --bs-primary-rgb: 255, 107, 53;
                --bs-secondary: #2c2c2c;
                --bs-secondary-rgb: 44, 44, 44;
                --bs-success: #28a745;
                --bs-info: #17a2b8;
                --bs-warning: #ffc107;
                --bs-danger: #dc3545;
                --bs-light: #f8f9fa;
                --bs-dark: #1a1a1a;
                --bs-body-bg: #0f0f0f;
                --bs-body-color: #ffffff;
            }
            
            body {
                background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #2c2c2c 100%);
                min-height: 100vh;
                font-weight: 400;
            }
            
            .auth-card {
                background: rgba(26, 26, 26, 0.95);
                border: 2px solid #ff6b35;
                border-radius: 16px;
                backdrop-filter: blur(20px);
                box-shadow: 0 20px 60px rgba(255, 107, 53, 0.2);
                transition: all 0.4s ease;
            }
            
            .auth-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 30px 80px rgba(255, 107, 53, 0.3);
            }
            
            .form-control {
                background: rgba(26, 26, 26, 0.8);
                border: 2px solid #333;
                color: #ffffff;
                border-radius: 10px;
                padding: 14px 18px;
                font-weight: 500;
                transition: all 0.3s ease;
            }
            
            .form-control:focus {
                background: rgba(26, 26, 26, 0.9);
                border-color: #ff6b35;
                box-shadow: 0 0 0 0.3rem rgba(255, 107, 53, 0.25);
                color: #ffffff;
                transform: translateY(-2px);
            }
            
            .form-control::placeholder {
                color: #666;
                font-weight: 400;
            }
            
            .form-label {
                color: #ffffff;
                font-weight: 600;
                margin-bottom: 8px;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);
                border: none;
                font-weight: 700;
                padding: 14px 28px;
                border-radius: 10px;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                box-shadow: 0 6px 20px rgba(255, 107, 53, 0.3);
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #ff8c42 0%, #ff6b35 100%);
                transform: translateY(-3px);
                box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);
            }
            
            .btn-outline-primary {
                border: 2px solid #ff6b35;
                color: #ff6b35;
                font-weight: 600;
                padding: 12px 26px;
                border-radius: 10px;
                transition: all 0.3s ease;
                background: transparent;
            }
            
            .btn-outline-primary:hover {
                background: #ff6b35;
                border-color: #ff6b35;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
            }
            
            .text-primary {
                color: #ff6b35 !important;
            }
            
            .text-muted {
                color: #999 !important;
            }
            
            .form-check-input:checked {
                background-color: #ff6b35;
                border-color: #ff6b35;
            }
            
            .form-check-input:focus {
                border-color: #ff6b35;
                box-shadow: 0 0 0 0.25rem rgba(255, 107, 53, 0.25);
            }
            
            .invalid-feedback {
                color: #dc3545;
                font-weight: 500;
                margin-top: 6px;
            }
            
            .is-invalid {
                border-color: #dc3545 !important;
            }
            
            .alert {
                border: none;
                border-radius: 10px;
                backdrop-filter: blur(10px);
                font-weight: 500;
            }
            
            .alert-info {
                background: rgba(23, 162, 184, 0.2);
                color: #17a2b8;
                border-left: 4px solid #17a2b8;
            }
            
            .card-body {
                padding: 2rem;
            }
            
            .h4 {
                font-weight: 800;
                color: #ffffff;
                margin-bottom: 1rem;
            }
            
            .fw-bold {
                font-weight: 700 !important;
            }
            
            .text-decoration-none {
                text-decoration: none !important;
            }
            
            .text-decoration-none:hover {
                text-decoration: underline !important;
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-vh-100 d-flex align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <a href="/" class="text-decoration-none">
                                <i class="bi bi-trophy-fill text-primary" style="font-size: 3rem;"></i>
                                <h3 class="text-white mt-2">Sports Manager</h3>
                            </a>
                        </div>

                        <!-- Auth Card -->
                        <div class="card auth-card">
                            <div class="card-body p-4">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
