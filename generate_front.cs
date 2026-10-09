using System;
using System.IO;

class Program {
    static void Main() {
        string backup = File.ReadAllText(@"D:\antigravity\cherry3\full_html_backup.txt");
        
        // Extract front page body
        int start = backup.IndexOf("<!-- HERO SECTION -->");
        int end = backup.IndexOf("<!-- FOOTER -->");
        string frontBody = backup.Substring(start, end - start);
        
        string php = @"<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>
<main>
" + frontBody + @"
</main>
<?php get_footer(); ?>
";
        // Fix image paths
        php = php.Replace("src=\"assets/images/", "src=\"<?php echo get_template_directory_uri(); ?>/assets/images/");
        php = php.Replace("src=\"cherry2.jpg\"", "src=\"<?php echo get_template_directory_uri(); ?>/assets/images/cherry2.jpg\"");
        php = php.Replace("src=\"bannerhero.jpg\"", "src=\"<?php echo get_template_directory_uri(); ?>/assets/images/bannerhero.jpg\"");
        
        // Apply ACF to Hero
        php = php.Replace("<img id=\"hero-random-img\" src=\"<?php echo get_template_directory_uri(); ?>/assets/images/bannerhero.jpg\" alt=\"Artwork\">",
            "<?php $hero_pc = get_field('hero_bg_pc') ?: get_template_directory_uri() . '/assets/images/bannerhero.jpg'; ?>\n" +
            "<img id=\"hero-random-img\" src=\"<?php echo esc_url($hero_pc); ?>\" alt=\"Artwork\">");

        // Polylang
        php = php.Replace("Khám Phá", "<?php cherry_e('Khám Phá'); ?>");
        php = php.Replace("BỘ SƯU TẬP", "<?php cherry_e('BỘ SƯU TẬP'); ?>");

        File.WriteAllText(@"D:\antigravity\cherry3\cherry-theme\front-page.php", php, System.Text.Encoding.UTF8);
        Console.WriteLine("front-page.php generated");
    }
}
