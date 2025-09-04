<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
        />

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
                                <i class="bi bi-trophy-fill text-primary" style="font-size: 3rem"></i>
                                <h3 class="text-white mt-2">Sports Manager</h3>
                            </a>
                        </div>

                        <!-- Auth Card -->
                        <div class="card auth-card">
                            <div class="card-body p-4">{{ $slot }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
