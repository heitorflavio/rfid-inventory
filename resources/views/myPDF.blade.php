<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <!-- <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/AdminLTE-3.2.0/dist/css/adminlte.css')}}"> -->

    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        .table td, .table th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table tr:nth-child(even){background-color: #f2f2f2;}
        .table tr:hover {background-color: #ddd;}
        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #ddd !important;
        }
        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 2px !important;
        }
        .table.no-border, .table.no-border-all tbody tr td, .table.no-border-all tbody tr th, .table.no-border-all thead tr th {
            border: none !important;
        }
        .table.no-border-all tbody tr td, .table.no-border-all tbody tr th, .table.no-border-all thead tr th {
            border-top: none !important;
        }
        .table.no-border-all tbody tr td:first-child, .table.no-border-all tbody tr th:first-child, .table.no-border-all thead tr th:first-child {
            border-left: none !important;
        }
        .col-md-12 {
            width: 100%;
        }
        .header {
            width: 100%;
            text-align: center;
            margin-bottom: 30px;
        }
        .footer {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #ddd !important;
        }
        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 2px !important;
        }
        .table.no-border, .table.no-border-all tbody tr td, .table.no-border-all tbody tr th, .table.no-border-all thead tr th {
            border: none !important;
        }
        .table.no-border-all tbody tr td, .table.no-border-all tbody tr th, .table.no-border-all thead tr th {
            border-top: none !important;
        }
        .table.no-border-all tbody tr td:first-child, .table.no-border-all tbody tr th:first-child, .table.no-border-all thead tr th:first-child {
            border-left: none !important;
        }
        
    </style>
</head>
<body>
    <div class="col-md-12">
        <div class="header">
            <h1>{{ $title }}</h1>
        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sku</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->sku }}</td>
                        <td>R${{ $produto->preco }}</td>
                        <td>{{ $produto->estoque }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <h3>Total em Estoque: R${{ $total }}</h3>
            <h3>Total de Produtos: {{$count}}</h3>
        </div>
</div>
</body>
</html>
