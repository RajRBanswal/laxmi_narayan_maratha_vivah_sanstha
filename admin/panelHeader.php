<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@400;800&family=Baloo+2:wght@400;800&family=Lora:wght@400;700&family=Noto+Serif+Khojki:wght@400;700&display=swap" rel="stylesheet">
    <!-- * Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com -->




    <!-- favicon icon -->
    <!--<link rel="icon" href="/images/logon.png" type="image/x-icon">-->
    <link rel="icon" href="./img/logo.png" type="image/x-icon">

    <!-- Custom styles for this template-->
    <link href="css/styleAdmin.css" rel="stylesheet">
    <style>
        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
        }

        @media (min-width:320px) and (max-width:480px) {
            .imz {
                vertical-align: middle;
                border-style: none;
                width: 100px;
                height: 50px;
            }

        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminDashboard.php">
            <img src="./img/logo.png" width="100%" class="imz" alt="...">
        </a>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="adminDashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <!-- Heading -->
        <div class="sidebar-heading">
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link " href="users.php">
                <!-- <i class="fas fa-fw fa-wrench"></i> -->
                <i class="fa-solid fa-users"></i>

                <span>Users</span>
            </a>
        </li>
        <!-- Heading -->
        <div class="sidebar-heading">
        </div>
        <!-- Nav Item - plan -->
        <li class="nav-item">
            <a class="nav-link" href="pricingPlan.php">
                <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                <i class="fas fa-money-check"></i>
                <span>Membership plan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="plan_paid_free_users.php">
                <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                <i class="fas fa-money-check"></i>
                <span>Plan Paid/Free Users</span></a>
        </li>
        <!-- Nav Item - success story -->
        <li class="nav-item">
            <a class="nav-link" href="AddSuccessStory.php">
                <i class="fas fa-heart"></i>
                <span>Success Stories</span></a>
        </li>
        <!-- Nav Item - reviews -->
        <li class="nav-item">
            <a class="nav-link" href="add_review.php">
                <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                <i class="fas fa-star-half-alt"></i>
                <span>Review</span>
            </a>
        </li>
        <!-- Nav Item - contact us -->
        <li class="nav-item">
            <a class="nav-link" href="inquiry.php">
                <!-- <i class="fas fa-fw fa-cog"></i> -->
                <!-- <i class="fas fa-comment-alt-exclamation"></i> -->
                <!-- <i class="fas fa-bell-exclamation"></i> -->
                <i class="fas fa-envelope"></i>
                <span>Inquiry</span>
            </a>
        </li>
        <!-- Nav Item - contact us -->
        <li class="nav-item">
            <a class="nav-link" href="career.php">
                <i class="fas fa-envelope"></i>
                <span>Career</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="delete_profiles.php">
                <i class="fa fa-trash" aria-hidden="true"></i>
                <span>Deleted Profiles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="all_misuse_report.php">
                <i class="fa fa-trash" aria-hidden="true"></i>
                <span>All Misuse Reports</span>
            </a>
        </li>
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
</body>

</html>