<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CodeQuest - Interactive Learning Platform for Computer Science Education">
        <meta name="theme-color" content="#0284c7">

        <title>CodeQuest - Master Programming Through Interactive Learning</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-white">
        <!-- Navigation -->
        <nav class="fixed w-full bg-white shadow-sm z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-3">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span class="text-xl font-bold text-primary-700">CodeQuest</span>
                    </div>
                    <div class="flex gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 text-slate-700 hover:text-primary-600 font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-slate-700 hover:text-primary-600 font-medium">Login</a>
                            <a href="{{ route('register') }}" class="px-6 py-2 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-lg font-medium hover:shadow-lg transition">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 via-white to-primary-50">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Content -->
                    <div>
                        <h1 class="text-5xl lg:text-6xl font-bold text-slate-900 mb-6 leading-tight">
                            Master Programming Through <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-accent-600">Interactive Learning</span>
                        </h1>
                        <p class="text-xl text-slate-600 mb-8 leading-relaxed">
                            CodeQuest is an innovative educational platform that transforms how students learn computer science through engaging quizzes, coding challenges, and real-time feedback.
                        </p>
                        <div class="flex gap-4">
                            @auth
                                <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-lg font-semibold hover:shadow-lg transition flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    Go to Dashboard
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="px-8 py-3 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-lg font-semibold hover:shadow-lg transition flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Get Started Free
                                </a>
                                <a href="{{ route('login') }}" class="px-8 py-3 border-2 border-primary-600 text-primary-600 rounded-lg font-semibold hover:bg-primary-50 transition flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                    Sign In
                                </a>
                            @endauth
                        </div>
                    </div>

                    <!-- Right Illustration -->
                    <div class="hidden lg:flex justify-center">
                        <div class="relative w-full max-w-md">
                            <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-accent-600 rounded-2xl transform rotate-6 opacity-20"></div>
                            <div class="relative bg-white rounded-2xl shadow-2xl p-8 border border-slate-200">
                                <div class="space-y-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-semibold text-slate-900">Quiz Completed</p>
                                            <p class="text-xs text-slate-600">85% Score</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-accent-100 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-semibold text-slate-900">Challenge Solved</p>
                                            <p class="text-xs text-slate-600">All tests passed</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 0a2 2 0 100-4 2 2 0 000 4zM4 20h16"></path></svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-semibold text-slate-900">Leaderboard</p>
                                            <p class="text-xs text-slate-600">Ranked #5</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-slate-900 mb-4">Powerful Features for Learning</h2>
                    <p class="text-xl text-slate-600">Everything you need to master programming and computer science</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-xl p-8 border border-primary-200 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-primary-500 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Interactive Quizzes</h3>
                        <p class="text-slate-700">Test your knowledge with carefully crafted quizzes that reinforce learning concepts with immediate feedback.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gradient-to-br from-accent-50 to-accent-100 rounded-xl p-8 border border-accent-200 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-accent-500 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Coding Challenges</h3>
                        <p class="text-slate-700">Solve real-world programming problems with automated testing and detailed solutions to improve your skills.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-8 border border-blue-200 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 0a2 2 0 100-4 2 2 0 000 4zM4 20h16"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Analytics & Progress</h3>
                        <p class="text-slate-700">Track your learning progress with detailed analytics and identify areas for improvement.</p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-8 border border-purple-200 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Real-Time Feedback</h3>
                        <p class="text-slate-700">Get instant feedback on your answers and solutions to accelerate your learning journey.</p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl p-8 border border-pink-200 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-pink-500 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Leaderboard</h3>
                        <p class="text-slate-700">Compete with peers and climb the leaderboard to showcase your programming expertise.</p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 rounded-xl p-8 border border-cyan-200 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5-4a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Teacher Tools</h3>
                        <p class="text-slate-700">Faculty can create, manage, and analyze quizzes and challenges to guide student learning.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-primary-600 to-primary-800">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="text-5xl font-bold text-white mb-2">10K+</div>
                        <p class="text-primary-100 text-lg">Active Students</p>
                    </div>
                    <div>
                        <div class="text-5xl font-bold text-white mb-2">500+</div>
                        <p class="text-primary-100 text-lg">Coding Challenges</p>
                    </div>
                    <div>
                        <div class="text-5xl font-bold text-white mb-2">95%</div>
                        <p class="text-primary-100 text-lg">Success Rate</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-slate-900 mb-6">Ready to Level Up Your Programming Skills?</h2>
                <p class="text-xl text-slate-600 mb-8">Join thousands of students learning and mastering computer science with CodeQuest</p>
                @guest
                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-lg font-semibold hover:shadow-lg transition">
                            Start Learning Now
                        </a>
                        <a href="{{ route('login') }}" class="px-8 py-3 border-2 border-primary-600 text-primary-600 rounded-lg font-semibold hover:bg-primary-50 transition">
                            Sign In
                        </a>
                    </div>
                @endguest
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-slate-900 text-white py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span class="font-bold text-lg">CodeQuest</span>
                        </div>
                        <p class="text-slate-400">Transforming computer science education through interactive learning.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Platform</h4>
                        <ul class="space-y-2 text-slate-400">
                            <li><a href="#" class="hover:text-white transition">Features</a></li>
                            <li><a href="#" class="hover:text-white transition">Pricing</a></li>
                            <li><a href="#" class="hover:text-white transition">Security</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Company</h4>
                        <ul class="space-y-2 text-slate-400">
                            <li><a href="#" class="hover:text-white transition">About</a></li>
                            <li><a href="#" class="hover:text-white transition">Blog</a></li>
                            <li><a href="#" class="hover:text-white transition">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Legal</h4>
                        <ul class="space-y-2 text-slate-400">
                            <li><a href="#" class="hover:text-white transition">Privacy</a></li>
                            <li><a href="#" class="hover:text-white transition">Terms</a></li>
                            <li><a href="#" class="hover:text-white transition">Cookies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-slate-800 pt-8">
                    <p class="text-center text-slate-400">© {{ date('Y') }} CodeQuest. All rights reserved. ISUFST Dingle Campus · IT Department</p>
                </div>
            </div>
        </footer>
    </body>
</html>