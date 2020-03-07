<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($categories as $category)
    <url>
        <loc>{{ route('categories.show', $category->slug) }}</loc>
        <lastmod>{{ substr($category->updated_at, 0, 10)}}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
@endforeach
@foreach($authors as $author)
    <url>
        <loc>{{ route('authors.show', $author->slug) }}</loc>
    </url>
@endforeach
@foreach($posts as $post)
    <url>
        <loc>{{ route('posts.show', $post->slug) }}</loc>
        <lastmod>{{ substr($post->updated_at, 0, 10)}}</lastmod>
    </url>
@endforeach
</urlset>
