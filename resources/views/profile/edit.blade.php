@include('layouts.header')

<div class="container-fluid d-flex flex-column min-vh-100">
    <div class="row flex-grow-1">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 p-0 bg-white">
            @include('layouts.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4 d-flex flex-column">
            @include('layouts.navbar')
            <div class="container mt-5 flex-grow-1 d-flex justify-content-center align-items-center">
                <div class="text-center w-100">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Profile') }}
                    </h2>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl mx-auto">
                                    @include('profile.partials.update-profile-information-form')
                                    
                                        <div class="mt-4">
                                            <form action="/email/verify">
                                        
                                                <x-primary-button>
                                                    {{ __('Verify Email') }}
                                                </x-primary-button>
                                            </form>
                                        </div>
                                </div>
                            </div>
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl mx-auto">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>

                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl mx-auto">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="mt-auto">
    @include('layouts.footer')
</footer>
