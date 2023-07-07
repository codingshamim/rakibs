<?php
@include "../php/conn.php";
session_start();
$userId = $_SESSION['uniqueId'];
$selAdmin = "SELECT * FROM `admindetails`";
$selQuery = mysqli_query($conn,$selAdmin);
$admin = mysqli_fetch_assoc($selQuery);



?>
<?php
$sel = "select * from colors";
$selQuery = mysqli_query($conn,$sel);
$colors = mysqli_fetch_assoc($selQuery);

?>
<?php
// favicons 



?>
<style>
    :root{
        --rk-primary:<?php echo $colors['prm'] ?>
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/favicon/<?php echo $favicons['favicon'] ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/4.0.0/font/MaterialIcons-Regular.ttf" />
    <link href="assets/css/style.css" rel="stylesheet">
    
    <title><?php echo $admin['adminTitle'] ?></title>
</head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top"><a class="brand-wrap" href="index.html"><img class="logo" src="assets/imgs/logos/<?php echo $admin['adminLogo'] ?>" alt="Logo"></a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"><i class="text-muted fa-solid fa-bars"></i></button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item active"><a class="menu-link" href="index.php"><i class="fa-solid fa-bars"></i><span class="ms-3 text">Dashboard</span></a></li>
                <li class="menu-item has-submenu"><a class="menu-link" href="page-products-list.html">
                <i class="fa-solid fa-bag-shopping"></i>    
                <span class="ms-3 text">
                    Products</span></a>
                    <div class="submenu"><a href="add-new-product.php">Add New Product</a><a href="all-product.php">All Product</a>
                </li>
                <li class="menu-item has-submenu"><a class="menu-link" href="page-products-list.html">
                <i class="fa-solid fa-user"></i>   
   
                <span class="ms-3 text">
                    Users</span></a>
                    <div class="submenu"><a href="add-new-user.php">Add New User</a><a href="all-user.php">All User</a>
                   
                </li>
              
                <li class="menu-item"><a class="menu-link" href="home-page.php"><i class="fa-solid fa-house"></i><span class="ms-3 text">Home Page</span></a></li>
                <li class="menu-item"><a class="menu-link" href="header-page.php"><i class="fa-sharp fa-solid fa-industry"></i><span class="ms-3 text">Header</span></a></li>
                <li class="menu-item"><a class="menu-link" href="seller-apply.php"><i class="fa-solid fa-comment"></i><span class="ms-3 text">Seller Request</span></a></li>
                <li class="menu-item"><a class="menu-link" href="menus.php"><i class="fa-solid fa-plus"></i><span class="ms-3 text">Menus</span></a></li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#">
                    <i class="fa-solid fa-list"></i> 
                <span class="text ms-3">Category</span></a>
                    <div class="submenu"><a href="add-new-cate.php">Add New Category</a><a href="all-category.php">All Category</a><a href="add-new-sub-cate.php">Add New Sub Category</a></div>
                </li>
                <li class="menu-item has-submenu"><a class="menu-link" href="#">
                <i class="fa-sharp fa-regular fa-pen-to-square"></i>    
                <span class="text ms-3">Edit Setting</span></a>
                    <div class="submenu"><a href="edit-colors.php">Edit Colors</a><a href="edit-admin.php">Edit Site Details</a></div>
                </li>
               
            </ul>
            <hr>
            
        </nav>
    </aside>
    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
                <form class="searchform">
                    <div class="input-group">
                        <input class="form-control" list="search_terms" type="text" placeholder="Search term">
                        <button class="btn btn-light bg" type="button"><i class="fa-solid fa-search"></i></button>
                    </div>
                    <datalist id="search_terms">
              <option value="Products"></option>
              <option value="New orders"></option>
              <option value="Apple iphone"></option>
              <option value="Ahmed Hassan"></option>
            </datalist>
                </form>
            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link btn-icon" href="#"><i class="fa-sharp fa-solid fa-bell animation-shake"></i><span class="badge rounded-pill">3</span></a></li>
                    <li class="nav-item"><a class="nav-link btn-icon darkmode" href="#"><i class="fa-sharp fa-solid fa-moon"></i></a></li>
                    <li class="nav-item"><a class="requestfullscreen nav-link btn-icon" href="#"><i class="fa-solid fa-expand"></i></a></li>
                   
                    <li class="dropdown nav-item"><a class="dropdown-toggle" id="dropdownAccount" data-bs-toggle="dropdown" href="#" aria-expanded="false"><img class="img-xs rounded-circle" src="assets/imgs/people/avatar2.jpg" alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount"><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i>Edit Profile</a><a class="dropdown-item" href="#"><a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>