<h3>Fornecedor</h3>

@php
    /*
        {{}}    | imprime variável na view (blade)
        <?= ?>  | imprime variável na view (PHP)
    */ 
@endphp

@isset($fornecedores)
    <!-- isset retorna false se a VARIÁVEL não estiver definida ou se o valor dela for NULL-->
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Não preenchido. ' }}
@endisset