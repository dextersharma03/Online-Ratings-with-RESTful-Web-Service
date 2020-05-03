<?php
class Page  {

    public static $title = "Online Ratings";

    //Header for Page

    static function header() { ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <title><?php echo self::$title; ?></title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- from https://colorlib.com/wp/template/login-form-v3/?v=3e8d115eb4b3-->
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/bootstrap/css/bootstrap.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/fonts/iconic/css/material-design-iconic-font.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/animate/animate.css">
            <!--===============================================================================================-->	
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/css-hamburgers/hamburgers.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/animsition/css/animsition.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/select2/select2.min.css">
            <!--===============================================================================================-->	
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/daterangepicker/daterangepicker.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/css/util.css">
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/css/main.css">
            <!--===============================================================================================-->
            </head>
            <body>
           
    <?php }
    //Footer for page
    static function footer()    { ?>
           </body>
            </html>
    <?php }

    //Header for Admin Page
public static function headerForAdminCRUD() { ?>
    
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
    <title>Admin Panel</title>
    
  </head>
  <body style="width:75%;margin:auto;background-color:light-pink">
    <h1 class="text-center font-weight-bolder">Welcome, Admin!</h1>

        <?php }
        //Footer for Admin Page
 public static function footerForAdminCRUD() { ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <a href="pro-logout.php">Logout</a>
    
  </body>
</html>

<?php }
//Show user details in table function
    static function showUserDetails(User $u) { ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST">
    <table class="table table-borderless">
        <tbody>
            <tr>
            <td colspan="3">User Name: <?php echo $u->getUserName(); ?></td>
            </tr>
            <tr>
            <td colspan="2">First Name: <?php echo $u->getFirstName(); ?></td>
            <td>Last Name: <?php echo $u->getLastName(); ?></td>
            </tr>
            <tr>
            <td colspan="2">Email Address: <?php echo $u->getEmail(); ?></td>
            <td>Phone Number: <?php echo $u->getPhone(); ?></td>
            </tr>
            <tr>
            <td colspan="2">Age: <?php echo $u->getAge(); ?></td>
            <td>Gender: <?php echo $u->getGender(); ?></td>
            </tr>
        </tbody>
        </table>
    <button type="submit" value= "submit" class="btn btn-primary">Logout</button>
</form>

   
<?php }
//Show Login form function in Login Page
    static function showLogin() { ?>    
    <div class="limiter">
		<div class="container-login100" style="background-image: url('inc/Utility/css/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" value="submit" type="submit">
							Login
						</button>
					</div>
                    <div class="text-center p-t-90">
                        <a class="txt1" href="pro-registration.php">
                            Click here to SignUp
                        </a>
                        </div>
				</form>
			</div>
		</div>
	</div>

    <?php }
//Show search form function in Proffesor Page
static function showSearchForm() { ?>    
    <div class="limiter">
		<div class="container-login100" style="background-image: url('inc/Utility/css/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Search
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="usernameSearch" placeholder="Professor's Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="container-login100-form-btn">
                        <input type="hidden" name="action" value="search">
						<button class="login100-form-btn" value="submit" type="submit">
							Search
						</button>
                        <label for="hidden">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="hidden" name="action" value="logout">
                        <button class="login100-form-btn" value="logout" type="submit">
							Logout
						</button>
					</div>
<br>
</br><br>
</br><br>
</br>
                    <span class="login100-form-title p-b-34 p-t-27">
						Add New Professor
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter college">
						<input class="input100" type="text" name="collegeAdd" placeholder="Name of School">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="usernameAdd" placeholder="Professor's Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter department">
						<input class="input100" type="text" name="departmentAdd" placeholder="Department">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="container-login100-form-btn">
                        <input type="hidden" name="action" value="create">
						<button class="login100-form-btn" value="create" type="submit">
							Create
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <?php }
//Say thank you to a user when logged out!
    static function thankYou(){?>
            <label for="thankyou">Thank You!</label>
    <?php
    }
//Abandoned function, we didnt use that, just for testing
    static function listProffesorReviews(Instructor $instructor, array $ratings, $courses) { ?>
            <h1>Rating for Proffesor <?php echo $instructor->getFirstName() . " " . $instructor->getLastName() ?></h1>
            <h4>Courses that <?php echo $instructor->getFirstName() . " " . $instructor->getLastName() ?> is teaching </h1>
            <table border="1">
            <thead><th>CourseShortName</th><th>CourseLongName</th>
            <?php
            foreach ($courses as $course){
                echo "<tr><td>" . $course->getCourseShortName() . "</td><td>" . $course->getCourseLongName() . "</td><td>";
            }
            ?>
            </table>

            <h4>Students Rating</h4>
            <table border="1">
            <thead><th>Rating</th><th>Review</th>
            <?php 
            foreach ($ratings as $rating) { 
                echo "<tr><td>" . $rating->getRating() . "</td><td>" . $rating->getReview() . "</td><tr>";       
           }
            ?>
            </table>
     <?php }
//Show registration fomr in Registration page
static function showRegistrationForm() { ?>    
    <div class="limiter">
		<div class="container-login100" style="background-image: url('inc/Utility/css/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Registration Form
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" pattern=".{3,20}" title="3 Characters for username minimum!" required >
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" pattern=".{6,20}" title="6 Characters for password minimum!" required >
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Enter First Name">
						<input class="input100" type="text" name="firstname" placeholder="First Name" pattern=".{2,}" title="2 Characters for username First Name!" required >
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter Last Name">
						<input class="input100" type="text" name="lastname" placeholder="Last Name" pattern=".{2,}" title="2 Characters for Last Name minimum!" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="email" name="email" placeholder="Email" pattern=".{6,50}" title="6 Characters for email minimum!" required >
						<span class="focus-input100" data-placeholder="&#x2709;"></span>
					</div>
					<div class="container-login100-form-btn">
                        <input type="hidden" name="action" value="create">
						<button class="login100-form-btn" value="submit" type="submit">
							Register
				        </button>
					</div>
					<div class="text-center p-t-90">
                        <a class="txt1" href="pro-login.php">
                            Already have an account?
                        </a>
					</div>
				</form>
			</div>
		</div>



	</div>
    <?php }
//List courses table function
public static function listCourses(array $courses) { ?>
    <h3 class="font-italic">List of available Courses</h3>
        <table align="center" class="table table-hover table-borderless w-75 p-3">
            <thead class="thead-dark">
                <tr >
                    <th>CourseID</th>
                    <th>Course ShortName</th>
                    <th>Course Long Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
            </thead>
    
            <?php
     
            //List all the courses
            foreach ($courses as $course) {
                echo "<tr>";
                echo "<td>".$course->getCourseID()."</td>";
                echo "<td>".$course->getCourseShortName()."</td>";
                echo "<td>".$course->getCourseLongName()."</td>";
                echo '<td><a class="text-warning" href="?action=edit&id='.$course->getCourseID().'">Edit</td>';
                echo '<td><a class="text-danger"href="?action=delete&id='.$course->getCourseID().'">Delete</td>';
                echo "</tr>";
            } ?>
            <tr><td colspan="5"><button class="btn btn-outline-success btn-block" onclick="myFunction()">Add More</button></td></tr>
            
            </table>
                    <script>
                    function myFunction() {
            var x = document.getElementById("myForm");
            var y = document.getElementById("editcourse");
                x.style.display = "block";
                y.style.display = "none";
            
            }
            </script>
        
    <?php }
    //add a course
    public static function createCourseForm() {?>
        <hr>
        
        <form id="myForm" ACTION="" METHOD="POST" style="display:none">
        <h3 class="font-italic">Create Course</h3>
            <table align="center" class="table table-borderless table-borderless w-75 p-3">
              <tr>
                   <td>Course Short Name</td>
                   <td><input type="text" name="courseshortname" required></td>
              </tr>
              <tr>
                   <td>Course Long Name</td>
                   <td><input type = "text" name = "courselongname" required></td>
              </tr>
            </table>
            <input type="hidden" name="action" value="create">
            
            <input type="submit" class="btn btn-success"value="create">
        </form>
    
    <?php
                        }
    //Edit course form function
                        public static function editCourseForm(Course $courseToEdit) { ?>
                            <hr>
                            <form id="editcourse" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST">
                            <h3 class="font-italic">Edit Course - <?php echo $courseToEdit->getCourseID(); ?></h3>
                                <table align="center" class="table table-borderless table-borderless w-75 p-3">
                                    <tr>
                                        <td>Course ID</td>
                                        <td>
                                            <?php echo $courseToEdit->getCourseID() ;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Course Short Name</td>
                                    <td><input type="text" name="courseshortname" value="<?php echo $courseToEdit->getCourseShortName(); ?>" required></td>
                               </tr>
                               <tr>
                                    <td>Course Long Name</td>
                                    <td><input type = "text" name = "courselongname" value="<?php echo $courseToEdit->getCourseLongName(); ?>" required></td>
                               </tr>
                                </table>
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="courseid" value="<?php  echo $courseToEdit->getCourseID(); ?>" >
                                <input type="submit" class="btn btn-success" value="edit">
                                
                                
                            </form>
                    
                        <?php
        }
        //Header for Professor page
    static function headerForProfessor() { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title><?php echo self::$title; ?></title>
            <meta charset="UTF-8">
            <meta name="description" content="Yoga Studio Template">
            <meta name="keywords" content="Yoga, unica, creative, html">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!-- from https://colorlib.com/wp/template/locals-directory/-->
            <!-- Google Font -->
            <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">

            <!-- Css Styles -->
            <link rel="stylesheet" href="inc/Utility/css-professor/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/font-awesome.min.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/flaticon.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/nice-select.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/owl.carousel.min.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/magnific-popup.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/slicknav.min.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/style.css" type="text/css">

            <style>
                .autocomplete {
                position: relative;
                display: inline-block;
                }

                .autocomplete-items {
                position: absolute;
                border: 1px solid #FF658C;
                border-bottom: none;
                border-top: none;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 100%;
                left: 0;
                right: 0;
                }

                .autocomplete-items div {
                padding: 10px;
                cursor: pointer;
                background-color: #fff; 
                border-bottom: 1px solid #FF4A79; 
                }

                /*when hovering an item:*/
                .autocomplete-items div:hover {
                background-color: #FF4A79; 
                }

                /*when navigating through the items using the arrow keys:*/
                .autocomplete-active {
                background-color: DodgerBlue !important; 
                color: #ffffff; 
                }
            </style>
        </head>
        <body>
       
<?php }
//Search form for professor page
    static function searchFormProfessor($autofillinfo) { ?>
        <!-- Page Preloder -->
        <div id="preloder">
                <div class="loader"></div>
            </div>

            <!-- Hero Section Begin -->
            <section class="hero-section set-bg" data-setbg="inc/Utility/css-professor/img/bg-01.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-text">
                                <img src="inc/Utility/css-professor/img/placeholder.png" alt="">
                                <h1>Professor's Name</h1>
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="GET" class="filter-search" autocomplete="off">
                                <br>
                                    <div class="location-search">
                                        <h5>Professor's Name</h5>
                                        <div class="autocomplete">
                                        <input id="myInput" class="search" type="text" name="search" size="50" placeholder="Firstname LastName" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="action" value="searchButton">
                                    <button type="submit" name="searchButton">Search New</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section End -->

            <script>
                function autocomplete(inp, arr) {
                /*the autocomplete function takes two arguments,
                the text field element and an array of possible autocompleted values:*/
                var currentFocus;
                /*execute a function when someone writes in the text field:*/
                inp.addEventListener("input", function(e) {
                    var a, b, i, val = this.value;
                    /*close any already open lists of autocompleted values*/
                    closeAllLists();
                    if (!val) { return false;}
                    currentFocus = -1;
                    /*create a DIV element that will contain the items (values):*/
                    a = document.createElement("DIV");
                    a.setAttribute("id", this.id + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    /*append the DIV element as a child of the autocomplete container:*/
                    this.parentNode.appendChild(a);
                    /*for each item in the array...*/
                    for (i = 0; i < arr.length; i++) {
                        /*check if the item starts with the same letters as the text field value:*/
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                        }
                    }
                });
                /*execute a function presses a key on the keyboard:*/
                inp.addEventListener("keydown", function(e) {
                    var x = document.getElementById(this.id + "autocomplete-list");
                    if (x) x = x.getElementsByTagName("div");
                    if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                        increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 38) { //up
                        /*If the arrow UP key is pressed,
                        decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                        }
                    }
                });
                function addActive(x) {
                    /*a function to classify an item as "active":*/
                    if (!x) return false;
                    /*start by removing the "active" class on all items:*/
                    removeActive(x);
                    if (currentFocus >= x.length) currentFocus = 0;
                    if (currentFocus < 0) currentFocus = (x.length - 1);
                    /*add class "autocomplete-active":*/
                    x[currentFocus].classList.add("autocomplete-active");
                }
                function removeActive(x) {
                    /*a function to remove the "active" class from all autocomplete items:*/
                    for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                    }
                }
                function closeAllLists(elmnt) {
                    /*close all autocomplete lists in the document,
                    except the one passed as an argument:*/
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                    }
                }
                /*execute a function when someone clicks in the document:*/
                document.addEventListener("click", function (e) {
                    closeAllLists(e.target);
                });
                
                }
                /*An array containing all the country names in the world:*/
                // var countries = ["Rahim Virani","Michael Hrybyk","Bambang Sarif","Reza Ghaeli"];
                var countries = [];
                //console.log(countries["abc"]);

