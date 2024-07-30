function gerarSenhaSegura(tamanhoMinimo, incluirLetras, incluirNumeros, incluirCaracteresEspeciais) {
    let caracteres = "";
    let senha = "";

    if (incluirLetras) {
        caracteres += "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }
    if (incluirNumeros) {
        caracteres += "0123456789";
    }
    if (incluirCaracteresEspeciais) {
        caracteres += "!@#$%^&*()_+-=[]{}|;:,.<>?";
    }

    for (let i = 0; i < tamanhoMinimo; i++) {
        senha += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return senha;
}