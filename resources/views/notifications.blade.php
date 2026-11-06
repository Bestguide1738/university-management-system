<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications — University Management System</title>
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
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen">
    <!-- Page: Notifications (shared by all roles) | Laravel view: resources/views/notifications/index.blade.php -->

    <!-- Start: Sidebar toggle (checkbox, no JavaScript) -->
    <input type="checkbox" id="sidebar-toggle" class="peer hidden">
    <label for="sidebar-toggle" class="fixed inset-0 bg-slate-900/30 z-30 hidden peer-checked:block sm:!hidden"></label>
    <!-- End: Sidebar toggle -->

    <!-- Start: Header -->
    <header class="fixed top-0 z-50 w-full bg-white border-b border-slate-200">
        <div class="px-2 py-2 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <label for="sidebar-toggle" class="inline-flex items-center p-2 text-slate-500 rounded-md sm:hidden hover:bg-slate-100 cursor-pointer">
                        <span class="sr-only">Open sidebar</span>
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </label>
                    <a href="student/dashboard.html" class="flex items-center ms-2 md:me-8">
                        <img src="assets/img/logo.svg" alt="University Management System" class="h-10 w-10 me-3">
                        <div class="flex flex-col">
                            <span class="font-semibold text-slate-900 text-base">University Management System</span>
                            <span class="text-xs text-slate-500">Student area</span>
                        </div>
                    </a>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Start: Header notifications -->
                    <details class="menu-dropdown relative">
                        <summary class="p-2 text-slate-500 rounded-md hover:text-slate-900 hover:bg-slate-100 cursor-pointer relative list-none">
                            <i data-lucide="bell" class="w-5 h-5"></i>
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-[#7c3aed] rounded-full"></span>
                        </summary>
                        <div class="absolute right-0 mt-2 w-80 bg-white border border-slate-200 rounded-md shadow-lg z-50">
                            <div class="px-4 py-2 border-b border-slate-200 flex justify-between items-center bg-slate-50">
                                <p class="text-sm font-medium">Notifications</p>
                                <a href="notifications.html" class="text-xs text-[#0f766e]">View all</a>
                            </div>
                            <a href="notifications.html" class="block px-4 py-3 hover:bg-slate-50 border-b border-slate-200">
                                <p class="text-sm">Registration confirmed for <span class="text-[#7c3aed]">CSC1101</span></p>
                                <p class="text-xs text-slate-500 mt-1">Introduction to Programming · 12 min ago</p>
                            </a>
                            <a href="notifications.html" class="block px-4 py-3 hover:bg-slate-50">
                                <p class="text-sm">Seats are open for <span class="text-[#7c3aed]">STA2103</span></p>
                                <p class="text-xs text-slate-500 mt-1">Probability and Statistics · 1 hr ago</p>
                            </a>
                        </div>
                    </details>
                    <!-- End: Header notifications -->
                    <!-- Start: Header user menu -->
                    <details class="menu-dropdown relative">
                        <summary class="flex items-center gap-2 bg-slate-50 rounded-md p-1 text-sm border border-slate-200 hover:bg-slate-100 cursor-pointer list-none">
                            <div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center text-[#0f766e] border border-teal-100 text-xs font-semibold">AN</div>
                            <div class="hidden md:block text-left mr-1">
                                <div class="text-xs font-medium text-slate-900">Aisha Namuli</div>
                                <div class="text-[10px] text-slate-500">Student</div>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400"></i>
                        </summary>
                        <div class="absolute right-0 mt-2 w-56 bg-white border border-slate-200 rounded-md shadow-lg z-50">
                            <div class="px-4 py-3 border-b border-slate-200 bg-slate-50">
                                <p class="text-sm font-medium">Aisha Namuli</p>
                                <p class="text-xs text-slate-500 truncate">aisha.namuli@university.ac.ug</p>
                            </div>
                            <a href="profile.html" class="flex items-center px-4 py-2 text-sm text-slate-600 hover:bg-slate-50"><i data-lucide="user" class="w-4 h-4 mr-2"></i>My Profile</a>
                            <a href="profile.html" class="flex items-center px-4 py-2 text-sm text-slate-600 hover:bg-slate-50"><i data-lucide="settings" class="w-4 h-4 mr-2"></i>Account Settings</a>
                            <a href="login.html" class="flex items-center px-4 py-2 text-sm text-[#7c3aed] hover:bg-slate-50 border-t border-slate-200"><i data-lucide="log-out" class="w-4 h-4 mr-2"></i>Sign out</a>
                        </div>
                    </details>
                    <!-- End: Header user menu -->
                </div>
            </div>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 -translate-x-full peer-checked:translate-x-0 sm:translate-x-0 bg-teal-950 border-r border-teal-900 flex flex-col">
        <div class="flex-1 px-3 py-4 overflow-y-auto sidebar-scrollbar">
            <div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-teal-300/50 uppercase mb-2">Main</p><a href="student/dashboard.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="layout-dashboard" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Dashboard</span></a><a href="student/courses/index.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="book-open" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Available courses</span></a><a href="student/registrations/index.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="clipboard-check" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">My registrations</span></a></div><div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-teal-300/50 uppercase mb-2">Account</p><a href="notifications.html" class="sidebar-item active border-l-3 border-violet-300 bg-teal-900 text-white flex items-center p-2 rounded-md group text-sm transition-all duration-200 pl-3"><i data-lucide="bell" class="w-5 h-5 text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Notifications</span></a><a href="profile.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="user-cog" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">My profile</span></a></div>
        </div>
        <!-- Start: Sidebar user card -->
        <div class="mt-auto border-t border-teal-900 p-4">
            <div class="flex items-center space-x-3 mb-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full border border-teal-800 flex items-center justify-center bg-teal-900 text-sm font-semibold text-teal-50">AN</div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 border-2 border-teal-950 rounded-full"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">Aisha Namuli</p>
                    <p class="text-xs text-teal-200/70 truncate">aisha.namuli@university.ac.ug</p>
                </div>
            </div>
            <div class="flex items-center gap-2 px-3 py-2 bg-teal-900 rounded-md border border-teal-800">
                <i data-lucide="graduation-cap" class="w-4 h-4 text-violet-300"></i>
                <span class="text-xs font-semibold text-teal-50 tracking-wide">Student</span>
            </div>
        </div>
        <!-- End: Sidebar user card -->
    </aside>
    <!-- End: Sidebar -->

    <!-- Start: Main content -->
    <div class="pt-16 sm:pl-64 min-h-screen flex flex-col">
        <main class="flex-1 pb-8 px-4 sm:px-8 lg:px-10 pt-6">

            <!-- Start: Page heading -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div>
                    <h1 class="text-xl font-semibold">Notifications</h1>
                    <p class="text-sm text-slate-500 mt-1">Updates about courses and registrations.</p>
                </div>
                <a href="notifications.html" class="px-4 py-2 border border-slate-200 rounded-md text-sm text-slate-600 hover:bg-slate-100">Mark all as read</a>
            </div>
            <!-- End: Page heading -->

            <!-- Start: Notification list -->
            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden max-w-3xl">
                <div class="flex items-start gap-3 p-4 border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                    <span class="w-2 h-2 bg-[#7c3aed] rounded-full shrink-0 mt-2"></span>
                    <div class="w-9 h-9 rounded-md bg-emerald-50 flex items-center justify-center shrink-0"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i></div>
                    <div class="flex-1 min-w-0"><p class="text-sm font-medium">Registration confirmed</p><p class="text-sm text-slate-500 mt-0.5">You are registered for CSC1101 Introduction to Programming.</p></div>
                    <span class="text-xs text-slate-400 shrink-0">12 min ago</span>
                </div>
                <div class="flex items-start gap-3 p-4 border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                    <span class="w-2 h-2 bg-[#7c3aed] rounded-full shrink-0 mt-2"></span>
                    <div class="w-9 h-9 rounded-md bg-teal-50 flex items-center justify-center shrink-0"><i data-lucide="book-open" class="w-4 h-4 text-[#0f766e]"></i></div>
                    <div class="flex-1 min-w-0"><p class="text-sm font-medium">New course opened</p><p class="text-sm text-slate-500 mt-0.5">STA2103 Probability and Statistics now has seats available.</p></div>
                    <span class="text-xs text-slate-400 shrink-0">1 hr ago</span>
                </div>
                <div class="flex items-start gap-3 p-4 border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                    <span class="w-2 shrink-0"></span>
                    <div class="w-9 h-9 rounded-md bg-amber-100 flex items-center justify-center shrink-0"><i data-lucide="alert-triangle" class="w-4 h-4 text-amber-700"></i></div>
                    <div class="flex-1 min-w-0"><p class="text-sm font-medium">Course is full</p><p class="text-sm text-slate-500 mt-0.5">BIS2201 Database Systems reached capacity. Choose another course or check back later.</p></div>
                    <span class="text-xs text-slate-400 shrink-0">Yesterday</span>
                </div>
                <div class="flex items-start gap-3 p-4 border-b border-slate-200 last:border-b-0 hover:bg-slate-50">
                    <span class="w-2 shrink-0"></span>
                    <div class="w-9 h-9 rounded-md bg-teal-50 flex items-center justify-center shrink-0"><i data-lucide="megaphone" class="w-4 h-4 text-[#0f766e]"></i></div>
                    <div class="flex-1 min-w-0"><p class="text-sm font-medium">Registration deadline</p><p class="text-sm text-slate-500 mt-0.5">Semester 1 course registration closes on Friday at 5:00pm.</p></div>
                    <span class="text-xs text-slate-400 shrink-0">2 days ago</span>
                </div>
            </div>
            <!-- End: Notification list -->

        </main>
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
    </div>
    <!-- End: Main content -->

    <script>lucide.createIcons();</script>
</body>
</html>
