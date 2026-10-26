<?php 
$menu = get_menu_by_slug(slug:'main');
$logo = get_globals_logo();

?>

<header data-layout="header">
<a class="logo-link" href="<?= esc_url(home_url('/')) ?>" aria-label="Zur Startseite">
    <img class="logo" src="<?= esc_url($logo['src']) ?>" alt="<?= esc_attr($logo['alt']) ?>">
</a>    <input type="checkbox" id="nav-toggle" class="nav-toggle" hidden>
    <label for="nav-toggle" class="burger" aria-label="Menü öffnen">
        <span></span>
        <span></span>
        <span></span>
    </label>

    <nav class="nav-container">
        <ul class="nav">
            <?php foreach ($menu as $item): ?>
            <li class="nav-item">
                <a target="<?= $item['target'] ?>" href="<?= $item['url'] ?>">
                    <?= $item['title'] ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>