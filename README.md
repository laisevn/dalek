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

### Ideia de Arquitetura
![](https://github.com/laisevn/dalek/blob/master/Payment_Diagram.png)


### Melhorias
[Proposta de Melhorias no Notion e análise de Tecnologias](https://www.notion.so/laise/Picpay-Teste-API-Fluxo-Pagamento-85590975cf6f4915b1cd485893445de5)
