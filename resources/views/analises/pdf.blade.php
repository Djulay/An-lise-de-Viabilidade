<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FYMK5003LT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FYMK5003LT');
</script>
    <meta charset="UTF-8">
    <title>Análise de Viabilidade - {{ $analise->nome_negocio }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            font-size: 14px;
            color: #333;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        header img {
            width: 100px;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f4f4f4;
            text-align: left;
        }

        .section-title {
            font-size: 18px;
            color: #1a73e8;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .suggestions {
            background-color: #f0f9ff;
            padding: 15px;
            border-radius: 5px;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #555;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <header>
        <img src="{{ public_path('logo.png') }}" alt="Logotipo">
        <h1>Análise de Viabilidade</h1>
        <p><strong>Nome do Negócio:</strong> {{ $analise->nome_negocio }}</p>
    </header>

    <h2 class="section-title">Detalhes da Análise</h2>
    <table>
        <tr>
            <th>Tipo de Negócio</th>
            <td>{{ $analise->tipo_negocio }}</td>
        </tr>
        <tr>
            <th>Capital Inicial</th>
            <td>{{ number_format($analise->capital_inicial, 2, ',', '.') }} Kz</td>
        </tr>
        <tr>
            <th>Província</th>
            <td>{{ $analise->provincia }}</td>
        </tr>
        <tr>
            <th>Localização</th>
            <td>{{ $analise->localizacao }}</td>
        </tr>
        <tr>
            <th>Concorrência</th>
            <td>{{ $analise->concorrencia }}</td>
        </tr>
        <tr>
            <th>Demanda Local</th>
            <td>{{ $analise->demanda_local }}</td>
        </tr>
        <tr>
            <th>Experiência</th>
            <td>{{ $analise->experiencia }}</td>
        </tr>
        <tr>
            <th>Fornecedores</th>
            <td>{{ $analise->fornecedores }}</td>
        </tr>
        <tr>
            <th>Apoio</th>
            <td>{{ $analise->apoio }}</td>
        </tr>
        <tr>
            <th>Retorno Esperado</th>
            <td>{{ $analise->retorno }} meses</td>
        </tr>
        <tr>
            <th>Resultado</th>
            <td><strong>{{ strtoupper($analise->resultado) }}</strong></td>
        </tr>
    </table>

    @if(!empty($sugestoes))
        <h2 class="section-title">Sugestões da Inteligência Artificial</h2>
        <div class="suggestions">
            <ul>
                @foreach($sugestoes as $sugestao)
                    <li>{{ $sugestao }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <footer>
        Processado pela plataforma <strong>ideiaviavel.co.ao</strong><br>
        Data da Análise: {{ $dataCriada }}
    </footer>

</body>
</html>
