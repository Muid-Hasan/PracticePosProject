<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('auth/dash.css')}}" rel="stylesheet" >
    <title>Dashboard</title>
    <!-- Include your CSS stylesheet(s) here -->
    
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <!-- Sidebar content, e.g., logo, navigation links -->
        <div class="logo" href="">###</div>
        <nav class="navigation">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Analytics</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header with user profile and notifications -->
        <header class="header">
            <div class="user-profile">
                <img src="{{ asset('prologo.ico') }}" alt="User Profile">
                <span>Syed Md Ibrahim</span>
            </div>
            <div class="notifications">
                <!-- Notifications icon and count -->
                <i class="fa fa-bell"></i> <span class="badge">--</span>
            </div>
        </header>

        <!-- Dashboard Cards -->
        <div class="cards">
            <div class="card">
                <h2>Total Users</h2>
                <p>--</p>
            </div>
            <div class="card">
                <h2>Revenue</h2>
                <p>--</p>
            </div>
            <div class="card">
                <h2>Orders</h2>
                <p>--</p>
            </div>
        </div>

        <!-- Additional content goes here -->
    </main>
    
    <!-- Include your JavaScript scripts here if needed -->
    <script src="script.js"></script>
</body>
</html>
