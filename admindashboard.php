<?php
session_start();

require_once "pdo.php";

// Demand a GET parameter
if ( ! isset($_SESSION['username']) || strlen($_SESSION['username']) < 1  ) {
    die('Name parameter missing');
}


if(isset($_SESSION['username'])){
  $stmtb = $pdo->prepare('SELECT * FROM vdummy WHERE name=:urnm');
  $stmtb->execute(array(
    ':urnm' => $_SESSION['username'])
  );
  $rowb = $stmtb->fetchAll(PDO::FETCH_ASSOC);
}



if(isset($_POST['submit'])){
  $stmt = $pdo->prepare('INSERT INTO mentor (mentor_name, department_id) VALUES (:mentor_name, :department_id)');

  $stmt->execute(array(
    ':mentor_name' => $_POST['field1'],
    ':department_id' => (int)$_POST['field4']
  )
  );
  $_SESSION['successproj']="Details added";
  header('Location: admindashboard.php');
  return;
}
?>

<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://www.unpkg.com/tailwindcss@1.8.10/dist/tailwind-experimental.min.css">



</head>

<body>
  <div class="flex text-gray-800 min-h-screen">
    <aside class="hidden md:block bg-white px-6 py-5 h-full w-full sm:relative sm:w-64 lg:w-1/5">
      <a href="admindashboard.php" class="flex min-w-max-content items-center font-bold text-lg p-2 mb-12">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
          class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg></i>Dashboard
      </a>




        <a href="admindashboard.php"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full hover:bg-gray-100 hover:bg-opacity-50">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
          </svg>
          Add New Teacher
        </a>
        <a href="admin_add_domains.php"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full hover:bg-gray-100 hover:bg-opacity-50">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
          </svg>
          Assign/Edit Domains
        </a>
         <a href="admin_project_details.php"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full hover:bg-gray-100 hover:bg-opacity-50">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          Teams Details
        </a>

        <a href="repositorydashboard.php"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full hover:bg-gray-100 hover:bg-opacity-50">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
          </svg>
          Repository
        </a>

        <a href="logout.php"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full hover:bg-gray-100 hover:bg-opacity-50">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
          </svg>
          Logout
        </a>
      </nav>
    </aside>
    <div class="flex-grow bg-gray-100">
      <header class="flex items-center justify-between px-6 py-5 max-w-6xl mx-auto mb-4">
        <button class="block md:hidden p-2 text-gray-700 mr-2">
          <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd" />
          </svg>
        </button>
        <div class="relative w-full max-w-4xl mr-6 sm:mr-8 md:mr-16 lg:mr-24">
          <svg viewBox="0 0 20 20" fill="currentColor" class="absolute h-6 w-6 text-gray-400 mt-2 ml-3">
            <path fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd" />
          </svg>
          <input type="text" placeholder="Search for objects, contacts, documents etc."
            class="pl-10 w-full pr-4 py-2 border border-gray-300 shadow-sm rounded-lg" />
        </div>
        <div class="flex flex-shrink-0">
          <button class="flex items-center p-2 sm:mr-2">
            <b><?php echo htmlentities($_SESSION['username']);?></b>
            <i class="fas fa-user-graduate"></i>
          </button>
          <div class="h-10 w-10 hidden sm:block border border-gray-400 bg-gray-300 overflow-hidden rounded-full">
            <img src="images.png" alt="user avatar" class="object-cover">
          </div>
        </div>
      </header>
      <main class="flex flex-col space-y-10 px-6 py-5 max-w-6xl mx-auto">
        <h1 class="text-3xl">
          <span class="text-gray-500">Welcome back,</span>
          <span class="font-semibold"><?php echo htmlentities($_SESSION['username']);?></span>
        </h1>



        <style type="text/css">
          .form-style-5 {
            max-width: 900px;
            padding: 20px 20px;
            background: #ecebfa;
            margin: 10px auto;
            padding: 30px;
            background: #ecebfa;
            border-radius: 8px;
            font-family: "Segoe UI";
          }

          .form-style-5 fieldset {
            border: none;
          }

          .form-style-5 legend {
            font-size: 1.4em;
            margin-bottom: 10px;
          }

          .form-style-5 label {
            display: block;
            margin-bottom: 8px;
          }

          .form-style-5 input[type="text"],
          .form-style-5 input[type="date"],
          .form-style-5 input[type="datetime"],
          .form-style-5 input[type="email"],
          .form-style-5 input[type="number"],
          .form-style-5 input[type="search"],
          .form-style-5 input[type="time"],
          .form-style-5 input[type="url"],
          .form-style-5 textarea,
          .form-style-5 select {
            font-family: "Segoe UI";
            background: #e0ccff;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            margin: 0;
            outline: 0;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            background-color: #ecebfa;
            color: #8a97a0;
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
          }

          .form-style-5 input[type="text"]:focus,
          .form-style-5 input[type="date"]:focus,
          .form-style-5 input[type="datetime"]:focus,
          .form-style-5 input[type="email"]:focus,
          .form-style-5 input[type="number"]:focus,
          .form-style-5 input[type="search"]:focus,
          .form-style-5 input[type="time"]:focus,
          .form-style-5 input[type="url"]:focus,
          .form-style-5 textarea:focus,
          .form-style-5 select:focus {
            background: #d2d9dd;
          }

          .form-style-5 select {
            -webkit-appearance: menulist-button;
            height: 35px;
          }

          .form-style-5 .number {
            background: #5145cd;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 15px 15px 15px 0px;
          }

          .form-style-5 input[type="submit"],
          .form-style-5 input[type="button"] {
            position: relative;
            display: block;
            padding: 19px 39px 18px 39px;
            color: #FFF;
            margin: 0 auto;
            background: #5145cd;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            width: 100%;
            border: 1px solid #5145cd;
            border-width: 1px 1px 3px;
            margin-bottom: 10px;
          }

          .form-style-5 input[type="submit"]:hover,
          .form-style-5 input[type="button"]:hover {
            background: #d6d6f5;
            color: black;
          }
        </style>
       <header class="text-xl font-semibold" style="Text-align:center; font-size:40px; ">Add New Teacher</header>
        <div class="form-style-5" id="submit">

          <form method="POST">
            <fieldset>
              <legend><span class="number">1</span> Teacher Details</legend>

              <div class="dropdown">
                <span>&nbsp;&nbsp;&nbsp;Branch</span>
                <select id="branch" name="field4">
                   <!-- <optgroup>  -->
                    <option value=""><b>Select Branch</b></option>
                    <option value="1">CMPN</option>
                    <option value="2">IT</option>
                    <option value="3">EXTC</option>
                    <option value="4">ETRX</option>
                    <option value="5">BIOM</option>
                  <!-- </optgroup> -->
                <input type="text" name="field1" placeholder="Teacher Name">
                </select>

              </div>


              <!-- <legend><span class="number">2</span> Domain</legend>

              <select id="domain" name="field4"onchange="ChangeGuideList()">
                <optgroup label="DOMAIN">
                  <option value="webdev">Web Development</option>
                  <option value="AI and ML">Artificial Intelligence and Machine Learning</option>
                  <option value="Security">Security</option>
                  <option value="abc">abc</option>
                  <option value="gaming">Gaming</option>
                  <option value="abc">abc</option>
                  <option value="xyz">xyz</option>
                </optgroup>
              </select>
              -->

            <input type="submit" name="submit" value="Submit"/>

          </form>
        </div>
        </section>

      </main>
    </div>
  </div>
  </body>

</html>
