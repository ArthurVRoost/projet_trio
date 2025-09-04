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
                --bs-dark-rgb: 20, 20, 20;
                --bs-body-bg: #0d1117;
                --bs-body-color: #e6edf3;
                --bs-primary: #238636;
                --bs-secondary: #21262d;
                --bs-success: #238636;
                --bs-info: #0969da;
                --bs-warning: #9a6700;
                --bs-danger: #da3633;
                --bs-light: #f0f6fc;
                --bs-dark: #161b22;
            }
            
            body {
                background: linear-gradient(135deg, #0d1117 0%, #161b22 100%);
                min-height: 100vh;
            }
            
            .navbar-dark {
                background: rgba(13, 17, 23, 0.95) !important;
                backdrop-filter: blur(10px);
                border-bottom: 1px solid #21262d;
            }
            
            .card {
                background: rgba(22, 27, 34, 0.8);
                border: 1px solid #21262d;
                backdrop-filter: blur(10px);
                transition: all 0.3s ease;
            }
            
            .card:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
                border-color: #238636;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #238636 0%, #2ea043 100%);
                border: none;
                transition: all 0.3s ease;
            }
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #2ea043 0%, #238636 100%);
                transform: translateY(-1px);
                box-shadow: 0 4px 15px rgba(35, 134, 54, 0.3);
            }
            
            .btn-outline-primary {
                border-color: #238636;
                color: #238636;
            }
            
            .btn-outline-primary:hover {
                background: #238636;
                border-color: #238636;
            }
            
            .text-muted {
                color: #8b949e !important;
            }
            
            .bg-dark {
                background: rgba(22, 27, 34, 0.8) !important;
            }
            
            .border {
                border-color: #21262d !important;
            }
            
            .form-control {
                background: rgba(22, 27, 34, 0.8);
                border: 1px solid #21262d;
                color: #e6edf3;
            }
            
            .form-control:focus {
                background: rgba(22, 27, 34, 0.9);
                border-color: #238636;
                box-shadow: 0 0 0 0.2rem rgba(35, 134, 54, 0.25);
                color: #e6edf3;
            }
            
            .table-dark {
                --bs-table-bg: rgba(22, 27, 34, 0.8);
                --bs-table-border-color: #21262d;
            }
            
            .alert {
                border: none;
                backdrop-filter: blur(10px);
            }
            
            .alert-success {
                background: rgba(35, 134, 54, 0.2);
                color: #3fb950;
                border-left: 4px solid #3fb950;
            }
            
            .alert-danger {
                background: rgba(218, 54, 51, 0.2);
                color: #f85149;
                border-left: 4px solid #f85149;
            }
            
            .alert-warning {
                background: rgba(154, 103, 0, 0.2);
                color: #d29922;
                border-left: 4px solid #d29922;
            }
            
            .alert-info {
                background: rgba(9, 105, 218, 0.2);
                color: #58a6ff;
                border-left: 4px solid #58a6ff;
            }
        </style>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navigation')
        <main class="container-fluid py-4">
            @yield('content')
        </main>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

