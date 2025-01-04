<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url>

  <loc><?= site_url() ?></loc>
  <lastmod>2024-01-20T04:54:08+00:00</lastmod>
  <priority>1.00</priority>

  <loc><?= site_url('vps-servers') ?></loc>
  <lastmod>2024-01-20T04:54:08+00:00</lastmod>
  <priority>1.00</priority>

  <loc><?= site_url('dedicated-server') ?></loc>
  <lastmod>2024-01-20T04:54:08+00:00</lastmod>
  <priority>1.00</priority>

  <loc><?= site_url('cloud-servers') ?></loc>
  <lastmod>2024-01-20T04:54:08+00:00</lastmod>
  <priority>1.00</priority>

  <loc><?= site_url('faq') ?></loc>
  <lastmod>2024-01-20T04:54:08+00:00</lastmod>
  <priority>1.00</priority>

  <loc><?= site_url('blog') ?></loc>
  <lastmod>2024-01-20T04:54:08+00:00</lastmod>
  <priority>1.00</priority>

  <loc><?= site_url('about') ?></loc>
  <lastmod>2024-01-20T04:54:08+00:00</lastmod>
  <priority>1.00</priority>

  <loc><?= site_url('contact-us') ?></loc>
  <lastmod>2024-01-20T04:54:08+00:00</lastmod>
  <priority>1.00</priority>

  <?php if(!empty($blog)): ?>
    <?php foreach($blog as $vl): ?>
      <loc><?= site_url('blog-view/'.$vl->slug_url) ?></loc>
      <lastmod>2024-01-20T04:54:08+00:00</lastmod>
      <priority>1.00</priority>
    <?php endforeach; ?>
  <?php endif; ?>

</url>

</urlset>