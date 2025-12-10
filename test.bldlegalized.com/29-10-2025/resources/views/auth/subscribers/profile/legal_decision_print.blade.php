<!DOCTYPE html>
<html>
<head>
    <title>Print Judgment</title>
    <style>
        @page {
            size: A4;
            margin: 20mm 15mm; /* Top/Bottom, Left/Right */
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            background-color: white;
        }

        .print-container {
            margin-bottom: 30mm; /* space for footer */
            width: 100%;
            text-align: justify;
        }

        .print-container h1, .print-container h2 {
            text-align: center;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
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
