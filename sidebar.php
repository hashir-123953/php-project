<?php $current = basename($_SERVER['PHP_SELF']); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<nav id='sidebar'>
    <div class='sidebar-header'>
        <h3>ReadNova -<span>Admin</span></h3>
    </div>

    <div class='section-label'>Main</div>
    <a href='dashboard.php' class='nav-link <?= $current == "dashboard.php" ? "active" : "" ?>'>
        <i class='fas fa-th-large'></i> Dashboard
    </a>

    <div class='section-label'>USERS / CUSTOMERS</div>
    <a href='manage_users.php' class='nav-link <?= $current == "manage_users.php" ? "active" : "" ?>'>
        <i class='fas fa-users'></i> Manage Users
    </a>
 

    <div class='section-label'>BOOK MANAGEMENT</div>
    <a href='add_book.php' class='nav-link <?= $current == "add_book.php" ? "active" : "" ?>'>
        <i class='fas fa-book-medical'></i> Add New Book
    </a>
    <a href='books.php' class='nav-link <?= $current == "books.php" ? "active" : "books.php" ?>'>
        <i class='fas fa-book'></i> Manage Books
    </a>
    
    <a href='novels.php' class='nav-link <?= $current == "novels.php" ? "active" : "" ?>'>
        <i class='fas fa-tags'></i> Add New Novels
    </a>
     <a href='novel.php' class='nav-link <?= $current == "novel.php" ? "active" : "books.php" ?>'>
        <i class='fas fa-book'></i> Manage Novels
    </a>
  
    <a href='add_gk.php' class='nav-link <?= $current == "" ? "active" : "add_gk.php" ?>'>
        <i class='fas fa-tags'></i> Add General Knowlege
    </a>
     <a href='gk.php' class='nav-link <?= $current == "" ? "active" : "gk.php" ?>'>
        <i class='fas fa-book'></i> Manage General Knowlege
    </a>
       <a href='Add_quiz.php' class='nav-link <?= $current == "" ? "active" : "Add_quiz.php" ?>'>
        <i class='fas fa-tags'></i> Add Quiz
    </a>
     <a href='quiz.php' class='nav-link <?= $current == "" ? "active" : "quiz.php" ?>'>
        <i class='fas fa-book'></i> Manage Quiz
    </a>

    <a href='pdf.php' class='nav-link <?= $current == "pdf.php" ? "active" : "" ?>'>
        <i class='fas fa-file-pdf'></i> Upload PDF / Files
    </a>
   

    <div class='section-label'>ORDERS / SALES</div>
    <a href='order.php' class='nav-link <?= $current == "" ? "active" : "order.php" ?>'>
        <i class='fas fa-shopping-cart'></i> Manage Orders
    </a>
 
    <a href='pendingorder.php' class='nav-link <?= $current == "pendingorder.php" ? "active" : "" ?>'>
        <i class='fas fa-hourglass-half'></i> Pending Orders
    </a>
    <a href='completed.php' class='nav-link <?= $current == "completed.php" ? "active" : "" ?>'>
        <i class='fas fa-check-circle'></i> Completed Orders
    </a>
    <a href='cancel.php' class='nav-link <?= $current == "cancel.php" ? "active" : "" ?>'>
        <i class='fas fa-times-circle'></i> Cancelled Orders
    </a>

    <div class='section-label'>PAYMENTS</div>
    <a href='payments.php' class='nav-link <?= $current == "payments.php" ? "active" : "" ?>'>
        <i class='fas fa-money-bill-wave'></i> Payment History
    </a>
  



    <div class='section-label'>COMPETITIONS</div>
    <a href='competition.php' class='nav-link <?= $current == "ccompetition.php" ? "active" : "" ?>'>
        <i class='fas fa-trophy'></i> Create Competition
    </a>
  
    <a href='read_winner.php' class='nav-link <?= $current == "" ? "active" : "read_winner.php" ?>'>
        <i class='fas fa-medal'></i> Winners List
    </a>
   



    <div class='section-label'>FEEDBACK</div>
    <a href='feedback.php' class='nav-link <?= $current == "feedback.php" ? "active" : "" ?>'>
        <i class='fas fa-comments'></i> User Feedback
    </a>
    <a href='testmail.php' class='nav-link <?= $current == "testmail.php" ? "active" : "" ?>'>
         <i class='fas fa-comments'></i> order confirmation  mail 
     </a>
    
    <a href='manage_carousel.php' class='nav-link <?= $current == "manage_carousel.php" ? "active" : "" ?>'>
         <i class='fas fa-comments'></i> Carousel management 
     </a>
    

</nav>
```
