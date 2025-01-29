<?php

session_start();

require_once("db.php");

$limit = 6;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM posts LIMIT $start_from, $limit";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql1 = "SELECT * FROM Organizations WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
              ?>

<div class="col">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="attachment-img" src="uploads/logo/<?php echo $row1['logo']; ?>" alt="Attachment Image">
      <div class="caption">
        <strong class="attachment-heading">
            <?php echo $row['jobtitle']; ?>
                </strong>
        <div>
          <h5>
            <?php echo $row1['companyname']; ?> |
            Experience <?php echo $row['experience']; ?> Years |
                </h5>
          <h5> Age :<?php echo $row['maximumsalary']; ?></h5>
          <h5> gender :<?php echo $row['gender']; ?></h5>
          <h5><i class="fa-solid fa-location-dot"></i> location :<?php echo $row['locations']; ?></h5>
        </div>
        <p>
          <!-- Apply for the job button-->
          <a href="view-posts.php?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-primary" role="button">
          Mor info 
          </a>
          <!-- Another button that can be assigned to a different function.-->
          
        </p>
      </div>
    </div>
  </div>
</div>


		<?php
			}
		}
	}
}

$conn->close();