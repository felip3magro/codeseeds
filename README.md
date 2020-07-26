# CodeSeed::CPF_CNPJ

Cpf e Cnpj são implementações de DocumentInterface.

## Novo CPF

```php
$cpf = DocumentFactory::create('informe o cpf');
```

## Novo CNPJ

```php
$cnpj = DocumentFactory::create('informe o cnpj');
```

## DocumentInterface

> Retorna apenas os dígitos do documento

number(): string

> Retorna o documento formatado
formatted(): string
