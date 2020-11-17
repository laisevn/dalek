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



### Ideia de Arquitetura
![](https://github.com/laisevn/dalek/blob/master/Payment_Diagram.png)


### Melhorias
Proposta de Melhorias no Notion e análise de Tecnologias

## **Escolhas de tecnologias**

### Crockroach DB

**Porque?** 

- **Argumentação detalhada**

    Imaginando que este fluxo de transferência entre lojistas e usuários seja uma versão MVP  de um fluxo complexo de pagamentos e transferências, tenho que me preocupar com algumas questões :  segurança e  escalabilidade. Em um banco noSQL, como o MongoDB, tenho  a vantagem de escalabilidade horizontal e performance, porém não tenho a segurança de um banco de dados transacional de manter a integridade de scheemas e indexes. Mesmo com a implementação de bloqueios específicos, não pode-se afirmar que o MongoDB trabalha com isolamento. 

    O PostgresDB é uma opção muito poderosa e aparentemente segura, com todas as vantagens de de um banco relacional, segundo os princípios ACID. Porém só aparentemente. Nenhuma tecnologia é uma bala de prata e os bancos de dados relacionais mais populares, como o Postgres, permitem a execução de transações com um nível mais fraco de isolamento, priorizando desempenho ao custo de segurança por padrão, o que expõe os programas a uma série de anomalias relacionadas a operações concorrentes. O ônus fica com os programadores em “setar” sua transação sensível para o nível mais alto de isolamento, e ele talvez falhe em fazê-lo. O CockroachDB fornece o modulo SERIALIZABLE com isolamento forte por padrão para garantir a aplicação sempre veja os dados que espera.

     

    REFERENCIA: *ACIDRain: Concurrency-Related Attacks on Database-Backed Web Applications*;  **[http://www.bailis.org/papers/acidrain-sigmod2017.pdf](http://www.bailis.org/papers/acidrain-sigmod2017.pdf)

**Prós:** 

- Fornece escalabilidade sem sacrificar a funcionalidade SQL.
- Uso de JSONB para armazenar metadados.
- Suporte a JSON 2.0.
- Compatibilidade e suporte com PostgresSQL.
- Bom balanço de performance x segurança
- Suporte para linguagens PHP, Go, Rust, Ruby, Javascript, Java

**Contras:**  

- Não é  indicado para OLAP
- Latência de um sistema distribuído. Apesar de ser impressionante os números e comparações de benchmark para o CrockroachDB, ainda não atinge os níveis de um sistema em uma única máquina.
- Curva de aprendizagem  ( Principalmente para quem não tem nenhuma noção de banco de dados NoSQL, sistemas distribuídos  e API )
- Documentação só em inglês

### **Overview:**

- **Comparação de features MongoDB x PostgreSQL x CockroachDB**

    [feature's ](https://www.notion.so/1b4ee3d46cf6471fb89653bbd64a5549)
