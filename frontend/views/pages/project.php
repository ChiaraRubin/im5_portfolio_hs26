<?php
$project = get_project_by_id(id: get_the_ID());
?>

<main data-page="project">
    <img class="image" src="<?= $project['image']['src'] ?>" alt="<?= $project['image']['alt'] ?>">

    <div class="project-info">
        <div class="heading">
            <p class="category">
                <?php foreach ($project['project_categories'] as $category): ?>
                 <span class="category-item"><?= esc_html($category) ?></span>
                <?php endforeach; ?>
            </p>

            <h1><?= esc_html($project['title']) ?></h1>
            <?php if ($project['subtitle']) : ?>
                <p class="subtitle"><?= esc_html($project['subtitle']) ?></p>
            <?php endif; ?>
        </div>
        <div class="text"><?= wpautop($project['text']) ?></div>
        <div class="details"><?= wpautop($project['details']) ?></div>
    </div>
    <section class="gallery">
    <?php foreach ($project['gallery'] as $row) : ?>
        <div class="gallery-row" style="--columns: <?= (int) $row['columns'] ?>">
            <?php foreach ($row['images'] as $img) : ?>
                <img src="<?= esc_url($img['src']) ?>" alt="<?= esc_attr($img['alt']) ?>">
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    </section>

</main>