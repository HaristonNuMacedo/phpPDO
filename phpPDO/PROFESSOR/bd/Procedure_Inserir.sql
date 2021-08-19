    delimiter $$
    drop procedure if existes insCadastroPessoa

    create procedure insCadastroPessoa
    (nomeP varchar(100), dtNascP date, loginP varchar(100), senhaP varchar(100),
        perfilP varchar(50), emailP varchar(100), cpfP varchar(20),
        cepP varchar(10), logradouroP varchar(100), complementoP varchar(100), 
        bairroP varchar(50), cidadeP varchar(50), ufP(2), out msg text);
    
    begin

        declare idx int(11) default -1;
        declare idp int(11) default 0;

        select idPessoa into idp from pessoa where cpf = cpfP;
        if(idp > 0) then
            set msg = "Usuário já Cadastrado anteriormente!"
        else
            select idEndereco into idx from endereco where logradouro = logradouroP
            and complemento = complementoP and cep = cepP;
            if(idx = -1) then
                insert into endereco values (null, cepP, logradouroP, complementoP, bairroP,
                    cidadeP, ufP);
                select idEndereco into idx from endereco where logradouro = logradouroP
                    and complemento = complementoP and cep = cepP;
            end if

            insert into pessoa values (null, nomeP, dtNascP, loginP, md5(senhaP), perfilP,
                emailP, cpfP, idx);
            set msg = "Dados galados com sucesso!!";
            select msg;
            select * from pessoa inner join endereco on fkEndereco = idEndereco;

    end if
    select msg;
    end $$
    delimiter ;

    call insCadastroPessoa ("HaristinNuMacedo", "2001-01-02", "testiado", "12345", "cliente",
        "joãozinhoteste2001@gmail.com", "068.455.031-84", 
        "71258-385", "quadra 04 conjunto 07", "casa 11", "Setor Norte(Estrutural)", "Brasília", "DF", out msg);