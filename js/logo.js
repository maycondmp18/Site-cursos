// convém estar no onload da janela
window.onload = function()
{

  // primeiro tens de sacar a dimensão da janela
  // neste caso a área visível do browser
  var largura = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

  // depois é brincar com if's e colocar o banner que queiras:

  if(largura <= 991)
  {
    var img = document.querySelector('img').src = "img/logo3.png";
  } else {
    var img = document.querySelector('img').src = "img/logo.png";
  }
} // fim do window.onload