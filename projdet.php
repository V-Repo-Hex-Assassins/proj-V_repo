<?php
session_start();

require_once "pdo.php";

// Demand a GET parameter
if ( ! isset($_SESSION['username']) || strlen($_SESSION['username']) < 1  ) {
    die('Name parameter missing');
}

$id=$_GET['id'];

if(isset($_GET['id'])){
  $stmtj = $pdo->prepare('SELECT * FROM project WHERE project_id= :prid');
  $stmtj->execute(array(
	  ':prid' => $id)
	);
  $rowj = $stmtj->fetchAll(PDO::FETCH_ASSOC);
}

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    html {
        font-size: 15px;
    }

    body {

        font-family: 'Noto Sans HK', sans-serif;
        background-image: url('https://ohcampus.com/ohcv2/uploads/college/ohcampus_vit_03.jpg');
        background-size: 100%;
        min-width: 320px;
    }

    .container {
        height: 1070px;
        background: white;
        position: relative;
        border: 8px solid #000066;
        margin-left: 350px;
        margin-right: 350px;
        border-radius: 50px;
    }

    .headings {
        padding-left: 50px;
    }
</style>

<body>
    <main>
        <br>
        <h1 id="title" style="color:white;  background: #000066;
           padding: 3px;text-align: center;
 margin-right:500px; border-style: solid;
  border-width: 5px; margin-left:500px; border-radius: 50px 20px;"><b>PROJECT DETAILS</b></h1>
        <br>
        <div class="container" style="margin-left:300px; margin-bottom:20px; max-width:950px;">
            <br>
            <h3 class="headings">Project Name</h3>
            <span class="details" style="margin-left:70px;"><b><?php echo htmlentities($rowj[0]['project_title']); ?></b></span><br><br>

            <h3 class="headings">Team Members</h3>
            <span class="details" style="margin-left:90px;"><b><?php echo htmlentities($rowj[0]['mem_1_lead']); ?>(Leader)</b></span><br>
            <span class="details" style="margin-left:90px;"><b><?php echo htmlentities($rowj[0]['mem_2']); ?></b></span><br>
            <span class="details" style="margin-left:90px;"><b><?php echo htmlentities($rowj[0]['mem_3']); ?></b></span><br>
            <span class="details" style="margin-left:90px;"><b><?php echo htmlentities($rowj[0]['mem_4']); ?></b></span><br>
            <span class="details" style="margin-left:90px;"><b><?php echo htmlentities($rowj[0]['mem_5']); ?></b></span><br>
            <span class="details" style="margin-left:90px;"><b><?php echo htmlentities($rowj[0]['mem_6']); ?></b></span><br><br>

            <h3 class="headings">Domain</h3>
            <span class="details" style="margin-left:90px;"><b><?php   $stmtk = $pdo->prepare('SELECT * FROM domain WHERE domain_id= :dmid');
              $stmtk->execute(array(
            	  ':dmid' => $rowj[0]['domain_id'])
            	);
              $rowk = $stmtk->fetchAll(PDO::FETCH_ASSOC);
              echo htmlentities($rowk[0]['domain_name']); ?></b></span><br><br>

            <h3 class="headings">Guide</h3>
            <span class="details" style="margin-left:90px;"><b><?php   $stmtl = $pdo->prepare('SELECT * FROM mentor WHERE mentor_id= :mtid');
              $stmtl->execute(array(
            	  ':mtid' => $rowj[0]['mentor_id'])
            	);
              $rowl = $stmtl->fetchAll(PDO::FETCH_ASSOC);
              echo htmlentities($rowl[0]['mentor_name']); ?></b></span><br><br>

            <h3 class="headings">Summary</h3>
            <span class="details" style="margin-left:70px;"><b><?php echo htmlentities($rowj[0]['ssummary']); ?></b></span><br><br>

            <h3 class="headings">Video Link</h3>
            <span class="details" style="margin-left:70px;"> <a href="<?php echo htmlentities($rowj[0]['vid_link']); ?>"><button type="button" class="btn btn-primary">Go to Video</button></a></span><br>

            <h3 class="headings">Synopsis</h3>
            <span class="details" style="margin-left:70px;"> <a href="synopsis/<?php echo htmlentities($rowj[0]['synopsis_path']); ?>"><button type="button" class="btn btn-primary">Download</button></a></span><br>

            <h3 class="headings">Report</h3>
            <span class="details" style="margin-left:70px;"> <a href="report/<?php echo htmlentities($rowj[0]['report_path']); ?>"><button type="button" class="btn btn-primary">Download</button></a></span><br><br>

            <h3 class="headings">Presentation</h3>
            <span class="details" style="margin-left:70px;"><a  href="ppt/<?php echo htmlentities($rowj[0]['ppt_path']); ?>"><button type="button" class="btn btn-primary">Download</button></a></span><br><br>

            <h3 class="headings">Papers Published</h3>
            <span class="details" style="margin-left:70px;"><a  href="papers/<?php echo htmlentities($rowj[0]['publication_path']); ?>"><button type="button" class="btn btn-primary">Download</button></a></span><br><br>

           <a href="repositorydashboard.php"><button type="button" class="btn btn-primary" style="margin-left:300px;">Back to Repository</button></a>
        </div>
    </main>
</body>
