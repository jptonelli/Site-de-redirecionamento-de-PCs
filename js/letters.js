const frase = "Já possui uma conta?";
const divTexto = document.getElementById('letter');

let index = 0;
function mostrarProximaLetra() {
  if (index < frase.length) {
    divTexto.textContent += frase[index];
    index++;
    setTimeout(mostrarProximaLetra, 50); // ajuste o intervalo de tempo aqui
  }
}
mostrarProximaLetra();

const frase2 = "Não possui uma conta?";
const divTexto2 = document.getElementById('letter2');

let index2 = 0;
function mostrarProximaLetra2() {
  if (index2 < frase2.length) {
    divTexto2.textContent += frase2[index2];
    index2++;
    setTimeout(mostrarProximaLetra2, 50); // ajuste o intervalo de tempo aqui
  }
}
mostrarProximaLetra2();
