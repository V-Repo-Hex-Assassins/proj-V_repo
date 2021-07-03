<?php

session_start();

require_once "pdo.php";


if ( ! isset($_SESSION['username']) || strlen($_SESSION['username']) < 1  ) {
    die('Name parameter missing');
}

if(!isset($_POST['sort'])){
  $stmth = $pdo->query('SELECT * FROM project');
  $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
}
else if(isset($_POST['sort'])){
  if($_POST['domain']!="" && $_POST['year']>0 && $_POST['proj_id']>0 && $_POST['guide']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE domain_id='.$_POST['domain'].' AND year_upload='.$_POST['year'].' AND mentor_id='.$_POST['guide'].' AND project_id='.$_POST['proj_id']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['domain']!="" && $_POST['year']>0 && $_POST['proj_id']>0){
    $stmth = $pdo->query('SELECT * FROM project WHERE domain_id='.$_POST['domain'].' AND year_upload='.$_POST['year'].' AND project_id='.$_POST['proj_id']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['domain']!="" && $_POST['year']>0 && $_POST['guide']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE domain_id='.$_POST['domain'].' AND year_upload='.$_POST['year'].' AND mentor_id='.$_POST['guide']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['domain']!=""  && $_POST['proj_id']>0 && $_POST['guide']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE domain_id='.$_POST['domain'].' AND mentor_id='.$_POST['guide'].' AND project_id='.$_POST['proj_id']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if( $_POST['year']>0 && $_POST['proj_id']>0 && $_POST['guide']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE year_upload='.$_POST['year'].' AND mentor_id='.$_POST['guide'].' AND project_id='.$_POST['proj_id']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if( $_POST['year']>0 && $_POST['proj_id']>0 ){
    $stmth = $pdo->query('SELECT * FROM project WHERE year_upload='.$_POST['year'].' AND project_id='.$_POST['proj_id']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if( $_POST['proj_id']>0 && $_POST['guide']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE  mentor_id='.$_POST['guide'].' AND project_id='.$_POST['proj_id']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if( $_POST['year']>0 && $_POST['guide']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE year_upload='.$_POST['year'].' AND mentor_id='.$_POST['guide']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['domain']!=""  && $_POST['proj_id']>0){
    $stmth = $pdo->query('SELECT * FROM project WHERE domain_id='.$_POST['domain'].' AND project_id='.$_POST['proj_id']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['domain']!="" && $_POST['year']>0 ){
    $stmth = $pdo->query('SELECT * FROM project WHERE domain_id='.$_POST['domain'].' AND year_upload='.$_POST['year']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['domain']!=""  && $_POST['guide']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE domain_id='.$_POST['domain'].' AND mentor_id='.$_POST['guide']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['guide']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE mentor_id='.$_POST['guide']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['proj_id']>0){
    $stmth = $pdo->query('SELECT * FROM project WHERE project_id='.$_POST['proj_id']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['domain']!=""){
    $stmth = $pdo->query('SELECT * FROM project WHERE domain_id='.$_POST['domain']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else if($_POST['year']>0){
    $stmth = $pdo->query('SELECT * FROM project WHERE year_upload='.$_POST['year']);
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }
  else{
    $stmth = $pdo->query('SELECT * FROM project');
    $rowh = $stmth->fetchAll(PDO::FETCH_ASSOC);
  }

}

  $stmti = $pdo->query("SELECT * FROM vdummy WHERE user_id=".$_SESSION['userid']);
	$rowsi = $stmti->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rowsi as $row) {

     if($row['role_id']==1){
		$back="admindashboard.php";

   }
   else if($row['year_study']==4){
  $back="studentdashboard.php";

   }
	 else if($row['role_id']==3){
     $back="teacherdashboard.php";
	 }
	 else{
	 $back="index.php";
	 }
	 }

?>
<head>
  <style>
    body {
        background-image: linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)), url('https://media-exp1.licdn.com/dms/image/C511BAQHu2Pn4c6EQxg/company-background_10000/0?e=2159024400&v=beta&t=g93DaDC9M0qAHrTa9bz522BwMcaqIGZlMeBI-QrwQSw');
        background-size: 100%;
    }
    .card {
      margin-top: 3%;
    }
  </style>
</head>
<body>
  <!-- CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
    crossorigin="anonymous"
  />

<a href="<?php echo $back; ?>"><button type="button" class="btn btn-primary" style="margin-top:50px;margin-left:300px;margin-bottom:10px;display:block;">Back</button></a>

<form method="post">
<div style="margin-left:300px;">
  <legend > SORTING PARAMETER</legend>
<select id="domain" name="domain">
  <optgroup label="domain">
    <option value=""><b>select domain</b></option>
    <?php $i=1;
         $stmtj = $pdo->query('SELECT * FROM domain');
         $rowj = $stmtj->fetchAll(PDO::FETCH_ASSOC);
         foreach ($rowj as $rowsj) {
           $rcb=$rowsj['domain_name'];
           echo
           '<option value='.$rowsj['domain_id'].'>'.$rcb.'</option>';
           $i++;
         }
    ?>
  </optgroup>
</select>

<select id="guide" name="guide">
  <optgroup label="guide">
    <option value=""><b>select Guide</b></option>
    <?php $i=1;
         $stmto = $pdo->query('SELECT * FROM mentor');
         $rowo = $stmto->fetchAll(PDO::FETCH_ASSOC);
         foreach ($rowo as $rowso) {
           $rcb=$rowso['mentor_name'];
           echo
           '<option value='.$rowso['mentor_id'].'>'.$rcb.'</option>';
           $i++;
         }
    ?>
  </optgroup>
</select>

<input type="number" name="year" placeholder="year">
<input type="number" name="proj_id" placeholder="Project id">
<input type="submit" name="sort" value="sort" class="btn btn-dark">
</form>
</div>
<hr>
<?php

foreach($rowh as $rowsh){
  echo '<a href="projdet.php?id='.urlencode($rowsh['project_id']).'">
    <div
    class="card border-primary mb-3"
    style="max-width: 50rem; margin-left: 20%"
  >
    <div class="card-header"><span>'.htmlentities($rowsh['project_id']).'. &nbsp &nbsp</span><span>'.htmlentities($rowsh['project_title']).'</span></div>
    <!--   For project title -->
    <div class="card-body text-secondary">
      <p><span class="card-text">'.htmlentities($rowsh['ssummary']).'</span></p>
    </div>
  </div>
  </a>';
}

?>

</body>
