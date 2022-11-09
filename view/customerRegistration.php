<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../view/css/CustomerSignUp.css'>
    <script src='main.js'></script>
</head>

<body>

    <div class="container center ">
        <div class="reg-div">
            <h2 class="reg-text">Registration</h2>
            <hr class="reg-line">
        </div>

        <div class="form-container">
            <form>
                <div class="div-form">
                    <label for="fname" class="form-label">Full Name </label><br>
                    <input class="input-short" type="text" name="firstname" id="fname" placeholder="firstname"
                        required />
                    <input class="input-short" type="text" name="lastname" id="lname" placeholder="lastname"
                        required /><br>

                    <label for="Mobile" class="form-label">Phone Number </label><br>
                    <input type="text" class="input-short" name="Mobile" id="Mobile" placeholder="Mobile Number"
                        required />
                    <input type="text" class="input-short" name="Home" id="Home" placeholder="Home Number" /><br>
                    <label for="nic" class="form-label">NIC </label><br>
                    <input type="text" name="nic" id="nic" placeholder="NIC" /><br>
                    <label class="form-label" for="dob">Date of Birth</label><br>
                    <input type="date" id="dob" name="dob" required><br><br>
                    <label class="form-label" for="gender"> Select you gender</label> <br>
                    <div class="radio">
                        <div><input type="radio" id="gender" name="gender" value="male" />
                            <label class="form-label">Male </label>
                        </div>
                        <div><input type="radio" id="gender" name="gender" value="female" />
                            <label class="form-label">Female </label>
                        </div>

                        <br /><br>
                    </div>


                    <label for="lane" class="form-label">Address</label><br>
                    <input type="text" name="lane" id="lane1" placeholder="Lane1" required /> <br>
                    <input type="text" name="lane" id="lane2" placeholder="Lane2" /> <br>
                    <input type="text" name="lane" id="lane3" placeholder="Lane3" /> <br>

                </div>
                <hr class="divide">
                <div class="div-user">
                    <label for="email" class="form-label">Email </label><br>
                    <input type="email" name="email" id="email" placeholder="email" /><br>
                    <label for="pw" class="form-label">Password </label><br>
                    <input type="password" name="pw" id="pw" placeholder="Password" /><br>
                    <label for="cpw" class="form-label">Confirm Password </label><br>
                    <input type="password" name="cpw" id="cpw" placeholder=" Confirm Password" /><br><br>
                    <input type="checkbox" name="condition" id="" value="" required>
                    <label for="condition" class="form-label">agree with terms and conditions</label><br>
                    <button class="submit-btn">Submit</button><br>
                    <label for="" class="">Already have an account?</label><br>
                    <button class="login-btn">Login</button>
                </div>

            </form>
        </div>
        
    </div>
    <img class="signUp-img" src="assets/sign-up-form.svg">
</body>

</html>