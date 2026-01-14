<?php
if(isset($_GET['page'])){
    include($_GET['page']);exit();
}
$contentDir = 'content';
$files = is_dir($contentDir) ? array_diff(scandir($contentDir), array('.', '..')) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <title>OWASP Top 10 Blog</title>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#f8fafc] text-slate-900 antialiased">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="index.php" class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                OWASP Top 10 Blog
            </a>
            <div class="space-x-6 text-sm font-medium text-slate-600">
                <a href="#" class="hover:text-blue-600 transition">Articles</a>
                <a href="#" class="hover:text-blue-600 transition">About</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto py-12 px-4">
       <header class="mb-12">
    <div class="inline-block px-3 py-1 mb-4 text-xs font-mono font-bold tracking-widest text-indigo-600 uppercase bg-indigo-100 rounded-full">
        Security Research Lab
    </div>
    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 mb-4">
        OWASP Top 10 <span class="text-indigo-600">Exploration</span>
    </h1>
    <p class="text-lg text-slate-600 max-w-2xl leading-relaxed">
        A deep dive into the most critical web application security risks. This environment is designed for educational analysis of vulnerabilities, defense mechanisms, and secure coding practices.
    </p>
</header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($files as $file): 
                $slug = str_replace('.md', '', $file);
                $title = str_replace('-', ' ', $slug);
                // Simulation of dynamic data
                $date = date("M d, Y", filemtime("content/$file"));
            ?>
                <article class="group relative flex flex-col bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-600">
                            Article
                        </span>
                    </div>
                    
                    <h2 class="text-xl font-bold mb-3 group-hover:text-blue-600 transition-colors capitalize">
                        <a href="index.php?page=post.php&name=<?= $file ?>">
                            <span class="absolute inset-0"></span>
                            <?= $title ?>
                        </a>
                    </h2>
                    
                    <p class="text-slate-600 text-sm line-clamp-3 mb-6">
                        Discover the interesting details behind <?= $title ?> and how it impacts modern development workflows...
                    </p>

                    <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500 font-medium">
                        <span><?= $date ?></span>
                        <span class="flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            5 min read
                        </span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="mt-20 py-12 border-t border-slate-200 text-center text-slate-500 text-sm">
        &copy; <?= date('Y') ?> OWASP Top 10 Blog
    </footer>
</body>
</html>