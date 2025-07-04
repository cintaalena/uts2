<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level 1 Quiz</title>
</head>
<body>
    <h1>Level 1 Quiz</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('quiz/submitLevel1') ?>">
        <?php foreach ($questions as $question): ?>
            <label for="<?= $question['id'] ?>"><?= $question['question'] ?></label><br>
            <input type="text" name="<?= $question['id'] ?>" required><br><br>
        <?php endforeach; ?>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
