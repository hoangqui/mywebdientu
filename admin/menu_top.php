<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Web Shop Điện Tử</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <style>
    #menu{
      margin-bottom: 0px;
      border-radius: 0px;
      background-color: #5bc0de;
      border-color: #46b8da;
    }
    #menu a{
      color: black;
    }
    #menu a:hover{
      color: white;
    }
    body{
      background-color: #f2f2f2;
    }
    .color-td{
      color: #A52A2A;
    }
    td{
      text-align: center;
    }
    table tr:hover{
      background-color: white;
    }
  </style>
</head>
<body>
  <!-- menu top -->
  <nav class="navbar navbar-inverse" id="menu">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Xin Chào , <?php echo $_SESSION['ses_username']?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Xuất</a></li>
    </ul>
    <form class="navbar-form navbar-right">
          <input type="text" class="form-control" placeholder="Search...">
    </form>
  
</nav>