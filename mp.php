<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Okademi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

body {
    background: linear-gradient(to right, #4caf50, #10603b);
    font-family: Arial, sans-serif;
    margin: 0; 
    padding: 0;
}

main {
    background-color: rgb(186, 234, 168);
    background: linear-gradient(to right, #4caf50, #10603b);
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
}

section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

button {
    padding: 10px;
    border: none;
    width: 100px;
    height: 40px;
    text-align: center;
    cursor: pointer;
    background-color: #f9f7e8;
}



.anton-regular {
    font-family: "Anton", sans-serif;
    font-weight: 700;
    font-style: normal;
}

.dashboard {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
}

.box {
    width: calc(33.33% - 3rem); 
    margin: 1.5rem;
    padding: 2rem;
    background-color: black;
    box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
    border-radius: 1rem;
    text-align: center;
    cursor: pointer;
    transition: transform 0.2s ease-in-out;
    height: 13rem;
    border: 2px solid #34693a;
    position: relative;
}

.box:hover {
    transform: scale(1.05);
}

iframe {
    width: 100%;
    height: 100%;
    border: none;
}
.box1-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url(/Educational-website-Okedemi/images/jeemainsbox.png);
    background-size: cover;
    background-repeat: no-repeat;
    opacity: 1; 
    border-radius: 1rem;
    
}
.box2-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url(/Educational-website-Okedemi/images/jeeadvancebox.png);
    background-size: cover;
    background-repeat: no-repeat;
    opacity: 1;
    border-radius: 1rem; 
    
}
.box3-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url(/Educational-website-Okedemi/images/neetbox.png);
    background-size: cover;
    background-repeat: no-repeat;
    opacity: 1;
    border-radius: 1rem;
    
}



@media screen and (max-width: 768px) {
    .box {
        width: calc(50% - 3rem);
    }
}

@media screen and (max-width: 480px) {
    .box {
        width: calc(100% - 3rem); 
    }
}
.coursecontainer{
width: 100%;
background-color:  #f9f7e8;
display: flex;
border-radius: 15px;
border: 2px solid #34693a;
padding-bottom: 10px;
}

.partition{
  flex: 1;
  text-align: center;
  padding-top: 15px;
  color: #34693a;
}

.community-header {
    text-align: center;
    padding: 20px;
}


