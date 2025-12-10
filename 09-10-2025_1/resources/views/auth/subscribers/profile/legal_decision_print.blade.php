<!DOCTYPE html>
<html>
<head>
    <title>Print Judgment</title>
    <style>
        @page {
            margin: 2cm;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'DejaVu Sans', sans-serif;
        }

        .print-container {
            width: 100%;
            margin: 50px auto;
            text-align: justify;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .print-container h1, .print-container h2 {
            text-align: center;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .print-container {
                width: 80%;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>
    <div class="print-container">
        @include('auth.subscribers.profile._legal_search_pdf')
    </div>

    <script>
        window.print()
    </script>
</body>
</html>
