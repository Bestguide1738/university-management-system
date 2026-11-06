@php
    $user = auth()->user();
    $role = $user->hasRole('admin') ? 'admin' : ($user->hasRole('lecturer') ? 'lecturer' : 'student');

    $areaLabel = ['admin' => 'Administrator area', 'lecturer' => 'Lecturer area', 'student' => 'Student area'][$role];
    $roleLabel = ['admin' => 'Administrator', 'lecturer' => 'Lecturer', 'student' => 'Student'][$role];

    $initials = collect(explode(' ', $user->name))
        ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->take(2)->join('');

    // [label, icon, route name, active pattern, permission needed to see the link]
    $sections = match ($role) {
        'admin' => [
            'Main' => [
                ['Dashboard', 'layout-dashboard', 'admin.dashboard', 'admin.dashboard', null],
            ],
            'Academic records' => [
                ['Students', 'users', 'admin.students.index', 'admin.students.*', 'manage students'],
                ['Courses', 'book-open', 'admin.courses.index', 'admin.courses.*', 'manage courses'],
                ['Registrations', 'clipboard-check', 'admin.registrations.index', 'admin.registrations.*', 'manage registrations'],
            ],
        ],
        'lecturer' => [
            'Main' => [
                ['Dashboard', 'layout-dashboard', 'lecturer.dashboard', 'lecturer.dashboard', null],
                ['My courses', 'book-marked', 'lecturer.courses.index', 'lecturer.courses.*', 'view assigned courses'],
            ],
        ],
        'student' => [
            'Main' => [
                ['Dashboard', 'layout-dashboard', 'student.dashboard', 'student.dashboard', null],
                ['Available courses', 'book-open', 'student.courses.index', 'student.courses.*', 'view available courses'],
                ['My registrations', 'clipboard-check', 'student.registrations.index', 'student.registrations.*', 'view own registrations'],
            ],
        ],
    };

    // Keep only the links this user has permission to see, and drop empty sections
    $sections = collect($sections)
        ->map(fn ($items) => collect($items)
            ->filter(fn ($item) => $item[4] === null || $user->can($item[4]))
            ->all())
        ->filter()
        ->all();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — University Management System</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/logo.svg') }}">
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
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen">

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
                    <a href="{{ route('dashboard') }}" class="flex items-center ms-2 md:me-8">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="University Management System" class="h-10 w-10 me-3">
                        <div class="flex flex-col">
                            <span class="font-semibold text-slate-900 text-base">University Management System</span>
                            <span class="text-xs text-slate-500">{{ $areaLabel }}</span>
                        </div>
                    </a>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Start: Header user menu -->
                    <details class="menu-dropdown relative">
                        <summary class="flex items-center gap-2 bg-slate-50 rounded-md p-1 text-sm border border-slate-200 hover:bg-slate-100 cursor-pointer list-none">
                            <div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center text-[#0f766e] border border-teal-100 text-xs font-semibold">{{ $initials }}</div>
                            <div class="hidden md:block text-left mr-1">
                                <div class="text-xs font-medium text-slate-900">{{ $user->name }}</div>
                                <div class="text-[10px] text-slate-500">{{ $roleLabel }}</div>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400"></i>
                        </summary>
                        <div class="absolute right-0 mt-2 w-56 bg-white border border-slate-200 rounded-md shadow-lg z-50">
                            <div class="px-4 py-3 border-b border-slate-200 bg-slate-50">
                                <p class="text-sm font-medium">{{ $user->name }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $user->email }}</p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-[#7c3aed] hover:bg-slate-50"><i data-lucide="log-out" class="w-4 h-4 mr-2"></i>Sign out</button>
                            </form>
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
            @foreach ($sections as $title => $items)
                <div class="space-y-1 mb-5">
                    <p class="px-3 text-xs font-semibold text-teal-300/50 uppercase mb-2">{{ $title }}</p>
                    @foreach ($items as [$label, $icon, $routeName, $pattern])
                        @php $active = request()->routeIs($pattern); @endphp
                        <a href="{{ route($routeName) }}" class="sidebar-item {{ $active ? 'active border-l-3 border-violet-300 bg-teal-900 text-white' : 'border-l-3 border-transparent text-teal-100/70 hover:bg-teal-900/60 hover:text-white' }} flex items-center p-2 rounded-md group text-sm transition-all duration-200 pl-3">
                            <i data-lucide="{{ $icon }}" class="w-5 h-5 {{ $active ? 'text-violet-300' : 'text-teal-300/60 group-hover:text-violet-300' }} transition-colors"></i>
                            <span class="ms-3 text-sm font-medium">{{ $label }}</span>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
        <!-- Start: Sidebar user card -->
        <div class="mt-auto border-t border-teal-900 p-4">
            <div class="flex items-center space-x-3 mb-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full border border-teal-800 flex items-center justify-center bg-teal-900 text-sm font-semibold text-teal-50">{{ $initials }}</div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 border-2 border-teal-950 rounded-full"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">{{ $user->name }}</p>
                    <p class="text-xs text-teal-200/70 truncate">{{ $user->email }}</p>
                </div>
            </div>
            <div class="flex items-center gap-2 px-3 py-2 bg-teal-900 rounded-md border border-teal-800">
                <i data-lucide="shield" class="w-4 h-4 text-violet-300"></i>
                <span class="text-xs font-semibold text-teal-50 tracking-wide">{{ $roleLabel }}</span>
            </div>
        </div>
        <!-- End: Sidebar user card -->
    </aside>
    <!-- End: Sidebar -->

    <!-- Start: Main content -->
    <div class="pt-16 sm:pl-64 min-h-screen flex flex-col">
        <main class="flex-1 pb-8 px-4 sm:px-8 lg:px-10 pt-6">

            <!-- Start: Success and error messages -->
            @if (session('status'))
                <div class="mb-6 flex items-start gap-3 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    <i data-lucide="check-circle-2" class="w-5 h-5 shrink-0"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="mb-6 flex items-start gap-3 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                    <i data-lucide="alert-circle" class="w-5 h-5 shrink-0"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            <!-- End: Success and error messages -->

            @yield('content')

        </main>
        <!-- Start: Footer -->
        <footer class="bg-white border-t border-slate-200 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex flex-col md:flex-row justify-between items-center gap-3">
                    <p class="text-sm text-slate-500">© {{ date('Y') }} <span class="font-semibold text-slate-900">University Management System</span>. All rights reserved.</p>
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
