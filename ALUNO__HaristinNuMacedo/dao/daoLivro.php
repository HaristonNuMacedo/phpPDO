<?php
include_once 'C:/xampp/htdocs/phpPDO/ALUNO__HaristinNuMacedo/bd/conectaCasa.php';
include_once 'C:/xampp/htdocs/phpPDO/ALUNO__HaristinNuMacedo/model/livro.php';
include_once 'C:/xampp/htdocs/phpPDO/ALUNO__HaristinNuMacedo/model/Mensagem.php';

class daoLivro
{
    public function inserir(Livro $livro)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $titulo = $livro->getTitulo();
            $autor = $livro->getAutor();
            $editora = $livro->getEditora();
            $qtdEstoque = $livro->getQtdEstoque();
            try {
                $stmt = $conecta->prepare("insert into livro values "
                        . "(null,?,?,?,?)");
                $stmt->bindParam(1, $titulo);
                $stmt->bindParam(2, $autor);
                $stmt->bindParam(3, $editora);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }

        } else {
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    public function listarLivrosDAO(){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try{
                $rs = $conecta->query("select * from livro");
                $lista = array();
                $a = 0;
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $livro = new Livro();
                            $livro->setIdLivro($linha->idlivro);
                            $livro->setTitulo($linha->titulo);
                            $livro->setAutor($linha->autor);
                            $livro->setEditora($linha->editoria);
                            $livro->setQtdEstoque($linha->qtdEstoque);
                            $lista[$a] = $livro;
                            $a++;
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg = 'Lista Feita com primazia.';
                return $msg + $ex;
            }  
            $conn = null;
            return $lista;
        }
    
    }

    public function excluirLivroDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if($conecta){
            try {
                $stmt = $conecta->prepare("delete from livro "
                        . "where id = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                        . "Dados excluídos com sucesso.</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>"); 
        }
        $conn = null;
        return $msg;

    }


    public function pesquisarLivroDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $livro = new Livro();
        if($conecta){
            try {
                $rs = $conecta->prepare("select * from livro where "
                        . "id = ?");
                $rs->bindParam(1, $id);
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $livro->setIdLivro($linha->idlivro);
                            $livro->setTitulo($linha->titulo);
                            $livro->setAutor($linha->autor);
                            $livro->setEditora($linha->editoria);
                            $livro->setQtdEstoque($linha->qtdEstoque);
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg = 'Pesquisa Feita com primazia.';
                return $msg + $ex;
            }  
            $conn = null;
            
        }else{
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
            URL='http://localhost/phpPDO/ALUNO__HaristinNuMacedo/cadastroLivro.php\">";
        }

        return $livro;
    }

    //método para atualizar dados da tabela livro
    public function atualizarLivroDAO(Livro $livro){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $id = $livro->getIdLivro();
            $titulo = $livro->getTitulo();
            $autor = $livro->getAutor();
            $editora = $livro->getEditora();
            $qtdEstoque = $livro->getQtdEstoque();
            try {
                $stmt = $conecta->prepare("update livro set titulo = ?, autor = ?, "
                        . "editoria = ?, qtdEstoque = ? where idlivro = ?");
                $stmt->bindParam(1, $titulo);
                $stmt->bindParam(2, $autor);
                $stmt->bindParam(3, $editora);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->bindParam(5, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Atualizados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }

        } else {
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
}
