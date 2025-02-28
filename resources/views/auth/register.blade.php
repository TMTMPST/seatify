@extends('layouts.auth')
@section('auth')
<div class="h-screen w-screen flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 h-full w-full bg-white">
        <div class="flex items-center justify-center bg-white text-gray-900 p-8">
            <div class="max-w-md w-full">
                <h2 class="text-3xl font-bold mb-6">Hallo Fellas 😎</h2>
                <div class="flex gap-4 mb-6">
                    <button class="flex items-center justify-center w-full py-3 px-4 font-medium hover:bg-gray-200 cursor-pointer bg-gray-100 text-gray-700 rounded-xl">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="h-5 w-5 mr-2"> Masuk Dengan Google
                    </button>
                </div>
                <hr class="h-px my-8 bg-gray-200 border-0">                              
                <form class="space-y-4" method="POST" action="/register">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" id="email" name="email" class="w-full mt-1 p-2 bg-gray-50 border border-gray-200 rounded-lg" placeholder="Enter your email" required />
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="w-full mt-1 p-2 bg-gray-50 border border-gray-200 rounded-lg" placeholder="******" required />
                    </div>
                
                    <div class="flex items-center justify-between">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 rounded-sm" />
                            <span class="ml-2 text-sm">Ingat aku</span>
                        </label>
                        <a href="#" class="text-blue-700 font-medium text-sm">Lupa Kata Sandi?</a>
                    </div>
                
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-xl font-medium cursor-pointer">Daftar</button>
                </form>                
                <p class="mt-4 text-center text-sm font-medium">Sudah Punya Akun? <a href="/login" class="text-blue-700 font-medium">Masuk</a></p>
            </div>
        </div>
        <div class="bg-blue-900 text-white flex flex-col justify-center p-8">
            <h1 class="text-4xl font-bold underline decoration-wavy">Nikmati Konser Impian Anda!</h1>
            <p class="mt-4 text-lg font-medium">Masuk untuk mengakses tiket eksklusif, update artis favorit, dan pengalaman konser terbaik. Jangan lewatkan momen tak terlupakan!</p>
            <div class="flex items-center mt-6 gap-2">
                <div class="flex -space-x-4 rtl:space-x-reverse">
                    <img class="w-10 h-10 border-2 border-white rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                    <img class="w-10 h-10 border-2 border-white rounded-full" src="https://randomuser.me/api/portraits/men/44.jpg" alt="">
                    <img class="w-10 h-10 border-2 border-white rounded-full" src="https://randomuser.me/api/portraits/men/54.jpg" alt="">
                    <img class="w-10 h-10 border-2 border-white rounded-full" src="https://randomuser.me/api/portraits/men/22.jpg" alt="">
                </div>
                <p class="ml-4 font-medium">Lebih Dari <strong>15.7k</strong> Pengguna Senang</p>
            </div>
        </div>
    </div>
@endsection