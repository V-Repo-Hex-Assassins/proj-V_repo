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

  $file1=$_FILES['myfile1']['name'];
  $dest1='report/'.$file1;
  $filee1=$_FILES['myfile1']['tmp_name'];
  $ext1=pathinfo($file1,PATHINFO_EXTENSION);
  move_uploaded_file($filee1,$dest1);

  $file2=$_FILES['myfile2']['name'];
  $dest2='ppt/'.$file2;
  $filee2=$_FILES['myfile2']['tmp_name'];
  $ext2=pathinfo($file2,PATHINFO_EXTENSION);
  move_uploaded_file($filee2,$dest2);


if($_FILES['myfile3']['size']>5000){
  $file3=$_FILES['myfile3']['name'];
  $dest3='papers/'.$file3;
  $filee3=$_FILES['myfile3']['tmp_name'];
  $ext3=pathinfo($file3,PATHINFO_EXTENSION);
  move_uploaded_file($filee3,$dest3);
}
else{
  $file3=NULL;
}

  $file4=$_FILES['myfile4']['name'];
  $dest4='synopsis/'.$file4;
  $filee4=$_FILES['myfile4']['tmp_name'];
  $ext4=pathinfo($file4,PATHINFO_EXTENSION);
  move_uploaded_file($filee4,$dest4);

  if(in_array($ext1,['pdf']) &&in_array($ext2,['pdf']) && in_array($ext4,['pdf']) && ($file3==NULL || in_array($ext3,['pdf'])) && $_POST['field4']!="" && $_POST['fielddoamin']!="" && $_POST['fieldguide']!=""){


  $stmt = $pdo->prepare('INSERT INTO project
	  (project_title,year_upload,domain_id,mentor_id,user_id,department_id,mem_1_lead,mem_2,mem_3,mem_4,mem_5,mem_6,ssummary,synopsis_path,ppt_path,report_path,publication_path,vid_link)
     VALUES (:title, :year, :domain, :guide, :user_id, :branch, :name1, :name2, :name3, :name4, :name5, :name6, :summary, :m4, :m2, :m1, :m3, :vid)');

	$stmt->execute(array(
	  ':title' => $_POST['fiel1'],
	  ':year' => $_POST['year'],
    ':branch'=>(int)$_POST['field4'],
    ':name1'=>$_POST['field1'],
    ':name2'=>$_POST['fielda'],
    ':name3'=>$_POST['fieldb'],
    ':name4'=>$_POST['fieldc'],
    ':name5'=>$_POST['fieldd'],
    ':name6'=>$_POST['fielde'],
    ':domain'=>(int)$_POST['fielddoamin'],
    ':guide'=>(int)$_POST['fieldguide'],
    ':summary'=>$_POST['summary'],
    ':vid'=>$_POST['vid'],
    ':m1'=>$file1,
    ':m2'=>$file2,
    ':m3'=>$file3,
    ':m4'=>$file4,
    ':user_id'=>$rowb[0]['user_id']
  )
	);
  $_SESSION['successproj']="Project Uploaded";
	header('Location: teacherdashboard.php');
	return;
}
else{
  $_SESSION['successproj']="Project not uploaded";
  header('Location: teacherdashboard.php');
  return;
}
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
      <a href="#" class="flex min-w-max-content items-center font-bold text-lg p-2 mb-12">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
          class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg></i>Dashboard
      </a>
      <nav class="text-gray-600 text-lg font-semibold min-w-max-content space-y-2">
        <a href="#profile"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full text-indigo-700 bg-indigo-100 bg-opacity-25">
          <svg viewBox="0 0 20 20" fill="currentColor" class="h-7 w-7 mr-2.5 flex-shrink-0">
            <path
              d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
          </svg>
          Profile
        </a>
        <a href="#project"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full hover:bg-gray-100 hover:bg-opacity-50">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
          </svg>
          My Project
        </a>
       <!-- <a href="#contacts"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full hover:bg-gray-100 hover:bg-opacity-50">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          Contacts
        </a>-->

        <a href="#submit"
          class="flex items-center flex-shrink-0 px-5 py-3 rounded-full hover:bg-gray-100 hover:bg-opacity-50">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 mx-0.5 mr-3 text-gray-400 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
          </svg>
          Submit Project
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
          <?php echo htmlentities($_SESSION['username']);?>
            <i class="fas fa-user-graduate"></i>
          </button>
          <div class="h-10 w-10 hidden sm:block border border-gray-400 bg-gray-300 overflow-hidden rounded-full">
            <img src="images.png" alt="user avatar" class="object-cover">
          </div>
        </div>
      </header>
      <main class="flex flex-col space-y-10 px-6 py-5 max-w-6xl mx-auto">
        <h5 align="center" style="color:red; background:white;">
					<?php
						if(isset($_SESSION['successproj'])){
							echo $_SESSION['successproj'];
							unset($_SESSION['successproj']);
						}
						?>
					</h5>
        <h1 class="text-3xl">
          <span class="text-gray-500">Welcome back,</span>
          <span class="font-semibold"><?php echo htmlentities($_SESSION['username']);?></span>
        </h1>
        <section class="p-6 sm:p-8 flex items-center bg-indigo-700 shadow-md rounded-lg" id="profile">
          <div class="mr-6">
            <header class="text-xl text-indigo-50 mb-3"><b>Your Information</b></header>
            <span class="text-indigo-50 ">NAME:</span><span class="text-indigo-50 "><?php if(isset($rowb[0]['name'])){echo  $rowb[0]['name'];}?></span>
            <br>

            <span class="text-indigo-50 ">Department:</span><span class="text-indigo-50 "><?php if(isset($rowb[0]['department_id'])){
              if($rowb[0]['department_id']==1)echo "CMPN";
              else if($rowb[0]['department_id']==2){echo "INFT";}
              else if($rowb[0]['department_id']==3){echo "ETRX" ;}
            else if($rowb[0]['department_id']==4)echo "EXTC";
          else if($rowb[0]['department_id']==5)echo "BIOMED";
        } ?> </span>
            <br>


          </div>
          <!-- <div class="hidden sm:block mr-0 ml-auto md:mr-8">
          <div class="h-32 w-32 flex items-center justify-center text-3xl text-white font-semibold border-4 border-white rounded-full">
            100%
          </div>
        </div>-->
        </section>
        <section>
          <div class="flex justify-between items-center mb-6" id="project">
            <header class="text-xl font-semibold">My Project</header>
            <a href="#" class="flex sm:hidden flex-shrink-0 items-center text-lg font-medium text-gray-500">
              More
              <svg viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 ml-1 mt-1">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        <div class="h-64 bg-white border rounded-lg shadow-md py-4 px-6">




            <div class="text-lg font-semibold">

<table border=1>
  <tr><th>Proj Id &nbsp &nbsp</th><th>Project Title</th></tr>
    <?php
    if(isset($_SESSION['username'])){
      $stmtf = $pdo->prepare('SELECT project_id,project_title FROM project WHERE user_id=:urnm');
      $stmtf->execute(array(
    	  ':urnm' =>$rowb[0]['user_id'])
    	);
      $rowf = $stmtf->fetchAll(PDO::FETCH_ASSOC);
      foreach ( $rowf as $rowsf ) {
          echo "<tr><td>";
          echo(htmlentities($rowsf['project_id']));
          echo "</td><td>";
          echo(htmlentities($rowsf['project_title']));
          echo('</td></tr>');
      }
    }
?>
</table>
            </div>






          </div>
        </section>


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
       <header class="text-xl font-semibold"> Upload Form</header>
        <div class="form-style-5" id="submit">

          <form method="post" enctype="multipart/form-data">
            <fieldset>
<legend><span class="number">1</span> project Details</legend>

<input type="text" name="fiel1" placeholder="Project  Name" required>
<input type="number" name="year" placeholder="Year upload" required>
              <legend><span class="number">2</span> Member Details</legend>

              <div class="dropdown">
                <span>&nbsp;&nbsp;&nbsp;Branch</span>
                <select id="branch" name="field4" onchange="ChangeDomainList()">
                  <!-- <optgroup> -->
                    <option value=""><b>select branches</b></option>
                    <option value=1>CMPN</option>
                    <option value=2>IT</option>
                    <option value=3>EXTC</option>
                    <option value=4>ETRX</option>
                    <option value=5>BIOM</option>
                  <!-- </optgroup> -->
                </select>

              </div>
              <input type="text" name="field1" placeholder="Leader Name" required>

              <span>&nbsp;&nbsp;&nbsp;Members Name :</span>

              <input type="text" name="fielda" placeholder="member 1" required>
              <input type="text" name="fieldb" placeholder="Member 2" required>
              <input type="text" name="fieldc" placeholder="member 3" required>
              <input type="text" name="fieldd" placeholder="member 4" required>
              <input type="text" name="fielde" placeholder="member 5" required>


              <legend><span class="number">3</span> Domain</legend>

              <select id="domain" name="fielddoamin" >
                <option value=""><b>select domain</b></option>
                <?php $i=1;
                     $stmte = $pdo->query('SELECT domain.domain_name,domain.domain_id,domain_department.department_id
  FROM domain JOIN domain_department
  ON domain.domain_id = domain_department.domain_id
    AND domain_department.department_id ='.$rowb[0]['department_id']);
                     $rowe = $stmte->fetchAll(PDO::FETCH_ASSOC);
                     foreach ($rowe as $rowse) {
                       $rce=$rowse['domain_name'];
                       echo
                       '<option value='.$rowse['domain_id'].'>'.$rce.'</option>';
                       $i++;
                     }
                ?>
                <!-- <optgroup label="DOMAIN">
                  <option value="webdev">Web Development</option>
                  <option value="AI and ML">Artificial Intelligence and Machine Learning</option>
                  <option value="Security">Security</option>
                  <option value="abc">abc</option>
                  <option value="gaming">Gaming</option>
                  <option value="abc">abc</option>
                  <option value="xyz">xyz</option>
                </optgroup> -->
              </select>
              <style>
                .upload-btn-wrapper {
                  position: relative;
                  overflow: hidden;
                  display: inline-block;
                  padding-bottom: 30px;
                }

                .btn {
                  border: 2px solid #5145cd;
                  color: gray;
                  width: 500px;
                  background-color: white;
                  padding: 15px 15px;
                  border-radius: 8px;
                  font-size: 10px;
                  font-weight: bold;
                }

                .upload-btn-wrapper input[type=file] {
                  font-size: 100px;
                  position: absolute;
                  left: 0;
                  top: 0;
                  opacity: 0;
                }
              </style>



            </fieldset>
            <fieldset>
              <legend><span class="number">4</span> Guide</legend>
              <select id="guide" name="fieldguide">
                <optgroup label="Teachers">
                  <option value=""><b>select mentor</b></option>
                  <?php $i=1;
                       $stmtc = $pdo->query('SELECT * FROM mentor WHERE department_id='.$rowb[0]['department_id']);
                       $rowc = $stmtc->fetchAll(PDO::FETCH_ASSOC);
                       foreach ($rowc as $rowsc) {
                         $rcb=$rowsc['mentor_name'];
                         echo
                         '<option value='.$rowsc['mentor_id'].'>'.$rcb.'</option>';
                         $i++;
                       }
                  ?>
                </optgroup>
              </select>

              <legend><span class="number">5</span> Summary</legend>

                                <textarea id="subject" name="summary" placeholder="Synopsis" style="height:170px" required></textarea>


              <legend><span class="number">6</span> Attachments</legend>
             <input type="text" name="vid" placeholder="video Link" required>
              <div class="upload-btn-wrapper">
                <span>Attach Report</span>&nbsp;&nbsp;<button class="btn">Upload a file</button>
                <input type="file" name="myfile1" multiple required/>
              </div>
              <div class="upload-btn-wrapper">
                <span>Upload Presentation in PDF</span>&nbsp;&nbsp;<button class="btn">Upload a file</button>
                <input type="file" name="myfile2" multiple required/>
              </div>
              <div class="upload-btn-wrapper">
                <span>Published Papers if any</span>&nbsp;&nbsp;<button class="btn">Upload a file</button>
                <input type="file" name="myfile3" multiple />
              </div>
                <div class="upload-btn-wrapper">
                <span>Synopsis</span>&nbsp;&nbsp;<button class="btn">Upload a file</button>
                <input type="file" name="myfile4" multiple required/>
              </div>

            </fieldset>
            <input type="submit" name="submit" value="Submit"/>

          </form>
        </div>
        </section>

      </main>
    </div>
  </div>
  <script>
    $(document).ready(function () {
          // Add smooth scrolling to all links
          $("a").on('click', function (event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 800, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
    });

    var branchAndDomain = {};
    branchAndDomain[1] = ['Algorithms', 'Database', 'Image Processing', 'Web Development', 'App Development', 'Machine Learning'];
    branchAndDomain[2] = ['Algorithms', 'Database', 'Image Processing', 'Web Development', 'App Development', 'Machine Learning'];
    branchAndDomain[3] = ['Integrated Circuits', 'Signal Processing', 'Communications', 'Microelectronics'];
    branchAndDomain[4] = ['Integrated Circuits', 'Signal Processing', 'Communications', 'Microelectronics'];
    branchAndDomain[5] = ['Medical Devices', 'Biometrics', 'Biosignal Processing', 'Biomechanics'];

    function ChangeDomainList() {
      var branchList = document.getElementById("branch");
      var domainList = document.getElementById("domain");
      var selectDomain = branchList.options[branchList.selectedIndex].value;
      while (domainList.options.length) {
        domainList.remove(0);
      }
      var domains = branchAndDomain[selectDomain];
      if (domains) {
        var i;
        for (i = 0; i < domains.length; i++) {
          var domain = new Option(domains[i], i);
          domainList.options.add(domain);
        }
      }
      var yourDomain = document.getElementById("domain").options;
          if (yourDomain.text == 'Algorithms')
            yourDomain.setAttribute("value", 1);
          if (yourDomain.text == 'Database')
            yourDomain.setAttribute("value", 2);
          if (yourDomain.text == 'Image Processing')
            yourDomain.setAttribute("value", 3);
          if (yourDomain.text == 'Web Development')
            yourDomain.setAttribute("value", 4);
          if (yourDomain.text == 'App Development')
            yourDomain.setAttribute("value", 5);
          if (yourDomain.text == 'Machine Learning')
            yourDomain.setAttribute("value", 6);

          if (yourDomain.text == 'Integrated Circuits')
            yourDomain.setAttribute("value", 7);
          if (yourDomain.text == 'Signal Processing')
            yourDomain.setAttribute("value", 8);
          if (yourDomain.text == 'Communications')
            yourDomain.setAttribute("value", 9);
          if (yourDomain.text == 'Microelectronics')
            yourDomain.setAttribute("value", 10);

          if (yourDomain.text == 'Medical Devices')
            yourDomain.setAttribute("value", 11);
          if (yourDomain.text == 'Biometrics')
            yourDomain.setAttribute("value", 12);
          if (yourDomain.text == 'Biosignal Processing')
            yourDomain.setAttribute("value", 13);
          if (yourDomain.text == 'Biomechanics')
            yourDomain.setAttribute("value", 14);
    }


    var domainAndGuide = {};
    domainAndGuide['Algorithms'] = ['Prof. Dilip Motwani', 'Prof. Sanjeev Dwivedi', 'Prof. Rugved Deolekar', 'Prof. Swapnil Sonawane'];
    domainAndGuide['Database'] = ['Prof. Sachin Deshpande', 'Prof. Vipul Dalal', 'Prof. Pankaj Vanwari', 'Prof. Kavita Shirsat'];
    domainAndGuide['Image Processing'] = ['Dr. Murugan Gopal', 'Prof. Vipul Dalal', 'Prof. Mandar Sohani', 'Prof. Ravindra Sangale'];
    domainAndGuide['Web Development'] = ['Prof. Kavita Shirsat', 'Prof. Devendra Pandit', 'Prof. Ravindra Sangale', 'Prof. Sneha Annappanavar'];
    domainAndGuide['App Development'] = ['Prof. Devendra Pandit', 'Prof. Ravindra Sangale', 'Prof. Sneha Annappanavar', 'Prof. Swapnil Sonawane'];
    domainAndGuide['Machine Learning'] = ['Dr. S.A. Patekar', 'Prof. Sachin Deshpande', 'Prof. Mandar Sohani', 'Prof. Kavita Shirsat'];

    domainAndGuide['Integrated Circuits'] = ['A', 'B', 'C'];
    domainAndGuide['Signal Processing'] = ['D', 'E', 'F'];
    domainAndGuide['Communications'] = ['G', 'H', 'I'];
    domainAndGuide['Microelectronics'] = ['J', 'K', 'L'];

    domainAndGuide['Medical Devices'] = ['a', 'b', 'c'];
    domainAndGuide['Biometrics'] = ['d', 'e', 'f'];
    domainAndGuide['Biosignal Processing'] = ['g', 'h', 'i'];
    domainAndGuide['Biomechanics'] = ['j', 'k', 'l'];

    function ChangeGuideList() {
      var bdomainList = document.getElementById("domain");
      var guideList = document.getElementById("guide");
      var selectGuide = bdomainList.options[bdomainList.selectedIndex].value;

      while(guideList.options.length) {
        guideList.remove(0);
      }
      var guides = domainAndGuide[selectGuide];
      if(guides) {
        var i;
        for (i=0; i<guides.length; i++) {
          var guide = new Option(guides[i]);
          guideList.options.add(guide);
        }
      }
    }
  </script>
</body>

</html>
