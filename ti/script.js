const senha = 1234;
function validaSenha(){
    let form = prompt('Digite a senha: ');
    if(form == senha){
        window.alert('senha correta');
        localStorage.setItem("entrou", 1);
    }else{
        window.addEventListener('load', invisivel);
        window.alert('senha incorreta');
        window.alert('Tirando vc da reta, intruso');
        window.location.href='http://192.168.15.7/consulta/';
        localStorage.setItem('entrou', 0);
    }
}
function verificaLogin(){
    let entrou = localStorage.getItem("entrou");
    if(entrou == 1){
        
    }else{
        validaSenha();
    }
}
verificaLogin();
//AJAX
