<?php
//session_start();
//include("Home.php");
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="shortcut icon" href="images\Logo22.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Nav-Side.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
    list-style: none;
    text-decoration: none;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
}

body{
    background: #f5f6fa;
}

img{
    cursor: pointer;
}
.flex-div{
    display: flex;
    align-items: center;
}
nav{
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    top: 0; /* Stay at the top */
    overflow-y: hidden; /* Disable horizontal scroll */
    display: flex;
    float: top ;
    padding: 10px 2%;
    justify-content: space-between;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    background: #fff;
    top: 0;
    z-index: 10;
    width: 100%;
}
.nav-right img{
    width: 25px;
    margin-right: 25px; 
}
.nav-right .user-icon{
    width: 35px;
    border-radius: 50%;
    margin-right: 0;
}
.nav-left .menu-icon{
    width: 22px;
    margin-right: 25px;
}
.nav-left .logo{
     width: 130px;
}
.nav-midde .search-box{
    border: 1px solid #ccc;
    margin-right: 15px;
    padding: 8px 12px;
    border-radius: 25px;
}
.nav-midde .search-box input{
    width: 400px;
    border: 0;
    outline: 0;
    background: transparent;
}
.nav-midde .search-box img{
    width: 15px;
}
@media (max-width: 900px){
    .menu-icon{
        display: none;
    }
    .sidebar{
        display: none;
    }
    .container, .large-container{
        padding-left: 5%;
        padding-right: 5%; 
    }
    .nav-right img{
        display: none;
    }
    .nav-right .user-icon{
        display: block;
        width: 30px;
    }
    .nav-midde .search-box input{
        width: 100px;
    }
    .nav-middle .mic-icon{
        display: none;
    }
    .logo{
        width: 90px;
    }
}
.sidebar {
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    overflow-x: hidden; /* Disable horizontal scroll */
    display: flex;
    float: left;
    margin-top: 40px;
    padding-top: 40px;
    padding-bottom: 100%;
    padding-left: 0px;
    width: 250px;
    background-color: #72A0C1;
    overflow-y: scroll;
    color: #fff;
    transition: all 0.5s ease; 
  }
  
  .sidebar-items {
      display: flex;
      flex-direction: column;
  }
  
  .sidebar-item {
      display: flex;
      align-items: center;
      padding: 0 24px;
      cursor: pointer;
      height: 40px;
  }
  
  .sidebar-item:hover {
      background-color: #91b6e6;
  }
  
  .sidebar-item i {
      margin-right: 24px;
  }
  
  .sidebar hr{
    margin-left: 15px;
      border: 0;
      height: 1px;
      background: #ccc;
      width: 95%;
  }
  

  ::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: none;
}

::-webkit-scrollbar-thumb {
    background: #72A0C1;
    border-radius: 5px;
}

.sidebar:hover::-webkit-scrollbar-thumb {
    background: white;
}

::-webkit-scrollbar-thumb:hover {
    background:white;
}
#logout{
    font-size: 17px;
    width: 480px;
}
#logout :hover{
    background-color: #91bde6;
}
#channelnameh3{
   margin-left: -242px; 
}
</style>
    <nav class="flex-div">
        <div class="nav-left flex-div">
           <a href="Home.php"><img src="images/cloudlogonw.jpg" class="logo"></a>
        </div>
        <div class="nav-midde flex-div">
            <div class="search-box flex-div">
                <input type="text" placeholder="Search">
            <img src="images/search.png">
            </div>
            </div>
        <div class="nav-right flex-div">
            <img src="images/upload.png"> 
            <img src="images/more.png">  
            <img src="images/notification.png">
            <?php
          echo '<a href="updateprof.php"><img src="data:image;base64,'.base64_encode($_SESSION["profile_pic"]).'"class="user-icon"></a>';
            ?>
        </div>
    </nav>
    </div>
<div class="body-container">
    <div class="sidebar">
            <div class="sidebar-items">
                <?php
                echo '<img src="data:image;base64,'.base64_encode($_SESSION["profile_pic"]).'"style="height: 100px; width: 100px; border-radius: 50%; margin-left: 60px; margin-top: 0%;">';
               // echo'<img src="images/Logo2.jpg" style="height: 100px; width: 100px; border-radius: 50%; margin-left: 60px; margin-top: 0%;">';
                ?>
                <h3 id="channelnameh3"style="text-align: center;"><?php echo $_SESSION['u_name'] ?></h3>
                <br>
                <hr>
                <a href="Home.php" style="text-decoration: none ; color:white" class="sidebar-item"><i class="fa fa-home" style="font-size:24px"></i></i>Home</a>
                <a href="" style="text-decoration: none ; color:white" class="sidebar-item"><i class="fas fa-indent" style="font-size:24px"></i>Subscriptions</a>
                <hr>
                <a href="" style="text-decoration: none ; color:white" class="sidebar-item"><i class="far fa-caret-square-right"></i>Library</a>
                <a href="" style="text-decoration: none ; color:white"  class="sidebar-item"><i class="fa fa-history" style="font-size:24px"></i>History</a>
                <a href="" style="text-decoration: none ; color:white" class="sidebar-item"><i class="fa fa-clock-o" style="font-size:24px"></i>Watch later</a>
                <a href="" style="text-decoration: none ; color:white" class="sidebar-item"><i class="fa fa-thumbs-up like-btn" style="font-size:24px"></i>Liked Videos</a>
                <a href="MyUp.php" style="text-decoration: none ; color:white" class="sidebar-item"><i class="fa fa-cloud-upload " style="font-size:20px"></i>My Uploads</a>
                <hr>
                <a href="updateprof.php" style="text-decoration: none ; color:white"class="sidebar-item"><i class='fas fa-user-edit'style="font-size:21px"></i>Manage Account</a>
                <button id="logout" href="" onclick="logout()" style="text-decoration: none ; border: none; background-color: #F74255; color:white;" class="sidebar-item"><i class="fa fa-sign-out"style="font-size:32px"></i>Logout</button>
    
            </div>
        </div>
 </div>
 <script>
    function logout() {
  var confirml = confirm("Are you sure you want to log out?");
  if (confirml) 
 {
    // text = "Logging out..!";
     window.location.href = "../Controllers/logout.php";
  } else {
    text = "Keep signed in!";
  }
}
 </script>