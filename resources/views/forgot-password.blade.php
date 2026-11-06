<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password — University Management System</title>
    <link rel="icon" type="image/svg+xml" href="assets/img/logo.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 400: '#2dd4bf', 500: '#14b8a6', 600: '#0f766e', 700: '#115e59' },
                        accent: { 400: '#a78bfa', 500: '#8b5cf6', 600: '#7c3aed' },
                    },
                    fontFamily: { sans: ['DM Sans', 'system-ui', '-apple-system', 'sans-serif'], serif: ['Fraunces', 'Georgia', 'serif'] },
                }
            }
        }; 
    </script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col">
    <!-- Page: Request password reset link | Laravel view: resources/views/auth/forgot-password.blade.php -->

    <!-- Start: Forgot password -->
    <div class="flex-1 flex items-center justify-center p-4 bg-white">
        <div class="w-full max-w-md">
            <!-- Start: Brand -->
            <div class="flex justify-center mb-8">
                <a href="index.html" class="inline-flex flex-col items-center gap-3">
                    <img src="assets/img/logo.svg" alt="University Management System" class="h-16 w-16">
                    <span class="text-sm font-semibold text-slate-900">University Management System</span>
                </a>
            </div>
            <!-- End: Brand -->

            <!-- Start: Forgot password card -->
            <div class="rounded-xl border border-slate-200 bg-white p-6 sm:p-8">
                <div class="mb-6">
                    <h1 class="text-xl font-bold text-slate-900">Forgot your password?</h1>
                    <p class="mt-1 text-sm text-slate-500">Enter your university email and we will send you a reset link.</p>
                </div>
                <!-- Start: Forgot password form -->
                <!-- Laravel: add @csrf; action becomes route('password.email') with method="post" -->
                <form action="reset-password.html" method="get" class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">University email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="mail" class="h-5 w-5"></i>
                            </div>
                            <input type="email" id="email" name="email" required autofocus placeholder="you@university.ac.ug"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#0f766e] focus:ring-1 focus:ring-[#0f766e]">
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-lg text-sm font-semibold text-white bg-[#0f766e] hover:bg-[#115e59]">Send reset link</button>
                </form>
                <!-- End: Forgot password form -->
                <p class="mt-6 text-center text-sm text-slate-500"><a href="login.html" class="text-[#0f766e] hover:text-[#115e59]">Back to sign in</a></p>
            </div>
            <!-- End: Forgot password card -->
        </div>
    </div>
    <!-- End: Forgot password -->

    <!-- Start: Footer -->
    <footer class="bg-white border-t border-slate-200 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-3">
                <p class="text-sm text-slate-500">© 2026 <span class="font-semibold text-slate-900">University Management System</span>. All rights reserved.</p>
                <p class="text-sm text-slate-400">Students · Lecturers · Courses · Registrations</p>
            </div>
        </div>
    </footer>
    <!-- End: Footer -->
    <script>lucide.createIcons();</script>
</body>
</html>