                <?php $size = sizeof($autofillinfo); for($x=0;$x<sizeof($autofillinfo[$size-1]);$x++){?>
                        countries[<?php echo $x; ?>] = "<?php $teacherFullName = $autofillinfo[$size-1][$x];
                         echo $teacherFullName; ?>" ;
               <?php } 
                ?>
                console.log(countries);
                /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                autocomplete(document.getElementById("myInput"), countries);
        
                </script>
                <br><br/>
<?php }
//Show the reviews section for instructor, takes instructor to show reviews, reviews to show, and average rating for that instructor
    static function reviewsSection(array $reviews, float $avgForInstructor, Instructor $instructor) { ?>
        <!-- Filter Section Begin -->
    <section class="filter-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-left">
                        <div class="rating-filter">
                            <h3>Ratings for <?php  echo $instructor->getFirstName() . " " . $instructor->getLastName();  ?></h3>
                            <h5>Overall Quality <?php echo "<strong>" . sprintf("%.2f",$avgForInstructor) . "</strong>"; ?> / 5 Based on <?php echo sizeof($reviews) ?> rating(s)</h5><br>
                            <div class="rating-option">   
                            <div class="ro-item">                                                                                               
                                    <label><?php echo sprintf("%.2f",$avgForInstructor); ?></label>
                                    <div class="rating-pic">
                                        <?php 
                                        for ($i = 0; $i < round($avgForInstructor); $i++) {?>
                                            <i class="fa fa-star"></i>
                                       <?php }                          
                                        ?>
                                    </div>                         
                                    </div>                     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                        //For each review show review values!
                        foreach ($reviews as $review) {?>
                        <div class="col-lg-4 col-sm-6">
                            <a class="arrange-items">
                                <div class="arrange-pic">
                                    <img src="inc/Utility/css-professor/img/bg.png" alt="">
                                    <div class="rating"><?php echo number_format((float)$review->getRating(), 1, '.', '');?></div>
                                    <div class="tic-text"><?php echo $review->FirstName . " " . $review->LastName ;?></div>
                                </div>
                                <div class="arrange-text">
                                    <h5><?php echo $review->CourseShortName; ?></h5>
                                    <span><?php echo $review->getDate() ?></span>
                                    <p><?php echo $review->getReview(); ?></p>
                                    <?php
                                        $getSessionData = $_SESSION['user'];
                                        $fullname = $getSessionData->getFirstName()." ".$getSessionData->getLastName();
                                        if($fullname==$review->FirstName . " " . $review->LastName){
                                        echo '
                                            <a href="?action=editButton&id='.$review->getRatingID().'&rating='.$review->getRating().'&review='.$review->getReview().'&firstname='.$instructor->getFirstName().'&lastname='.$instructor->getLastName().'" style="background-color: #FFAE33;
                                            border: none;
                                            color: white;
                                            padding: 8px 16px;
                                            text-decoration: none;
                                            margin: 2px 0px;
                                            cursor: pointer;">Edit</a>                              
                                            ';

                                        echo '<label for="space">&nbsp</label>
                                            <a href="?action=deleteButton&id='.$review->getRatingID().'&firstname='.$instructor->getFirstName().'&lastname='.$instructor->getLastName().'" style="background-color: #FFAE33;
                                            border: none;
                                            color: white;
                                            padding: 8px 16px;
                                            text-decoration: none;
                                            margin: 2px 0px;
                                            cursor: pointer;">Delete</a>
                                            <br></br>
                                                                            
                                            ';

                                            /*<input type="submit" value="Edit" id="'.$review->getRatingID().'" name="editButton" style="background-color: #FFAE33;
                                            border: none;
                                            color: white;
                                            padding: 8px 16px;
                                            text-decoration: none;
                                            margin: 2px 0px;
                                            cursor: pointer;"> 

                                            */
                                        }
                                    ?>
                                </div>
                            </a>
                        </div>
                            

                        <?php 
                    }                    
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Filter Section End -->
    <?php }
    //Create a new rating form which takes the courses that instructor teaches and returns instructor id values
    static function ratingsForm($courses, Instructor $instructor) { ?>

        <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="contact-form">
                        <div class="row">
                            
                            <div class="col-lg-12 text-center">
                                <label style="float:left;">Select Grade</label>
                                <select name="ratingNumber" class="browser-default custom-select" style="margin-bottom: 3%;">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                </select>  
                                <label style="float:left;">Select Course</label>                
                                <select name="courseNumber" class="browser-default custom-select" style="margin-bottom: 3%;">                          
                                <?php                       
                                foreach ($courses as $course) {?>
                                <option value=<?php echo $course->getCourseID();?>><?php echo $course->getCourseShortName() . " " . $course->getCourseLongName();  ?>   </option>
                               <?php }
                                ?>                           
                                </select>
                                <label style="float:left;">Enter your experience</label>  
                                <textarea placeholder="Your Experience" name="experience" required></textarea>
                                <input type="hidden" name="action" value="ratingsButton">
                                <input type="hidden" name="instructorid" value=<?php echo $instructor->getInstructorID();?>>
                                <input type="hidden" name="firstname" value=<?php echo $instructor->getFirstName();?>>
                                <input type="hidden" name="lastname" value=<?php echo $instructor->getLastName();?>>
                                <button type="submit" name="ratingsButton">Submit Ratings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php }
