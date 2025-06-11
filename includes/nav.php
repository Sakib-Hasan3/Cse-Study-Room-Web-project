<!-- includes/nav.php -->
<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">CSE Study Room</a>
        <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="pages/courses.php">Courses</a></li>
            <li><a href="pages/dashboard.php">Dashboard</a></li>
            <li><a href="community/community.php">Community</a></li>
            <li><a href="auth/login.php">Login</a></li>
            <li><a href="auth/register.php">Register</a></li>
        </ul>
    </div>
</nav>

<style>
/* Inline basic styles for nav; move to nav.css if preferred */
.navbar {
    background-color: #004080;
    padding: 10px 20px;
}
.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.nav-menu {
    list-style: none;
    display: flex;
    gap: 20px;
}
.nav-menu li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.nav-logo {
    color: #fff;
    font-size: 1.5rem;
    font-weight: bold;
    text-decoration: none;
}
</style>
