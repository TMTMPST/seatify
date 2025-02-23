@extends('layouts.app')
@section('content')
<div class="h-screen w-screen flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 h-full w-full bg-white">
        <!-- Bagian Formulir Login -->
        <div class="flex items-center justify-center bg-white text-gray-900 p-8">
            <div class="max-w-md w-full">
                <h2 class="text-3xl font-bold mb-6">Welcome back</h2>

                <div class="flex gap-4 mb-6">
                    <button class="flex items-center justify-center w-full py-3 px-4 font-medium hover:bg-gray-200 cursor-pointer bg-gray-100 text-gray-700 rounded-xl">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="h-5 w-5 mr-2"> Sign in with Google
                    </button>
                </div>
                <div class="flex items-center my-4">
                    <hr class="flex-grow border-gray-300">
                    <span class="px-4 text-gray-400">or</span>
                    <hr class="flex-grow border-gray-300">
                </div>
                <form class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm">Email</label>
                        <input type="email" id="email" class="w-full mt-1 p-2 bg-gray-50 border border-gray-200 rounded-lg" placeholder="Enter your email" />
                    </div>

                    <div>
                        <input type="password" id="password" class="w-full mt-1 p-2 bg-gray-50 border border-gray-200 rounded-lg" placeholder="******" />
                    </div>

                    <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 rounded-sm" />
                        <span class="ml-2 text-sm">Remember me</span>
                    </label>
                    <a href="#" class="text-blue-700 font-medium text-sm">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">Sign in to your account</button>
                </form>

                <p class="mt-4 text-center text-sm">Don't have an account? <a href="#" class="text-blue-400">Sign up</a></p>
            </div>
        </div>
    </div>
@endsection