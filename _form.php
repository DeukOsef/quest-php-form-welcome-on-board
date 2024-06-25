<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = array_map('trim', $_POST);

    if (empty($contact['name'])) {
        $errors[] = 'Name is required';
    }

    if (empty($contact['mail'])) {
        $errors[] = 'Email is required';
    } elseif (filter_var($contact['mail'], FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Invalid email format';
    }

    if (empty($contact['subject'])) {
        $errors[] = 'Please choose a subject in the list';
    }

    if (empty($errors)) {
        header('Location: sended.php');
        exit();
    }
}
?>


<section class="container">
    <h2 id="contact">Get in touch</h2>
    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <form class="form" action="" method="post">
        <div class="input">
            <label for="name">Name<span class="required">*</span></label>
            <input type="text" name="name" id="name">
        </div>
        <div class="input">
            <label for="mail">Email<span class="required">*</span></label>
            <input type="email" name="mail" id="mail">
        </div>
        <div class="input">
            <label for="subject">Subject<span class="required">*</span></label>
            <select name="subject" id="subject">
                <option value=""></option>
                <option value="meet">Prendre rendez-vous</option>
                <option value="newsletter">inscription à la newsletter</option>
                <option value="claim">réclamation</option>
                <option value="estimate">demander un devis</option>
            </select>
        </div>
        <div class="input">
            <label for="message">Message</label>
            <input type="text" name="message" id="message">
        </div>
        <div class="input">
            <input type="submit" value="SEND">
        </div>

    </form>
</section>