<?php $data = $args['data']; ?>

<section data-module="contact">
    <div class="intro">
        <video class="intro-video" src="<?= esc_url($data['video']['src']) ?>" autoplay muted playsinline></video>
    </div>

    <div class="content">
        <h1 class="title"><?= esc_html($data['title']) ?></h1>
        <div class="text"><?= wpautop($data['text']) ?></div>
        <?php if ($data['gif']) : ?>
            <img class="gif" src="<?= esc_url($data['gif']['src']) ?>" alt="<?= esc_attr($data['gif']['alt']) ?>">
        <?php endif; ?>
    </div>
</section>

<script>
(() => {
  const section = document.querySelector('[data-module="contact"]');
  const video = section && section.querySelector('.intro-video');
  if (!section || !video) return;

  const finish = () => section.classList.add('is-intro-done');

  video.addEventListener('ended', finish);
  video.addEventListener('error', finish);
  setTimeout(finish, 15000); // Notfall: nach 15 s auf jeden Fall freigeben
})();
</script>