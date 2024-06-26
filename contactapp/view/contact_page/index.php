<?php
// include '../../model/database.php';

// $db = new Database();
// $conn = $db->getConnection();

// $sql = "SELECT * FROM contact_info";
// $result = $conn->query($sql);

require_once 'model/contact_model.php';
$result = Contact::select();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap'); *{font-family: 'Poppins', sans-serif};</style>
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
      <a href="../../view/user_page/logout.php" class="hover:text-red-800 text-red-600 w-44 p-3 text-center hover:bg-slate-200">Logout</a>
    </div>
  </aside>

  <main class="flex flex-col w-full">
    <p class="text-3xl font-bold text-blue-600 p-4 my-6 mx-10">DASHBOARD CONTACT</p>
    <a href="../../view/contact_page/add.php">
      <button class="w-40 p-2 bg-blue-600 text-sm font-semibold text-white rounded-full ml-14 hover:bg-blue-800">
        + Add Contact
      </button>
    </a>

    <table class="w-[1050px] text-sm text-center ml-16 my-10">
      <thead id="col" class="text-sm bg-blue-600 text-white">                 
          <tr>
              <th scope="col" class="px-16 py-3">ID</th>
              <th scope="col" class="px-16 py-3">Phone Number</th>
              <th scope="col" class="px-16 py-3">Owner</th>
              <th scope="col" class="px-16 py-3">Action</th>
          </tr>
      </thead>
      <tbody>
      <?php
      for($i = 0; $i < count($result['id']); $i++){?>
          <tr class="bg-transparent">
              <td scope="row" class="px-6 py-4 font-medium text-gray-700"><?= $result['id'][$i] ?></td>
              <td class="px-6 py-4"><?= $result['phone_number'][$i] ?></td>
              <td class="px-6 py-4"><?= $result['owner'][$i] ?></td>
              <td class="px-6 py-4">
                  <div class="flex justify-center space-x-4">
                      <form action="" method="post">
                          <input type="hidden" name="id" value="<?= $result['id'][$i] ?>">
                          <button class="p-1.5 w-20 bg-green-600 text-white border rounded-full hover:bg-green-800">View</button>
                      </form>
                      <form action="/edit" method="post">
                          <input type="hidden" name="id" value="<?= $result['id'][$i] ?>">
                          <button class="p-1.5 w-20 bg-yellow-600 text-white border rounded-full hover:bg-yellow-800">Edit</button>
                      </form>
                      <form action="" method="post">
                          <input type="hidden" name="id" value="<?= $result['id'][$i] ?>">
                          <button class="p-1.5 w-20 bg-red-600 text-white border rounded-full hover:bg-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">Delete</button>
                      </form>
                  </div>
              </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
</body>
</html>