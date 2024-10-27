<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {


        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }



 
    public function profile_picture(Request $request)
    {
        // Validate the request
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Get the uploaded file
        $profile = $request->file('profile_picture');
    
        // Check if the file was uploaded successfully
        if ($profile) {
            // Get the authenticated user
            $user = Auth::user(); 
    
            // Check if there's an existing profile picture
            if ($user->profile_picture) {
                // Define the path to the existing image
                $existingImagePath = public_path('assets/img/profile/' . $user->profile_picture);
    
                // Check if the existing image file exists and delete it
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath); // Delete the existing image file
                }
            }
    
            // Get the original file name
            $originalFileName = $profile->getClientOriginalName();
            
            // Create a unique name for the new file
            $fileNameToStore = time() . '_' . $originalFileName;
    
            // Move the new file to the public/assets/img/profile directory
            $profile->move(public_path('assets/img/profile'), $fileNameToStore);
    
            // Save the new file name in the database
            $user->profile_picture = $fileNameToStore;
            $user->save();
    
            // Flash a success message to the session
            return redirect()->back()->with('status', 'Profile Picture Uploaded');
        }
    
        // Flash an error message to the session if no file was uploaded
        return redirect()->back()->with('error', 'No file uploaded.');
    }
    
    
}