//Edit a rating form which is only can be accessed and visible for a student that has a review belonging to him
    static function editRatingsForm($courses, Instructor $instructor, $rating) { ?>

        <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="contact-form">
                        <div class="row">
                            
                            <div class="col-lg-12 text-center">
                                <label style="float:left;">Select Grade</label>
                                <select name="ratingNumber" class="browser-default custom-select" style="margin-bottom: 3%;">
                                <option value="1" <?php if($rating->getRating()==1)echo "selected"?> >1</option>
                                <option value="2" <?php if($rating->getRating()==2)echo "selected"?> >2</option>
                                <option value="3" <?php if($rating->getRating()==3)echo "selected"?> >3</option>
                                <option value="4" <?php if($rating->getRating()==4)echo "selected"?> >4</option>
                                <option value="5" <?php if($rating->getRating()==5)echo "selected"?> >5</option>
                                </select>  
                                <label style="float:left;">Select Course</label>                
                                <select name="courseNumber" class="browser-default custom-select" style="margin-bottom: 3%;">                          
                                <?php                       
                                foreach ($courses as $course) {
                                        if($course->getCourseID() == $instructor->getCourseID() && $instructor->getCourseID()!=-1){?>
                                    <option value=<?php echo $course->getCourseID();?> selected><?php echo $course->getCourseShortName() . " " . $course->getCourseLongName();  ?>   </option>      
                                        <?php }
                                        else{ ?>
                                            <option value=<?php echo $course->getCourseID();?> ><?php echo $course->getCourseShortName() . " " . $course->getCourseLongName();  ?>   </option>      
                                <?php
                                          }
                                }
                        
                                ?>                           
                                </select>
                                <label style="float:left;">Enter your experience</label>  
                                <textarea placeholder="Your Experience" name="experience" required><?php echo $rating->getReview();?></textarea>
                                <input type="hidden" name="action" value="ratingsEditButton">
                                <input type="hidden" name="instructorid" value=<?php echo $instructor->getInstructorID();?>>
                                <input type="hidden" name="firstname" value=<?php echo $instructor->getFirstName();?>>
                                <input type="hidden" name="ratingID" value=<?php echo $rating->getRatingID();?>>
                                <input type="hidden" name="lastname" value=<?php echo $instructor->getLastName();?>>
                                <button type="submit" name="ratingsEditButton">Edit Ratings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php }

