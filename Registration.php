
<!DOCTYPE html>
<html class="Resgistration">
    <head>
        <title>Patient Registration</title>
        <link rel = "stylesheet" href="style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
    </head>

    <body>  


       
           
        </ul>
        <form action="registration">
            <div class="registration-box">
                <h1>REGISTRATION</h1>

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder=" name" name="name" value="">
                </div>

                <div class="textbox">
                    <i class="fi-xwsuxl-envelope-solid"></i>
                    <input type="text" placeholder="Email-Id" name="uname" value="">
                </div>

                <div class="textbox">
                    <i class="fi-xnsuxl-lock-solid"></i>
                    <input type="password" placeholder="Password" name="pass" value="">
                </div>


                <div class="textbox">
                    <i class="fa fa-phone" aria-hidden="true"></i>  
                    <input type="text" placeholder="Mobile-Number" name="mobile" value="">
                </div>

                <div class="textbox">   
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <input type="text" placeholder="Address" name="add" value="">
                </div>

                <div class="textbox"> 
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    <input type="text" placeholder="DOB YYYY/MM/DD" name="dob" value="">
                </div>            
                <!--            <div class="textbox">
                                 <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                 <input type="text" placeholder="Enter-Gender" name="gender" value="">           
                            </div>-->

                <div class="stextbox">
                    <i class="fa fa-venus-mars" aria-hidden="true"></i>
                    <select class="stextbox" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                </div>

                <input class="btn" type="submit" value="Register">
                </form>



           


    </body>

