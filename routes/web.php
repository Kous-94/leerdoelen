<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/dashboard', function () {
        $contacts = Contact::all(); // Fetch all contact data
        return view('dashboard', compact('contacts')); // Pass the data to the view
    })->name('dashboard');

    Route::get('/contact/{id}/edit', function ($id) {
        $contact = Contact::findOrFail($id);
        return view('edit-contact', compact('contact'));
    })->name('contact.edit');

    Route::put('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
