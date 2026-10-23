<?php
$project = get_project_by_id(id: get_the_ID());
?>

<main data-page="project">
    <img class="image" src="<?= $project['image']['src'] ?>" alt="<?= $project['image']['alt'] ?>">

    <div class="project-info">
        <div class="heading">
            <h1><?= esc_html($project['title']) ?></h1>
            <?php if ($project['subtitle']) : ?>
                <p class="subtitle"><?= esc_html($project['subtitle']) ?></p>
            <?php endif; ?>
        </div>
        <div class="text"><?= wpautop($project['text']) ?></div>
        <div class="details"><?= wpautop($project['details']) ?></div>
    </div>
</main>