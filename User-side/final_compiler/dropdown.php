<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DevTown Programming Compiler</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/DevTown_Img.png">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        #language-dropdown {
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }

        #language-btn:focus+#language-dropdown,
        #language-dropdown:hover {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-gray-950">
    <!-- <div class="relative inline-block">
        <button id="language-btn" class="bg-gray-800 w-36 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded shadow flex items-center">C Language<img src="../Logo/chevron-down.svg" alt="" class="w-8">
        </button>
        <div id="language-dropdown" class="opacity-0 invisible w-40 bg-gray-100 text-gray-800 rounded shadow-md py-1 absolute">
            <button class="w-full text-left px-3 py-2 hover:bg-gray-200 focus:outline-none">C Language</button>
            <button class="w-full text-left px-3 py-2 hover:bg-gray-200 focus:outline-none">C++</button>
            <button class="w-full text-left px-3 py-2 hover:bg-gray-200 focus:outline-none">Python</button>
        </div>
    </div>
    <script>
        const languageBtn = document.getElementById("language-btn");
const languageDropdown = document.getElementById("language-dropdown");
const languageOptions = languageDropdown.getElementsByTagName("button");

// Add event listener to dropdown options
for (let i = 0; i < languageOptions.length; i++) {
  languageOptions[i].addEventListener("click", function() {
    const selectedLanguage = this.textContent;
    languageBtn.textContent = selectedLanguage;
    console.log(`Selected language: ${selectedLanguage}`);
  });
}

// Close dropdown menu when user clicks outside of it
window.addEventListener("click", function(event) {
  if (!event.target.matches("#language-btn") && !event.target.matches("#language-dropdown *")) {
    languageDropdown.style.opacity = 0;
    languageDropdown.style.visibility = "hidden";
  }
});

// Open dropdown menu when user clicks on button
languageBtn.addEventListener("click", function() {
  if (languageDropdown.style.opacity == 0) {
    languageDropdown.style.opacity = 1;
    languageDropdown.style.visibility = "visible";
  } else {
    languageDropdown.style.opacity = 0;
    languageDropdown.style.visibility = "hidden";
  }
});
    </script> -->
    <select class="form-control w-28" name="language">
            <option value="c">C</option>
            <option value="cpp">C++</option>
            <!-- <option value="cpp11">C++11</option> -->
            <!-- <option value="java">Java</option> -->
            <option value="python2.7">python</option>
    </select><br><br>
</body>
</html>