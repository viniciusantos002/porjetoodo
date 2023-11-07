<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Médica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4caf50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            padding: 20px;
        }

        .contact-section {
            margin-top: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Clínica Médica</h1>
    </header>

    <nav>
        <a href="#home">Home</a>
        <a href="#services">Serviços</a>
        <a href="#about">Sobre</a>
        <a href="#contact">Contato</a>
    </nav>

    <div class="content">
        <h2 id="home">Bem-vindo à Clínica Médica!</h2>
        <p>Sua saúde é nossa prioridade. Oferecemos serviços médicos de alta qualidade para cuidar de você e de sua família.</p>

        <h2 id="services">Nossos Serviços</h2>
        <ul>
            <li>Consulta Médica</li>
            <li>Exames Laboratoriais</li>
            <li>Tratamentos Especializados</li>
            <li>Prevenção e Educação em Saúde</li>
        </ul>

        <h2 id="about">Sobre Nós</h2>
        <p>Somos uma equipe dedicada de profissionais de saúde comprometidos em fornecer o melhor atendimento médico para nossos pacientes.</p>

        <div class="contact-section" id="contact">
            <h2>Entre em Contato</h2>
            <p>Estamos aqui para ajudar. Entre em contato conosco para agendar uma consulta ou fazer perguntas sobre nossos serviços.</p>
            <p>Telefone: (123) 456-7890<br>
               Email: info@clinicamedica.com</p>
        </div>
    </div>

    <footer>
        &copy; 2023 Clínica Médica. Todos os direitos reservados.
    </footer>
</body>

</html>
