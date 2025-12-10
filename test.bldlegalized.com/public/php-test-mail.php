<?php
// Recipient email address
$to = "wasim.html@gmail.com";  // ← change this

// Email subject
$subject = "Letter of Confirmation";

// Dynamic employee and approver details
$data = [
    '{REFRENCE}' => 'GP-HR/CONF/2025/017',
    '{CURRENT_DATE}' => date('F d, Y'),
    '{employee_name}' => 'Md. Wasim Uddin',
    '{employee_address}' => 'Mirpur, Dhaka, Bangladesh',
    '{employee_nationality}' => 'Bangladeshi',
    '{PROBATION_MONTH}' => '6 months',
    '{employee_designation}' => 'Software Engineer',
    '{employee_organization}' => 'Information Technology Division',
    '{employee_department}' => 'Software Development',
    '{employee_division}' => 'Digital Services',
    '{signiture}' => 'https://yourdomain.com/uploads/signature.png', // full image URL
    '{APPROVER_NAME}' => 'Mohammad Samir',
    '{APPROVER_DESIGNATION}' => 'Chief Human Resources Officer',
    '{APPROVER_DEPARTMENT}' => 'Human Resources Department'
];

// --- HTML Template ---
$message = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Letter of Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 15px;
      line-height: 1.6;
      color: #222;
      background-color: #fff;
    }

    .letter-container {
      max-width: 700px;
      margin: 0 auto;
      background: #ffffff;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .letter-header, .letter-footer {
      margin-bottom: 20px;
    }

    .letter-body {
      text-align: justify !important;
    }

    .signature {
      margin-top: 60px;
    }

    .signature img {
      width: 150px;
      height: auto;
      display: block;
      margin-bottom: 10px;
    }

    @media (max-width: 768px) {
      body {
        padding: 10px;
      }
      .letter-container {
        padding: 15px;
      }
      .letter-body {
        font-size: 14px;
      }
      .signature img {
        width: 120px;
      }
    }

    @media (max-width: 480px) {
      .letter-container {
        padding: 10px;
      }
      .letter-body {
        font-size: 13px;
      }
      .signature img {
        width: 100px;
      }
    }
  </style>
</head>
<body>
  <div class="letter-container">
    <div class="letter-header">
      <p>Ref: {REFRENCE}<br>Date: {CURRENT_DATE}</p>
    </div>

    <div class="letter-recipient">
      <p>{employee_name}<br>{employee_address}<br>{employee_nationality}</p>
    </div>

    <div class="letter-subject">
      <p><strong>Subject: Letter of Confirmation</strong></p>
    </div>

    <div class="letter-body">
      <p>Dear {employee_name},</p>
      <p>We would like to congratulate you on your successful completion of the probationary period of {PROBATION_MONTH} in Grameenphone Ltd. We are delighted to have received satisfactory reports from your supervisor regarding your performance, sincerity, and loyalty towards work and the company during this period.</p>
      <p>The management wishes to confirm your employment as <strong>{employee_designation}</strong> in the <strong>{employee_organization}, {employee_department}</strong> department under the <strong>{employee_division}</strong> division, with immediate effect from today.</p>
      <p>Your employee profile will be updated according to the company policy and rules.</p>
      <p>Grameenphone Ltd. always encourages and creates platforms for talented people who expect a growing career in the future. We appreciate your dedication to our organization and believe that you will continue your hard work and efforts in your role for the development of the company.</p>
      <p>Congratulations once again, and Good Luck!</p>
    </div>

    <div class="signature">
      <p>Sincerely,</p>
      <img src="{signiture}" alt="Signature">
      <p>{APPROVER_NAME}<br>{APPROVER_DESIGNATION}<br>{APPROVER_DEPARTMENT}<br>
      On behalf of Grameenphone Ltd.</p>
    </div>
  </div>
</body>
</html>
';

// --- Replace placeholders dynamically ---
foreach ($data as $key => $value) {
    $message = str_replace($key, $value, $message);
}

// --- Email headers ---
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: HR Department <hr@yourdomain.com>" . "\r\n";

// --- Send mail ---
if (mail($to, $subject, $message, $headers)) {
    echo "✅ Email sent successfully!";
} else {
    echo "❌ Email sending failed.";
}
?>
