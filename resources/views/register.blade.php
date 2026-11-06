<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account — University Management System</title>
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
    <!-- Page: Student sign-up | Laravel view: resources/views/auth/register.blade.php -->

    <!-- Start: Create account -->
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

            <!-- Start: Register card -->
            <div class="rounded-xl border border-slate-200 bg-white p-6 sm:p-8">
                <div class="mb-6">
                    <h1 class="text-xl font-bold text-slate-900">Create student account</h1>
                    <p class="mt-1 text-sm text-slate-500">Lecturers and administrators are added by the Registrar.</p>
                </div>

                <!-- Start: Register form -->
                <!-- Laravel: add @csrf; action becomes route('register') with method="post" -->
                <form action="login.html" method="get" class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-600 mb-2">Full name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="user" class="h-5 w-5"></i>
                            </div>
                            <input type="text" id="name" name="name" required autofocus placeholder="Your full name"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#0f766e] focus:ring-1 focus:ring-[#0f766e]">
                        </div>
                    </div>
                    <div>
                        <label for="registration_number" class="block text-sm font-medium text-slate-600 mb-2">Registration number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="hash" class="h-5 w-5"></i>
                            </div>
                            <input type="text" id="registration_number" name="registration_number" required placeholder="e.g. 2400101"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#0f766e] focus:ring-1 focus:ring-[#0f766e]">
                        </div>
                    </div>
                    <div>
                        <label for="programme" class="block text-sm font-medium text-slate-600 mb-2">Programme</label>
                        <select id="programme" name="programme" class="input-field"><option value="">Choose your programme</option><option>BSc Computer Science</option><option>BSc Information Systems</option><option>BSc Mathematics</option><option>BSc Statistics</option></select>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">University email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="mail" class="h-5 w-5"></i>
                            </div>
                            <input type="email" id="email" name="email" required placeholder="you@university.ac.ug"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#0f766e] focus:ring-1 focus:ring-[#0f766e]">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-600 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="lock" class="h-5 w-5"></i>
                            </div>
                            <input type="password" id="password" name="password" required placeholder="Minimum 8 characters"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#0f766e] focus:ring-1 focus:ring-[#0f766e]">
                        </div>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-600 mb-2">Confirm password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="lock" class="h-5 w-5"></i>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Repeat the password"
                                class="block w-full pl-10 pr-3 py-3 rounded-lg bg-white border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#0f766e] focus:ring-1 focus:ring-[#0f766e]">
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-lg text-sm font-semibold text-white bg-[#0f766e] hover:bg-[#115e59]">Create account</button>
                </form>
                <!-- End: Register form -->

                <p class="mt-6 text-center text-sm text-slate-500">
                    Already registered?
                    <a href="login.html" class="text-[#0f766e] hover:text-[#115e59]">Sign in</a>
                </p>
            </div>
            <!-- End: Register card -->
        </div>
    </div>
    <!-- End: Create account -->

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
