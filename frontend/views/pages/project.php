<?php
$project = get_project_by_id(id: get_the_ID());
?>

<main data-page="project">
    <img class="image" src="<?= esc_url($project['image']['src']) ?>" alt="<?= esc_attr($project['image']['alt']) ?>">

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

            <?php if ($row['type'] === 'sticky') : ?>
                <div class="gallery-sticky">
                    <div class="sticky-left">
                        <img src="<?= esc_url($row['sticky']['src']) ?>" alt="<?= esc_attr($row['sticky']['alt']) ?>">
                    </div>
                    <div class="sticky-right">
                        <?php foreach ($row['images'] as $img) : ?>
                            <img src="<?= esc_url($img['src']) ?>" alt="<?= esc_attr($img['alt']) ?>">
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php elseif ($row['type'] === 'website') : ?>
                <div class="gallery-website">
                    <img src="<?= esc_url($row['image_left']['src']) ?>" alt="<?= esc_attr($row['image_left']['alt']) ?>">
                    <div class="website-right">
                        <img src="<?= esc_url($row['image_right']['src']) ?>" alt="<?= esc_attr($row['image_right']['alt']) ?>">
                        <a class="button-link" href="<?= esc_url($row['button_url']) ?>" target="_blank" rel="noopener">
                            <?= esc_html($row['button_text']) ?>
                        </a>
                    </div>
                </div>

            <?php else : ?>
                <div class="gallery-row" style="--columns: <?= (int) $row['columns'] ?>">
                    <?php foreach ($row['images'] as $img) : ?>
                        <img src="<?= esc_url($img['src']) ?>" alt="<?= esc_attr($img['alt']) ?>">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>
    </section>
</main>