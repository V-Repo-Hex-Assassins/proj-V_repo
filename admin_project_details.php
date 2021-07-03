<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <link rel="stylesheet" href="./styles.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light d-none d-md-block sidebar">
                <div class="left-sidebar">
                    <ul class="nav flex-column sidebar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"
                                        clip-rule="evenodd" /></svg>
                              <a href="admindashboard.php">Go to Dashboard</a>
                            </a>
                        </li>
                       <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"
                                        clip-rule="evenodd" /></svg>
                              Enquiry Prediction
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"
                                        clip-rule="evenodd" /></svg>
                              Enquiry Statistics
                            </a>
                        </li> -->
                    </	ul>
                </div>
            </div>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<center> <h3>BE Teams and Project Details</h3> </center>
                <hr>
                <div class="table-responsive">
                   <center>
<style>
 table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: white;
}
</style>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frepo";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


//displaying data on page from database
$sql = "SELECT project.project_id, project.project_title, project.year_upload, project.mem_1_lead, project.roll_no_1,
        project.mem_2, project.roll_no_2, project.mem_3, project.roll_no_3, project.mem_4, project.roll_no_4,project.mem_5, project.roll_no_5,project.mem_6, project.roll_no_6,
        project.ssummary, project.synopsis_path, project.ppt_path, project.report_path, project.ppt_path, project.publication_path,
        project.vid_link , project.domain_id, domain.domain_name, project.department_id, department.department_title, project.mentor_id, mentor.mentor_name
        FROM project, domain, department, mentor
        WHERE project.domain_id=domain.domain_id AND project.department_id=department.department_id AND project.mentor_id = mentor.mentor_id
        ORDER BY department_id";

$result = mysqli_query($conn, $sql);

//}

if ( mysqli_num_rows($result) > 0 ) {
?>
  <table>

  <tr>
    <th>Domain</th>
    <th>Project Title</th>
    <th>Department</th>
	<th>Year</th>
	<th>Guide/Mentor</th>
	<th>Member 1 (Leader)</th>
	<th>Member 2</th>
	<th>Member 3</th>
	<th>Member 4</th>
    <th>Member 5</th>
    <th>Member 6</th>
	<th>Summary</th>
    <th>Synopsis</th>
	<th>Presentation</th>
	<th>Report</th>
	<th>Publication</th>
	<th>Link</th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["domain_name"]; ?></td>
    <td><?php echo $row["project_title"]; ?></td>
    <td><?php echo $row["department_title"]; ?></td>
	<td><?php echo $row["year_upload"]; ?></td>
    <td><?php echo $row["mentor_name"]; ?></td>
	<td><?php echo $row["mem_1_lead"]; ?> - <?php echo $row["roll_no_1"]; ?></td>
    <td><?php echo $row["mem_2"]; ?> - <?php echo $row["roll_no_2"]; ?></td>
    <td><?php echo $row["mem_3"]; ?> - <?php echo $row["roll_no_3"]; ?></td>
    <td><?php echo $row["mem_4"]; ?> - <?php echo $row["roll_no_4"]; ?></td>
    <td><?php echo $row["mem_5"]; ?> - <?php echo $row["roll_no_5"]; ?></td>
    <td><?php echo $row["mem_6"]; ?> - <?php echo $row["roll_no_6"]; ?></td>
    <td><?php echo $row["ssummary"]; ?></td>
    <td><a href="synopsis/<?php echo htmlentities($row['synopsis_path']); ?>">Download Synopsis</a></td>
	<td><a href="ppt/<?php echo htmlentities($row['ppt_path']); ?>">Download PPT</a></td>
    <td><a href="report/<?php echo htmlentities($row['report_path']); ?>">Download Report</a></td>
    <td><a href="papers/<?php echo htmlentities($row['publication_path']); ?>">Download Papers</a></td>
    <td><?php echo '<a href="'.$row["vid_link"].'" target="_blank">Watch Video</a>'; ?></td>
</tr>
<?php
$i++;
}
echo "Total Project entries are". "\t" . $i;
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>
