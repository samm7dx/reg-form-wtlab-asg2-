<?php
declare(strict_types=1);

function clean(string $key): string {
    return trim((string)($_POST[$key] ?? ''));
}
function h(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$data = [
    'Full name' => clean('full_name'),
    'USN' => clean('usn'),
    'Email address' => clean('email'),
    'Phone number' => clean('phone'),
    'Date of birth' => clean('dob'),
    'Department' => clean('branch'),
    'Gender' => clean('gender'),
    'Address' => clean('address')
];

$errors = [];
if (strlen($data['Full name']) < 2 || !preg_match("/^[\p{L} .'-]+$/u", $data['Full name'])) {
    $errors[] = 'Please provide a valid full name.';
}
if (!preg_match('/^[A-Za-z0-9-]{5,20}$/', $data['USN'])) {
    $errors[] = 'Please provide a valid USN.';
}
if (!filter_var($data['Email address'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please provide a valid email address.';
}
if (!preg_match('/^[6-9][0-9]{9}$/', $data['Phone number'])) {
    $errors[] = 'Please provide a valid 10-digit Indian mobile number.';
}
$date = DateTime::createFromFormat('!Y-m-d', $data['Date of birth']);
if (!$date || $date->format('Y-m-d') !== $data['Date of birth'] || $date >= new DateTime('today')) {
    $errors[] = 'Please provide a valid past date of birth.';
}
$allowedBranches = [
    'Computer Science and Engineering',
    'Information Science and Engineering',
    'Electronics and Communication Engineering',
    'Artificial Intelligence and Machine Learning',
    'Other'
];
if (!in_array($data['Department'], $allowedBranches, true)) {
    $errors[] = 'Please select a valid department.';
}
if (!in_array($data['Gender'], ['Female', 'Male', 'Prefer not to say'], true)) {
    $errors[] = 'Please select a valid gender option.';
}
if (strlen($data['Address']) < 8 || strlen($data['Address']) > 1200) {
    $errors[] = 'Please provide a valid address.';
}
if (($_POST['consent'] ?? '') !== 'yes') {
    $errors[] = 'Please confirm the declaration.';
}

if ($errors) {
    http_response_code(422);
    ?>
    <!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check your details</title><link rel="stylesheet" href="assets/style.css"></head>
    <body><main class="page"><section class="result-card">
      <p class="success-mark" style="color:#c03939">FORM NOT SUBMITTED</p>
      <h1>Please check your details</h1>
      <ul><?php foreach ($errors as $error): ?><li><?= h($error) ?></li><?php endforeach; ?></ul>
      <a class="back-link" href="index.php">Return to form</a>
    </section></main></body></html>
    <?php
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration successful</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <main class="page">
    <section class="result-card">
      <div class="success-mark">✓ APPLICATION SUBMITTED</div>
      <h1>Registration successful</h1>
      <p>Your information has been received. Review the details submitted below.</p>
      <table class="details">
        <?php foreach ($data as $label => $value): ?>
          <tr><th><?= h($label) ?></th><td><?= nl2br(h($value)) ?></td></tr>
        <?php endforeach; ?>
      </table>
      <a class="back-link" href="index.php">← Submit another response</a>
    </section>
  </main>
</body>
</html>
