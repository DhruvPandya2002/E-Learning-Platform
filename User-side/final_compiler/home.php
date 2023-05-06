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
    /* Styling for the dropdown button */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      z-index: 1;
    }

    .dropdown.show .dropdown-menu {
      display: block;
    }
  </style>
</head>

<body style="-webkit-tap-highlight-color: transparent; font-family: 'Rubik', sans-serif;" class="bg-gray-950">
  <div class="w-full bg-gray-900 p-3">
    <nav>
      <ul class="flex items-center">
        <li><a href="../index.php"><img src="../Logo/Circle_1980x1980.png" alt="" class="w-12"></a></li>
        <li>
          <a href="../index.php"><h2 class="text-3xl text-white ml-3 font-medium">DevTown IDE</h2></a>
        </li>
        <li class="ml-[330px] flex items-center">
          <div class="flex mr-4 items-center">
            <input type="text" name="filename" id="filename" class="mr-2 rounded-lg bg-transparent border-2 border-gray-100 px-2 text-lg py-1 text-[#759DEA] font-medium focus:outline-none" value="Untitled Document">
            <abbr title="Edit Filename"><img src="../Logo/edit.svg" alt="" class="w-5 h-5 cursor-pointer" id="edit_image"></abbr>
          </div>
          <a href="home.php" target="_blank"><button class="text-lg font-medium px-3 flex items-center text-gray-50 border-x-2 border-white"><img src="../Logo/file-plus.svg" alt="" class="w-6 mr-2">New</button></a>
          <input type="file" id="fileInput" style="display:none">
          <button type="file" class="text-lg font-medium px-3 flex items-center text-gray-50 border-r-2 border-white" onclick="openFile()"><img src="../Logo/upload-to-cloud.svg" alt="" class="w-7 mr-2">Upload</button>
          <button class="text-lg font-medium px-3 flex items-center text-gray-50 border-r-2 border-white" id="downloadBtn"><img src="../Logo/download_new.svg" alt="" class="w-5 mr-2">Download</button>
          <!-- </div>
          </div> -->
        </li>
        <form action="compile.php" id="form" name="f2" method="POST" class="flex items-center">
          <li class="ml-3">
            <div class="relative flex items-center">
              <select name="language" id="language" class="w-36 py-2 px-2 rounded-lg bg-[#232b39] text-white text-lg outline-none appearance-none font-medium">
                <option value="c" class="bg-white text-gray-900 font-medium" selected>C Language</option>
                <option value="cpp" class="bg-white text-gray-900 font-medium">C++</option>
                <option value="python2.7" class="bg-white text-gray-900 font-medium">Python</option>
              </select>
              <img src="../Logo/chevron-down.svg" alt="" class="w-8 h-8 absolute left-28">
            </div>
          </li>
          <li><abbr title="Press F2"><button type="submit" id="st" class="ml-3 text-white bg-green-500 px-3 py-2 text-[18px] font-medium rounded-lg flex items-center"><img src="../Logo/play-button.svg" alt="" class="w-6 mr-1">RUN</button></abbr></li>
      </ul>
    </nav>
  </div>
  <div class="flex">
    <div class="m-4"><textarea class="bg-zinc-900 border-2 border-white h-[86vh] w-[975px] text-gray-100 text-xl p-4 placeholder:text-[#759DEA] rounded-lg" name="code" id="code" placeholder="// Write Your Code"></textarea></div>
    <div class="flex flex-col my-4">
      <!-- <label for="in">Enter Your Input</label> -->
      <textarea class="bg-zinc-900 border-2 border-white h-[25vh] w-[500px] text-gray-100 text-xl p-4 placeholder:text-[#759DEA] rounded-lg" name="input" placeholder="// Write Your Inputs"></textarea><br>
      <!-- <label for="out">Output</label> -->
      <textarea id='div' class="bg-zinc-900 border-2 border-white h-[58vh] w-[500px] text-gray-100 text-xl p-4 placeholder:text-[#759DEA] rounded-lg" name="output" placeholder="// Your Output"></textarea>
    </div>
  </div>
  </form>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#st").click(function() {
        $("#div").html("Loading ......");
      });
    });
  </script>

  <script>
    //wait for page load to initialize script
    $(document).ready(function() {
      //listen for form submission
      $('form').on('submit', function(e) {
        //prevent form from submitting and leaving page
        e.preventDefault();

        // AJAX 
        $.ajax({
          type: "POST", //type of submit
          cache: false, //important or else you might get wrong data returned to you
          url: "compile.php", //destination
          datatype: "html", //expected data format from process.php
          data: $('form').serialize(), //target your form's data and serialize for a POST
          success: function(result) { // data is the var which holds the output of your process.php

            // locate the div with #result and fill it with returned data from process.php
            $('#div').html(result);
          }
        });
      });
    });

    //  Upload file for browsing
    function openFile() {
      const languageDropdown = document.getElementById("language");
      let fileExtension;
      // Create a file input element and trigger a click event on it
      const fileInput = document.createElement("input");
      fileInput.type = "file";
      fileInput.style.display = "none";
      fileInput.onchange = function() {
        // When the user selects a file, read its contents and display them in the textarea
        const file = fileInput.files[0];
        const reader = new FileReader();
        reader.onload = function() {
          document.getElementById("code").value = reader.result;
        };
        reader.readAsText(file);
        // Get the file name and extension
        const fileName = file.name;
        const fileExtension = fileName.split(".").pop();

        // Set the selected value of the language dropdown based on the file extension
        if (fileExtension === "c") {
          languageDropdown.value = "c";
        } else if (fileExtension === "cpp") {
          languageDropdown.value = "cpp";
        } else if (fileExtension === "py") {
          languageDropdown.value = "python2.7";
        }
      };
      document.body.appendChild(fileInput);
      fileInput.click();
    }

    // JavaScript code for generating download link
    const downloadBtn = document.getElementById("downloadBtn");
    const textarea = document.getElementById("code");
    downloadBtn.addEventListener("click", () => {
      const input_filename = document.getElementById("filename").value;
      var fileExtension = document.getElementById("language").value;
      if (fileExtension == "c") {
        fileExtension = ".c";
      } else if (fileExtension == "cpp") {
        fileExtension = ".cpp";
      } else if (fileExtension == "python2.7") {
        fileExtension = ".py";
      }
      const text = textarea.value;
      const filename = input_filename + fileExtension; // Change the extension to your custom extension
      const blob = new Blob([text], {
        type: "text/plain"
      });
      const link = document.createElement("a");
      link.href = URL.createObjectURL(blob);
      link.download = filename;
      link.click();
    });

    $('#edit_image').click(function() {
      $('#filename').val('').focus();
    });

    // RUN button click  by F5 Keyboard button
    // select the button element
    const button = document.getElementById('st');

    // define a function to simulate F2 key press and button click
    function simulateF2KeyPressAndButtonClick() {
      const event = new KeyboardEvent('keydown', {
        key: 'F2'
      });
      document.dispatchEvent(event);
      button.click();
    }

    // add event listener to the window to simulate both events on F2 key press
    window.addEventListener('keydown', (event) => {
      if (event.key === 'F2') {
        simulateF2KeyPressAndButtonClick();
      }
    });
  </script>

</body>

</html>