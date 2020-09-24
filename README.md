<div align="center">
	<h1> REST Payment PHP </h1>
</div>

Esta api tem como proposta testar uma arquitetura desacoplada usando os conceitos de Dependency Injection, SOLID e DRY.

Por este motivo foi usado o mínimo de framework, afim de manter uma estrutura flexível e que facilmente pode adaptar as interfaces de inplementações que conversam com  a camada de domínio(Negócio). 

Esta estrutura não parece tão produtiva noinício quanto usar uma framework como o Laravel que prototipa rapidamente, porém é vantajosa a medida que o projeto avança. O ganho e produtividade é exponencial. Sem falar que dentro de um projeto de equipe, tendo progamadores juniores ou seniors é mais fácil entender a implementação e manter um padrão. 



### Dependências
<div>

  * <table border="0" cellpadding="4">
		<tr>
			<td>
				<strong>Languagem:</strong>
			</td>
			<td>
				PHP
			</td>
		</tr>
		<tr>
			<td><strong>
				Bibliotecas:
			</strong></td>
			<td>
				<ul>
					<li>
						PHPSpec - Teste
					</li>
					<li>
						Phinx - ORM 
					</li>
					<li>
						Slim - Middleware - PSR-7 - HTTP Router
					</li>
					<li>
						PHP-DI - Dependency Injection Containers
					</li>
					<li>
						Medoo - Query Abstraction
					</li>
				</ul>
			</td>
		</tr>
		<tr>
	</table>

</div>

### Instalação


  1. Clone ou baixe este repositório
  3. Se assegure de ter o composer instalado em sua máquina e o docker-compose 
  4. Use os comendos para subir o server local: 
  
  ```bash
$ docker-compose up -d 
```
  ```bash
$ docker-compose down -v
```

### Testando a aplicação

## Home API
## `GET /`
Gets a info about API.
===
* Status: `200`
```
{"api":"payment-api","version":"0.1 Beta","timestamp":1600966072}
```
## `POST /signup`
Create a new user payment.
* `?name=Relâmpago Marquinhos` // The name of the customer or merchant
* `?email=rapidinho@example.com` // Email is unique 
* `?cpf=cpf` // If for customer or merchant 
* `?email=123456789` // Is only for merchant
* `?password=123password` // Is encrypted
* `?confirm_password=123password` // Is encrypted
===
* Status: `200`
```
Successfulcreated: {
  "body": {
    "name": "Relampago Marquinhos",
    "email": "rapidinho@gmail.com",
    "cpf": "1235123232323",
    "cnpj": "1234533323233",
    "password": "123",
    "password_confirmation": "123"
  }
}
```
## `POST /transaction`
Create a new payment.
* `?value=100.00` //The only information exposed to aplication
* `?payer=4` // Secret key for user only see the information about your account
* `?payee=5` // Secret key for user only see the information about your account
===
* Status: `200`
```

```

## `GET /account`
Get account info.
* `?uui=Account UUID` //The only information exposed to aplication
* `?secretKey=` // Secret key for user only see the information about your account
===
* Status: `200`
```
Successfulcreated: {
  "body": {
    "name": "Relampago Marquinhos",
    "balance": "R$ 1.2000,00",
    "extract": "1235123232323",
  }
}
```


### Ideia de Arquitetura
![](https://github.com/laisevn/dalek/blob/master/Payment_Diagram.png)


### Melhorias
[Proposta de Melhorias no Notion e análise de Tecnologias](https://www.notion.so/laise/Picpay-Teste-API-Fluxo-Pagamento-85590975cf6f4915b1cd485893445de5)
