<!DOCTYPE html>
<html>
<head>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8cyo4t3iin326cmnzyjf1mmd3yx812c960r5jlvefshagxsn"></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
  <title>Ajout de recette</title>
</head>

<body>

  <form method="post">
  	<input type="text" name="titre">
  	<textarea name="description"></textarea>
    <textarea id="mytextarea" name="contenu">Hello, World!</textarea>
  </form>
</body>
</html>
