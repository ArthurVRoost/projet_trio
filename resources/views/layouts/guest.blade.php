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
                --bs-body-bg: #0a0a0a;
                --bs-body-color: #ffffff;
                --bs-primary: #ff6b35;
                --bs-secondary: #2a2a2a;
                --bs-success: #28a745;
                --bs-info: #17a2b8;
                --bs-warning: #ffc107;
                --bs-danger: #dc3545;
                --bs-light: #f8f9fa;
                --bs-dark: #1a1a1a;
            }
            
            body {
                background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2a2a2a 100%);
                min-height: 100vh;
            }
            
            .auth-card {
                background: rgba(26, 26, 26, 0.9);
                border: 1px solid #ff6b35;
                backdrop-filter: blur(15px);
                box-shadow: 0 8px 32px rgba(255, 107, 53, 0.1);
            }
            
            .form-control {
                background: rgba(26, 26, 26, 0.8);
                border: 1px solid #444;
                color: #ffffff;
                transition: all 0.3s ease;
            }
            
            .form-control:focus {
                background: rgba(26, 26, 26, 0.9);
                border-color: #ff6b35;
                box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
                color: #ffffff;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);
                border: none;
                font-weight: 600;
                transition: all 0.3s ease;
            }
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #ff8c42 0%, #ff6b35 100%);
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(255, 107, 53, 0.4);
            }
            
            .btn-outline-primary {
                border-color: #ff6b35;
                color: #ff6b35;
            }
            
            .btn-outline-primary:hover {
                background: #ff6b35;
                border-color: #ff6b35;
                color: #000;
            }
            
            .text-primary {
                color: #ff6b35 !important;
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
