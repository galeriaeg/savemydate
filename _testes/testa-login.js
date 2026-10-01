<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Minha página de teste</title>
</head>
<body>
<script>
describe('Teste de Login', () => {
	it('Deve fazer login com sucesso com credenciais válidas', () => {
		// 1. Visita a página de login
		cy.visit('https://www.savemydate.app.br/home'); 
		
		// 2. Preenche o campo de e-mail
		// Use o seletor mais específico que você puder.
		// Pode ser um ID, uma classe, ou um "data-testid".
		cy.get('#email').type('seu_email@teste.com');
		
		// 3. Preenche o campo de senha
		cy.get('#password').type('sua_senha_secreta');
		
		// 4. Clica no botão de login
		cy.get('#btnLogin').click();
		
		// 5. Verifica se o login foi bem-sucedido
		// A verificação depende de como seu app se comporta após o login.
		// Opção A: Verifica se a URL mudou para a página inicial
		cy.url().should('include', '/dashboard');
		
		// Opção B: Verifica se um elemento da página inicial está visível
		cy.get('.welcome-message').should('be.visible');
		
		// Opção C: Verifica se um texto específico aparece na página
		cy.contains('Bem-vindo à sua Dashboard').should('be.visible');
	});
	
	// --- Opcional: Teste de login com falha ---
	it('Deve exibir uma mensagem de erro com credenciais inválidas', () => {
		cy.visit('https://www.savemydate.app.br/login'); 
		cy.get('#email').type('email_invalido@teste.com');
		cy.get('#password').type('senha_incorreta');
		cy.get('#login-button').click();
		
		// Verifica se a mensagem de erro está visível
		cy.get('.error-message').should('be.visible');
		cy.contains('Credenciais inválidas.').should('be.visible');
	});
});

</script>
<p>Essa é minha página</p>
</body>
</html>