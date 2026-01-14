<?php
require 'vendor/autoload.php';

// 1. Security: Sanitize input to prevent Directory Traversal attacks
$postName =$_GET['name']; 
$filePath = "content/{$postName}";

if (empty($postName) || !file_exists($filePath)) {
    // Redirect to 404 or home if post doesn't exist
    header("Location: index.php");
    exit;
}

$parsedown = new Parsedown();
$markdown = file_get_contents($filePath);
$htmlContent = $parsedown->text($markdown);

// Extract a title from the filename for the <title> tag
$displayTitle = str_replace('-', ' ', $postName);
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Lora:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <title><?= ucwords($displayTitle) ?> | OWASP Top 10 Blog</title>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .prose h1, .prose h2 { font-family: 'Inter', sans-serif; }
        /* Using a serif font for the body text improves long-form readability */
        .prose p { font-family: 'Lora', serif; font-size: 1.125 million; color: #334155; }
        
        #progress-bar {
            transform-origin: 0%;
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">

    <div id="progress-bar" class="fixed top-0 left-0 w-full h-1 bg-blue-600 z-50 transition-transform duration-75 scale-x-0"></div>

    <nav class="border-b border-slate-100 py-4 mb-8">
        <div class="max-w-3xl mx-auto px-4 flex justify-between items-center">
            <a href="index.php" class="group flex items-center text-sm font-semibold text-slate-500 hover:text-blue-600 transition">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to Feed
            </a>
            <div class="text-xs text-slate-400 uppercase tracking-widest font-bold">Reading Mode</div>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 pb-24">
        <header class="mb-12">
            <div class="flex items-center space-x-3 text-sm text-blue-600 font-medium mb-4">
                <span>Article</span>
                <span class="text-slate-300">•</span>
                <span class="text-slate-500"><?= date("M d, Y", filemtime($filePath)) ?></span>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight capitalize">
                
            </h1>
        </header>

        <article class="prose prose-slate lg:prose-xl prose-headings:font-bold prose-a:text-blue-600 hover:prose-a:text-blue-500 prose-img:rounded-2xl prose-img:shadow-lg">
            <?= $htmlContent ?>
        </article>

        <footer class="mt-16 pt-8 border-t border-slate-100">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-slate-500 text-sm italic">Thanks for reading! Feel free to share this post.</p>
                <div class="flex space-x-4">
                    <button onclick="window.print()" class="text-sm font-medium text-slate-700 hover:text-blue-600">Print to PDF</button>
                    <button onclick="navigator.clipboard.writeText(window.location.href)" class="text-sm font-medium text-slate-700 hover:text-blue-600">Copy Link</button>
                </div>
            </div>
        </footer>
    </main>

    <script>
        // Reading Progress Script
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = winScroll / height;
            document.getElementById('progress-bar').style.transform = `scaleX(${scrolled})`;
        });
    </script>
</body>
</html>