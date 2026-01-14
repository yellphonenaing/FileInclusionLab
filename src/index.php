<?php
session_start();

// Lab Logic: Page routing
if(isset($_GET['page'])){
    include($_GET['page']); 
    exit();
}

// State Management: Get theme from session, default to 'light'
$theme = $_SESSION['theme'] ?? 'light';
$isDark = ($theme === 'dark');
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
<body class="<?= $isDark ? 'bg-slate-900 text-slate-100' : 'bg-[#f8fafc] text-slate-900' ?> antialiased transition-colors duration-300">
    <nav class="sticky top-0 z-50 <?= $isDark ? 'bg-slate-800/80 border-slate-700' : 'bg-white/80 border-slate-200' ?> backdrop-blur-md border-b">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="index.php?theme=<?= $theme ?>" class="text-xl font-bold bg-gradient-to-r from-blue-400 to-indigo-500 bg-clip-text text-transparent">
                OWASP Lab
            </a>
            
            <div class="flex items-center space-x-6">
                <a href="theme.php?theme=<?= $isDark ? 'light' : 'dark' ?>" 
                   class="flex items-center px-4 py-2 rounded-full text-sm font-bold transition-all <?= $isDark ? 'bg-yellow-400 text-slate-900 hover:bg-yellow-300' : 'bg-slate-800 text-white hover:bg-slate-700' ?>">
                    <?php if ($isDark): ?>
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                        Light Mode
                    <?php else: ?>
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        Dark Mode
                    <?php endif; ?>
                </a>
                <div class="hidden md:flex space-x-6 text-sm font-medium <?= $isDark ? 'text-slate-300' : 'text-slate-600' ?>">
                    <a href="#" class="hover:text-blue-500 transition">Articles</a>
                    <a href="#" class="hover:text-blue-500 transition">About</a>
                </div>
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
                <article class="group relative flex flex-col <?= $isDark ? 'bg-slate-800 border-slate-700' : 'bg-white border-slate-200' ?> rounded-2xl border p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">                    <div class="mb-4">
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
