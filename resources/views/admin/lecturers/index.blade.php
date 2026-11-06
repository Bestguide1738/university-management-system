<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturers — University Management System</title>
    <link rel="icon" type="image/svg+xml" href="../../assets/img/logo.svg">
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
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen">
    <!-- Page: Admin: lecturers list | Laravel view: resources/views/admin/lecturers/index.blade.php -->

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
                    <a href="../../admin/dashboard.html" class="flex items-center ms-2 md:me-8">
                        <img src="../../assets/img/logo.svg" alt="University Management System" class="h-10 w-10 me-3">
                        <div class="flex flex-col">
                            <span class="font-semibold text-slate-900 text-base">University Management System</span>
                            <span class="text-xs text-slate-500">Administrator area</span>
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
                                <a href="../../notifications.html" class="text-xs text-[#0f766e]">View all</a>
                            </div>
                            <a href="../../notifications.html" class="block px-4 py-3 hover:bg-slate-50 border-b border-slate-200">
                                <p class="text-sm">Course <span class="text-[#7c3aed]">BIS2201</span> reached capacity</p>
                                <p class="text-xs text-slate-500 mt-1">Database Systems · 12 min ago</p>
                            </a>
                            <a href="../../notifications.html" class="block px-4 py-3 hover:bg-slate-50">
                                <p class="text-sm">5 registrations are waiting for approval</p>
                                <p class="text-xs text-slate-500 mt-1">Registrations · 1 hr ago</p>
                            </a>
                        </div>
                    </details>
                    <!-- End: Header notifications -->
                    <!-- Start: Header user menu -->
                    <details class="menu-dropdown relative">
                        <summary class="flex items-center gap-2 bg-slate-50 rounded-md p-1 text-sm border border-slate-200 hover:bg-slate-100 cursor-pointer list-none">
                            <div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center text-[#0f766e] border border-teal-100 text-xs font-semibold">JT</div>
                            <div class="hidden md:block text-left mr-1">
                                <div class="text-xs font-medium text-slate-900">Joy Tiko</div>
                                <div class="text-[10px] text-slate-500">Administrator</div>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400"></i>
                        </summary>
                        <div class="absolute right-0 mt-2 w-56 bg-white border border-slate-200 rounded-md shadow-lg z-50">
                            <div class="px-4 py-3 border-b border-slate-200 bg-slate-50">
                                <p class="text-sm font-medium">Joy Tiko</p>
                                <p class="text-xs text-slate-500 truncate">joy.tiko@university.ac.ug</p>
                            </div>
                            <a href="../../profile.html" class="flex items-center px-4 py-2 text-sm text-slate-600 hover:bg-slate-50"><i data-lucide="user" class="w-4 h-4 mr-2"></i>My Profile</a>
                            <a href="../../profile.html" class="flex items-center px-4 py-2 text-sm text-slate-600 hover:bg-slate-50"><i data-lucide="settings" class="w-4 h-4 mr-2"></i>Account Settings</a>
                            <a href="../../login.html" class="flex items-center px-4 py-2 text-sm text-[#7c3aed] hover:bg-slate-50 border-t border-slate-200"><i data-lucide="log-out" class="w-4 h-4 mr-2"></i>Sign out</a>
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
            <div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-teal-300/50 uppercase mb-2">Main</p><a href="../../admin/dashboard.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="layout-dashboard" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Dashboard</span></a></div><div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-teal-300/50 uppercase mb-2">Academic records</p><a href="../../admin/students/index.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="users" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Students</span></a><a href="../../admin/lecturers/index.html" class="sidebar-item active border-l-3 border-violet-300 bg-teal-900 text-white flex items-center p-2 rounded-md group text-sm transition-all duration-200 pl-3"><i data-lucide="presentation" class="w-5 h-5 text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Lecturers</span></a><a href="../../admin/courses/index.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="book-open" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Courses</span></a><a href="../../admin/registrations/index.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="clipboard-check" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Registrations</span></a></div><div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-teal-300/50 uppercase mb-2">Account</p><a href="../../notifications.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="bell" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">Notifications</span></a><a href="../../profile.html" class="sidebar-item border-l-3 border-transparent text-teal-100/70 flex items-center p-2 rounded-md hover:bg-teal-900/60 hover:text-white group text-sm transition-all duration-200 pl-3"><i data-lucide="user-cog" class="w-5 h-5 text-teal-300/60 group-hover:text-violet-300 transition-colors"></i><span class="ms-3 text-sm font-medium">My profile</span></a></div>
        </div>
        <!-- Start: Sidebar user card -->
        <div class="mt-auto border-t border-teal-900 p-4">
            <div class="flex items-center space-x-3 mb-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full border border-teal-800 flex items-center justify-center bg-teal-900 text-sm font-semibold text-teal-50">JT</div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 border-2 border-teal-950 rounded-full"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">Joy Tiko</p>
                    <p class="text-xs text-teal-200/70 truncate">joy.tiko@university.ac.ug</p>
                </div>
            </div>
            <div class="flex items-center gap-2 px-3 py-2 bg-teal-900 rounded-md border border-teal-800">
                <i data-lucide="shield" class="w-4 h-4 text-violet-300"></i>
                <span class="text-xs font-semibold text-teal-50 tracking-wide">Administrator</span>
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
                    <h1 class="text-xl font-semibold">Lecturers</h1>
                    <p class="text-sm text-slate-500 mt-1">Teaching staff and the number of courses each one is assigned.</p>
                </div>
                <a href="create.html" class="inline-flex items-center px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Add lecturer</a>
            </div>
            <!-- End: Page heading -->

            <!-- Start: Lecturer filters -->
            <form action="index.html" method="get" class="bg-white border border-slate-200 rounded-lg p-4 mb-6 grid grid-cols-1 sm:grid-cols-3 gap-3 ">
                <input type="search" name="q" class="input-field" placeholder="Search name or staff number">
                <select name="department" class="input-field"><option value="">All departments</option><option>Computer Science</option><option>Information Systems</option><option>Mathematics</option><option>Statistics</option><option>Languages</option></select>
                <button type="submit" class="px-4 py-2.5 bg-[#0f766e] rounded-lg text-sm font-medium text-white hover:bg-[#115e59]">Filter</button>
            </form>
            <!-- End: Lecturer filters -->

            <!-- Start: Lecturers table -->
            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden ">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[860px]">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50">
                            <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Name</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Staff no.</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Department</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Email</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Courses</th>
                            <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr class="border-b border-slate-200 hover:bg-slate-50">
                            <td class="py-3 px-4 text-sm text-slate-900">Dr. Grace Nakato</td>
                            <td class="py-3 px-4 text-sm text-slate-500">L-0102</td>
                            <td class="py-3 px-4 text-sm text-slate-500">Computer Science</td>
                            <td class="py-3 px-4 text-sm text-slate-500">grace.nakato@university.ac.ug</td>
                            <td class="py-3 px-4 text-sm text-slate-500">2</td>
                            <td class="py-3 px-4 text-center"><a href="edit.html" class="text-[#0f766e]"><i data-lucide="edit" class="w-4 h-4 inline"></i></a></td>
                        </tr>
                        <tr class="border-b border-slate-200 hover:bg-slate-50">
                            <td class="py-3 px-4 text-sm text-slate-900">Dr. Ruth Achieng</td>
                            <td class="py-3 px-4 text-sm text-slate-500">L-0117</td>
                            <td class="py-3 px-4 text-sm text-slate-500">Information Systems</td>
                            <td class="py-3 px-4 text-sm text-slate-500">ruth.achieng@university.ac.ug</td>
                            <td class="py-3 px-4 text-sm text-slate-500">2</td>
                            <td class="py-3 px-4 text-center"><a href="edit.html" class="text-[#0f766e]"><i data-lucide="edit" class="w-4 h-4 inline"></i></a></td>
                        </tr>
                        <tr class="border-b border-slate-200 hover:bg-slate-50">
                            <td class="py-3 px-4 text-sm text-slate-900">Mr. Peter Ssemwogerere</td>
                            <td class="py-3 px-4 text-sm text-slate-500">L-0124</td>
                            <td class="py-3 px-4 text-sm text-slate-500">Mathematics</td>
                            <td class="py-3 px-4 text-sm text-slate-500">peter.ssemwogerere@university.ac.ug</td>
                            <td class="py-3 px-4 text-sm text-slate-500">1</td>
                            <td class="py-3 px-4 text-center"><a href="edit.html" class="text-[#0f766e]"><i data-lucide="edit" class="w-4 h-4 inline"></i></a></td>
                        </tr>
                        <tr class="border-b border-slate-200 hover:bg-slate-50">
                            <td class="py-3 px-4 text-sm text-slate-900">Prof. Samuel Mugisha</td>
                            <td class="py-3 px-4 text-sm text-slate-500">L-0089</td>
                            <td class="py-3 px-4 text-sm text-slate-500">Statistics</td>
                            <td class="py-3 px-4 text-sm text-slate-500">samuel.mugisha@university.ac.ug</td>
                            <td class="py-3 px-4 text-sm text-slate-500">1</td>
                            <td class="py-3 px-4 text-center"><a href="edit.html" class="text-[#0f766e]"><i data-lucide="edit" class="w-4 h-4 inline"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 border-t border-slate-200 bg-slate-50 text-sm text-slate-500">Showing 1–4 of 4 lecturers</div>
            </div>
            <!-- End: Lecturers table -->

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
