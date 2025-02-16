<?php
session_start();

if(!session_id()) session_start();
if(!session_id()) die("Fallo iniciando sesion");
if( !isset($_SESSION["admin"]) ){
	//die("Variables de sesion invalidas.");
	header('Location: login/index.php');
}

if( trim($_SESSION["admin"])=="" ){
	//die("Variables de sesion invalidas.");
	header('Location: login/index.php');
}
header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
<head>
<meta charset="utf8">
<title>Mercury Launcher</title>
<!-- This is a simple image uploader, with drag'n drop -->
<!-- Also, if you want to do more, read this: https://hacks.mozilla.org/2011/01/how-to-develop-a-html5-image-uploader/ -->
<style>
    /* body {text-align: left; padding-top: 2px;} */
    /* div { border: 0px solid black; text-align: left; line-height: 30px; width: 200px;height: 50px; margin: auto; font-size: 20px; display: inline-block;} */
    #link, p , div {display: none}
    div {display: inline-block;}
    .uploading div {display: none}
    .uploaded div {display: none}
    .uploading p {display: inline}
    .uploaded #link {display: inline}
    em {position: absolute; bottom: 0; right: 0}
</style>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
</head>
<body>
<div><button onclick="document.querySelector('input').click()">SUBIR IMAGEN</button></div>
<input style="visibility: collapse; width: 0px;" type="file" onchange="upload(this.files[0])">
<!-- So here is the magic -->
<script>
        /* Drag'n drop stuff */
        window.ondragover = function(e) {e.preventDefault()}
        window.ondrop = function(e) {e.preventDefault(); upload(e.dataTransfer.files[0]); }
        function upload(file) {
            /* Is the file an image? */
            if (!file || !file.type.match(/image.*/)) return;
            /* It is! */
            document.body.className = "uploading";
            /* Lets build a FormData object*/
            var fd = new FormData(); // I wrote about it: https://hacks.mozilla.org/2011/01/how-to-develop-a-html5-image-uploader/
            fd.append("image", file); // Append the file
            var xhr = new XMLHttpRequest(); // Create the XHR (Cross-Domain XHR FTW!!!) Thank you sooooo much imgur.com
            xhr.open("POST", "https://api.imgur.com/3/image"); // Boooom!
            xhr.onload = function() {
                // Big win!
                document.querySelector("#link").href = JSON.parse(xhr.responseText).data.link;
    			document.getElementById("url").value = JSON.parse(xhr.responseText).data.link;
    			
    			//datagrid
                $.ajax({
                    url: 'datagrid.php',
                    type: 'POST',
                    data: $('#formulario').serialize(),
                    success: function (result) {
                        //md.close();
    					//alert('Imagen guardada!');
                    }
                });
    			//datagrid
    			
                document.body.className = "uploaded";
            }
            
            xhr.setRequestHeader('Authorization', 'Client-ID 142addc4fb18138'); // Get your own key http://api.imgur.com/
    		//https://api.imgur.com/oauth2/addclient
            
            // Ok, I don't handle the errors. An exercise for the reader.
            /* And now, we send the formdata */
            xhr.send(fd);
            //alert (document.getElementById("url").value);
        }
</script>
<!-- Bla bla bla stuff ... -->
<p>Subiendo a la nube...</p>
<a id="link">imagen cargada!!!</a>

<form method="post" id="formulario" name="formulario">
<input type="hidden" name="url" id="url"/>
</form>
</body>
</html>