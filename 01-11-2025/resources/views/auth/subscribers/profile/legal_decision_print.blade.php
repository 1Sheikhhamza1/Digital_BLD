<!DOCTYPE html>
<html>
<head>
  <title>Print Judgment</title>
  <style>
    @page {
      size: A4;
      margin: 20mm 15mm 22mm 15mm;  /* bottom space for footer */
    }

    body {
      font-family: 'DejaVu Sans', sans-serif;
      font-size: 12px;
      margin: 0;
      padding: 0;
      background-color: white;
    }

    .page {
      position: relative;
      min-height: 100vh;
      box-sizing: border-box;
      page-break-after: always;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .print-content {
      flex: 1;
      padding-bottom: 80px; /* reserve exact space for footer */
    }

    .print-footer {
      position: running(footer);
      border-top: 1px solid #eaeaea;
      font-size: 11px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: white;
      margin-top: 20px;
    }

    /* This ensures footer repeats every page (Chrome + PDF compatible) */
    @media print {
      body {
        margin: 0;
      }

      .print-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
      }

      @page {
        @bottom-center {
          content: element(footer);
        }
      }
    }
  </style>
</head>

<body>
  <div class="page">
    
    <div class="print-content">
      @include('auth.subscribers.profile._legal_search_pdf')
    </div>

    @if(isset($metaData) && $metaData)
    <div class="print-footer" id="footer">
      <div>{{ now()->format('d M Y, h:i A') }}</div>
      <div style="text-align:center; flex:1;">
        <a href="https://bldlegalized.com" style="color:black; text-decoration:none;">&copy; bldlegalized.com</a>
      </div>
      <div style="text-align:right;">
        {{ auth('subscriber')->user()->name ?? 'Guest' }} | {{ auth('subscriber')->user()->email ?? '-' }}
      </div>
    </div>
    @endif
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
