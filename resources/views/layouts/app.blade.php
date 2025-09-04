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
                padding-top: 2%;
            }
            
            .navbar-dark {
                background: rgba(15, 15, 15, 0.95) !important;
                backdrop-filter: blur(20px);
                border-bottom: 2px solid #ff6b35;
                box-shadow: 0 2px 20px rgba(255, 107, 53, 0.1);
            }
            
            .navbar-brand {
                font-weight: 700;
                font-size: 1.5rem;
                color: #ff6b35 !important;
            }
            
            .nav-link {
                font-weight: 500;
                transition: all 0.3s ease;
                position: relative;
            }
            
            .nav-link:hover {
                color: #ff6b35 !important;
                transform: translateY(-1px);
            }
            
            .nav-link::after {
                content: '';
                position: absolute;
                width: 0;
                height: 2px;
                bottom: -5px;
                left: 50%;
                background: #ff6b35;
                transition: all 0.3s ease;
                transform: translateX(-50%);
            }
            
            .nav-link:hover::after {
                width: 100%;
            }
            
            .card {
                background: rgba(26, 26, 26, 0.9);
                border: 1px solid #333;
                border-radius: 12px;
                backdrop-filter: blur(10px);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            
            .card:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px rgba(255, 107, 53, 0.15);
                border-color: #ff6b35;
            }
            
            .card-header {
                background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);
                border: none;
                color: white;
                font-weight: 600;
                border-radius: 12px 12px 0 0 !important;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);
                border: none;
                font-weight: 600;
                padding: 12px 24px;
                border-radius: 8px;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
            }
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #ff8c42 0%, #ff6b35 100%);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
            }
            
            .btn-outline-primary {
                border: 2px solid #ff6b35;
                color: #ff6b35;
                font-weight: 600;
                padding: 10px 22px;
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            
            .btn-outline-primary:hover {
                background: #ff6b35;
                border-color: #ff6b35;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
            }
            
            .btn-secondary {
                background: #2c2c2c;
                border: none;
                color: white;
                font-weight: 500;
            }
            
            .btn-secondary:hover {
                background: #3c3c3c;
                transform: translateY(-1px);
            }
            
            .text-muted {
                color: #999 !important;
            }
            
            .text-primary {
                color: #ff6b35 !important;
            }
            
            .bg-dark {
                background: rgba(26, 26, 26, 0.9) !important;
            }
            
            .border {
                border-color: #333 !important;
            }
            
            .form-control {
                background: rgba(26, 26, 26, 0.8);
                border: 2px solid #333;
                color: #ffffff;
                border-radius: 8px;
                padding: 12px 16px;
                transition: all 0.3s ease;
            }
            
            .form-control:focus {
                background: rgba(26, 26, 26, 0.9);
                border-color: #ff6b35;
                box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
                color: #ffffff;
            }
            
            .form-select {
                background: rgba(26, 26, 26, 0.8);
                border: 2px solid #333;
                color: #ffffff;
                border-radius: 8px;
                padding: 12px 16px;
            }
            
            .form-select:focus {
                border-color: #ff6b35;
                box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
            }
            
            .table-dark {
                --bs-table-bg: rgba(26, 26, 26, 0.9);
                --bs-table-border-color: #333;
            }
            
            .alert {
                border: none;
                border-radius: 8px;
                backdrop-filter: blur(10px);
                font-weight: 500;
            }
            
            .alert-success {
                background: rgba(40, 167, 69, 0.2);
                color: #28a745;
                border-left: 4px solid #28a745;
            }
            
            .alert-danger {
                background: rgba(220, 53, 69, 0.2);
                color: #dc3545;
                border-left: 4px solid #dc3545;
            }
            
            .alert-warning {
                background: rgba(255, 193, 7, 0.2);
                color: #ffc107;
                border-left: 4px solid #ffc107;
            }
            
            .alert-info {
                background: rgba(23, 162, 184, 0.2);
                color: #17a2b8;
                border-left: 4px solid #17a2b8;
            }
            
            .badge {
                font-weight: 600;
                padding: 8px 12px;
                border-radius: 6px;
            }
            
            .badge.bg-primary {
                background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%) !important;
            }
            
            .dropdown-menu {
                background: rgba(26, 26, 26, 0.95);
                border: 1px solid #333;
                border-radius: 8px;
                backdrop-filter: blur(20px);
            }
            
            .dropdown-item {
                color: #ffffff;
                transition: all 0.3s ease;
            }
            
            .dropdown-item:hover {
                background: rgba(255, 107, 53, 0.1);
                color: #ff6b35;
            }
            
            .container-fluid {
                padding-top: 100px;
            }
            
            .h1, .h2, .h3, .h4, .h5, .h6 {
                font-weight: 700;
                color: #ffffff;
            }
            
            .display-4 {
                font-weight: 800;
                background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
        </style>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navigation')
        <main class="container-fluid py-4">
            @yield('content')
        </main>
        
        <!-- Debug script for dropdowns -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM loaded, checking Bootstrap...');
                
                // Attendre que Vite charge Bootstrap
                setTimeout(function() {
                    console.log('Bootstrap available:', typeof window.bootstrap !== 'undefined');
                    
                    if (typeof window.bootstrap !== 'undefined') {
                        // Initialiser manuellement les dropdowns
                        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
                        console.log('Found dropdowns:', dropdownElementList.length);
                        
                        const dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                            console.log('Initializing dropdown:', dropdownToggleEl);
                            return new window.bootstrap.Dropdown(dropdownToggleEl);
                        });
                        
                        console.log('Dropdowns initialized:', dropdownList.length);
                    } else {
                        console.error('Bootstrap not loaded via Vite, trying CDN fallback...');
                        // Fallback: charger Bootstrap via CDN
                        const script = document.createElement('script');
                        script.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';
                        script.onload = function() {
                            console.log('Bootstrap CDN loaded');
                            const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
                            const dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                                return new bootstrap.Dropdown(dropdownToggleEl);
                            });
                        };
                        document.head.appendChild(script);
                    }
                }, 100);
            });
        </script>
    </body>
</html>

