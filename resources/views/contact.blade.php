<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <h1>Contact</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div>
            <label for="first_name">Voornaam</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}">
            @error('first_name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="last_name">Achternaam</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}">
            @error('last_name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="message">Bericht</label>
            <textarea id="message" name="message">{{ old('message') }}</textarea>
            @error('message')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Verzenden</button>
        </div>
    </form>
</body>
</html>
