<?php
/**
 * Description of ContaBanco
 *
 * @author thiagodemas
 */
class ContaBanco {
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
    public function __construct(){
        $this->saldo = 0;
        $this->status = false;
        
    }
            function getNumConta() {
        return $this->numConta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDono() {
        return $this->dono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getStatus() {
        return $this->status;
    }

    function setNumConta($numConta) {
        $this->numConta = $numConta;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDono($dono) {
        $this->dono = $dono;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function setStatus($status) {
        $this->status = $status;
    }
        
    public function abrirConta($t){
        $this->setTipo($t);
        $this->setStatus(TRUE);
        if ($t == "CC"){
            $this->setSaldo(50);
        }  else {
            $this->setSaldo(150);
        }
        
    }
    public function fecharConta(){
        if ($this->getSaldo() > 0){
            echo '<p>Conta com dinheiro</p>';
        }elseif ($this->getSaldo() < 0) {
            echo 'Conta em debito';
        }  else {
            $this->setStatus(FALSE);
        }
        
    }
    public function depositar($v){
        if($this->getStatus(TRUE)){
            $this->setSaldo($this->getSaldo()+$v);
        }else{
            echo '<p>Impossivel Depositar!</p>';
        }
    }
    public function sacar($v){
        if($this->getStatus(TRUE)){
            if ($this->getSaldo()> $v) {
                $this->setSaldo($this->getSaldo()- $v);
            }  else {
                echo 'Saldo Insuficiente!';
            }
        }  else {
            echo 'Impossivel Sacar, sua conta esta desativada!';
        }
    }
    public function pagarMensal(){
        if ($this->getTipo() == "CC") {
            $v = 12;
        }elseif ($this->getTipo() == "CP") {
            $v = 20;
        }
        
        if ($this->getStatus(true)){
            if($this->getSaldo() > $v){
                $this->setSaldo($this->getSaldo() - $v);
            }  else {
                echo 'Saldo Insuficiente!';
            }
        }  else {
            echo 'Impossivel pagar, conta desativada!';
        }
    }

}