//Footer for Professor Page
    static function footerforProfessor() { ?>

        <!-- Footer Section Begin -->
        <footer class="footer-section spad">
            <div class="container">
                
                <div class="row footer-bottom">
                    <div class="col-lg-5 order-2 order-lg-1">
                        <div class="copyright"><p class="text-white">
                Created By Dikshit Sharma. All rights reserved.
                </p></div>
                    </div>
                    <div class="col-lg-7 text-center text-lg-right order-1 order-lg-2">
                        <div class="footer-menu">
                            <a href="pro-logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script src="inc/Utility/css-professor/js/jquery-3.3.1.min.js"></script>
        <script src="inc/Utility/css-professor/js/bootstrap.min.js"></script>
        <script src="inc/Utility/css-professor/js/jquery.magnific-popup.min.js"></script>
        <script src="inc/Utility/css-professor/js/jquery.slicknav.js"></script>
        <script src="inc/Utility/css-professor/js/owl.carousel.min.js"></script>
        <script src="inc/Utility/css-professor/js/jquery.nice-select.min.js"></script>
        <script src="inc/Utility/css-professor/js/mixitup.min.js"></script>
        <script src="inc/Utility/css-professor/js/main.js"></script>
        </body>

        </html>

        <?php }


        //Admin CRUD Operations
        public static function listInstructors(array $instructors) { ?>
            <h3 class="font-italic">List of available Instructors</h3>
                <table align="center"class="table table-hover table-borderless w-75 p-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>InstructorID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                    </thead>
            
                    <?php
            
                    //List all the Instructors
                    foreach ($instructors as $instructor) {
                        echo "<tr>";
                        echo "<td>".$instructor->getInstructorID()."</td>";
                        echo "<td>".$instructor->getFirstName()."</td>";
                        echo "<td>".$instructor->getLastName()."</td>";
                        echo "<td>".$instructor->getEmail()."</td>";
                        echo '<td><a class="text-warning" href="?action=editinstructor&id='.$instructor->getInstructorID().'">Edit</td>';
                        echo '<td><a class="text-danger" href="?action=deleteinstructor&id='.$instructor->getInstructorID().'">Delete</td>';
                        echo "</tr>";
                    } ?>
                    <tr><td colspan="6"><button class="btn btn-outline-success btn-block" onclick="myFunction2()">Add More</button></td></tr>
                    </table>
                            <script>
                            function myFunction2() {
                    var x = document.getElementById("createinstructor");
                    var y = document.getElementById("editinstructor");
                        x.style.display = "block";
                        y.style.display = "none";
                    
                    }
                    </script>
                
            <?php }
        ////////////////////////////////////////////////////////////////////
        ///Create a new Instructor form
        /////////////////////////////////////////////////////////////////
        public static function createInstructorForm(array $courses) {?>
            <hr>
            
            <form id="createinstructor" ACTION="" METHOD="POST" style="display:none">
            <h3 class="font-italic">Create Instructor</h3>
                <table align="center" class="table table-borderless table-borderless w-75 p-3">
                  <tr>
                       <td>First Name</td>
                       <td><input type="text" name="instructorfirstname" required></td>
                  </tr>
                  <tr>
                       <td>Last Name</td>
                       <td><input type = "text" name = "instructorlastname" required></td>
                  </tr>
            
                  <tr>
                       <td>Email</td>
                       <td><input type = "email" name = "instructoremail" required></td>
                  </tr>
                </table>
                <input type="hidden" name="action" value="createinstructor" >
                
                <input type="submit" class="btn btn-success" value="create">
            </form>
        
        <?php
                            }
        
        //edit an Instructor form
        
        public static function editInstructorForm(Instructor $instructorToEdit,array $courses) { ?>
            <hr>
            
            <form id="editinstructor" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST">
            <h3 class="font-italic">Edit Instructor - <?php echo $instructorToEdit->getInstructorID(); ?></h3>
                <table align="center" class=" table table-borderless">
                    <tr>
                        <td>Instructor ID</td>
                        <td>
                            <?php echo $instructorToEdit->getInstructorID() ;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Instructor First Name</td>
                    <td><input type="text" name="instructorfirstname" value="<?php echo $instructorToEdit->getFirstName(); ?>" required></td>
               </tr>
               <tr>
                    <td>Instructor Last Name</td>
                    <td><input type = "text" name = "instructorlastname" value="<?php echo $instructorToEdit->getLastName(); ?>" required></td>
               </tr>

               
            
               <tr>
                    <td>Instructor Email</td>
                    <td><input type = "text" name = "instructoremail" value="<?php echo $instructorToEdit->getEmail(); ?>" required></td>
               </tr>
                </table>
                <input type="hidden" name="action" value="editinstructor">
                <input type="hidden" name="instructorid" value="<?php  echo $instructorToEdit->getInstructorID(); ?>">
                <input type="submit" class="btn btn-success"value="edit">
                
                
            </form>
        
        <?php
                            }
        ////////////////////////////////////////////////////////////////////
        ///List of available Students/users
        /////////////////////////////////////////////////////////////////
        public static function listStudents(array $students) { ?>
            <h3 class="font-italic">List of registered users</h3>
                <table align="center"class="table table-hover table-borderless w-75 p-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>StudentID</th>
                            <th>Student First Name</th>
                            <th>Student Last Name</th>
                            <th>email</th>
                            <th>Username</th>
                            <th>Delete</th>
                    </thead>
            
                    <?php
            
                    //List all the Instructors
                    
                    foreach ($students as $student) {
                        if($student->getUsername()!="admin"){
                        echo "<tr>";
                        echo "<td>".$student->getStudentID()."</td>";
                        echo "<td>".$student->getFirstName()."</td>";
                        echo "<td>".$student->getLastName()."</td>";
                        echo "<td>".$student->getEmail()."</td>";
                        echo "<td>".$student->getUsername()."</td>";
                        echo '<td><a class="text-danger" href="?action=deletestudent&id='.$student->getStudentID().'">Delete</td>';
                        echo "</tr>";
                        }
                    } ?>
                    </table>
                
            <?php }
            public static function showErrorsList($errors){ ?>
                <ul class="list-group">
                <?php 
                foreach ($errors as $error){
                    echo "<li class='list-group-item'>". $error . "</li>";
                }
                ?>
                </ul> 
            <?php }
