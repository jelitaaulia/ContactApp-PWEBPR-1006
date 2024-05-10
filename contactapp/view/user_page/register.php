<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'); *{font-family: 'Poppins', sans-serif};</style>
</head>
<body class="flex flex-col justify-center items-center h-screen bg-slate-200">
  <div class="container h-[460px] w-96 bg-white shadow-xl rounded-xl">
    <p class="font-bold text-center my-6">Register Your Account</p>
    <form class="flex flex-col items-center mx-10 my-4 font-medium" action="" method="post" >
      <input type="hidden" name="action" value="register">
      <label for="firstname">First name</label>
      <input name="firstname" class="my-2 w-full text-sm border rounded-full p-2" id="firstname" type="text" placeholder="John" required>
      <label for="lastname">Last name</label>
      <input name="lastname" class="my-2 w-full text-sm border rounded-full p-2" id="lastname" type="text" placeholder="Doe" required>
      <label for="email">Email</label>
      <input name="email" class="my-2 w-full text-sm border rounded-full p-2" id="email" type="email" placeholder="johndoe@gmail.com" required>
      <label for="password">Password</label>
      <input name="password" class="my-2 w-full text-sm border rounded-full p-2" id="password" type="password" placeholder="********" required>
      <button type="submit" class="p-2 mt-4 bg-blue-500 rounded-full w-60 text-white font-medium hover:bg-blue-600">Register</button>
    </form>
  </div>
</body>
</html>