.community-content {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

.container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

.left-side,
.right-side {
            
            display: flex;
            align-items: center;
            
        }

.line {
            width: 3px;
            height: 180px; 
            background-color:#f9f7e8;
            margin: 0 20px;
            
        }

.text-container,
.image-container {
          text-align: center;
            max-width:500px;
            max-height: 400px;
        }
.image-container img{
          max-width: 100%;
          max-height: 300px;
        }
        .login-form {
            max-width: 600px;
            margin: auto;
            padding: 40px;
            background: #f9f7e8;
            border-radius: 10px;
            border: 2px solid #34693a;
        }

        .login-form input {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #34693a;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #34693a;
            color: white;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #2e5530;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }

        .highlight {
    background-color: yellow;
    color: black;
    font-weight: bold;
  }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color:  #f9f7e8;border-bottom: 2px solid #34693a;">
  <div class="container-fluid">
    <div class="icon">
      <img src="images/okedemi_final_logo.jpeg" alt="logo" style="height: 50px; padding-right: 20px;">
    </div>
    <div class="navbar-header">
      <a class="navbar-brand" href="mp.php" style="font-family: anton-regular; font-size: xx-large; padding-bottom: 10px;">
        <b>OKADEMI</b>
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            style="padding-top: 15px;">
            <b>Study Materials</b>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="syllabus.html#Maths">Maths</a></li>
            <li><a class="dropdown-item" href="syllabus.html#Physics">Physics</a></li>
            <li><a class="dropdown-item" href="syllabus.html#Chemistry">Chemistry</a></li>
            <li><a class="dropdown-item" href="syllabus.html#Biology">Biology</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            style="padding-top: 15px;">
            <b>Paid Courses</b>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="courses.php#mains">Mains</a></li>
            <li><a class="dropdown-item" href="courses.php#advanced">Advanced</a></li>
            <li><a class="dropdown-item" href="courses.php#neet">Neet</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mycourse.php" style="padding-top: 15px;"><b>My Courses</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/"><img src="/Educational-website-Okedemi/images/Facebook_Logo_(2019).png.webp" style="height: 40px; padding-left: 15px;padding-bottom: 5px;"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.youtube.com/"><img src="/Educational-website-Okedemi/images/ytlogo.png" style="height: 50px; padding-left: 20px;padding-bottom: 10px;"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.instagram.com/?hl=en"><img src="images/instalogo.jpg" style="height: 40px; padding-left: 20px;padding-bottom: 5px;"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="www.twitter.com/x"><img src="images/Xlogo.png" style="height: 40px; padding-left: 20px;padding-bottom: 5px;"></a>
        </li>
      </ul>
      <form class="d-flex" role="search" onsubmit="searchFunction(); return false;">
  <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit" style="border-width: 2px;"><b>Search</b></button>
</form>
    </div>
  </div>
</nav>

<script>
  function searchFunction() {
    // Clear previous highlights
    removeHighlights();
    
    // Get the search query
    const query = document.getElementById("searchInput").value.trim().toLowerCase();
    
    if (query) {
      // Get all text-containing elements on the page (e.g., paragraphs, headings)
      const textElements = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6, li");
      
      textElements.forEach(element => {
        const innerText = element.innerHTML;
        const regex = new RegExp(`(${query})`, 'gi'); // Regular expression for global, case-insensitive match
        const highlightedText = innerText.replace(regex, '<span class="highlight">$1</span>');
        
        element.innerHTML = highlightedText;
      });
    } else {
      alert("Please enter a search term.");
    }
  }

  function removeHighlights() {
    // Remove all highlights by replacing <span class="highlight"> with plain text
    document.querySelectorAll(".highlight").forEach(highlight => {
      const parent = highlight.parentNode;
      parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
      parent.normalize(); // Normalize text nodes to merge any adjacent text nodes
    });
  }
</script>

<main>
    <h2 id="welcome-message" style="line-height: 1rem;">
        Welcome, <?php echo isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : 'User'; ?>!
    </h2>

    <script>
        var name = "<?php echo isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : 'User'; ?>";
        document.getElementById('welcome-message').innerText = `Welcome, ${name}!`;
    </script>

</main> 
      <div class="dashboard">
        <div class="box" >
          <a href="courses.php#mains" >
          <div class="box1-background" ></div>
            <iframe id="mains"></iframe>
          </a>
        </div>
        <div class="box">
          <a href="courses.php#advanced">
          <div class="box2-background" ></div>
            <iframe id="advance"></iframe>
          </a>
        </div>
        <div class="box" >
          <a href="courses.php#neet">
          <div class="box3-background"></div>
            <iframe id="neet"></iframe>
          </a>
        </div>
    </div>
    
        <h3 style="text-align: center; padding-bottom: 20px;">Courses and Faculty</h3>
    <div class="coursecontainer" >
      <div class="partition" style=" border-right: 2px solid #000000;;" >
        <h2 style="color: black; text-align: left; padding-left: 30px;">Maths</h2>
        <img src="/Educational-website-Okedemi/images/math.png" alt="math" style="border-radius: 150px; float: left; margin-left: 30px;" height="70px" >
        <div style="text-align: left; padding-top: 90px; margin-left: 30px; font-size: larger; color: #000;">
          <p><b>Prof. Jitendra Karekar</b><br>
          <b>Prof. Ankit Bansal</b><br>
          <b>Prof. Nandini Gawlekar</b></p>
          <b>Syllabus:</b><br><br>
          <a href="syllabus.html#Maths" style="color: #000;"><b> Mains </b></a><br>
          <a href="syllabus.html#Maths" style="color: #000;"><b> Advanced </b></a><br>
          
        </div>
      </div>
      <div class="partition" style=" border-right: 2px solid #000000;">
        <h2 style="color: black; text-align: left; padding-left: 30px;">Biology</h2>
        <img src="/Educational-website-Okedemi/images/bio.jpg" alt="bio" style="border-radius: 250px; float: left; margin-left: 30px;" height="70px" >
        <div style="text-align: left; padding-top: 90px; margin-left: 30px; font-size: larger; color: #000;">
          <p><b>Prof. Vishal Desai</b><br>
          <b>Prof. Gaurav Rathi</b><br>
          <b>Prof. Neha Khandelwal</b></p>
          <b>Syllabus:</b><br><br>
          <a href="syllabus.html#Biology" style="color: #000;"><b>Neet </b></a>
        </div>
      </div>
      <div class="partition" style=" border-right: 2px solid #000000;">
        <h2 style="color: black; text-align: left; padding-left: 30px;">Chemistry</h2>
        <img src="/Educational-website-Okedemi/images/chem2.jpg" alt="chem" style="border-radius: 100px; float: left; margin-left: 30px;" height="70px" >
        <div style="text-align: left; padding-top: 90px; margin-left: 30px; font-size: larger; color: #000;">
          <p><b>Prof. Nitesh Agrawal</b><br>
          <b>Prof. Pragati Randad</b><br>
          <b>Prof. Lata Shah</b></p>
          <b>Syllabus:</b><br><br>
          <a href="syllabus.html#Chemistry" style="color: #000;"><b> Mains </b></a><br>
          <a href="syllabus.html#Chemistry" style="color: #000;"><b> Advanced </b></a><br>
          <a href="syllabus.html#Chemistry" style="color: #000;"><b>Neet </b></a>
        </div>
      </div>
      <div class="partition" >
         <h2 style="color: black; text-align: left; padding-left: 30px;">Physics</h2>
         <img src="/Educational-website-Okedemi/images/phy.jpg" alt="phy" style="border-radius: 150px; float: left; margin-left: 30px;" height="70px" >
         <div style="text-align: left; padding-top: 90px; margin-left: 30px; font-size: larger; color: #000;">
          <p><b>Prof. Nirmala Kasat</b><br>
          <b>Prof. Pankaj Joshi</b><br>
          <b>Prof. Vikas Gupta</b></p>
          <b>Syllabus:</b><br><br>
          <a href="syllabus.html#Physics" style="color: #000;"><b> Mains </b></a><br>
          <a href="syllabus.html#Physics" style="color: #000;"><b> Advanced </b></a><br>
          <a href="syllabus.html#Physics" style="color: #000;"><b>Neet </b></a>
        </div>
      </div>
    </div>
              
       
            
      <div class="community-content">
        <div class="container">
            <div class="left-side">
                <div class="image-container">
                    <img src="/Educational-website-Okedemi/images/confused.png" alt="Confused person thinking">
                </div>
            </div>
            <div class="line"></div>
            <div class="right-side">
                <div class="text-container">
                    <p style="font-size: x-large; color:#f9f7e8;"><b>Don't know where to start your academic journey from?</b></p>
                </div>
            </div>
        </div>
    </div>
          <div class="community-content">
            <div class="container">
              <div class="left-side">
                <div class="text-container">
                  <p style="font-size: x-large; color:#f9f7e8;"><b>50+ hours of one-to-one sessions with Personal Teacher</b></p>
              </div> 
              </div>
              <div class="line"></div>
              <div class="right-side">
                <div class="image-container" style="margin-left: 70px;">
                  <img src="/Educational-website-Okedemi/images/teacher.png" alt="Confused person thinking">
              </div>
              </div>
          </div>
          </div>
          <!-- <div class="login-form">
            <h3 style="text-align: center; color: #34693a;">Login Form</h3>
            <form id="loginForm" onsubmit="return validateForm()">
                <input type="email" id="email" name="email" placeholder="Email ID" required>
                <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <div id="errorMessage" class="error-message"></div>
            </form>
        </div>
    </main>
    <script>
      function validateForm() {
          var email = document.getElementById('email').value;
          var phone = document.getElementById('phone').value;
          var password = document.getElementById('password').value;
          var errorMessage = document.getElementById('errorMessage');
          var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

          if (!emailPattern.test(email)) {
              errorMessage.innerHTML = "Please enter a valid email address.";
              return false;
          }

          if (!/^\d{10}$/.test(phone)) {
              errorMessage.innerHTML = "Please enter a 10-digit phone number.";
              return false;
          }

          if (password.length < 8) {
              errorMessage.innerHTML = "Password must be at least 8 characters long.";
              return false;
          }

          return true;
      }
      document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();  // Prevent the default form submission

    // Get form data
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const password = document.getElementById("password").value;

    // Create a JSON object with the form data
    const formData = {
        email: email,
        phone: phone,
        password: password
    };

    // Convert the JSON object to a string
    const formDataString = JSON.stringify(formData);

    // Display an alert showing the JSON string
    alert("Storing the following data:\n" + formDataString);
    
});

  </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