//List of instructor's courses
public static function listInstructorCourses(array $instructorCourses) { ?>
    <h3 class="font-italic">List of Courses each instructor is teaching</h3>
        <table align="center"class="table table-hover table-borderless w-75 p-3">
            <thead class="thead-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Course Short Name</th>
                    <th>Course Long Name</th>
            </thead>
    
            <?php
    
            //List all the Instructors
            foreach ($instructorCourses as $instructorCourse) {
                echo "<tr>";
                echo "<td>".$instructorCourse->FirstName."</td>";
                echo "<td>".$instructorCourse->LastName."</td>";
                echo "<td>".$instructorCourse->CourseShortName."</td>";
                echo "<td>".$instructorCourse->CourseLongName."</td>";
                echo "</tr>";
            } ?>
            <tr><td colspan="4"><button class="btn btn-outline-success btn-block" onclick="myFunction3()">Assign a course</button></td></tr>
            </table>
                    <script>
                    function myFunction3() {
            var x = document.getElementById("createinstructorcourse");
                x.style.display = "block";
                
            
            }
            </script>
        
    <?php }
//Create a new course for instructor
public static function createInstructorCourse(array $instructor,array $course) {?>
    <hr>
    
    <form id="createinstructorcourse" ACTION="" METHOD="POST" style="display:none" >
    <h3 class="font-italic">Assign a course to Instructor</h3>
        <table align="center" class="table table-borderless table-borderless w-75 p-3">
          <tr>
               <td>Instructor Name</td>
               <td>
               <select name="instructorid">
               <?php
                        foreach ($instructor as $i) {
                           
                            
                            echo '<option value="'.$i->getInstructorID().'" >'.$i->getFirstName()." ".$i->getLastName().' </option>';

                            
                        }?>
               </select>
               </td>
          </tr>
          <tr>
               <td>Course Short Name</td>
               <td><select name="courseid">
               <?php
                        foreach ($course as $c) {
                           
                            
                            echo '<option value="'.$c->getCourseID().'" >'.$c->getCourseShortName().' </option>';

                            
                        }?>
                    </select>
               </td>
          </tr>
         
        </table>
        <input type="hidden" name="action" value="createic">
        
        <input type="submit" class="btn btn-success" value="create">
    </form>

<?php
                    }

}


?>
