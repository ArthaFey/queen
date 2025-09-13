<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="{{ asset('icon.png') }}">

</head>
<body class="h-screen flex items-center justify-center bg-gray-100">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <div class="flex justify-center">
        <img src="{{ asset('icon.png') }}" class="h-20" alt="">
    </div>
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

    <form action="{{ route('login.proses') }}" method="POST" class="space-y-5">
        @csrf
      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-600">Username</label>
        <input type="text" id="email" name="name" required
          class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
        <input type="password" id="password" name="password" required
          class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" />
      </div>

      <!-- Submit button -->
      <button type="submit"
        class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
        Login
      </button>
    </form>
  </div>

</body>
</html>
