using System;
using System.IO;
using System.Text;
using System.Text.RegularExpressions;

class Program {
    static void Main() {
        string themeDir = @"D:\antigravity\cherry3\cherry-theme";
        Directory.CreateDirectory(themeDir);
        Directory.CreateDirectory(Path.Combine(themeDir, "assets", "css"));
        Directory.CreateDirectory(Path.Combine(themeDir, "assets", "js"));
        Directory.CreateDirectory(Path.Combine(themeDir, "assets", "images"));

        string html = File.ReadAllText(@"D:\antigravity\cherry3\index.html");

        // 1. Extract CSS
        var styleMatch = Regex.Match(html, @"<style>(.*?)</style>", RegexOptions.Singleline);
        string css = styleMatch.Success ? styleMatch.Groups[1].Value : "";
        File.WriteAllText(Path.Combine(themeDir, "assets", "css", "main.css"), css, Encoding.UTF8);

        // Remove CSS from HTML
        html = Regex.Replace(html, @"<style>.*?</style>", "<!-- WP_HEAD -->", RegexOptions.Singleline);

        // 2. Extract JS
        var scripts = Regex.Matches(html, @"<script>(.*?)</script>", RegexOptions.Singleline);
        StringBuilder jsBuilder = new StringBuilder();
        foreach (Match m in scripts) {
            // Ignore the JSON-LD script if it exists
            if (!m.Groups[1].Value.Contains("@context")) {
                jsBuilder.AppendLine(m.Groups[1].Value);
            }
        }
        File.WriteAllText(Path.Combine(themeDir, "assets", "js", "main.js"), jsBuilder.ToString(), Encoding.UTF8);
        html = Regex.Replace(html, @"<script>.*?</script>", "", RegexOptions.Singleline);

        // Fix image paths and link paths for WordPress
        html = html.Replace("BST TRANH/", @"<?php echo get_template_directory_uri(); ?>/assets/images/BST TRANH/");
        html = html.Replace("assets/", @"<?php echo get_template_directory_uri(); ?>/assets/");
        
        // 3. header.php
        int heroStart = html.IndexOf("<!-- HERO SECTION -->");
        if (heroStart == -1) heroStart = html.IndexOf("<section class=\"hero-section");
        string headerHtml = html.Substring(0, heroStart);
        headerHtml = headerHtml.Replace("<!-- WP_HEAD -->", "<?php wp_head(); ?>");
        headerHtml = headerHtml.Replace("</head>", "    <?php wp_head(); ?>\n</head>");
        // Fix body tag
        headerHtml = Regex.Replace(headerHtml, @"<body([^>]*)>", "<body <?php body_class(); ?>>");
        File.WriteAllText(Path.Combine(themeDir, "header.php"), headerHtml, Encoding.UTF8);

        // 4. footer.php
        int footerStart = html.IndexOf("<!-- FOOTER -->");
        if (footerStart == -1) footerStart = html.IndexOf("<footer");
        string footerHtml = html.Substring(footerStart);
        footerHtml = footerHtml.Replace("</body>", "    <?php wp_footer(); ?>\n</body>");
        File.WriteAllText(Path.Combine(themeDir, "footer.php"), footerHtml, Encoding.UTF8);

        // 5. style.css
        string styleCss = @"/*
Theme Name: Cherry Theme
Theme URI: https://vutranpk.github.io/cherry
Author: Vu Tran
Description: A custom WordPress theme for Cherry Project with dynamic CPTs and ACF.
Version: 1.0
Text Domain: cherry
*/";
        File.WriteAllText(Path.Combine(themeDir, "style.css"), styleCss, Encoding.UTF8);

        // 6. index.php
        File.WriteAllText(Path.Combine(themeDir, "index.php"), "<?php get_header(); ?>\n<main>\n<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>\n</main>\n<?php get_footer(); ?>", Encoding.UTF8);
        
        // Write a success flag
        Console.WriteLine("Core theme files extracted successfully.");
    }
}
