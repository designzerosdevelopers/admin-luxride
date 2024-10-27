@extends('layouts.admin.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">

        @if (session('status'))
            <div id="success-alert" class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- Profile Picture Upload Card -->
        <form method="post" action="{{ route('upload.profile.picture') }}" enctype="multipart/form-data" class="mb-2" onsubmit="saveScrollPosition()">
            @csrf
            @method('patch')

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Profile Picture</h4>

                    <input type="hidden" name="profile-picture" value="true">

                    <!-- Profile Picture input -->
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                        @error('profile_picture')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                      <!-- Image Preview -->
                      <div class="form-group">
                        <img id="image_preview" src="#" alt="Image Preview" style="display: none; width: 100px; height: 100px; border-radius: 50%; margin-top: 10px; object-fit: cover;">
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-success">Upload Picture</button>
                </div>
            </div>
        </form>

        <!-- Name and Email Update Section -->
        <form method="post" action="{{ route('profile.update') }}" class="mb-2" onsubmit="saveScrollPosition()">
            @csrf
            @method('patch')

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Profile</h4>

                    <!-- Name input -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', auth()->user()->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', auth()->user()->email) }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </form>

        <!-- Update Password Section -->
        <form method="post" action="{{ route('password.update') }}" onsubmit="saveScrollPosition()">
            @csrf
            @method('put')

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Password</h4>
                    <div class="form-group">
                        <label for="current_password">Old Password</label>
                        <input type="password"
                            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                            id="current_password" name="current_password" required>
                        @error('current_password', 'updatePassword')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password"
                            class="form-control 
                            @error('password', 'updatePassword') is-invalid @enderror 
                            @if ($errors->getBag('updatePassword')->has('password_confirmation')) is-invalid @endif"
                            id="password" name="password" required>
                        @error('password', 'updatePassword')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password"
                            class="form-control 
                            @error('password_confirmation', 'updatePassword') is-invalid @enderror 
                            @if ($errors->getBag('updatePassword')->has('password_confirmation')) is-invalid @endif"
                            id="password_confirmation" name="password_confirmation" required>
                        @error('password_confirmation', 'updatePassword')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Save Password</button>
                </div>
            </div>
        </form>

        <br>
    </div>

    <script>
        // Function to save scroll position
        function saveScrollPosition() {
            sessionStorage.setItem('scrollPosition', window.scrollY);
        }

        // Function to restore scroll position with smooth scrolling
        function restoreScrollPosition() {
            const scrollPosition = sessionStorage.getItem('scrollPosition');
            const status = "{{ session('status') }}"; // Get the status from Blade

            if (status !== "password-updated" && scrollPosition) { // Check if status is not 'password-updated'
                window.scrollTo({
                    top: parseInt(scrollPosition),
                    behavior: 'smooth' // Enables smooth scrolling
                });
            }

            sessionStorage.removeItem('scrollPosition'); // Clear the position after restoring
        }

        // Function to preview the selected image
        function previewImage(event) {
            const imagePreview = document.getElementById('image_preview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the image
            }

            if (file) {
                reader.readAsDataURL(file); // Convert the file to base64 URL
            } else {
                imagePreview.style.display = 'none'; // Hide the image if no file is selected
            }
        }

        // Restore scroll position on page load
        window.onload = restoreScrollPosition;
    </script>
@stop
