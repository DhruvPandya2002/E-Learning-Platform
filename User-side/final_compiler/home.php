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
        <li><img src="../Logo/Circle_1980x1980.png" alt="" class="w-12"></li>
        <li>
          <h2 class="text-3xl text-white ml-3 font-medium">DevTown IDE</h2>
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
              <!-- <div class="dropdown_language">
              <input type="hidden" id="language_input" value="0">
              <button id="language_display" class="bg-[#232b39] w-36 px-2 py-2 rounded-lg flex text-white items-center text-lg font-medium">
                <p id="destination-paragraph">
                  C language</p><img src="../Logo/chevron-down.svg" alt="" class="w-7">
              </button>
            </div>
            <div class="menu_language absolute rounded-lg bg-white" style="display: none;">
              <button id="clan">
                <h2 id="C_language" class="hover:bg-gray-200 cursor-pointer bg-white text-lg font-medium px-2 rounded-t-lg flex items-center">C language</h2>
              </button>
              <button id="cpp">
                <h2 id="C++" class="hover:bg-gray-200 cursor-pointer bg-white text-lg font-medium px-2">C++</h2>
              </button>
              <br>
              <button id="pythonbtn">
                <h2 id="Python" class="hover:bg-gray-200 cursor-pointer bg-white text-lg font-medium px-2 rounded-b-lg">Python</h2>
              </button>
            </div> -->
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
      <!-- </form> -->
    </nav>
  </div>
  <!-- <form action="compile.php" id="form" name="f2" method="POST"> -->
  <!-- <label for="lang">Choose Language</label> -->
  <!-- <select class="form-control" name="language">
            <option value="c">C</option>
            <option value="cpp">C++</option>
            <option value="cpp11">C++11</option> -->
  <!-- <option value="java">Java</option>
            <option value="python2.7">python</option>



          </select><br><br> -->

  <!-- <label for="ta" class="text-gray-100">Write Your Code</label> -->
  <div class="flex">
    <div class="m-4"><textarea class="bg-zinc-900 border-2 border-white h-[86vh] w-[975px] text-gray-100 text-xl p-4 placeholder:text-[#759DEA] rounded-lg" name="code" id="code" placeholder="// Write Your Code"></textarea></div>
    <div class="flex flex-col my-4">
      <!-- <label for="in">Enter Your Input</label> -->
      <textarea class="bg-zinc-900 border-2 border-white h-[25vh] w-[500px] text-gray-100 text-xl p-4 placeholder:text-[#759DEA] rounded-lg" name="input" placeholder="// Write Your Inputs"></textarea><br>
      <!-- <label for="out">Output</label> -->
      <textarea id='div' class="bg-zinc-900 border-2 border-white h-[58vh] w-[500px] text-gray-100 text-xl p-4 placeholder:text-[#759DEA] rounded-lg" name="output" placeholder="// Your Output"></textarea>
    </div>
  </div>

  <!-- <input type="submit" id="st" class="btn btn-success" value="Run Code"><br><br><br> -->


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

  <!--<script>
"use strict";
function submitForm(oFormElement)
{
  var xhr = new XMLHttpRequest();
  var display=document.getElementById('div');
  xhr.onload = function(){ display.innerHTML=xhr.responseText; }
  xhr.open (oFormElement.method, oFormElement.action, true);
  xhr.send (new FormData (oFormElement));
  return false;
}
</script>-->
  <!--<label for="out">Output</label>
<textarea id='div' class="form-control" name="output" rows="10" cols="50"></textarea><br><br>-->
  <!-- </div>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
  </div> -->
  <br><br><br>
  <script>
    // JavaScript code to toggle the dropdown menu
    function toggleDropdown() {
      const dropdown = document.querySelector('.dropdown');
      dropdown.classList.toggle('show');
    }

    $('.dropdown_language').click(function() {
      var language_flag = $('#language_input').val();
      if (language_flag == 0) {
        $('.menu_language').slideDown().css("display", "block");
        language_flag = $('#language_input').val("1");
      } else {
        $('.menu_language').slideUp().css("display", "none");
        language_flag = $('#language_input').val("0");
      }
    });

    // var cpp = document.getElementById("c++");
    // var c = document.getElementById("C_language");
    // var python = document.getElementById("Python");
    // var cbtn = document.getElementById("clan");
    // var cpp = document.getElementById("cpp");
    // var pythonbtn = document.getElementById("pythonbtn");

    // // destination para variabel 
    // var destinationParagraph = document.getElementById('destination-paragraph');

    // // c language
    // cbtn.addEventListener('click', function() {
    //   destinationParagraph.textContent = c.textContent;
    //   $('.menu_language').slideUp().css("display", "none");
    // });

    // // cpp 
    // cpp.addEventListener('click', function() {
    //   destinationParagraph.textContent = cpp.textContent;
    //   $('.menu_language').slideUp().css("display", "none");
    // });

    // // python
    // pythonbtn.addEventListener('click', function() {
    //   destinationParagraph.textContent = python.textContent;
    //   $('.menu_language').slideUp().css("display", "none");
    // });
  </script>
</body>

</html>