<?php
session_start();
include 'model/contact.php';

Contact::initialize();

$id = $_POST['id'];

$result = Contact::selectById($id);
$contact = $result->fetch_assoc();

if (!$contact) {
    echo "Contact not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Contact</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    * { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="h-screen bg-slate-200 flex flex-row">
  <aside class="shadow-lg w-44 bg-white h-screen flex flex-col items-center">
    <p class="font-bold text-center my-10 text-white p-8 -mt-1 bg-blue-600">Contact Management</p>
    <img class="h-14 w-14 rounded-full border-blue-600 border" src="https://images.unsplash.com/photo-1502323777036-f29e3972d82f?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
    <div class="fitur1 flex flex-col my-10 text-blue-600 font-semibold">
      <a href="dashboard.php" class="hover:text-blue-800 w-44 p-3 text-center hover:bg-slate-200">Home</a>
      <a href="contact.php" class="hover:text-blue-800 border-y w-44 p-3 text-center hover:bg-slate-200">Contact</a>
      <a href="faq.php" class="hover:text-blue-800 border-b w-44 p-3 text-center hover:bg-slate-200">FAQ</a>
      <a href="about.php" class="hover:text-blue-800 w-44 p-3 text-center hover:bg-slate-200">About</a>
    </div>
    <div class="fitur2 flex flex-col mt-14 text-blue-600 font-semibold">
      <a href="profile.php" class="hover:text-blue-800 border-b w-44 p-3 text-center hover:bg-slate-200">Profile</a>
      <a href="logout.php" class="hover:text-red-800 text-red-600 w-44 p-3 text-center hover:bg-slate-200">Logout</a>
    </div>
  </aside>

  <main class="flex flex-col w-full">
    <p class="text-3xl font-bold text-blue-600 p-4 my-6 mx-10">Edit Contact</p>

    <div class="flex justify-center mt-10">
      <form action="editact.php" method="post" class="w-[500px] bg-white p-8 rounded-lg shadow-lg">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">

        <div class="mb-4">
          <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
          <input
            type="text"
            name="phone_number"
            id="phone_number"
            class="mt-1 p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            placeholder="Enter phone number"
            value="<?= $contact['phone_number'] ?>"
            required
          >
        </div>

        <div class="mb-4">
          <label for="owner" class="block text-sm font-medium text-gray-700">Owner</label>
          <input
            type="text"
            name="owner"
            id="owner"
            class="mt-1 p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
            placeholder="Enter owner's name"
            value="<?= $contact['owner'] ?>"
            required
          >
        </div>

        <div class="flex justify-end mt-6">
          <button
            type="submit"
            class="bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-800"
          >
            Update Contact
          </button>
        </div>
      </form>
    </div>

    <div class="flex justify-center mt-6">
      <a href="index.php" class="bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-800">
        Back to Dashboard
      </a>
    </div>
  </main>
</body>
</html>
