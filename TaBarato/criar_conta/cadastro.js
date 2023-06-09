function formatarCNPJ(cnpj){
    cnpj = cnpj.replace(/\D/g,"");
    cnpj = cnpj.replace(/^(\d{2})(\d)/,"$1.$2");
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3");
    cnpj = cnpj.replace(/\.(\d{3})(\d)/,".$1/$2");
    cnpj = cnpj.replace(/(\d{4})(\d)/,"$1-$2");
    return cnpj;
}

function mascaraCNPJ(event){
    var cnpj = event.target.value;
    event.target.value = formatarCNPJ(cnpj);
}