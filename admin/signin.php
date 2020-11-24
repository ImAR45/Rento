<!doctype html>
<html>
    <head>
        <title>Welcome</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href="../admin/style3.css">
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
    </head>
    <body style="font-family: comic snes ms;">
        <nav class="navbar navbar-expand-md navbar-dark  bg-dark " >
            <a class="navbar-brand" href="index.php">SORENTO</a>
            
                    <?php
                    echo '<li class="nav-item" style="position: absolute; right: 4%">
                         <a href="signin.php"> <button type="button" class="btn btn-primary" data-toggle="modal" >
                                    BECOME A SELLER
                                </button></a>';
                    ?>                           


            </div>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="product.php" method="POST" style="position: absolute; left: 40%;">
        <input class="form-control mr-sm-2" type="text"  name="search"placeholder="Search" aria-label="Search" size="40px">
        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" ></input>
    </form>

</nav>
 <form action="login.php" name="registration" method="post" >
                                            <div class="login-box">

                                                <div class="textbox">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <input type="text" placeholder="Name" name="pname" value="">
                                                </div>

                                                <div class="textbox">
                                                    <i class="fi-xwsuxl-envelope-solid"></i>
                                                    <input type="email" placeholder="Email-Id" name="pemail" value="">
                                                </div>
                                                <div class="textbox">
                                                    <i class="fi-xwsuxl-envelope-solid"></i>
                                                    <input type="text" placeholder="Username" name="puser" value="">
                                                </div>
                                                <div class="textbox">
                                                    <i class="fi-xnsuxl-lock-solid"></i>
                                                    <input type="password" placeholder="Password" name="ppass" value="">
                                                </div>
                                                <div class="textbox"> 
                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                    <input type="text" placeholder="DOB YYYY/MM/DD" name="dob" value="">
                                                </div>
                                                <div class="stextbox">
                                                    <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                                    <select class="stextbox" name="pgender">
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                        <option value="O">Other</option>
                                                    </select>
                                                </div>
                                                <div class="textbox">   
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <input type="text" placeholder="City" name="pcity" value="">
                                                </div>
                                                <div class="textbox">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>  
                                                    <input type="text" placeholder="Mobile-Number" name="pmob" value="">
                                                </div>

                                                <div class="modal-footer">
                                                    <input  type="submit" name = "reg-bn" class="btn btn-primary" value="Sign Up"></input>
                                                </div>
                                        </form>
</html>