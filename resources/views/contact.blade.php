<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us — University Management System</title>
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
<body class="bg-slate-50 text-slate-900 font-sans antialiased">
    <!-- Page: Public contact page | Laravel view: resources/views/contact.blade.php -->
    <!-- Start: Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="index.html" class="flex items-center gap-3">
                    <img src="assets/img/logo.svg" alt="University Management System" class="h-11 w-11">
                    <div class="hidden sm:block">
                        <p class="text-sm font-semibold text-slate-900 leading-tight">University Management System</p>
                        <p class="text-[11px] text-slate-500">Students, courses, and registrations</p>
                    </div>
                </a>
                <div class="hidden md:flex items-center gap-8">
                <a href="index.html" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Home</a>
                <a href="index.html#how-it-works" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">How it works</a>
                <a href="index.html#features" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Features</a>
                <a href="index.html#who" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Who can use it</a>
                <a href="contact.html" class="text-slate-900 text-sm font-medium">Contact us</a>
                    <a href="login.html" class="px-5 py-2.5 border border-slate-200 text-slate-900 rounded-md font-medium text-sm hover:bg-white hover:border-[#0f766e]/40">Sign in</a>
                    <a href="register.html" class="px-5 py-2.5 bg-[#0f766e] text-white rounded-md font-medium text-sm hover:bg-[#115e59] glow-primary">Create account</a>
                </div>
                <label for="mobile-nav-toggle" class="md:hidden p-2 text-slate-900 cursor-pointer">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </label>
            </div>
            <input type="checkbox" id="mobile-nav-toggle" class="peer hidden">
            <div class="hidden peer-checked:block md:!hidden py-4 border-t border-slate-200">
                <div class="flex flex-col gap-4">
                <a href="index.html" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Home</a>
                <a href="index.html#how-it-works" class="text-slate-500 hover:text-slate-900 text-sm font-medium">How it works</a>
                <a href="index.html#features" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Features</a>
                <a href="index.html#who" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Who can use it</a>
                <a href="contact.html" class="text-slate-900 text-sm font-medium">Contact us</a>
                    <a href="login.html" class="px-5 py-2.5 border border-slate-200 text-slate-900 rounded-md font-medium text-sm text-center">Sign in</a>
                    <a href="register.html" class="px-5 py-2.5 bg-[#0f766e] text-white rounded-md font-medium text-sm text-center">Create account</a>
                </div>
            </div>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Start: Contact -->
    <section class="pt-32 pb-24 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mb-10">
                <h1 class="text-3xl font-bold mb-3">Contact us</h1>
                <p class="text-slate-500">Questions about your record, a course, or a registration? Write to the Registrar's office and we will reply within two working days.</p>
            </div>
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Start: Contact form -->
                <!-- Laravel: add @csrf; action becomes route('contact.send') with method="post" -->
                <form action="contact.html" method="get" class="lg:col-span-2 rounded-lg border border-slate-200 bg-white p-6 space-y-5 ">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div><label class="block text-sm font-medium text-slate-600 mb-2">Full name</label><input type="text" class="input-field" name="name" placeholder="Your name"></div>
                        <div><label class="block text-sm font-medium text-slate-600 mb-2">University email</label><input type="email" class="input-field" name="email" placeholder="you@university.ac.ug"></div>
                    </div>
                    <div><label class="block text-sm font-medium text-slate-600 mb-2">Topic</label><select name="topic" class="input-field"><option>Student record</option><option>Course registration</option><option>Lecturer assignment</option><option>Account access</option><option>Something else</option></select></div>
                    <div><label class="block text-sm font-medium text-slate-600 mb-2">Message</label><textarea name="message" rows="5" class="input-field" placeholder="Tell us what you need"></textarea></div>
                    <button class="px-5 py-2.5 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]">Send message</button>
                </form>
                <!-- End: Contact form -->

                <!-- Start: Office details -->
                <div class="space-y-4">
                    <div class="rounded-lg border border-slate-200 p-5"><div class="flex items-center gap-3 mb-2"><i data-lucide="mail" class="w-5 h-5 text-[#0f766e]"></i><p class="font-semibold text-sm">Email</p></div><p class="text-sm text-slate-500">registrar@university.ac.ug</p></div>
                    <div class="rounded-lg border border-slate-200 p-5"><div class="flex items-center gap-3 mb-2"><i data-lucide="phone" class="w-5 h-5 text-[#7c3aed]"></i><p class="font-semibold text-sm">Phone</p></div><p class="text-sm text-slate-500">Registrar: 0414 000 310<br>ICT Helpdesk: 0414 000 311</p></div>
                    <div class="rounded-lg border border-slate-200 p-5"><div class="flex items-center gap-3 mb-2"><i data-lucide="map-pin" class="w-5 h-5 text-[#0f766e]"></i><p class="font-semibold text-sm">Visit</p></div><p class="text-sm text-slate-500">Main building, 1st floor<br>Mon–Fri, 8:00am – 5:00pm</p></div>
                </div>
                <!-- End: Office details -->
            </div>
        </div>
    </section>
    <!-- End: Contact -->

    <!-- Start: Footer -->
    <footer class="bg-teal-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <img src="assets/img/logo.svg" alt="" class="h-12 w-12">
                        <span class="font-semibold">University Management System</span>
                    </div>
                    <p class="text-teal-100/80 text-sm leading-relaxed max-w-sm">One place for student records, course catalogues, lecturer assignments, and course registrations.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Quick links</h4>
                    <ul class="space-y-3 text-sm text-teal-100/80">
                        <li><a href="login.html" class="hover:text-white">Sign in</a></li>
                        <li><a href="register.html" class="hover:text-white">Create student account</a></li>
                        <li><a href="student/courses/index.html" class="hover:text-white">Available courses</a></li>
                        <li><a href="lecturer/dashboard.html" class="hover:text-white">Lecturer area</a></li>
                        <li><a href="contact.html" class="hover:text-white">Contact us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Offices</h4>
                    <ul class="space-y-3 text-sm text-teal-100/80">
                        <li>Registrar — Main building, 1st floor</li>
                        <li>Academic Affairs — Block B</li>
                        <li>Faculty offices — Block C</li>
                        <li>ICT Helpdesk — Library, ground floor</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Contact</h4>
                    <ul class="space-y-2 text-sm text-teal-100/80">
                        <li><a href="contact.html" class="hover:text-white">registrar@university.ac.ug</a></li>
                        <li>Registrar: 0414 000 310</li>
                        <li>ICT: 0414 000 311</li>
                        <li class="text-violet-300 pt-2">Mon–Fri, 8:00am – 5:00pm</li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-teal-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-teal-200/70">
                <p>© 2026 University Management System. All rights reserved.</p>
                <p>Privacy · Acceptable use · Registration policy</p>
            </div>
        </div>
    </footer>
    <!-- End: Footer -->

    <script>lucide.createIcons();</script>
</body>
</html>
