<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heisenberg University | Academic Management</title>
    <meta name="description" content="Manage students, courses, lecturers, and course registrations in one place. Sign in as an administrator, lecturer, or student.">
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
<body class="landing-page bg-slate-50 text-slate-900 font-sans antialiased">
    <!-- Page: Public landing page | Laravel view: resources/views/welcome.blade.php -->
    <!-- Start: Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="assets/img/logo.svg" alt="University Management System" class="h-11 w-11">
                    <div class="hidden sm:block">
                        <p class="text-sm font-semibold text-slate-900 leading-tight">Heisenberg University Management System</p>
                        <p class="text-[11px] text-slate-500">Students, courses, and registrations</p>
                    </div>
                </a>
                <div class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}" class="text-slate-900 text-sm font-medium">Home</a>
                <a href="{{ url('/') }}#how-it-works" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">How it works</a>
                <a href="{{ url('/') }}#features" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Features</a>
                <a href="{{ url('/') }}#who" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Who can use it</a>
                <a href="{{ url('/') }}" class="text-slate-500 hover:text-slate-900 transition-colors text-sm font-medium">Contact us</a>
                    <a href="{{ route('login') }}" class="px-5 py-2.5 border border-slate-200 text-slate-900 rounded-md font-medium text-sm hover:bg-white hover:border-[#0f766e]/40">Sign in</a>
                    <a href="{{ route('login') }}" class="px-5 py-2.5 bg-[#0f766e] text-white rounded-md font-medium text-sm hover:bg-[#115e59] glow-primary">Create account</a>
                </div>
                <label for="mobile-nav-toggle" class="md:hidden p-2 text-slate-900 cursor-pointer">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </label>
            </div>
            <input type="checkbox" id="mobile-nav-toggle" class="peer hidden">
            <div class="hidden peer-checked:block md:!hidden py-4 border-t border-slate-200">
                <div class="flex flex-col gap-4">
                <a href="{{ url('/') }}" class="text-slate-900 text-sm font-medium">Home</a>
                <a href="{{ url('/') }}#how-it-works" class="text-slate-500 hover:text-slate-900 text-sm font-medium">How it works</a>
                <a href="{{ url('/') }}#features" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Features</a>
                <a href="{{ url('/') }}#who" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Who can use it</a>
                <a href="{{ url('/') }}" class="text-slate-500 hover:text-slate-900 text-sm font-medium">Contact us</a>
                    <a href="{{ route('login') }}" class="px-5 py-2.5 border border-slate-200 text-slate-900 rounded-md font-medium text-sm text-center">Sign in</a>
                    <a href="{{ route('login') }}" class="px-5 py-2.5 bg-[#0f766e] text-white rounded-md font-medium text-sm text-center">Create account</a>
                </div>
            </div>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Start: Hero -->
    <section class="relative pt-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center py-16 lg:py-20">
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 bg-white mb-6">
                        <i data-lucide="calendar-check" class="w-4 h-4 text-[#7c3aed]"></i>
                        <span class="text-sm text-slate-500">Semester 1 registration is open</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-5 leading-tight">
                        Heisenberg University<br>
                        <span class="text-gradient">A clearer way to manage every semester.</span>
                    </h1>
                    <p class="text-sm sm:text-base text-slate-500 max-w-xl mx-auto lg:mx-0 mb-6 leading-relaxed">
                        Course registration, student records, and lecturer assignments come together in one place, giving every member of the university a clear view of the semester.
                    </p>
                    <div class="grid gap-2 text-left max-w-xl mx-auto lg:mx-0 mb-8">
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#7c3aed] mt-0.5 shrink-0"></i>
                            <span>See every open course and how many seats are left.</span>
                        </div>
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#7c3aed] mt-0.5 shrink-0"></i>
                            <span>Register or drop a course without visiting the Registrar.</span>
                        </div>
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#7c3aed] mt-0.5 shrink-0"></i>
                            <span>Lecturers get a live class list for every course they teach.</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('login') }}" class="group flex items-center gap-2 px-8 py-4 bg-[#0f766e] text-white rounded-lg font-semibold text-sm hover:bg-[#115e59] glow-primary w-full sm:w-auto justify-center">
                            Create student account
                            <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 px-8 py-4 border border-slate-200 bg-white rounded-lg font-semibold text-sm text-slate-900 hover:border-[#0f766e]/40 w-full sm:w-auto">
                            I already have an account
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="rounded-xl border border-slate-200 bg-white p-5 sm:p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-[#7c3aed] font-semibold">This semester</p>
                                <p class="text-lg font-semibold mt-1">Courses open for registration</p>
                            </div>
                            <span class="text-xs px-2.5 py-1 rounded-full bg-teal-50 text-[#0f766e] border border-teal-100">6 courses</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 p-3 rounded-lg bg-white border border-slate-200">
                                <div class="w-9 h-9 rounded-md bg-teal-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="code-2" class="w-4 h-4 text-[#0f766e]"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium truncate">CSC1101 · Introduction to Programming</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Computer Science · Dr. Grace Nakato</p>
                                </div>
                                <span class="shrink-0"><span class="text-xs px-2 py-1 rounded-full bg-amber-100 text-amber-800">8 seats left</span></span>
                            </div>
                            <div class="flex items-start gap-3 p-3 rounded-lg bg-white border border-slate-200">
                                <div class="w-9 h-9 rounded-md bg-violet-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="network" class="w-4 h-4 text-[#7c3aed]"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium truncate">CSC2104 · Data Structures and Algorithms</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Computer Science · Dr. Grace Nakato</p>
                                </div>
                                <span class="shrink-0"><span class="text-xs px-2 py-1 rounded-full bg-amber-100 text-amber-800">7 seats left</span></span>
                            </div>
                            <div class="flex items-start gap-3 p-3 rounded-lg bg-white border border-slate-200">
                                <div class="w-9 h-9 rounded-md bg-emerald-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="database" class="w-4 h-4 text-emerald-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium truncate">BIS2201 · Database Systems</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Information Systems · Dr. Ruth Achieng</p>
                                </div>
                                <span class="shrink-0"><span class="text-xs px-2 py-1 rounded-full bg-rose-50 text-rose-700">Full</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start: Hero stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 pb-16">
                <div class="rounded-lg border border-slate-200 p-5 text-center"><p class="text-2xl font-bold text-[#0f766e]">1,240</p><p class="text-sm text-slate-500 mt-1">Students</p></div>
                <div class="rounded-lg border border-slate-200 p-5 text-center"><p class="text-2xl font-bold text-[#7c3aed]">86</p><p class="text-sm text-slate-500 mt-1">Lecturers</p></div>
                <div class="rounded-lg border border-slate-200 p-5 text-center"><p class="text-2xl font-bold text-[#0f766e]">142</p><p class="text-sm text-slate-500 mt-1">Courses</p></div>
                <div class="rounded-lg border border-slate-200 p-5 text-center"><p class="text-2xl font-bold text-[#7c3aed]">3,980</p><p class="text-sm text-slate-500 mt-1">Registrations this semester</p></div>
            </div>
            <!-- End: Hero stats -->
        </div>
    </section>
    <!-- End: Hero -->

    <!-- Start: How it works -->
    <section id="how-it-works" class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#7c3aed] mb-3">How it works</p>
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">Four steps from record to registration</h2>
                <p class="text-sm text-slate-500">Each role only sees the screens it needs.</p>
            </div>
            <ol class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <li class="p-6 rounded-lg bg-white border border-slate-200">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#0f766e]">Step 01</span>
                    <div class="w-12 h-12 rounded-md bg-teal-50 flex items-center justify-center my-4"><i data-lucide="database" class="w-6 h-6 text-[#0f766e]"></i></div>
                    <h3 class="font-bold mb-2">Administrators set up</h3>
                    <p class="text-sm text-slate-500">The Registrar adds students, lecturers, and the course catalogue for the semester.</p>
                </li>
                <li class="p-6 rounded-lg bg-white border border-slate-200">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#7c3aed]">Step 02</span>
                    <div class="w-12 h-12 rounded-md bg-violet-50 flex items-center justify-center my-4"><i data-lucide="user-check" class="w-6 h-6 text-[#7c3aed]"></i></div>
                    <h3 class="font-bold mb-2">Lecturers are assigned</h3>
                    <p class="text-sm text-slate-500">Every course is given to a lecturer, who then sees it on their own dashboard.</p>
                </li>
                <li class="p-6 rounded-lg bg-white border border-slate-200">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#0f766e]">Step 03</span>
                    <div class="w-12 h-12 rounded-md bg-teal-50 flex items-center justify-center my-4"><i data-lucide="search" class="w-6 h-6 text-[#0f766e]"></i></div>
                    <h3 class="font-bold mb-2">Students browse</h3>
                    <p class="text-sm text-slate-500">Students filter the catalogue by department and semester and check seats left.</p>
                </li>
                <li class="p-6 rounded-lg bg-white border border-slate-200">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#7c3aed]">Step 04</span>
                    <div class="w-12 h-12 rounded-md bg-violet-50 flex items-center justify-center my-4"><i data-lucide="clipboard-check" class="w-6 h-6 text-[#7c3aed]"></i></div>
                    <h3 class="font-bold mb-2">Students register</h3>
                    <p class="text-sm text-slate-500">A registration is saved, the class list updates, and everyone sees the same numbers.</p>
                </li>
            </ol>
        </div>
    </section>
    <!-- End: How it works -->

    <!-- Start: Features -->
    <section id="features" class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#7c3aed] mb-3">Features</p>
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">Everything the Registrar's office manages</h2>
                <p class="text-sm text-slate-500">Four record types, linked together.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 rounded-lg bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-md bg-teal-50 flex items-center justify-center mb-4"><i data-lucide="users" class="w-6 h-6 text-[#0f766e]"></i></div>
                    <h3 class="font-bold mb-2">Students</h3>
                    <p class="text-sm text-slate-500">Registration number, programme, year of study, and contact details.</p>
                </div>
                <div class="p-6 rounded-lg bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-md bg-violet-50 flex items-center justify-center mb-4"><i data-lucide="presentation" class="w-6 h-6 text-[#7c3aed]"></i></div>
                    <h3 class="font-bold mb-2">Lecturers</h3>
                    <p class="text-sm text-slate-500">Staff number, department, and the courses each lecturer teaches.</p>
                </div>
                <div class="p-6 rounded-lg bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-md bg-teal-50 flex items-center justify-center mb-4"><i data-lucide="book-open" class="w-6 h-6 text-[#0f766e]"></i></div>
                    <h3 class="font-bold mb-2">Courses</h3>
                    <p class="text-sm text-slate-500">Code, title, credit units, semester, capacity, and assigned lecturer.</p>
                </div>
                <div class="p-6 rounded-lg bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-md bg-violet-50 flex items-center justify-center mb-4"><i data-lucide="clipboard-check" class="w-6 h-6 text-[#7c3aed]"></i></div>
                    <h3 class="font-bold mb-2">Registrations</h3>
                    <p class="text-sm text-slate-500">Who is registered for what, with status and date.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Features -->

    <!-- Start: Who can use it -->
    <section id="who" class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#7c3aed] mb-3">Who can use it</p>
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">Three roles, three views</h2>
                <p class="text-sm text-slate-500">Sign in with your university email and you land on the right dashboard.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 rounded-lg bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-md bg-teal-50 flex items-center justify-center mb-4"><i data-lucide="shield" class="w-6 h-6 text-[#0f766e]"></i></div>
                    <h3 class="font-bold mb-3">Administrators</h3>
                    <ul class="space-y-2 mb-5">
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#0f766e] mt-0.5 shrink-0"></i><span>Add, edit, and delete students, lecturers, and courses</span></li>
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#0f766e] mt-0.5 shrink-0"></i><span>Assign lecturers to courses</span></li>
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#0f766e] mt-0.5 shrink-0"></i><span>Approve or drop registrations</span></li>
                    </ul>
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium text-[#0f766e]">Open administrators view</a>
                </div>
                <div class="p-6 rounded-lg bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-md bg-violet-50 flex items-center justify-center mb-4"><i data-lucide="presentation" class="w-6 h-6 text-[#7c3aed]"></i></div>
                    <h3 class="font-bold mb-3">Lecturers</h3>
                    <ul class="space-y-2 mb-5">
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#7c3aed] mt-0.5 shrink-0"></i><span>See the courses assigned to you</span></li>
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#7c3aed] mt-0.5 shrink-0"></i><span>Open a course to view registered students</span></li>
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#7c3aed] mt-0.5 shrink-0"></i><span>Read-only: records are kept by the Registrar</span></li>
                    </ul>
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium text-[#7c3aed]">Open lecturers view</a>
                </div>
                <div class="p-6 rounded-lg bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-md bg-teal-50 flex items-center justify-center mb-4"><i data-lucide="graduation-cap" class="w-6 h-6 text-[#0f766e]"></i></div>
                    <h3 class="font-bold mb-3">Students</h3>
                    <ul class="space-y-2 mb-5">
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#0f766e] mt-0.5 shrink-0"></i><span>Browse available courses</span></li>
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#0f766e] mt-0.5 shrink-0"></i><span>Register for or drop a course</span></li>
                        <li class="flex items-start gap-2 text-sm text-slate-600"><i data-lucide="check" class="w-4 h-4 text-[#0f766e] mt-0.5 shrink-0"></i><span>View your own registrations and credit units</span></li>
                    </ul>
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium text-[#0f766e]">Open students view</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Who can use it -->

    <!-- Start: Call to action -->
    <section class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="rounded-xl border border-slate-200 bg-white p-10 sm:p-14">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4">Ready to register for the semester?</h2>
                <p class="text-slate-500 mb-8 max-w-xl mx-auto">Create an account with your university email. If you already registered last semester, just sign in.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-[#0f766e] text-white rounded-lg font-semibold text-sm hover:bg-[#115e59] glow-primary">Create account</a>
                    <a href="{{ route('login') }}" class="px-8 py-4 border border-slate-200 bg-white rounded-lg font-semibold text-sm hover:border-[#0f766e]/40">Sign in</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Call to action -->

    <!-- Start: Footer -->
    <footer class="bg-teal-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <img src="assets/img/logo.svg" alt="" class="h-12 w-12">
                        <span class="font-semibold">Heisenberg University Management System</span>
                    </div>
                    <p class="text-teal-100/80 text-sm leading-relaxed max-w-sm">One place for student records, course catalogues, lecturer assignments, and course registrations.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Quick links</h4>
                    <ul class="space-y-3 text-sm text-teal-100/80">
                        <li><a href="{{ route('login') }}" class="hover:text-white">Sign in</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white">Create student account</a></li>
                        <li><a href="student/courses/{{ url('/') }}" class="hover:text-white">Available courses</a></li>
                        <li><a href="{{ route('dashboard') }}" class="hover:text-white">Lecturer area</a></li>
                        <li><a href="{{ url('/') }}" class="hover:text-white">Contact us</a></li>
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
                        <li><a href="{{ url('/') }}" class="hover:text-white">registrar@university.ac.ug</a></li>
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
