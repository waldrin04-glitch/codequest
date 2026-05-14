<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-bold text-3xl text-slate-900 leading-tight mb-2">
                {{ __('Dashboard') }}
            </h2>
            <p class="text-slate-600 text-sm">Welcome back! Here's your learning progress.</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Quick Stats -->
                <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-xl shadow-sm border border-primary-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-600 text-sm font-medium mb-1">Active Quizzes</p>
                            <p class="text-3xl font-bold text-primary-700">12</p>
                        </div>
                        <div class="w-12 h-12 bg-primary-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-accent-50 to-accent-100 rounded-xl shadow-sm border border-accent-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-600 text-sm font-medium mb-1">Coding Challenges</p>
                            <p class="text-3xl font-bold text-accent-700">8</p>
                        </div>
                        <div class="w-12 h-12 bg-accent-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-sm border border-blue-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-600 text-sm font-medium mb-1">Your Score</p>
                            <p class="text-3xl font-bold text-blue-700">85%</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-6 py-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-2 h-8 bg-gradient-to-r from-primary-600 to-accent-600 rounded-full"></div>
                        <h3 class="text-xl font-bold text-slate-900">Getting Started</h3>
                    </div>
                    <p class="text-slate-600 mb-6">
                        Welcome to CodeQuest! This is your interactive learning platform for mastering programming challenges and quizzes. 
                        Start by exploring the quizzes and challenges available to you below.
                    </p>
                    <div class="flex gap-4">
                        <x-primary-button>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Start Challenge
                        </x-primary-button>
                        <x-secondary-button>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Take a Quiz
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
