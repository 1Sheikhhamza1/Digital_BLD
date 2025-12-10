<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Print Judgment</title>

  <style>
    @page {
      size: A4;
      margin: 25mm 15mm 35mm 15mm; /* bottom margin for footer */
    }

    body {
      font-family: 'DejaVu Sans', sans-serif;
      font-size: 12px;
      margin: 0;
      padding: 0;
      line-height: 1.4;
    }

    .page {
      position: relative;
      padding-bottom: 45px; /* reserve space for footer */
      page-break-after: always;
    }

    /* FIX CUTTING TEXT PROBLEM */
    * {
      page-break-inside: avoid !important;
      break-inside: avoid !important;
    }

    p, h1, h2, h3, h4, h5, h6, table, tr, td, div {
      page-break-inside: avoid !important;
      break-inside: avoid !important;
    }

    /* FOOTER for PDF + Browser */
    .footer {
      width: 100%;
      position: absolute; /* works for html2pdf */
      bottom: 0;
      left: 0;
      right: 0;
      border-top: 1px solid #ccc;
      font-size: 11px;
      color: #666;
      background: white;
      padding: 5px 0;
    }

    .footer td {
      padding: 2px 5px;
    }

    /* Browser PRINT footer only */
    @media print {
      .footer {
        position: fixed;
        bottom: 0;
      }

      @page {
        @bottom-left {
          content: "{{ now()->format('d M, Y h:i A') }}";
          font-size: 11px;
          color: #666;
        }
        @bottom-center {
          content: "© {{ date('Y') }} Digital Bangladesh Legal Decisions";
          font-size: 11px;
          color: #666;
        }
        @bottom-right {
          content: "{{ auth('subscriber')->user()->name }} | {{ auth('subscriber')->user()->email }}";
          font-size: 11px;
          color: #666;
        }
      }
    }
  </style>
</head>

<body>

  <div id="downloadFile">

    <div class="page">
      @include('auth.subscribers.profile._legal_search_pdf')
    </div>

  </div>

  @if(isset($metaData) && $metaData)
  <script>
    const element = document.getElementById("downloadFile");

    const opt = {
      margin: [10, 10, 25, 10], // mm
      filename: "legal_decision.pdf",
      image: { type: "jpeg", quality: 0.98 },
      html2canvas: {
        scale: 2,
        dpi: 300,
        letterRendering: true
      },
      jsPDF: {
        unit: "mm",
        format: "a4",
        orientation: "portrait"
      }
    };

    html2pdf().from(element).set(opt).toPdf().get('pdf').then(function (pdf) {

      let totalPages = pdf.internal.getNumberOfPages();
      let pageWidth = pdf.internal.pageSize.getWidth();
      let pageHeight = pdf.internal.pageSize.getHeight();

      for (let i = 1; i <= totalPages; i++) {
        pdf.setPage(i);
        pdf.setFontSize(8);
        pdf.setTextColor(80);

        /* Custom footer content */
        let footerLeft = "{{ now()->format('d M, Y h:i A') }}";
        let footerCenter = "© {{ date('Y') }} Digital Bangladesh Legal Decisions";
        let footerRight = "{{ auth('subscriber')->user()->name }} | {{ auth('subscriber')->user()->email }}";

        pdf.text(footerLeft, 10, pageHeight - 10);
        pdf.text(footerCenter, pageWidth / 2, pageHeight - 10, { align: "center" });
        pdf.text(footerRight, pageWidth - 10, pageHeight - 10, { align: "right" });
      }

    }).save();
  </script>
  @endif


  @if(isset($metaData) && $metaData == false)
  <script>
    window.print();
  </script>
  @endif

</body>
</html>
