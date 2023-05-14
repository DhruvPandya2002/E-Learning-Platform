<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="../Logo/Circle_1980x1980.png" />
    <title>DevTown Web IDE</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ace-builds@1.18.0/css/ace.min.css">
    <script src="https://kit.fontawesome.com/eca7b36c3d.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="w-full bg-gray-900 p-3">
    <nav>
      <ul class="flex items-center">
        <li><a href="../index.php"><img src="../Logo/Circle_1980x1980.png" alt="" class="w-12"></a></li>
        <li>
          <a href="../index.php"><h2 class="text-3xl text-white ml-3 font-medium">DevTown IDE</h2></a>
        </li>
      </ul> 
    </nav>
  </div>
    <div class="container">
        <div class="left">
            <label><i class="fa-brands fa-html5"></i> HTML</label>
            <textarea id="html-code" onkeyup="run()"></textarea>

            <label><i class="fa-brands fa-css3-alt"></i> CSS</label>
            <textarea id="css-code" onkeyup="run()"></textarea>

            <label><i class="fa-brands fa-square-js"></i> JavaScript</label>
            <textarea id="js-code" onkeyup="run()"></textarea>
        </div>
        <div class="right">
            <label><i class="fa-solid fa-play"></i> output</label>
            <iframe id="output"></iframe>
        </div>
    </div>
    <script>

        function run(){
            let htmlCode = document.getElementById("html-code").value;
            let cssCode = document.getElementById("css-code").value;
            let jsCode = document.getElementById("js-code").value;
            let output = document.getElementById("output");
            output.contentDocument.body.innerHTML = htmlCode + "<style>" + cssCode + "</style>";
            output.contentWindow.eval(jsCode);
        }
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ace-builds@1.18.0/src-min-noconflict/ace.min.js"></script>
    <script src="lib/ace.js"></script>
    <!-- <script src="js/ide.js"></script> -->
    <!-- <script src="lib/ace.js"></script>
    <script src="lib/theme-monokai.js"></script> -->
    <!-- <script>
        var html_code = document.getElementById('html-code');
        var editor = ace.edit(html_code);
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/javascript");
    </script> -->
</body>
</html>