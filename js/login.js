var input = document.getElementById('#inpSenha input');
var img = document.querySelectorAll('.visualizaSenha');

img.addEventListener('click', function () {
  input.type = input.type == 'text' ? 'password' : 'text';
});